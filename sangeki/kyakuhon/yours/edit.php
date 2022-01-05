<?php
require_once(__DIR__.'/../../../secret/common.php');
require_once(SECRET_DIR.'detail_util.php');
require(SECRET_DIR.'rule_role_master.php');
$setName = $_GET['set'] ?? 'BTX';
$aMaster = $aRuleRoleMaster[$setName];
$iRuleY = $setName == 'FS' ? 3 : 5;
$aRuleY = [];
$aRuleX = [];
$aRole = [];
foreach ($aMaster as $sRuleName => $aVal) {
    if (count($aRuleY) < $iRuleY) {
        $aRuleY[] = $sRuleName;
    } else {
        $aRuleX[] = $sRuleName;
    }
    foreach ($aVal as $val) {
        $aRole[] = $val;
    }
}
$aRole = array_unique($aRole);
$aIncidents = $aIncidentMaster[$setName];
$aChara = [
    '神格',
    '巫女',
    '異世界人',
    '黒猫',
    '幻想',
    '妹',
    '教祖',
    'ご神木',
    '上位存在',
    '入院患者',
    '医者',
    'ナース',
    '軍人',
    '学者',
    'アイドル',
    'サラリーマン',
    '情報屋',
    '刑事',
    'A.I.',
    '大物',
    'マスコミ',
    '鑑識官',
    'コピーキャット',
    'アルバイト',
    '男子学生',
    '女子学生',
    'お嬢様',
    '教師',
    'イレギュラー',
    '委員長',
    '女の子',
    '転校生',
    '手先',
    '従者',
];
switch ($setName) {
case 'FS': $summaryLink = 'http://bakafire.main.jp/rooper/pdf/summary_005.pdf'; break;
case 'BTX': $summaryLink = 'http://bakafire.main.jp/rooper/pdf/summary_004.pdf'; break;
case 'MZ': $summaryLink = 'http://bakafire.main.jp/rooper/pdf/summary_007.pdf'; break;
case 'MCX': $summaryLink = 'http://bakafire.main.jp/rooper/pdf/summary_002.pdf'; break;
case 'HSA': $summaryLink = 'http://bakafire.main.jp/rooper/pdf/summary_009.pdf'; break;
case 'WM': $summaryLink = 'http://bakafire.main.jp/rooper/pdf/summary_008.pdf'; break;
case 'AHR': $summaryLink = 'http://bakafire.main.jp/rooper/pdf/summary_011.pdf'; break;
case 'LL': $summaryLink = 'http://bakafire.main.jp/rooper/pdf/summary_010.pdf'; break;
}
if (!empty($summaryLink)) {
    $summaryLinkDom = <<<_DOC_
    <p class="summary_link"><a href="${summaryLink}" target="_blank">
        <span>サマリー</span>
        <i class="fas fa-file-alt"></i>
    </a></p>
_DOC_;
}
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <meta name="robots" content="noindex,nofollow">
    <title>あなたの脚本を編集 - <?= SITE_NAME ?></title>
