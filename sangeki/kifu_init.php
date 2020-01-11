<?
require_once('../secret/common.php');
require_once('../secret/kifu_util.php');
require_once('../secret/rule_role_master.php');
require_once('../secret/detail_util.php');

$aCharacter = getCharacterMaster(false);
$aSet = array_keys($aRuleRoleMaster);
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
            <br>
            <span>事件リスト</span>
            <ul class="insident_list">
                <? for ($i = 1 ; $i <= 8 ; $i++): ?>
                <li data-day="<?= $i ?>" style="display:none">
                    <?= $i ?>日：<select class="insident" name="insident[<?= $i ?>]">
                        <option class="no_insident"> </option>
                        <? foreach ($aInsidentMaster as $rule => $aInsidents): ?>
                            <? foreach ($aInsidents as $insident): ?>
                                <option style="display:none;" class="<?= $rule ?>"><?= $insident ?></option>
                            <? endforeach; ?>
                        <? endforeach; ?>
                    </select>
                </li>
                <? endfor; ?>
            </ul>
        </div>
        <div class="available_character_list">
            <span>登場キャラクター</span>
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
        <input type="hidden" name="from" value="kifu_init">
    </form>
<?php require('../secret/sangeki_footer.php') ?>
<script>
$(function() {
    $('select[name=set]').on('change', function () {
        var s = $(this).val();
        $('select.insident > option').hide();
        $('select.insident > option.'+s).show();
        $('.no_insident').show();
        $('select.insident').val(' ');
    });
    $('select[name=day]').on('change', function () {
        var day = $(this).val();
        var $insidentPlans = $('.insident_list > li');
        $insidentPlans.hide();
        for (var i = 1 ; i <= day ; i++) {
            $insidentPlans.filter('[data-day='+i+']').show();
        }
    });
});
</script>
</body>
</html>
