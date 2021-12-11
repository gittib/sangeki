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
    <div class="">
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
        <p>特殊ルール：<textarea name="special_rule"></textarea></p>
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
            <ul class="incident_list"></ul>
        </p>
    </div>

    <div id="clone_parts_wrapper" style="display:none;">
        <ul>
        </ul>
    </div>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
<script><?php
require(SECRET_DIR.'rule_role_master.php');
echo json_encode($aRuleRoleMaster, JSON_UNESCAPED_UNICODE);
?></script>
<script src="<?= TOP_PATH ?>yours.js?v=<?= filemtime(PUBLIC_DIR.'yours.js') ?>"></script>
</body>
</html>
