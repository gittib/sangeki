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

$aSelectedCharacter = array();
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
                <p><label>
                    <input type="checkbox" name="chara[]" value="<?= $id ?>" <?= isset($aSelectedCharacter[$id]) ? 'checked="checked"' : '' ?>>
                    <?= e($val) ?>
                </label></p>
            <?php endforeach; ?>
        </div>
        <div>
            <input type="submit" value="棋譜テンプレートを生成">
        </div>
    </form>
<?php require('../secret/sangeki_footer.php') ?>
    <script></script>
</body>
</html>
