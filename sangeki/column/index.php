<?
define('SECRET_DIR', '../../secret/');
require_once(SECRET_DIR.'common.php');

?>
<html>
<head>
<? require(SECRET_DIR.'google_analytics.php'); ?>
<? require(SECRET_DIR.'sangeki_head.php'); ?>
    <title>脚本アイディア - <?= SITE_NAME ?></title>
</head>
<body class="column">
<? require(SECRET_DIR.'sangeki_header.php'); ?>
    <h2><span>ペンスキーの</span><span>惨劇RoopeR脚本の</span><span>組み方</span></h2>
    <div>
        ここでは、ペンスキー(<a href="https://twitter.com/gittib_gittib">@gittib_gittib</a>)がよく使う脚本作成のテクニックとかそんなのを紹介します。<br>
        ちなみに、wikiにある「<a href="https://w.atwiki.jp/rooper/sp/pages/27.html">脚本作成のアドバイス</a>」はマジでためになるのでオススメです。私も初めて脚本を書いたときは、大いに参考にしました。<br>
        それを踏まえて、私がよく書く脚本の書き方は「<strong>ギミックベースの脚本</strong>」です。他の書き方は滅多にしません。<br>
        ただこの書き方は、BTXやMZといった惨劇セットへの深い理解が必要です。<br>
        <br>
        そんな中で、私の場合は惨劇セットによらず普遍的に活用を試みるギミックがあります。<br>
        その中のいくつかを紹介したいと思います。
    </div>
    <dl class="tips">
        <dt>暗躍同時置き</dt>
        <dd>
            ほとんどの惨劇セットにおいて、１箇所に暗躍カウンターが２つ以上溜まると主人公は敗北確定するか、そのための準備が整ってしまいます。
            そして脚本家は暗躍+1と+2、２枚のカードで暗躍カウンターを積むことができるのに対して、主人公は1日に1枚しか暗躍禁止を張ることができません。
            よって暗躍カードを2枚同時に使えば、そのうち片方は確実に通ります。<br>
            これをうまく利用すると、序盤でループ抜けされることのない、安定した脚本を作るのに役立ちます。<br>
            <br>
            例えば、ルールYに「封印されしもの」を採用し、最終日に病院の事件が起こる脚本を考えます。<br>
            こうなると神社と病院、暗躍を置いてはならない場所が２箇所になります。<br>
            ここに黒猫や不穏な噂を採用する、入院患者をフレンドにするなどすれば、病院の事件を止められない限りは主人公がどう動こうともループ抜けされることは無くなります。これで変に途中抜けされる事もなく、最後の戦い志向の安定した脚本が書けます。
        </dd>
    </dl>
</body>
</html>
