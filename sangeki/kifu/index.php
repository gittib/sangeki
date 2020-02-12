<?
define('SECRET_DIR', '../../secret/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'kifu_util.php');
require_once(SECRET_DIR.'rule_role_master.php');
require_once(SECRET_DIR.'detail_util.php');

$aCharacterMaster = getCharacterMaster();
$aSet = array_keys($aRuleRoleMaster);
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title>惨劇RoopeR 棋譜初期化 - <?= SITE_NAME ?></title>
</head>
<body class="kifu_init">
<? require(SECRET_DIR.'sangeki_header.php'); ?>
    <h2>惨劇RoopeR 棋譜 初期化画面</h2>
    <form action="input.php" method="get">
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
            <h3>事件リスト</h3>
            <ul class="insident_list">
                <? for ($i = 1 ; $i <= 8 ; $i++): ?>
                <li data-day="<?= $i ?>" style="display:none">
                    <?= $i ?>日：<select class="insident" name="insident[<?= $i ?>]">
                        <option> </option>
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
            <h3>登場キャラクター</h3>
            <dl>
                <? foreach ($aCharacterMaster as $area => $aCharacter): ?>
                <dt><?= e(getAreaName($area)) ?></dt>
                <dd>
                    <? foreach ($aCharacter as $id => $val): ?>
                    <label>
                        <input type="checkbox" name="ch[]" value="<?= $id ?>">
                        <?= e($val) ?>
                    </label>
                    <? endforeach; ?>
                </dd>
                <? endforeach; ?>
            </dl>
        </div>
        <div class="submit_wrapper">
            <input type="submit" value="棋譜テンプレートを生成">
        </div>
        <input type="hidden" name="from" value="kifu_init">
    </form>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
<script>
$(function() {
    var $aInsidents = <?= json_encode($aInsidentMaster) ?>;
    $('select[name=set]').on('change', function () {
        var s = $(this).val();
        var $select = $('select.insident');
        $select.empty();
        $select.append('<option> </option>');
        $.each($aInsidents[s], function (k,v) {
            $select.append('<option>'+v+'</option>');
        });
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
