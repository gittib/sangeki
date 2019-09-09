<?
require_once('../secret/common.php');

$outType = $_POST['outtype'];
$aChara = json_decode($_POST['chara']);
$aAction = json_decode($_POST['action'], true);
$aMemo = $_POST['memo'];

switch ($outType) {
case 'csv':
    outCsv($aChara, $aAction, $aMemo);
    break;
case 'json':
    outJson($aChara, $aAction, $aMemo);
    break;
}

function outCsv($aChara, $aAction, $aMemo) {
    header('content-type: text/csv; charset=utf-8');
    for ($l = 1 ; $l <= $_POST['loop'] ; $l++) {
        echo $l . 'ループ目,';
        foreach ($aChara as $id => $ch) {
            echo ',' . $ch;
        }
        echo "\n";
        for ($d = 1 ; $d <= $_POST['day'] ; $d++) {
            echo $d . '日目,' . '脚本家';
            foreach ($aChara as $id => $ch) {
                echo ',';
                if (!empty($aAction[$l]) && !empty($aAction[$l][$d]) && !empty($aAction[$l][$d][$id]) && !empty($aAction[$l][$d][$id]['scriptwriter'])) {
                    $act = $aAction[$l][$d][$id];
                    echo $act['scriptwriter'];
                }
            }
            if (!empty($aMemo[$l]) && !empty($aMemo[$l][$d])) {
                echo ',"' . str_replace('"', "'", $aMemo[$l][$d]) . '"';
            }
            echo "\n" . ',' . '主人公';
            foreach ($aChara as $id => $ch) {
                echo ',';
                if (!empty($aAction[$l]) && !empty($aAction[$l][$d]) && !empty($aAction[$l][$d][$id]) && !empty($aAction[$l][$d][$id]['hero'])) {
                    $act = $aAction[$l][$d][$id];
                    echo $act['hero'];
                }
            }
            echo "\n";
        }
        echo "\n\n";
    }
}

function outJson($aChara, $aAction, $aMemo) {
    header('content-type: application/json; charset=utf-8');
    echo json_encode(array(
        'loop' => $_POST['loop'],
        'day' => $_POST['day'],
        'chara' => $_POST['chara'],
        'action' => json_decode($_POST['action']),
        'memo' => $_POST['memo'],
    ));
}
