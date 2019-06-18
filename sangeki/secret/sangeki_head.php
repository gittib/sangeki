<?php
if (realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)) {
    $url = str_replace('/secret/'.basename(__FILE__), '/', $_SERVER["REQUEST_URI"]);
    header('Location: ' . $url);
    exit;
}
?>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
<link rel="stylesheet" href="/sangeki/screen.css?v=<?= filemtime('../sangeki/screen.css') ?>">
<link rel="shortcut icon" href="/sangeki/favicon.ico" type="image/vnd.microsoft.icon" /> 
<link rel="icon" href="/sangeki/favicon.ico" type="image/vnd.microsoft.icon" />
