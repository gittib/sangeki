<?php
require_once('../secret/common.php');
require_once('../secret/sangeki_check.php');

function roleSpec ($r) {
    $role = isset($r['role']) ? $r['role'] : 'パーソン';
    $sZettai = '◇';
    $sYuukouMushi = '&#x2661;';
    $sFushi = '☆';

    switch ($role) {
        case 'カルティスト':
        case 'ウィッチ':
        case 'ゼッタイシャ':
        case 'パラノイア':
            $sZettai = '◆';
        case 'キラー':
        case 'クロマク':
        case 'ファクター':
        case 'ニンジャ':
        case 'ドリッパー':
        case 'ヴァンパイア':
        case 'ウェアウルフ':
        case 'ナイトメア':
        case 'ディープワン':
        case 'フェイスレス':
            $sYuukouMushi = '<span class="black_heart">&#x1f5a4;</span>';
            break;
    }

    switch ($role) {
        case 'タイムトラベラー':
        case 'イモータル':
        case 'メイタンテイ':
        case 'ヴァンパイア':
        case 'ナイトメア':
        case 'ミカケダオシ':
        case 'ヒトハシラ':
        case 'フェイスレス':
            $sFushi = '★';
            break;
    }

    return array($role, $sZettai, $sYuukouMushi, $sFushi);
}
function initPos($name) {
    switch ($name) {
        case '神社':
        case 'shrine':
        case '巫女':
        case '異世界人':
        case '黒猫':
        case '幻想':
            return 'shrine';
        case '病院':
        case 'hospital':
        case '入院患者':
        case '医者':
        case 'ナース':
        case '軍人':
        case '学者':
            return 'hospital';
        case '都市':
        case 'city':
        case 'アイドル':
        case 'サラリーマン':
        case '情報屋':
        case '刑事':
        case 'A.I.':
        case 'AI':
        case '大物':
        case 'マスコミ':
        case '鑑識官':
            return 'city';
        case '学校':
        case 'school':
        case '男子学生':
        case '女子学生':
        case 'お嬢様':
        case '教師':
        case 'イレギュラー':
        case '委員長':
        case '女の子':
            return 'school';
        case 'other':
        case '神格':
        case '転校生':
        case '手先':
        default:
            return 'other';
    }
}
function getRuleWithNote($sRule) {
    if (strpos($sRule, '/') > 0) {
        // スラッシュで区切るとルールの備考を設定できる（狂った真実とか用）
        list($sRule, $sNote) = explode('/', $sRule);
        echo e(trim($sRule)) . '<br><span class="note">(' . e(trim($sNote)) . ')</span>';
    } else {
        echo e(trim($sRule));
    }
}
function insidentPublicNote($insident) {
    $sBikou = '';
    switch ($insident['name']) {
    case '穢れの噴出':
    case '死者の黙示録':
        $sBikou = '(必要死体:2)';
        break;
    case '呪いの目覚め':
        $sBikou = '(必要死体:1)';
        break;
    case '狂気の夜':
        $sBikou = '(必要死体:0)';
        break;
    case '遂行者':
    case '前兆':
        $sBikou = '(不安臨界-1)';
        break;
    case '猟奇殺人':
        $sBikou = '(不安臨界+1)';
        break;
    case '陰謀工作':
    case '猟犬の嗅覚':
        $sBikou = '(暗躍で判定)';
        break;
    }
    if (!empty($sBikou)) {
        return '<span class="note">' . $sBikou . '</span>';
    } else {
        return '';
    }
}

function isExistSummaryQr($ruleSetName) {
    switch ($ruleSetName) {
    case 'FS':
    case 'BTX':
    case 'MZ':
    case 'MCX':
    case 'HSA':
    case 'WM':
        return true;
    default:
        return false;
    }
}

