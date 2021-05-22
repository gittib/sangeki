<?php
require_once('./common.php');

if (preg_replace(';\?.*$;', '', $_SERVER['REQUEST_URI']) != TOP_PATH) {
    abort();
}
