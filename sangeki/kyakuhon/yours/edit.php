<?php
require_once(__DIR__.'/../../../secret/common.php');
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
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title>あなたの脚本を編集 - <?= SITE_NAME ?></title>
</head>
<body class="your_kyakuhon_edit">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="top_text">
        <h2>あなたの脚本を編集</h2>
        あなたの考えた脚本を、このサイトで作成・編集・管理できます。
    </div>
    <div class="editor">
        <p>惨劇セット：<span class="set"></span></p>
        <p>ループ数：
            <select name="loop">
                <?php for($i = 1 ; $i <= 8 ; $i++): ?>
                <option><?= $i ?>ループ</option>
                <?php endfor; ?>
            </select>
            日数：
            <select name="day">
                <?php for($i = 1 ; $i <= 8 ; $i++): ?>
                <option><?= $i ?>日</option>
                <?php endfor; ?>
            </select>
        </p>
        <p><span class="column_name">特殊ルール：</span><textarea name="special_rule" cols=25 rows=4></textarea></p>
        <p>難易度：
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
        </p>
        <p><span class="column_name">ルール</span>
            ルールY：
            <select name="ruleY">
                <?php foreach($aRuleY as $rule): ?>
                <option><?= $rule ?></option>
                <?php endforeach; ?>
            </select>
            ルールX1：
            <select name="ruleX1">
                <?php foreach($aRuleX as $rule): ?>
                <option><?= $rule ?></option>
                <?php endforeach; ?>
            </select>
            ルールX2：
            <select name="ruleX2">
                <?php foreach($aRuleX as $rule): ?>
                <option><?= $rule ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <p>キャラクター一覧
            <table class="characer_list">
                <thead>
                    <tr>
                        <th>キャラ</th>
                        <th>役職</th>
                        <th>備考</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </p>
        <p>事件リスト
            <table class="incident_list">
                <thead>
                    <tr>
                        <th>日数</th>
                        <th>事件名</th>
                        <th>犯人</th>
                        <th>備考</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </p>
        <p><span class="column_name">脚本の特徴など：</span><textarea name="note" cols=25 rows=8 placeholder="どんな主人公に向けた脚本なのか等を簡単に説明します"></textarea></p>
        <p><span class="column_name">脚本家への指針：</span><textarea name="advice" cols=25 rows=16 placeholder="脚本家が目指すべき敗北条件や、脚本家カードの置き方、立ち回りについて解説します"></textarea></p>
    </div>

    <div id="clone_parts_wrapper" style="display:none;">
        <table>
            <tbody>
                <tr id="clone_base-character_row">
                    <td><select class="chara_name">
                        <?php foreach ($aChara as $chara): ?>
                        <option><?= $chara ?></option>
                        <?php endforeach; ?>
                    </select></td>
                    <td><select class="chara_role">
                        <option>パーソン</option>
                        <?php foreach ($aRole as $role): ?>
                        <option><?= $role ?></option>
                        <?php endforeach; ?>
                    </select></td>
                    <td><input type="text" class="chara_note"></td>
                </tr>
                <tr id="clone_base-incident_row">
                    <td><select class="day">
                        <?php for ($i = 1 ; $i <= 8 ; $i++): ?>
                        <option><?= $i ?></option>
                        <?php endfor; ?>
                    </select></td>
                    <td><select class="incident_name">
                        <?php foreach ($aIncident as $incident): ?>
                        <option><?= $incident ?></option>
                        <?php endforeach; ?>
                    </select></td>
                    <td><select class="chara_name">
                        <?php foreach ($aChara as $chara): ?>
                        <option><?= $chara ?></option>
                        <?php endforeach; ?>
                    </select></td>
                    <td><input type="text" class="incident_note"></td>
                </tr>
            </tbody>
        </table>
    </div>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
<script>const ruleMaster = <?php
echo json_encode($aMaster, JSON_UNESCAPED_UNICODE);
?></script>
<script src="<?= TOP_PATH ?>yours.js?v=<?= filemtime(PUBLIC_DIR.'yours.js') ?>"></script>
</body>
</html>
