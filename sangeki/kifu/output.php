<?
define('SECRET_DIR', '../../secret/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'kifu_util.php');
require_once(SECRET_DIR.'detail_util.php');

$outType = $_POST['outtype'];
$aChara = $_POST['chara_info'];
$aInsidents = $_POST['insident'];
$aAction = $_POST['action_info'];

$aRule = array(
    'ruleY' => implode('or', $_POST['ruleY']),
    'ruleX1' => implode('or', $_POST['ruleX1']),
    'ruleX2' => implode('or', $_POST['ruleX2'] ?? []),
);

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

foreach ($aInsidents as $day => $val) {
    $aInsidents[$day]['criminal'] = getKifuCharaName($val['criminal'], true);
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
    outCsv($aRule, $aChara, $aInsidents, $aAction);
    break;
case 'json':
    outJson($aRule, $aChara, $aInsidents, $aAction);
    break;
case 'html':
    outHtml($aRule, $aChara, $aInsidents, $aAction, $aTopMenu);
    break;
}

function outCsv($aRule, $aChara, $aInsidents, $aAction) {
    $sCsv = '';
    $sSetName = getTragedySetName($_POST['set']);
    $sCsv .= "惨劇セット：{$sSetName}\n\n";
    $sCsv .= "ルール\n";
    $sCsv .= "ルールY：{$aRule['ruleY']}\n";
    $sCsv .= "ルールX1：{$aRule['ruleX1']}\n";
    if ($_POST['set'] != 'FS') {
        $sCsv .= "ルールX2：{$aRule['ruleX2']}\n";
    }

    $sCsv .= "\n登場人物\n";
    $sCsv .= "キャラ,役職,メモ\n";
    foreach ($aChara as $chara) {
        $sCsv .= '"' . implode('","', array(
            escapeCsv($chara['name']),
            escapeCsv($chara['role']),
            escapeCsv($chara['memo']),
        )) . "\"\n";
    }

    $sCsv .= "\n事件\n";
    $sCsv .= "日数,事件,犯人\n";
    foreach ($aInsidents as $day => $insident) {
        $sCsv .= '"' . implode('","', array(
            escapeCsv($day),
            escapeCsv($insident['name']),
            escapeCsv($insident['criminal']),
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
            $aLine = array($loop, $day, "メモ： " . escapeCsv($aActionInDay['memo']));
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

function outJson($aRule, $aChara, $aInsidents, $aAction) {
    if (empty($aRule['ruleX2'])) {
        $aRule['ruleX2'] = null;
    }
    foreach ($aChara as $charaId => $val) {
        if (empty($val['memo'])) {
            $aChara[$charaId]['memo'] = null;
        }
        $aChara[$charaId] = [
            'name' => $val['name'],
            'role' => $val['role'],
            'memo' => $val['memo'],
        ];
    }
    foreach ($aAction as $loop => $aTmp) {
        foreach ($aTmp as $day => $val) {
            if (empty($val['memo'])) {
                $aAction[$loop][$day]['memo'] = null;
            }
        }
    }

    $sFileName = 'sangeki_record-' . date('Ymd_His') . '.json';
    header('content-type: application/json; charset=utf-8');
    header("Content-Disposition: attachment; filename={$sFileName}");
    echo json_encode(array(
        'set' => $_POST['set'],
        'set_name' => getTragedySetName($_POST['set']),
        'loop' => $_POST['loop'],
        'day' => $_POST['day'],
        'rule' => $aRule,
        'chara' => array_values($aChara),
        'insidents' => $aInsidents,
        'action' => $aAction,
    ), JSON_UNESCAPED_UNICODE);
}

function outHtml($aRule, $aChara, $aInsidents, $aAction, $aTopMenu) {
?>
<html>
<head>
<? require(SECRET_DIR.'google_analytics.php') ?>
<? require(SECRET_DIR.'sangeki_head.php'); ?>
    <title>惨劇RoopeR 棋譜 - <?= SITE_NAME ?></title>
</head>
<body class="kifu_output">
<? require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="rule_wrapper">
        <table>
            <tr><th class="table_title" colspan="2"><p>ルール</p></th></tr>
            <tr>
                <th>ルールY</th>
                <td><?= $aRule['ruleY'] ?></td>
            </tr>
            <tr>
                <th>ルールX1</th>
                <td><?= $aRule['ruleX1'] ?></td>
            </tr>
            <?php if ($_POST['set'] != 'FS'): ?>
            <tr>
                <th>ルールX2</th>
                <td><?= $aRule['ruleX2'] ?></td>
            </tr>
            <?php endif; ?>
        </table>
    </div>
    <div class="insident_wrapper">
        <table>
            <tr><th class="table_title" colspan="3"><p>事件</p></th></tr>
            <tr>
                <th>日数</th>
                <th>事件</th>
                <th>犯人</th>
            </tr>
            <?php foreach($aInsidents as $day => $val): ?>
            <tr>
                <th><?= $day ?></th>
                <td><?= $val['name'] ?></td>
                <td><?= $val['criminal'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="character_role_wrapper">
        <h3>役職の内訳</h3>
        <table>
            <tr>
                <th>人物</th>
                <th>役職</th>
            </tr>
            <? foreach($aChara as $chara): ?>
            <tr>
                <td><?= $chara['name'] ?></td>
                <td><?= $chara['role'] ?></td>
            </tr>
            <? endforeach; ?>
        </table>
    </div>
    <div class="kifu_out_wrapper">
        <h3>行動カード、その他ログ</h3>
        <?php foreach($aAction as $loop => $aActionInLoop): ?>
            <div>
                <table>
                    <tr><th class="table_title" colspan="3"><p><?= $loop ?>ループ目</p></th></tr>
                    <tr>
                        <th>日数</th>
                        <th>脚本家</th>
                        <th>主人公</th>
                    </tr>
                    <? foreach($aActionInLoop as $day => $aAction): ?>
                    <? for ($i = 0 ; $i < 3 ; $i++): ?>
                    <tr>
                        <? if ($i == 0): ?>
                            <th rowspan=4><?= $day ?></th>
                        <? endif; ?>
                        <td>
                            <? if (!empty($aAction['scriptwriter'][$i]['chara_name']) && !empty($aAction['scriptwriter'][$i]['card'])): ?>
                                <?= $aAction['scriptwriter'][$i]['chara_name'] ?> に
                                <?= $aAction['scriptwriter'][$i]['card'] ?>
                            <? endif; ?>
                        </td>
                        <td>
                            <? if (!empty($aAction['hero'][$i]['chara_name']) && !empty($aAction['hero'][$i]['card'])): ?>
                                <?= $aAction['hero'][$i]['chara_name'] ?> に
                                <?= $aAction['hero'][$i]['card'] ?>
                            <? endif; ?>
                        </td>
                    </tr>
                    <? endfor; ?>
                    <tr>
                        <td colspan="2"><?= nl2br(e($aAction['memo'])) ?></td>
                    </tr>
                    <? endforeach; ?>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
<?php
}
