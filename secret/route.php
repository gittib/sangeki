<?php
require_once(__DIR__ . '/common.php');

$url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$aUrl = parse_url($url);
$aUrl['segments'] = explode('/', trim($aUrl['path'], '/ '));
if ($aUrl['path'] == TOP_PATH) {
    require(PUBLIC_DIR.'top.php');
} else {
    abort();
}

