<?php
define('SECRET_DIR', realpath('../../secret').'/');
require_once(SECRET_DIR.'common.php');


if (!isset($_GET['id'])) {
    abort();
}

$id = $_GET['id'];
$kyakuhonPath = SECRET_DIR.'kyakuhon_list/'.$id.'.php';
if (!file_exists($kyakuhonPath)) {
    abort();
}
require($kyakuhonPath);
if (empty($oSangeki)) {
    abort();
} else if (isProd() && !empty($oSangeki->secret)) {
    // 本番環境では非公開脚本の直飛びも禁止
    abort();
}

$url = 'http://'.SITE_DOMAIN.TOP_PATH.'r.php?t=m&i=' . md5($id . REDIRECT_QR_SALT);

?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title><?= e($oSangeki->rule_str) ?> 脚本QRコード [<?= $id ?>] - <?= SITE_NAME ?></title>
</head>
<body class="detail_qr">
    <a href="<?= $url ?>">棋譜画面へ</a>
    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= urlencode($url) ?>">
</body>
</html>
