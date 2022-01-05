<?php
require_once(__DIR__ . '/common.php');

$url = schema() . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$aUrl = parse_url($url);
$aUrl['segments'] = explode('/', trim($aUrl['path'], '/ '));


if ($aUrl['path'] == TOP_PATH) {
    // TOPページ
    require(PUBLIC_DIR.'top.php');

} else if ($aUrl['path'] == TOP_PATH.'s.apk') {
    // APK直接配ってた時のDL用URLは、Google Playへの案内ページにリダイレクトする
    $url = sprintf('%s://%s%s', schema(), $_SERVER["HTTP_HOST"], TOP_PATH.'apk.php');
    header('Location: '.$url, true, 301);

} else if (($aUrl['segments'][1] ?? '') == 'zakkan') {
    // 雑感ページ
    $ymd = $aUrl['segments'][2] ?? '';
    $path = SECRET_DIR."zakkan/${ymd}.php";
    if (empty($ymd)) {
        require(SECRET_DIR.'zakkan/index.php');
    } else if (file_exists($path)) {
        require($path);
    } else {
        abort();
    }

} else {
    abort();
}