</head>
<body class="your_kyakuhon_edit">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="pankuzu_wrapper">
        <a href=".">一覧へ</a>
    </div>
    <div class="top_text">
        <h2>あなたの脚本を編集</h2>
        あなたの考えた脚本を、このサイトで作成・編集・管理できます。
    </div>
    <div class="editor">
        <div>惨劇セット：<?= getTragedySetName($setName) ?></div>
        <div>脚本タイトル：<input type="text" name="title"></div>
        <div>ループ数：
            <select name="loop">
                <?php for($i = 1 ; $i <= 8 ; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?>ループ</option>
                <?php endfor; ?>
            </select>
            日数：
            <select name="day">
                <?php for($i = 1 ; $i <= 8 ; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?>日</option>
                <?php endfor; ?>
            </select>
        </div>
        <div><span class="column_name">特殊ルール：</span><textarea name="specialRule" cols=25 rows=4></textarea></div>
        <div>難易度：
            <select name="difficulty">
                <?php for ($i = 1 ; $i <= 8 ; $i++): ?>
                <option value="<?= $i ?>"><?php
                for ($j = 1 ; $j <= 8 ; $j++) {
                    if ($j <= $i) echo '★';
                    else echo '☆';
                } ?>　<?= difficulityName($i) ?></option>
                <?php endfor; ?>
                <option value="0">☆☆☆☆☆☆☆☆　特殊</option>
            </select>
        </div>
        <div><span class="column_name">ルール</span>
            <?= $summaryLinkDom ?? '' ?>
            <ul>
                <li>
                    ルールY：<select name="ruleY">
                        <?php foreach($aRuleY as $rule): ?>
                        <option><?= $rule ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <li>
                    ルールX1：<select name="ruleX1">
                        <?php foreach($aRuleX as $rule): ?>
                        <option><?= $rule ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <?php if (($_GET['set'] ?? '') != 'FS'): ?>
                <li>
                    ルールX2：<select name="ruleX2">
                        <?php foreach($aRuleX as $rule): ?>
                        <option><?= $rule ?></option>
                        <?php endforeach; ?>
                    </select>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <div><span class="column_name">キャラクター一覧</span>
            <?= $summaryLinkDom ?? '' ?>
            <ul class="character_list"></ul>
            <div class="character_count">登場キャラクター数：<span>0</span>人</div>
            <button class="add_chara">キャラクター追加<i class="fas fa-user-plus"></i></button>
        </div>
        <div><span class="column_name">事件リスト</span>
            <?= $summaryLinkDom ?? '' ?>
            <ul class="incident_list"></ul>
            <button class="add_incident">事件追加<i class="fas fa-plus-square"></i></button>
        </div>
        <div><span class="column_name">脚本の特徴など：</span><textarea name="scenarioNote" cols=25 rows=8 placeholder="惨劇セット初挑戦の主人公に向けた脚本、などの特徴を説明します。狂った真実などの補足もこちらへお書きください"></textarea></div>
        <div><span class="column_name">脚本家への指針：</span><textarea name="advice" cols=25 rows=16 placeholder="脚本家が目指すべき敗北条件や、脚本家カードの置き方、立ち回りについて解説します"></textarea></div>
    </div>

    <div id="clone_parts_wrapper" style="display:none;">
        <ul>
            <li id="clone_base-character_row" class="character_row">
                <span><select name="chara_name">
                    <?php foreach ($aChara as $chara): ?>
                    <option><?= $chara ?></option>
                    <?php endforeach; ?>
                </select></span>
                <span><select name="chara_role">
                    <option value="">パーソン</option>
                    <?php foreach ($aRole as $role): ?>
                    <option><?= $role ?></option>
                    <?php endforeach; ?>
                </select></span>
                <span><input type="text" name="chara_note" placeholder="備考欄(大物のテリトリー等)"></span>
                <span>
                    <button class="character_sort_up icon"><i class="fas fa-arrow-alt-circle-up"></i></button>
                    <button class="character_sort_down icon"><i class="fas fa-arrow-alt-circle-down"></i></button>
                </span>
                <span><button class="delete icon"><i class="fas fa-trash-alt"></i></button></span>
            </li>
            <li id="clone_base-incident_row" class="incident_row">
                <span>発生日：<select name="incident_day">
                    <?php for ($i = 1 ; $i <= 8 ; $i++): ?>
                    <option value="<?= $i ?>"><?= $i ?>日目</option>
                    <?php endfor; ?>
                </select></span>
                <span>事件名：<select name="incident_name">
                    <?php foreach ($aIncidents as $incident): ?>
                    <option><?= $incident ?></option>
                    <?php endforeach; ?>
                </select></span>
                <span>犯人：<select name="criminal_name">
                    <?php foreach ($aChara as $chara): ?>
                    <option><?= $chara ?></option>
                    <?php endforeach; ?>
                    <option>神社の群像</option>
                    <option>病院の群像</option>
                    <option>都市の群像</option>
                    <option>学校の群像</option>
                </select></span>
                <span><input type="text" name="incident_note" placeholder="備考または偽装事件の公開名"></span>
                <span><button class="delete icon"><i class="fas fa-trash-alt"></i></button></span>
            </li>
        </ul>
    </div>
<script>const ruleMaster = <?= json_encode($aMaster, JSON_UNESCAPED_UNICODE) ?>;
const scenarioId = <?= $_GET['id'] ?>;</script>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
