<?php
require_once(__DIR__.'/../../secret/common.php');
require_once(SECRET_DIR.'sangeki_check.php');
require_once(SECRET_DIR.'class/ScenarioIndex.php');

if (!isset($_GET['id'])) {
    abort();
}

require_once(SECRET_DIR.'detail_util.php');

$aScenario = ScenarioIndex::getScenarioList();
$id = $_GET['id'];
if (empty($aScenario[$id]) || empty($aScenario[$id]->path) || !file_exists($aScenario[$id]->path)) {
    abort();
}
require($aScenario[$id]->path);
if (empty($oSangeki)) {
    abort();
} else if (isProd() && !empty($oSangeki->secret)) {
    // 本番環境では非公開脚本の直飛びも禁止
    abort();
}

$oSangeki->rule_str = getTragedySetName($oSangeki->set);

$aInitPlace = [
    'hospital' => [],
    'shrine' => [],
    'city' => [],
    'school' => [],
    'other' => [],
];
$sOmonoTerritory = '';
foreach ($oSangeki->character as $name => $val) {
    list($role, $z, $y, $f) = roleSpec($val);
    if ($role == 'パーソン') {
        $sRoleClass = '';
    } else {
        $sRoleClass = 'special';
    }
    $oSangeki->character[$name]['role'] = $role;
    $oSangeki->character[$name]['roleClass'] = $sRoleClass;
    $oSangeki->character[$name]['zettai'] = $z;
    $oSangeki->character[$name]['yuukoumushi'] = $y;
    $oSangeki->character[$name]['fushi'] = $f;

    $aInitPlace[initPos($name, $val)][] = $name;
    if ($name == '大物') {
        $sOmonoTerritory = initPos($val['note']);
    }
}
$aErrorMessage = rolesCountCheck($oSangeki);
$sNotice = exCharacterCheck($oSangeki);
if (!empty($oSangeki->advice->notice)) {
    if (!empty($sNotice)) {
        $sNotice .= "\n";
    }
    $sNotice .= $oSangeki->advice->notice;
}

$kifuUrl = schema().'://'.SITE_DOMAIN.TOP_PATH.'r/?t=m&i=' . shortHash($id);
$canonicalUrl = schema().'://'.SITE_DOMAIN.TOP_PATH.'kyakuhon/detail.php?id='.$id;
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title><?= e($oSangeki->rule_str) ?> 脚本 [<?= $id ?>] - <?= SITE_NAME ?></title>
    <link rel="canonical" href="<?= $canonicalUrl ?>">
