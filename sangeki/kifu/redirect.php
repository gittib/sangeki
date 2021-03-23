<?php
define('SECRET_DIR', realpath('../../secret').'/');
require_once(SECRET_DIR.'common.php');
//require_once(SECRET_DIR.'kifu_util.php');
//require_once(SECRET_DIR.'detail_util.php');
//require_once(SECRET_DIR.'rule_role_master.php');

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
}

if (!empty($sLocationUrl)) {
    header('Status: 303 See Other');
    header('Location: '.$sLocationUrl);
    exit;
} else {
    // 想定外のパターン
    abort();
}
