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
        <ul id="kyakuhon_list">
        </ul>
        <div class="console">
            <button class="create_new">新しい脚本を作る</button>
        </div>
        <p class="notice">脚本データの管理には、localStorageという技術を利用しています。脚本データは端末に保存されますので、異なる端末・ブラウザからアクセスすると、データが引き継がれません。</p>
    </div>

    <div id="clone_parts_wrapper" style="display:none;">
        <ul>
            <li id="clone_base-kyakuhon_column">
                <span class="rule_prefix">BTX</span>
                <a class="link" href="./detail.php?id=0">
                    <span class="title">あなたのオリジナル脚本</span>
                </a>
                <p>
                    <span class="loop"><strong>4</strong>ループ</span>
                    <span class="day"><strong>5</strong>日間</span>
                </p>
                <p class="difficulty">
                    難易度<span class="star">★★★★☆☆☆☆</span>
                    <span class="tag">普通</span>
                </p>
            </li>
        </ul>
    </div>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
<script src="<?= TOP_PATH ?>yours.js?v=<?= filemtime(PUBLIC_DIR.'yours.js') ?>"></script>
</body>
</html>
