<?
require_once('../secret/common.php');
header('content-type: text/csv; charset=utf-8');
$aAction = json_decode($_POST['action'], true);
$aMemo = $_POST['memo'];
$aChara = json_decode($_POST['chara']);
for ($l = 1 ; $l <= $_POST['loop'] ; $l++) {
    echo $l . "ループ目\n";
    echo ',,';
    foreach ($aChara as $id => $ch) {
        echo $ch . ',';
    }
    echo "\n";
    for ($d = 1 ; $d <= $_POST['day'] ; $d++) {
        echo $d . ',' . '脚,';
        if (!isset($aAction[$l][$d]) || !is_array($aAction[$l][$d])) {
            continue;
        }
        foreach ($aAction[$l][$d] as $id => $act) {
            echo $act['scriptwriter'] . ',';
        }
        echo "\n" . ',,' . '主,';
        foreach ($aAction[$l][$d] as $id => $act) {
            echo $act['hero'] . ',';
        }
    }
    echo "\n";
}

//echo json_encode(array(
//    'loop' => $_POST['loop'],
//    'day' => $_POST['day'],
//    'chara' => $_POST['chara'],
//    'action' => json_decode($_POST['action']),
//    'memo' => $_POST['memo'],
//));
