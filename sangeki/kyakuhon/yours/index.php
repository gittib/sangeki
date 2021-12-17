<?php
require_once(__DIR__.'/../../../secret/common.php');
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title>あなたの脚本リスト - <?= SITE_NAME ?></title>
</head>
<body class="your_kyakuhon_list">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="top_text">
        <h2>あなたの脚本リスト</h2>
        あなたの考えた脚本を、このサイトで作成・編集・管理できます。
    </div>
    <div class="kyakuhon_list">
        <ul id="kyakuhon_list"></ul>
        <div class="console">
            <div>新しい脚本を作る</div>
            <select name="set">
                <option value="">脚本を作る惨劇セットを選択</option>
                <option value="FS">First Steps</option>
                <option value="BTX">Basic Tragedy Χ</option>
                <option value="MZ">Midnight Zone</option>
                <option value="MCX">Mistery Circle Χ</option>
                <option value="HSA">Hounted State Again</option>
                <option value="WM">Weird Mythology</option>
                <option value="AHR">Another Horizon Revised</option>
                <option value="LL">Last Liar</option>
                <option value="UM">Unvoiced Malice</option>
            </select>
            <button class="create_new">作成開始</button>
            <button class="save_as">脚本データをファイル保存</div>
            <input type="file" class="add_scenario_from_file">
        </div>
        <div class="notice">脚本データの管理には、localStorageという技術を利用しています。脚本データは端末に保存されますので、異なる端末・ブラウザからアクセスすると、データが引き継がれません。</div>
    </div>

    <div id="clone_parts_wrapper" style="display:none;">
        <ul>
            <li id="clone_base-kyakuhon_column">
                <div>
                    <span class="rule_prefix">BTX</span>
                    <span class="loop"><strong>4</strong>ループ</span>
                    <span class="day"><strong>5</strong>日間</span>
                </div>
                <a class="view" href="./preview.php?id=0">
                    <span class="title">あなたのオリジナル脚本</span>
                </a>
                <div class="difficulty">
                    難易度<span class="star">★★★★☆☆☆☆</span>
                    <span class="tag">普通</span>
                </div>
                <div class="button_wrapper">
                    <a class="edit" href="./edit.php?id=0">脚本を編集</a>
                    <button class="delete"><i class="fas fa-trash-alt"></i></button>
                </div>
            </li>
        </ul>
    </div>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
<script src="<?= TOP_PATH ?>yours.js?v=<?= filemtime(PUBLIC_DIR.'yours.js') ?>"></script>
</body>
</html>
