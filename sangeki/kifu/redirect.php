<?php
define('SECRET_DIR', realpath('../../secret').'/');
require_once(SECRET_DIR.'common.php');
//require_once(SECRET_DIR.'kifu_util.php');
//require_once(SECRET_DIR.'detail_util.php');
//require_once(SECRET_DIR.'rule_role_master.php');

function generateQrCodeUrl($id) {
    // TODO stub
    // https://api.qrserver.com/v1/create-qr-code/?data=http%3A%2F%2Fwww.boardgame.work%2Fsangeki%2Fkifu%2Finput.php%3Fset%3DFS%26loop%3D3%26day%3D3%26insident%255B1%255D%3D%26insident%255B2%255D%3D%26insident%255B3%255D%3D%25E8%2587%25AA%25E6%25AE%25BA%26insident%255B4%255D%3D%26insident%255B5%255D%3D%26insident%255B6%255D%3D%26insident%255B7%255D%3D%26insident%255B8%255D%3D%26ch%255B%255D%3D1002%26ch%255B%255D%3D1101%26ch%255B%255D%3D1104%26ch%255B%255D%3D1201%26ch%255B%255D%3D1202%26ch%255B%255D%3D1203%26ch%255B%255D%3D1301%26ch%255B%255D%3D1302%26ch%255B%255D%3D1303%26from%3Dkifu_init
}

$sLocationUrl = null;

switch ($_GET['type']) {
case 'summary':
    switch ($_GET['set']) {
    case 'FS':
        $sLocationUrl = 'http://bakafire.main.jp/rooper/pdf/summary_005.pdf';
        break;
    case 'BTX':
        $sLocationUrl = 'http://bakafire.main.jp/rooper/pdf/summary_004.pdf';
        break;
    case 'MZ':
        $sLocationUrl = 'http://bakafire.main.jp/rooper/pdf/summary_007.pdf';
        break;
    case 'MC':
    case 'MCX':
        $sLocationUrl = 'http://bakafire.main.jp/rooper/pdf/summary_002.pdf';
        break;
    case 'HS':
        $sLocationUrl = 'http://bakafire.main.jp/rooper/pdf/summary_009.pdf';
        break;
    case 'WM':
        $sLocationUrl = 'http://bakafire.main.jp/rooper/pdf/summary_008.pdf';
        break;
    }
    break;
case 'qr':
    $sLocationUrl = generateQrCodeUrl($_GET['id'] ?? '');
    break;
}

if (!empty($sLocationUrl)) {
    header('Status: 303 See Other');
    header('Location: '.$sLocationUrl);
    exit;
} else {
    // 想定外のパターン
    abort();
}