if (!isset($_GET['id'])) {
    header('Location: .');
    exit;
}
$id = $_GET['id'];
$kyakuhonPath = '../secret/kyakuhon_list/'.$id.'.php';
if (!file_exists($kyakuhonPath)) {
    header('Location: .');
    exit;
}
require($kyakuhonPath);
if (empty($oSangeki)) {
    header('Location: .');
    exit;
} else if (isProd() && !empty($oSangeki->secret)) {
    // 本番環境では非公開脚本の直飛びも禁止
    header('Location: .');
    exit;
}
switch ($oSangeki->set) {
    case 'BTX':
        $oSangeki->rule_str = 'Basic Tragedy Χ';
        break;
    case 'MZ':
        $oSangeki->rule_str = 'Midnight Zone';
        break;
    case 'MCX':
        $oSangeki->rule_str = 'Mistery Circle Χ';
        break;
    case 'HSA':
        $oSangeki->rule_str = 'Hounted State Again';
        break;
    case 'WM':
        $oSangeki->rule_str = 'Weird Mythology';
        break;
    default:
        $oSangeki->rule_str = '謎の惨劇セット';
        break;
}
$aInitPlace = array(
    'hospital' => array(),
    'shrine' => array(),
    'city' => array(),
    'school' => array(),
    'other' => array(),
);
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

    if (isset($val['initPos'])) {
        $aInitPlace[initPos($val['initPos'])][] = $name;
    } else {
        $aInitPlace[initPos($name)][] = $name;
    }
}
?>
<html>
<head>
<?php require('../secret/sangeki_head.php') ?>
    <title><?= e($oSangeki->rule_str) ?> 脚本</title>
