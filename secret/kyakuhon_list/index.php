<?php
if (realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)) {
    $url = str_replace('/secret/kyakuhon_list', '', $_SERVER["REQUEST_URI"]);
    header('Location: ' . $url);
    exit;
}
