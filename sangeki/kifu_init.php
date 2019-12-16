<?
require_once('../secret/common.php');
require_once('../secret/kifu_util.php');

$aCharacter = getCharacterMaster(false);

$aBoard = getBoardMaster();
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
    <form action="kifu.php" method="get">
        <div class="period_wrapper">
            <select name="loop">
                <option value="">ループ数</option>
            <? for ($i = 1 ; $i <= 8 ; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?>ループ</option>
            <? endfor; ?>
            </select>
            <select name="day">
                <option value="">日数</option>
            <? for ($i = 1 ; $i <= 8 ; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?>日</option>
            <? endfor; ?>
            </select>日
        </div>
        <div class="available_character_list">
            <? foreach ($aCharacter as $id => $val): ?>
            <label><p>
                <input type="checkbox" name="ch[]" value="<?= $id ?>">
                <?= e($val) ?>
            </p></label>
            <? endforeach; ?>
        </div>
        <div class="submit_wrapper">
            <input type="submit" value="棋譜テンプレートを生成">
        </div>
    </form>
<?php require('../secret/sangeki_footer.php') ?>
</body>
</html>
