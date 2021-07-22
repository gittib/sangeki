<?php
/**
 * リダイレクト用ページ
 */
define('SECRET_DIR', realpath('../../secret').'/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'kifu_util.php');
require_once(SECRET_DIR.'class/ScenarioIndex.php');

function generateKifuInputUrl($hash) {
    $id = null;
    $aList = ScenarioIndex::getScenarioList();
    foreach ($aList as $key => $ignore) {
        if (shortHash($key) === $hash) {
            $id = str_replace('-', '/', $key);
            break;
        }
    }

    if (empty($id)) abort();
    require(SECRET_DIR."kyakuhon_list/$id.php");
    if (empty($oSangeki)) abort();

    $url = schema().'://'.SITE_DOMAIN.TOP_PATH.'kifu/input.php';
    $url .= '?set=' . $oSangeki->set;
    $url .= '&loop=' . $oSangeki->loop;
    $url .= '&day=' . $oSangeki->day;
    foreach ($oSangeki->incident as $day => $val) {
        if ($val['name'] == '偽装事件') {
            $it = $val['note'] ?? $val['name'];
        } else {
            $it = $val['name'];
        }
        $url .= "&incident%5B$day%5D=" . urlencode($it);
    }
    $url .= '&from=kifu_redirect';
    $aCharacterMaster = getCharacterMaster();
    foreach ($aCharacterMaster as $area => $aCharacter) {
        foreach ($aCharacter as $chId => $name) {
            if (array_key_exists($name, $oSangeki->character)) {
                $url .= '&ch%5B%5D=' . $chId;
            }
        }
    }

    return $url;
}

$type = $_GET['t'] ?? '';
$setName = $_GET['s'] ?? '';
$hashedId = $_GET['i'] ?? '';

$sLocationUrl = null;

switch ($type) {
case 's':
    switch ($setName) {
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
    case 'HSA':
        $sLocationUrl = 'http://bakafire.main.jp/rooper/pdf/summary_009.pdf';
        break;
    case 'WM':
        $sLocationUrl = 'http://bakafire.main.jp/rooper/pdf/summary_008.pdf';
        break;
    }
    break;
case 'm':
    $sLocationUrl = generateKifuInputUrl($hashedId);
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
