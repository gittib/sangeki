<?php
require_once(__DIR__ . '/../secret/common.php');

$appUA = ' SangekiRooperAndroid ';
if (strpos($_SERVER['HTTP_USER_AGENT'], $appUA) === false) {
    abort();
}

switch ($_SERVER['REQUEST_METHOD']) {
case 'GET':
case 'get':
    require(SECRET_DIR.'api/get.php');
    break;
case 'POST':
case 'post':
    require(SECRET_DIR.'api/post.php');
    break;
default:
    abort();
    break;
}