</head>
<body class="detail sangeki_kyakuhon_detail">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="pankuzu_wrapper">
        <a href=".">一覧へ</a>
    </div>
    <div class="public">
        <h2>公開シート</h2>
        <?php if (isExistSummaryQr($oSangeki->set)): ?>
        <div class="qr_wrapper">
            <img class="qr" src="<?= TOP_PATH ?>qr/<?= $oSangeki->set ?>.jpg">
            <div class="summary">Summary</div>
        </div>
        <?php endif; ?>
        <table class="summary">
            <tr>
                <th>惨劇セット</th>
                <td class="tragedy_set"><?= e($oSangeki->rule_str) ?></td>
            </tr>
            <tr>
                <th>ループ回数</th>
                <td><?= e($oSangeki->loop) ?>ループ</td>
            </tr>
            <tr>
                <th>1ループ日数</th>
                <td><?= e($oSangeki->day) ?>日</td>
            </tr>
        </table>
        <h3>特殊ルール</h3>
        <div class="special_rule"><?php
        if (!empty($oSangeki->special_rule)) {
            echo nl2br(e($oSangeki->special_rule));
        } else {
            echo '特になし';
        }
        ?></div>

        <h3>事件予定</h3>
        <table class="incident">
            <thead>
                <tr>
                    <th>日付</th>
                    <td>事件予定</td>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 1 ; $i <= $oSangeki->day ; $i++): ?>
                <tr>
                    <th><?= $i ?></th>
                    <td><?php
                        if (isset($oSangeki->incident[$i])) {
                            if ($oSangeki->incident[$i]['name'] == '偽装事件' && !empty($oSangeki->incident[$i]['note'])) {
                                echo $oSangeki->incident[$i]['note'];
                            } else {
                                echo $oSangeki->incident[$i]['name'];
                            }
                            echo incidentPublicNote($oSangeki->incident[$i]);
                        }
                    ?></td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <div class="kifu_link_share_wrapper">
        <p><a href="<?= $kifuUrl ?>" target="_blank">棋譜画面を開く</a></p>
        <p class="kifu_qr_title">棋譜画面 QRコード</p>
        <img class="kifu_qr" data-src="https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=<?= urlencode($kifuUrl) ?>">
        <p class="kifu_qr_explain"><span>このQRコードを読み込むと、</span><span>脚本に対応した</span><span>棋譜入力画面を</span><span>開くことができます。</span></p>
        <p class="hide_kifu_qr_wrapper"><button class="hide_kifu_qr">閉じる</button></p>
    </div>
    <p><button class="show_kifu_qr">棋譜画面URLをQRコードで共有</button></p>

    <button class="toggle_private">非公開シート、脚本家の指針を表示</button>
    <div class="private_sheet_wrapper">
        <?php if (!empty($aErrorMessage)): ?>
        <div class="private error">
            <span>役職の構成がおかしいようです。<br>特殊ルールによっては問題ない場合もあるため、確認した上でご利用下さい。</span>
            <ul class="error_message">
            <?php foreach ($aErrorMessage as $sError): ?>
                <li><?= e($sError) ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <div class="private">
            <h2 class="private_sheet">非公開シート</h2>
            <h3 class="title"><?= e($oSangeki->title) ?></h3>
            <div class="difficulity">
                難易度：
                <span class="difficulity_name"><?= difficulityName($oSangeki->difficulity) ?></span>
                <span><?php for ($i = 1 ; $i <= 8 ; $i++) {
                    if ($i <= $oSangeki->difficulity) {
                        echo '★';
                    } else {
                        echo '☆';
                    }
                } ?></span>
            </div>
            <table class="summary rule">
                <tr>
                    <th>ルールY</th>
                    <td><?= getRuleWithNote($oSangeki->rule[0]) ?></td>
                </tr>
                <tr>
                    <th>ルールX1</th>
                    <td><?= getRuleWithNote($oSangeki->rule[1]) ?></td>
                </tr>
                <?php if ($oSangeki->set != 'FS'): ?>
                <tr>
                    <th>ルールX2</th>
                    <td><?= getRuleWithNote($oSangeki->rule[2]) ?></td>
                </tr>
                <?php endif; ?>
            </table>

            <h3 class="people_title">キャラクター一覧</h3>
            <span class="people_count">(<?= count($oSangeki->character) ?>人)</span>
            <table class="character">
                <thead>
                    <tr>
                        <th>人物</th>
                        <td>役職</td>
                        <td>特記</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($oSangeki->character as $name => $val): ?>
                    <tr>
                        <td><?= $name ?></td>
                        <td class="role <?= $val['roleClass'] ?>">
                            <span class="zettai"><?= $val['zettai'] ?></span>
                            <span class="yuukoumushi"><?= $val['yuukoumushi'] ?></span>
                            <span class="fushi"><?= $val['fushi'] ?></span>
                            　<?= $val['role'] ?>
                        </td>
                        <td><?= e(empty($val['note']) ? '' : $val['note']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h4>キャラクター初期配置</h4>
            <table class="init_place">
                <tbody>
                    <tr>
                        <td>
                        <strong class="place_name">病院</strong><?= $sOmonoTerritory == 'hospital' ? '<span class="territory">大</span>' : '' ?><br>
                            <?php foreach ($aInitPlace['hospital'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                        <td>
                            <strong class="place_name">神社</strong><?= $sOmonoTerritory == 'shrine' ? '<span class="territory">大</span>' : '' ?><br>
                            <?php foreach ($aInitPlace['shrine'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="place_name">都市</strong><?= $sOmonoTerritory == 'city' ? '<span class="territory">大</span>' : '' ?><br>
                            <?php foreach ($aInitPlace['city'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                        <td>
                            <strong class="place_name">学校</strong><?= $sOmonoTerritory == 'school' ? '<span class="territory">大</span>' : '' ?><br>
                            <?php foreach ($aInitPlace['school'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <?php if (!empty($aInitPlace['other'])): ?>
                    <tr>
                        <td colspan="2" class="special_place">
                            <strong class="place_name">特殊</strong>:
                            <?php foreach ($aInitPlace['other'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <h3 class="incident">事件リスト</h3>
            <table class="incident">
                <thead>
                    <tr>
                        <th>日付</th>
                        <td>事件</td>
                        <td>犯人</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($oSangeki->incident as $day => $incident): ?>
                    <tr>
                        <th><?= $day ?></th>
                        <td><?php
                            echo e($incident['name']);
                            if (!empty($incident['note'])) {
                                echo '<br><span class="note">(' . e($incident['note']) . ')</span>';
                            }
                        ?></td>
                        <td><?= e($incident['criminal']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="private advice">
        <h3>シナリオの特徴</h3>
        <?php if (!empty($sNotice)): ?>
        <div class="notice">
            <?= nl2br(e($sNotice)) ?>
        </div>
        <?php endif; ?>
        <div><?= empty($oSangeki->advice->summary) ? 'まだ記載がありません…' : decorateSentence($oSangeki->advice->summary) ?></div>
        <h3>脚本家への指針</h3>
        <div><?= empty($oSangeki->advice->detail) ? 'まだ記載がありません…' : decorateSentence($oSangeki->advice->detail) ?></div>
        <?php if (!empty($oSangeki->advice->victoryConditions)): ?>
        <div class="victory_conditions">
            <h3>脚本家の勝利条件</h3>
            <ul>
            <?php $i = 1; ?>
            <?php foreach ($oSangeki->advice->victoryConditions as $val): ?>
                <li>
                    <div class="num"><?= $i++ ?></div>
                    <div class="condition"><?= e($val['condition']) ?></div>
                    <div class="way"><?= e(implode('、', $val['way'])) ?></div>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php if (!empty($oSangeki->advice->template)): ?>
        <div class="template">
            <h3>置き方テンプレ</h3>
            <dl>
                <?php foreach ($oSangeki->advice->template as $loop => $aVal): ?>
                    <dt><?= $loop?></dt>
                    <dd><table>
                    <?php foreach ($aVal as $day => $aCards): ?>
                        <tr>
                        <?php if ($day == 0): ?>
                            <td colspan="4">ループ開始時:<?= $aCards ?></td>
                        <?php else: ?>
                            <td><?= $day == 1 ? '初日' : $day . '日' ?></td>
                            <?php
                            $aKey = array_keys($aCards);
                            for ($i = 0 ; $i < 3 ; $i++): ?>
                                <td><?php if (!empty($aKey[$i]) && !empty($aCards[$aKey[$i]])) {
                                    echo $aKey[$i] . '<br>「' . $aCards[$aKey[$i]] . '」';
                                } else {
                                    echo '　　　　';
                                }?></td>
                            <?php endfor; ?>
                        <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </table></dd>
                <?php endforeach; ?>
            </dl>
        </div>
        <?php endif; ?>
    </div>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
