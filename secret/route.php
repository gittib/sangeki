<?php
require_once(__DIR__ . '/common.php');

$path = preg_replace(';\?.*$;', '', $_SERVER['REQUEST_URI']);
if ($path == TOP_PATH) {
    require(PUBLIC_DIR.'top.php');
} else {
    abort();
}

