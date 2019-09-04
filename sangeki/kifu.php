<?
require_once('../secret/common.php');

if (isset($_POST['chara']) && is_array($_POST['chara'])) {
    $aData = array(
        'charas' => $_POST['chara'],
        'loop' => $_POST['loop'],
        'day' => $_POST['day'],
        'incidents' => array(),
    );
    $_SESSION['sangeki_kifu'] = json_encode($aData);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

$aCharacter = array(
    '神格',
    '転校生',
    '巫女',
    '異世界人',
    '黒猫',
    '幻想',
    '医者',
    'ナース',
    '軍人',
    '入院患者',
    '学者',
    'サラリーマン',
    '情報屋',
    '刑事',
    'アイドル',
    '大物',
    'マスコミ',
    '鑑識官',
    'A.I.',
    '男子学生',
    '女子学生',
    'お嬢様',
    '委員長',
    '教師',
    'イレギュラー',
    '女の子',
    '手先',
);

$oKifu = json_decode(session('sangeki_kifu', '{"charas":[],"loop":0,"day":0,"incidents":[]}'));

$aSelectedCharacter = array(
    '1001' => '神社',
    '1002' => '病院',
    '1003' => '都市',
    '1004' => '学校',
);
if (!empty($oKifu->charas)) {
    foreach ($oKifu->charas as $id) {
        $aSelectedCharacter[$id] = $aCharacter[$id];
    }
}
?>
<html>
<head>
<?php require('../secret/sangeki_head.php') ?>
    <title>惨劇RoopeR 棋譜記録用</title>
</head>
<body class="kifu_input">
    <div class="top_text">
        <h2></h2>
    </div>
    <form method="post">
        <input type="number" name="loop" value="<?= $oKifu->loop ?>">ループ
        <input type="number" name="day" value="<?= $oKifu->day ?>">日
        <div class="available_character_list">
            <?php foreach ($aCharacter as $id => $val): ?>
            <label><p>
                <input type="checkbox" name="chara[]" value="<?= $id ?>" <?= isset($aSelectedCharacter[$id]) ? 'checked="checked"' : '' ?>>
                <?= e($val) ?>
            </p></label>
            <?php endforeach; ?>
        </div>
        <div>
            <input type="submit" value="棋譜テンプレートを生成">
        </div>
        <? if ($oKifu->loop > 0 && $oKifu->day > 0): ?>
            <div class="kifu_wrapper">
                <dl>
                <? for ($l = 1 ; $l <= $oKifu->loop ; $l++): ?>
                    <dt><?= $l ?>ループ目</dt>
                    <dd><table>
                        <thead>
                            <tr>
                                <th rowspan=2>日数</th>
                                <? foreach ($aSelectedCharacter as $ch): ?>
                                <th colspan=2 style="min-width:80px; word-break: keep-all;"><?= $ch ?></th>
                                <? endforeach; ?>
                                <th rowspan=2>メモ欄</th>
                            </tr>
                            <tr>
                                <? for ($i = 0 ; $i < count($aSelectedCharacter) ; $i++): ?>
                                <th>脚</th>
                                <th>主</th>
                                <? endfor; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <? for ($d = 1 ; $d <= $oKifu->day ; $d++): ?>
                            <tr>
                                <td><?= $d ?></td>
                                <? foreach ($aSelectedCharacter as $ch): ?>
                                <td> </td>
                                <td> </td>
                                <? endforeach; ?>
                                <td><input name="memo[<?= $l ?>][<?= $d ?>]"></td>
                            </tr>
                            <? endfor; ?>
                        </tbody>
                    </table></dd>
                <? endfor; ?>
                </dl>
            </div>
        <? endif; ?>
    </form>
<?php require('../secret/sangeki_footer.php') ?>
    <script></script>
</body>
</html>
