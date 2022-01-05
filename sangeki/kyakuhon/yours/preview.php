<?php
require_once(__DIR__.'/../../../secret/common.php');
require_once(SECRET_DIR.'detail_util.php');
$setName = getTragedySetName($_GET['set']);
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <meta name="robots" content="noindex">
    <title><?= e($setName) ?> 脚本 - <?= SITE_NAME ?></title>
</head>
<body class="detail sangeki-kyakuhon-yours-preview">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="pankuzu_wrapper">
        <a href=".">一覧へ</a>
    </div>
    <div class="public">
        <h2>公開シート</h2>
        <table class="summary">
            <tr>
                <th>惨劇セット</th>
                <td class="tragedy_set"><?= e($setName) ?></td>
            </tr>
            <tr>
                <th>ループ回数</th>
                <td class="loop"></td>
            </tr>
            <tr>
                <th>1ループ日数</th>
                <td class="day"></td>
            </tr>
        </table>
        <h3>特殊ルール</h3>
        <div class="special_rule"></div>

        <h3>事件予定</h3>
        <table id="incident_open_list" class="incident">
            <thead>
                <tr>
                    <th>日付</th>
                    <td>事件予定</td>
                </tr>
            </thead>
            <tbody>
                <tr id="clone_base-incident_open" style="display:none;">
                    <th class="incident_day"></th>
                    <td class="incident_name"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <button class="toggle_private">非公開シート、脚本家の指針を表示</button>
    <div class="private_sheet_wrapper">
        <div class="private">
            <h2 class="private_sheet">非公開シート</h2>
            <h3 class="title"></h3>
            <div class="difficulity">
                難易度：
                <span class="difficulity_name"></span>
                <span class="difficulty_star"></span>
            </div>
            <table class="summary rule">
                <tr>
                    <th>ルールY</th>
                    <td class="ruleY"></td>
                </tr>
                <tr>
                    <th>ルールX1</th>
                    <td class="ruleX1"></td>
                </tr>
                <?php if (($_GET['set'] ?? '') != 'FS'): ?>
                <tr>
                    <th>ルールX2</th>
                    <td class="ruleX2"></td>
                </tr>
                <?php endif; ?>
            </table>

            <h3 class="people_title">キャラクター一覧</h3>
            <span class="people_count"></span>
            <table id="character_list" class="character">
                <thead>
                    <tr>
                        <th>人物</th>
                        <td>役職</td>
                        <td>特記</td>
                    </tr>
                </thead>
                <tbody>
                    <tr id="clone_base-character" style="display:none;">
                        <td class="chara_name"></td>
                        <td class="chara_role ">
                            <span class="zettai"></span>
                            <span class="yuukoumushi"></span>
                            <span class="fushi"></span>
                            　<span class="role_name"></span>
                        </td>
                        <td class="chara_note"></td>
                    </tr>
                </tbody>
            </table>

<?php /*
            <h4>キャラクター初期配置</h4>
            <table class="init_place">
                <tbody>
                    <tr>
                        <td>
                        <strong class="place_name">病院</strong><?= $sOmonoTerritory == 'hospital' ? '<span class="territory">大</span>' : '' ?><br>
                            <?php foreach ($aInitPlace['hospital'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                        <td>
                            <strong class="place_name">神社</strong><?= $sOmonoTerritory == 'shrine' ? '<span class="territory">大</span>' : '' ?><br>
                            <?php foreach ($aInitPlace['shrine'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong class="place_name">都市</strong><?= $sOmonoTerritory == 'city' ? '<span class="territory">大</span>' : '' ?><br>
                            <?php foreach ($aInitPlace['city'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                        <td>
                            <strong class="place_name">学校</strong><?= $sOmonoTerritory == 'school' ? '<span class="territory">大</span>' : '' ?><br>
                            <?php foreach ($aInitPlace['school'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <?php if (!empty($aInitPlace['other'])): ?>
                    <tr>
                        <td colspan="2" class="special_place">
                            <strong class="place_name">特殊</strong>:
                            <?php foreach ($aInitPlace['other'] as $val) {
                                echo '<span class="chara">' . e($val) . '</span>';
                            } ?>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
*/?>

            <h3 class="incident">事件リスト</h3>
            <table id="incident_hidden_list" class="incident">
                <thead>
                    <tr>
                        <th>日付</th>
                        <td>事件</td>
                        <td>犯人</td>
                    </tr>
                </thead>
                <tbody>
                    <tr id="clone_base-incident_hidden" style="display:none;">
                        <th class="incident_day"></th>
                        <td>
                            <div class="incident_name"></div>
                            <div class="incident_note" style="display:none;"></div>
                        </td>
                        <td class="incident_criminal"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="private advice">
        <h3>シナリオの特徴</h3>
        <div class="scenario_note"></div>
        <h3>脚本家への指針</h3>
        <div class="scenario_advice"></div>
    </div>
    <script> const scenarioId = <?= $_GET['id'] ?>; </script>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
