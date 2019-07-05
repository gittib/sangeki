<?php
if (realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)) {
    $url = str_replace('/secret/'.basename(__FILE__), '/', $_SERVER["REQUEST_URI"]);
    header('Location: ' . $url);
    exit;
}
