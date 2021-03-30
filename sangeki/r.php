<?php
/**
 * リダイレクト用ページ
 */
define('SECRET_DIR', realpath('../secret').'/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'kifu_util.php');
require_once(SECRET_DIR.'class/ScenarioIndex.php');

function generateKifuInputUrl($hash) {
    $id = null;
    $aList = ScenarioIndex::getScenarioList();
    foreach ($aList as $key => $ignore) {
        if (md5($key.REDIRECT_QR_SALT) === $hash) {
            $id = str_replace('-', '/', $key);
            break;
        }
    }

    if (empty($id)) abort();
    require(SECRET_DIR."kyakuhon_list/$id.php");
    if (empty($oSangeki)) abort();

    $url = 'http://'.SITE_DOMAIN.TOP_PATH.'kifu/input.php';
    $url .= '?set=' . $oSangeki->set;
    $url .= '&loop=' . $oSangeki->loop;
    $url .= '&day=' . $oSangeki->day;
    foreach ($oSangeki->incident as $day => $val) {
        $url .= "&incident[$day]=" . $val['name'];
    }
    $url .= '&from=kifu_redirect';
    $aCharacterMaster = getCharacterMaster();
    foreach ($aCharacterMaster as $area => $aCharacter) {
        foreach ($aCharacter as $chId => $name) {
            if (!empty($oSangeki->character[$name])) {
                $url .= "&ch[]=" . $name;
            }
        }
    }

    return $url;
}

$sLocationUrl = null;

switch ($_GET['t']) {
case 's':
    switch ($_GET['s']) {
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
case 'm':
    $sLocationUrl = generateKifuInputUrl($_GET['i'] ?? '');
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
