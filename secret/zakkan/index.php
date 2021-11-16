<?php
$canonicalUrl = schema().'://'.SITE_DOMAIN.TOP_PATH.'zakkan';
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php'); ?>
<?php require(SECRET_DIR.'sangeki_head.php'); ?>
    <title>雑記帳 - <?= SITE_NAME ?></title>
    <link rel="canonical" href="<?= $canonicalUrl ?>">
</head>
<body class="zakkan">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <h2>雑記帳</h2>
    <div>惨劇RoopeRについて、ツイートするには長い話をつらつら書くところ。</div>
    <ul>
        <li><a href="<?= $url ?>/1">れうさんの惨劇セット雑感</a></li>
    </ul>
</body>
</html>
