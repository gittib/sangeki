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
case 'html':
    outHtml($aChara, $aAction, $aMemo);
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

function outHtml($aChara, $aAction, $aMemo) {
    $aDay = array();
    for ($l = 1 ; $l <= $_POST['loop'] ; $l++) {
        $aDay[$l] = array();
        for ($d = 1 ; $d <= $_POST['day'] ; $d++) {
            $aDay[$l][$d] = array();
            $aScriptWriter = array('脚本家');
            $aHero = array('主人公');
            if (!empty($aAction[$l][$d])) {
                foreach ($aAction[$l][$d] as $id => $val) {
                    if (!empty($val['scriptwriter']) && !empty($aChara[$id])) {
                        $aScriptWriter[] = $aChara[$id] . ':' . $val['scriptwriter'];
                    }
                    if (!empty($val['hero']) && !empty($aChara[$id])) {
                        $aHero[] = $aChara[$id] . ':' . $val['hero'];
                    }
                }
            }
            $aDay[$l][$d]['scriptWriter'] = implode("<br>", $aScriptWriter);
            $aDay[$l][$d]['hero'] =  implode("<br>", $aHero);
            $aDay[$l][$d]['memo'] = $aMemo[$l][$d];
        }
    }
?>
<html>
<head>
    <link rel="stylesheet" href="screen.css?v=<?= filemtime(dirname(__FILE__) . '/../sangeki/screen.css') ?>">
    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon" /> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta name="viewport" content="width=1200">
    <title>惨劇RoopeR 棋譜</title>
</head>
<body class="kifu_output">
    <div class="kifu_out_wrapper">
        <table>
            <tr>
                <td>Daily Memo</td>
                <? for ($d = 1 ; $d <= $_POST['day'] ; $d++): ?>
                    <td colspan=3>
                        <?= $d ?>日目
                    </td>
                <? endfor; ?>
            </tr>
            <? for ($l = 1 ; $l <= $_POST['loop'] ; $l++): ?>
                <tr>
                    <td><?= $l ?>Loop</td>
                    <? for ($d = 1 ; $d <= $_POST['day'] ; $d++): ?>
                        <td><?= $aDay[$l][$d]['scriptWriter'] ?></td>
                        <td><?= $aDay[$l][$d]['hero'] ?></td>
                        <td><?= $aDay[$l][$d]['memo'] ?></td>
                    <? endfor; ?>
                </tr>
            <? endfor; ?>
        </table>
    </div>
<?php require('../secret/sangeki_footer.php') ?>
</body>
</html>
<?php
}
