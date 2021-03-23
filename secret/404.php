<?php require_once(dirname(__FILE__) . '/common.php'); ?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title>ページが見つかりません - <?= SITE_NAME ?></title>
</head>
<body class="not_found">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <h1>ページが見つかりませんでした。</h1>
    <p><a href="javascript:history.back();">戻る</a></p>
    <p><a href="<?= TOP_PATH ?>">TOPへ</a></p>
</body>
</html>
