<?php
define('SECRET_DIR', realpath('../../secret').'/');
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
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <h2>惨劇RoopeR 棋譜 初期化画面</h2>
    <form action="input.php" method="get">
        <div class="period_wrapper">
            <select name="set">
                <option value="">惨劇セット</option>
                <?php foreach ($aSet as $val): ?>
                <option value="<?= $val ?>"><?= getTragedySetName($val) ?></option>
                <?php endforeach; ?>
            </select>
            <br>
            <select name="loop">
                <option value="">ループ数</option>
                <?php for ($i = 1 ; $i <= 8 ; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?>ループ</option>
                <?php endfor; ?>
            </select>
            <select name="day">
                <option value="">日数</option>
                <?php for ($i = 1 ; $i <= 8 ; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?>日</option>
                <?php endfor; ?>
            </select>
            <br>
            <h3>事件リスト</h3>
            <ul class="incident_list">
                <?php for ($i = 1 ; $i <= 8 ; $i++): ?>
                <li data-day="<?= $i ?>" style="display:none">
                    <?= $i ?>日：<select class="incident" name="incident[<?= $i ?>]">
                        <option> </option>
                        <?php foreach ($aIncidentMaster as $rule => $aIncidents): ?>
                            <?php foreach ($aIncidents as $incident): ?>
                                <option style="display:none;" class="<?= $rule ?>"><?= $incident ?></option>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </select>
                </li>
                <?php endfor; ?>
            </ul>
        </div>
        <div class="available_character_list">
            <h3>登場キャラクター</h3>
            <dl>
                <?php foreach ($aCharacterMaster as $area => $aCharacter): ?>
                <dt><?= e(getAreaName($area)) ?></dt>
                <dd>
                    <?php foreach ($aCharacter as $id => $val): ?>
                    <label>
                        <input type="checkbox" name="ch[]" value="<?= $id ?>">
                        <?= e($val) ?>
                    </label>
                    <?php endforeach; ?>
                </dd>
                <?php endforeach; ?>
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
    var $aIncidents = <?= json_encode($aIncidentMaster) ?>;
    $('select[name=set]').on('change', function () {
        var s = $(this).val();
        var $select = $('select.incident');
        $select.empty();
        $select.append('<option> </option>');
        $.each($aIncidents[s], function (k,v) {
            $select.append('<option>'+v+'</option>');
        });
    });
    $('select[name=day]').on('change', function () {
        var day = $(this).val();
        var $incidentPlans = $('.incident_list > li');
        $incidentPlans.hide();
        for (var i = 1 ; i <= day ; i++) {
            $incidentPlans.filter('[data-day='+i+']').show();
        }
    });
});
</script>
</body>
</html>
