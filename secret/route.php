<?php
require_once(__DIR__ . '/common.php');

$url = schema() . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$aUrl = parse_url($url);
$aUrl['segments'] = explode('/', trim($aUrl['path'], '/ '));
if ($aUrl['path'] == TOP_PATH) {
    require(PUBLIC_DIR.'top.php');
} else if ($aUrl['path'] == TOP_PATH.'s.apk') {
    $url = sprintf('%s://%s/%s', schema(), $_SERVER["HTTP_HOST"], TOP_PATH.'apk.php');
    header('Location: '.$url, true, 301);
} else {
    abort();
}

