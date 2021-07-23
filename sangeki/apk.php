<?php
require_once(__DIR__ . '/../secret/common.php');
$canonicalUrl = schema() . '://' . $_SERVER["HTTP_HOST"] . '/apk.php';

header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php'); ?>
<?php require(SECRET_DIR.'sangeki_head.php'); ?>
    <title>Android アプリAPK置き場 - <?= SITE_NAME ?></title>
    <link rel="canonical" href="<?= $canonicalUrl ?>">
</head>
<body class="apk" style="padding: 16px;">
    <a href="apks/sangeki.apk">惨劇RoopeR Androidアプリ APKファイル</a>
</body>
</html>
