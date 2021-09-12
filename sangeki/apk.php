<?php
require_once(__DIR__ . '/../secret/common.php');
$canonicalUrl = schema() . '://' . $_SERVER["HTTP_HOST"] . '/apk.php';
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php'); ?>
<?php require(SECRET_DIR.'sangeki_head.php'); ?>
    <title>Android アプリ 作りました！ - <?= SITE_NAME ?></title>
    <link rel="canonical" href="<?= $canonicalUrl ?>">
</head>
<body class="apk" style="padding: 16px;">
    <h1>Android アプリ 作りました！</h1>
    <div>Google Playにて、アプリを公開しています。こちらのリンクからアプリをダウンロードできます。</div>
    <a href="https://play.google.com/store/apps/details?id=work.boardgame.sangeki_rooper">惨劇RoopeR Androidアプリ</a>
</body>
</html>
