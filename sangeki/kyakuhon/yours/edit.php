<?php
require_once(__DIR__.'/../../../secret/common.php');
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
        <p><span class="column_name">脚本家への指針：</span><textarea name="advice" cols=25 rows=16 placeholder="カードの置き方や、脚本家が目指すべき敗北条件、立ち回りについて解説します"></textarea></p>
    </div>

    <div id="clone_parts_wrapper" style="display:none;">
        <table>
            <tbody>
                <tr id="clone_base-character_row">
                </tr>
                <tr id="clone_base-incident_row">
                </tr>
            </tbody>
        </table>
    </div>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
<script>const ruleMaster = <?php
require(SECRET_DIR.'rule_role_master.php');
echo json_encode($aRuleRoleMaster, JSON_UNESCAPED_UNICODE);
?></script>
<script src="<?= TOP_PATH ?>yours.js?v=<?= filemtime(PUBLIC_DIR.'yours.js') ?>"></script>
</body>
</html>
