<?
require_once('../secret/common.php');
header('content-type: application/json; charset=utf-8');
echo json_encode(array(
    'loop' => $_POST['loop'],
    'day' => $_POST['day'],
    'chara' => $_POST['chara'],
    'action' => json_decode($_POST['action']),
    'memo' => $_POST['memo'],
));
