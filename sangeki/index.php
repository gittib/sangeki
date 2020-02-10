<?
define('SECRET_DIR', '../secret/');
require_once(SECRET_DIR.'common.php');

$aMenu = array(
    (object)array(
        'href' => 'kyakuhon/',
        'link' => '脚本リスト',
        'img_src' => 'images/kyakuhonka.png',
        'img_alt' => '惨劇 脚本家',
        'text' => "主にペンスキーの考えた自作脚本が転がってます。一部寄稿いただいた脚本もあります。紙の用意がいらないので、ペンスキーの脚本はほぼ全てここに集約されてる模様。",
    ),
    (object)array(
        'href' => 'kifu/',
        'link' => '棋譜記録機能',
        'img_src' => 'images/heros.png',
        'img_alt' => '主人公たち',
        'text' => "各ループ各ターン、脚本家がどこにどのカードを置いたかは、時に推理を進めるための重要な情報となります。\n紙とペンがあるならそっちの方が良いとは思いますが、お気に召したら嬉しい限りです。",
    ),
    (object)array(
        'href' => 'column/',
        'link' => '脚本アイディア',
        'img_src' => 'images/uzai.png',
        'img_alt' => '脚本を彩る名優たち',
        'text' => "ペンスキー流の脚本の書き方とか、関連アイディアの投棄場。脚本リストに挙がっているものの一部で実際に使われているアイディアもあります。\n惨劇RoopeRの脚本書くの楽しいよ！",
    ),
)
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
        <? foreach ($aMenu as $val): ?>
        <dt><a href="<?= e($val->href) ?>">
            <?= e($val->link) ?>
            <div>
                <img src="<?= TOP_PATH . e($val->img_src) ?>" alt="<?= e($val->img_alt) ?>">
            </div>
        </a></dt>
        <dd><?= nl2br(e($val->text)) ?></dd>
        <? endforeach; ?>
    </dl>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
</body>
</html>
