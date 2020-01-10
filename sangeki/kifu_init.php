<?
require_once('../secret/common.php');
require_once('../secret/kifu_util.php');
require_once('../secret/rule_role_master.php');
require_once('../secret/detail_util.php');

$aCharacter = getCharacterMaster(false);
$aSet = array_keys($aRuleRoleMaster);
$aBoard = getBoardMaster();

$aError = array();
$s = session('kifu_error');
if (!empty($s)) {
    $aError = json_decode($s);
}
session('kifu_error', '');
?>
<html>
<head>
<?php require('../secret/sangeki_head.php') ?>
    <title>惨劇RoopeR 棋譜初期化</title>
</head>
<body class="kifu_init">
    <div class="top_text">
        <h2></h2>
    </div>
    <? if (!empty($aError)) ?>
        <div class="error">
            <span class="summary">棋譜入力画面の生成に失敗しました。</span>
            <ul><? foreach ($aError as $val): ?>
                <li><?= $val ?></li>
            <? endforeach; ?></ul>
        </div>
    <? endif; ?>
    <form action="kifu.php" method="get">
        <div class="period_wrapper">
            <select name="set">
                <option value="">惨劇セット</option>
                <? foreach ($aSet as $val): ?>
                <option value="<?= $val ?>"><?= getTragedySetName($val) ?></option>
                <? endforeach; ?>
            </select>
            <br>
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
            </select>
        </div>
        <div class="available_character_list">
            <? foreach ($aCharacter as $id => $val): ?>
            <label>
                <input type="checkbox" name="ch[]" value="<?= $id ?>">
                <p><?= e($val) ?></p>
            </label>
            <? endforeach; ?>
        </div>
        <div class="submit_wrapper">
            <input type="submit" value="棋譜テンプレートを生成">
        </div>
    </form>
<?php require('../secret/sangeki_footer.php') ?>
</body>
</html>
