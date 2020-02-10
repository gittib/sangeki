<?
define('SECRET_DIR', '../secret/');
require_once(SECRET_DIR.'common.php');

?>
<html>
<head>
<? require(SECRET_DIR.'google_analytics.php'); ?>
<? require(SECRET_DIR.'sangeki_head.php'); ?>
    <title><?= SITE_NAME ?></title>
</head>
<body class="top">
<? require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="top_text">
        <h2><span>ペンスキーの</span><span>脚本置き場へ</span><span>ようこそ。</span></h2>
        ここにはペンスキーの考えた惨劇RoopeRオリジナル脚本や、惨劇RoopeRに関する駄文やら何やらが置いてあります。<br>
        惨劇RoopeRへの興味を深めてもらえれば嬉しい限りです。
        <a href="http://bakafire.main.jp/rooper/sr_top.htm">惨劇RoopeRってなんぞ？という方は公式サイトをどうぞ</a>
    </div>
    <dl>
        <dt><a href="kyakuhon/">
            脚本リスト
            <img src="<?= TOP_PATH ?>images/kyakuhonka.png" alt="惨劇 脚本家">
        </a></dt>
        <dd>主にペンスキーの考えた自作脚本が転がってます。一部寄稿いただいた脚本もあります。紙の用意がいらないので、ペンスキーの脚本はほぼ全てここに集約されてる模様。</dd>
        <dt><a href="kifu/">
            棋譜記録機能
            <img src="<?= TOP_PATH ?>images/heros.png" alt="主人公たち">
        </a></dt>
        <dd>各ループ各ターン、脚本家がどこにどのカードを置いたかは、時に推理を進めるための重要な情報となります。<br>紙とペンがあるならそっちの方が良いとは思いますが、お気に召したら嬉しい限りです。</dd>
        <dt><a href="column/">
            駄文
            <img src="<?= TOP_PATH ?>images/uzai.png" alt="脚本を彩る名優たち">
        </a></dt>
        <dd>ペンスキー流の脚本の書き方とか、関連アイディアの投棄場。脚本リストに挙がっているものの一部で実際に使われているアイディアもあります。<br>惨劇RoopeRの脚本書くの楽しいよ！</dd>
    </dl>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
