<?php
require_once(__DIR__ . '/common.php');

if (preg_replace(';\?.*$;', '', $_SERVER['REQUEST_URI']) != TOP_PATH) {
    abort();
}