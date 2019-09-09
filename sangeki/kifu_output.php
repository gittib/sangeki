<?
require_once('../secret/common.php');

$outType = $_POST['outtype'];
$aChara = json_decode($_POST['chara'], true);
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
    echo "登場人物\n";
    echo implode(',', $aChara) . "\n\n";

    for ($d = 1 ; $d <= $_POST['day'] ; $d++) {
        echo ',' . $d . '日目,,';
    }
    echo "\n";
    for ($l = 1 ; $l <= $_POST['loop'] ; $l++) {
        echo $l . 'Loop';
        for ($d = 1 ; $d <= $_POST['day'] ; $d++) {
            $aScriptWriter = array('脚本家');
            $aHero = array('主人公');
            if (!empty($aAction[$l][$d])) {
                foreach ($aAction[$l][$d] as $id => $val) {
                    if (!empty($val['scriptwriter'])) {
                        $aScriptWriter[] = $aChara[$id] . ':' . $val['scriptwriter'];
                    }
                    if (!empty($val['hero'])) {
                        $aHero[] = $aChara[$id] . ':' . $val['hero'];
                    }
                }
            }
            echo ',"' . implode("\n", $aScriptWriter);
            echo '","' . implode("\n", $aHero);
            echo '","';
            if (!empty($aMemo[$l]) && !empty($aMemo[$l][$d])) {
                echo str_replace('"', "'", $aMemo[$l][$d]);
            }
            echo '"';
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
