<?php
require_once('../secret/common.php');
require(SECRET_DIR.'top_menu.php');
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php'); ?>
<?php require(SECRET_DIR.'sangeki_head.php'); ?>
    <title>惨劇RoopeR アプリ プライバシーポリシー - <?= SITE_NAME ?></title>
</head>
<body class="privacy">
    <h2>『惨劇RoopeRアプリ』のプライバシーポリシー</h2>
    <div>
        このページは、<a href="https://play.google.com/store/apps/details?id=work.boardgame.sangeki_rooper">惨劇RoopeR アプリ</a>についてのプライバシーポリシーです。
    </div>
    <ol>
        <li>惨劇RoopeR アプリ(以下、「本アプリ」)は、BakaFire Party のボードゲーム「惨劇RoopeR」のファンアプリです。</li>
        <li>本アプリでは、利用者の個人情報は特に求められません。</li>
        <li>利用者が入力したテキスト情報をアプリ内に保存する機能はありますが、保存された情報がネットワークにアップロードされることはありません。また、個人情報やそれに類する情報の入力が想定される入力欄は存在しません。</li>
        <li>Push通知や広告なども一切配信されないため、端末を特定する情報も収集、保持することはありません。</li>
        <li>本アプリについて、BakaFire Partyへ問い合わせる事はできません。本アプリについての問い合わせは、開発者である<a href="https://twitter.com/gittib_gittib">ペンスキー</a>までお願いいたします。</li>
    </ol>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
