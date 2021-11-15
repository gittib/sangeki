<?php
require_once(SECRET_DIR.'common.php');
$url = schema() . '://' . $_SERVER["HTTP_HOST"] . '/zakkan';
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php'); ?>
<?php require(SECRET_DIR.'sangeki_head.php'); ?>
    <title>雑記帳 - <?= SITE_NAME ?></title>
    <link rel="canonical" href="<?= $url ?>">
</head>
<body class="column">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <h2>雑記帳</h2>
    <div>惨劇RoopeRについて、ツイートするには長い話をつらつらするところ。</div>
    <ul>
        <li><a href="<?= $url ?>/20211116">れうさんの惨劇セット雑感</a></li>
    </ul>
</body>
</html>
