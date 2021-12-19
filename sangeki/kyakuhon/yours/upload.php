<?php
require_once(__DIR__.'/../../../secret/common.php');

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') == 'POST') {
    dd($_REQUEST);
    header('Location: '.$_SERVER['REQUEST_URI']);
    exit;
}
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <meta name="robots" content="noindex">
    <title>脚本データアップロード完了 - <?= SITE_NAME ?></title>
</head>
<body class="your_kyakuhon_upload">
</body>
</html>
