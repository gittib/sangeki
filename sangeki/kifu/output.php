<?
define('SECRET_DIR', '../../secret/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'kifu_util.php');

$outType = $_POST['outtype'];
$aChara = $_POST['chara_info'];
$aAction = $_POST['action_info'];

$iShinkakuLoop = $_POST['shinkaku_loop'];
$iTenkouseiDay = $_POST['tenkousei_day'];

$shinkakuId = '1001';
if (!empty($aChara[$shinkakuId])) {
    if (empty($iShinkakuLoop)) {
        unset($aChara[$shinkakuId]);
    } else {
        $aChara[$shinkakuId]['memo'] .= "\n登場ループ：{$iShinkakuLoop}ループ";
    }
}

$tenkouseiId = '1307';
if (!empty($aChara[$tenkouseiId])) {
    if (empty($iTenkouseiDay)) {
        unset($aChara[$tenkouseiId]);
    } else {
        $aChara[$tenkouseiId]['memo'] .= "\n登場日：{$iTenkouseiDay}日";
    }
}

foreach ($aChara as $charaId => $val) {
    $aChara[$charaId]['name'] = getKifuCharaName($charaId);
}
foreach ($aAction as $loop => $aActionInLoop) {
    foreach ($aActionInLoop as $day => $aActionInDay) {
        foreach ($aActionInDay['scriptwriter'] as $key => $chara) {
            $id = $chara['chara'];
            $aAction[$loop][$day]['scriptwriter'][$key]['chara_name'] = getKifuCharaName($id);
        }
        foreach ($aActionInDay['hero'] as $key => $chara) {
            $id = $chara['chara'];
            $aAction[$loop][$day]['hero'][$key]['chara_name'] = getKifuCharaName($id);
        }
    }
}

switch ($outType) {
case 'csv':
    outCsv($aChara, $aAction);
    break;
case 'json':
    outJson($aChara, $aAction);
    break;
case 'html':
    outHtml($aChara, $aAction);
    break;
}

function outCsv($aChara, $aAction) {
    $sCsv = '';
    $sCsv .= "登場人物\n";
    $sCsv .= "キャラ,役職,メモ\n";
    foreach ($aChara as $chara) {
        $sCsv .= '"' . implode('","', array(
            escapeCsv($chara['name']),
            escapeCsv($chara['role']),
            escapeCsv($chara['memo']),
        )) . "\"\n";
    }

    $sCsv .= "\n行動カードログ\n";
    $sCsv .= '"' . implode('","', array(
        'ループ数',
        '日数',
        '脚本家対象',
        '脚本家行動カード',
        '主人公対象',
        '主人公行動カード',
    )) . "\"\n";
    foreach ($aAction as $loop => $aActionInLoop) {
        foreach ($aActionInLoop as $day => $aActionInDay) {
            for ($i = 0 ; $i < 3 ; $i++) {
                $aLine = array($loop, $day);

                $aScriptWriter = $aActionInDay['scriptwriter'][$i];
                $aLine[] = escapeCsv($aScriptWriter['chara_name']);
                $aLine[] = escapeCsv($aScriptWriter['card']);

                $aHero = $aActionInDay['hero'][$i];
                $aLine[] = escapeCsv($aHero['chara_name']);
                $aLine[] = escapeCsv($aHero['card']);
                $sCsv .= '"' . implode('","', $aLine) . "\"\n";
            }
            $aLine = array($loop, $day, escapeCsv($aActionInDay['memo']));
            $sCsv .= '"' . implode('","', $aLine) . "\"\n";
        }
    }

    $sFileName = 'sangeki_record-' . date('Ymd_His') . '.csv';
    header('content-type: text/csv; charset=utf-8');
    header("Content-Disposition: attachment; filename={$sFileName}");
    echo mb_convert_encoding($sCsv, "SJIS", "UTF-8");

}
function escapeCsv($s) {
    return str_replace('"', '""', $s);
}

function outJson($aChara, $aAction) {
    header('content-type: application/json; charset=utf-8');
    echo json_encode(array(
        'loop' => $_POST['loop'],
        'day' => $_POST['day'],
        'chara' => $aChara,
        'action' => $aAction,
    ));
}

function outHtml($aChara, $aAction) {
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
<?php require(SECRET_DIR.'google_analytics.php') ?>
    <link rel="stylesheet" href="screen.css?v=<?= filemtime(dirname(__FILE__) . '/../sangeki/screen.css') ?>">
    <link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon" /> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta name="viewport" content="width=1200">
    <title>惨劇RoopeR 棋譜</title>
</head>
<body class="kifu_output">
<? require(SECRET_DIR.'sangeki_header.php'); ?>
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
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
<?php
}
