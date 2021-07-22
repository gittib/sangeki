<?php
require_once('../secret/common.php');
require(SECRET_DIR.'top_menu.php');

$topPageUrl = schema() . '://' . $_SERVER["HTTP_HOST"] . TOP_PATH;

?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php'); ?>
<?php require(SECRET_DIR.'sangeki_head.php'); ?>
    <title><?= SITE_NAME ?></title>
    <link rel="canonical" href="<?= $topPageUrl ?>">
</head>
<body class="top">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="top_text">
        <h2><span>ペンスキーの</span><span>脚本置き場へ</span><span>ようこそ。</span></h2>
        ここにはペンスキーの考えた惨劇RoopeRオリジナル脚本や、惨劇RoopeRに関する駄文やら何やらが置いてあります。<br>
        惨劇RoopeRへの興味を深めてもらえれば嬉しい限りです。
        <a href="http://bakafire.main.jp/rooper/sr_top.htm" target="_blank">惨劇RoopeRってなんぞ？という方は公式サイトをどうぞ</a>
    </div>
    <dl>
        <?php foreach ($aTopMenu as $val): ?>
        <dt><a href="<?= e($val->href) ?>">
            <?= e($val->link) ?>
            <?php if (isset($val->img_src)): ?>
            <div>
                <img src="<?= TOP_PATH . e($val->img_src) ?>" alt="<?= isset($val->img_alt) ? e($val->img_alt) : '' ?>">
            </div>
            <?php endif; ?>
        </a></dt>
        <dd><?= nl2br(e($val->text)) ?></dd>
        <?php endforeach; ?>
    </dl>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