</head>
<body class="detail">
    <div class="pankuzu_wrapper">
        <a href=".">一覧へ</a>
    </div>
    <div class="public">
        <h2>公開シート</h2>
        <?php if (isExistSummaryQr($oSangeki->set)): ?>
        <div class="qr_wrapper">
            <img class="qr" src="qr/<?= $oSangeki->set ?>.jpg">
            <div class="summary">Summary</div>
        </div>
        <?php endif; ?>
        <span>
            難易度：
            <span class="difficulity_name"><?= difficulityName($oSangeki->difficulity) ?></span>
            <? for ($i = 1 ; $i <= 8 ; $i++) {
                if ($i <= $oSangeki->difficulity) {
                    echo '★';
                } else {
                    echo '☆';
                }
            } ?>
        </span>
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
        <div class="special_rule"><?
        if (!empty($oSangeki->special_rule)) {
            echo nl2br(e($oSangeki->special_rule));
        } else {
            echo '特になし';
        }
        ?></div>

        <h3>事件予定</h3>
        <table class="insident">
            <thead>
                <tr>
                    <th>日付</th>
                    <td>事件予定</td>
                </tr>
            </thead>
            <tbody>
                <? for ($i = 1 ; $i <= $oSangeki->day ; $i++): ?>
                <tr>
                    <th><?= $i ?></th>
                    <td><?
                        if (isset($oSangeki->incident[$i])) {
                            if ($oSangeki->incident[$i]['name'] == '偽装事件' && !empty($oSangeki->incident[$i]['note'])) {
                                echo $oSangeki->incident[$i]['note'];
                            } else {
                                echo $oSangeki->incident[$i]['name'];
                            }
                            echo insidentPublicNote($oSangeki->incident[$i]);
                        }
                    ?></td>
                </tr>
                <? endfor; ?>
            </tbody>
        </table>
    </div>
    <button class="toggle_private">非公開シート、脚本家の指針を表示</button>
    <div class="private_sheet_wrapper">
        <div class="private">
            <h2 class="private_sheet">非公開シート</h2>
            <h3 class="title"><?= e($oSangeki->title) ?></h3>
            <table class="summary rule">
                <tr>
                    <th>ルールY</th>
                    <td><?= getRuleWithNote($oSangeki->rule[0]) ?></td>
                </tr>
                <tr>
                    <th>ルールX1</th>
                    <td><?= getRuleWithNote($oSangeki->rule[1]) ?></td>
                </tr>
                <tr>
                    <th>ルールX2</th>
                    <td><?= getRuleWithNote($oSangeki->rule[2]) ?></td>
                </tr>
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
                    <? foreach ($oSangeki->character as $name => $val): ?>
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
                    <? endforeach; ?>
                </tbody>
            </table>

            <h4>キャラクター初期配置</h4>
            <table class="init_place">
                <tbody>
                    <tr>
                        <td>
                            <strong class="place_name">病院</strong><br>
                            <? foreach ($aInitPlace['hospital'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                        <td>
                            <strong class="place_name">神社</strong><br>
                            <? foreach ($aInitPlace['shrine'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="place_name">都市</strong><br>
                            <? foreach ($aInitPlace['city'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                        <td>
                            <strong class="place_name">学校</strong><br>
                            <? foreach ($aInitPlace['school'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <? if (!empty($aInitPlace['other'])): ?>
                    <tr>
                        <td colspan="2" class="special_place">
                            <strong class="place_name">特殊</strong>:
                            <? foreach ($aInitPlace['other'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <? endif; ?>
                </tbody>
            </table>

            <h3 class="insident">事件リスト</h3>
            <table class="insident">
                <thead>
                    <tr>
                        <th>日付</th>
                        <td>事件</td>
                        <td>犯人</td>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($oSangeki->incident as $day => $incident): ?>
                    <tr>
                        <th><?= $day ?></th>
                        <td><?
                            echo e($incident['name']);
                            if (!empty($incident['note'])) {
                                echo '<br><span class="note">(' . e($incident['note']) . ')</span>';
                            }
                        ?></td>
                        <td><?= $incident['criminal'] ?></td>
                    </tr>
                    <? endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="private advice">
        <h3>シナリオの特徴</h3>
        <? if (!empty($oSangeki->advice->notice)): ?>
        <div class="notice">
            <?= nl2br(e($oSangeki->advice->notice)) ?>
        </div>
        <? endif; ?>
        <div>
            <?= nl2br(e(empty($oSangeki->advice->summary) ? 'まだ記載がありません...' : $oSangeki->advice->summary)) ?>
        </div>
        <h3>脚本家への指針</h3>
        <div>
            <?= nl2br(e(empty($oSangeki->advice->detail) ? 'まだ記載がありません...' : $oSangeki->advice->detail)) ?>
        </div>
        <? if (!empty($oSangeki->advice->template)): ?>
        <div class="template">
            <h3>置き方テンプレ</h3>
            <dl>
                <? foreach ($oSangeki->advice->template as $loop => $aVal): ?>
                    <dt><?= $loop?></dt>
                    <dd><table>
                    <? foreach ($aVal as $day => $aCards): ?>
                        <tr>
                        <? if ($day == 0): ?>
                            <td colspan="4">ループ開始時:<?= $aCards ?></td>
                        <? else: ?>
                            <td><?= $day == 1 ? '初日' : $day . '日' ?></td>
                            <?
                            $aKey = array_keys($aCards);
                            for ($i = 0 ; $i < 3 ; $i++): ?>
                                <td><? if (!empty($aKey[$i]) && !empty($aCards[$aKey[$i]])) {
                                    echo $aKey[$i] . '<br>「' . $aCards[$aKey[$i]] . '」';
                                } else {
                                    echo '　　　　';
                                }?></td>
                            <? endfor; ?>
                        <? endif; ?>
                        </tr>
                    <? endforeach; ?>
                    </table></dd>
                <? endforeach; ?>
            </dl>
        </div>
        <? endif; ?>
    </div>
<?php require('../secret/sangeki_footer.php') ?>
    <script>
    $('.toggle_private').on('click', function() {
        var $self = $(this);
        var $p = $('.private');
        if ($p.is(':visible')) {
            $p.hide();
            $self.text('非公開シート、脚本家の指針を表示');
        } else {
            if (confirm('非公開シートを表示します。よろしいですか？')) {
                $p.show();
                $self.text('非公開シート、脚本家の指針を隠す');
            }
        }
    });
    $('.qr_wrapper img').on('click', function() {
        $(this).toggleClass('zoom');
    });
    </script>
</body>
</html>
