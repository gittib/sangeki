<?
require_once('../secret/common.php');
echo json_encode(array(
    'loop' => $_POST['loop'],
    'day' => $_POST['day'],
    'chara' => $_POST['chara'],
    'action' => json_decode($_POST['action']),
    'memo' => json_decode($_POST['memo']),
));
