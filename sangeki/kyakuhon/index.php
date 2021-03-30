<?
define('SECRET_DIR', realpath('../../secret').'/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'sangeki_check.php');
require_once(SECRET_DIR.'class/ScenarioIndex.php');

$aList = ScenarioIndex::getScenarioList();
$bDisplaySecret = (!isProd() && isset($_GET['s']));
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title>脚本リスト - <?= SITE_NAME ?></title>
</head>
<body class="kyakuhon_list">
<? require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="top_text">
        <h2><span>ペンスキーの</span><span>脚本置き場へ</span><span>ようこそ。</span></h2>
        ここにはペンスキーの考えた、惨劇RoopeRオリジナル脚本が置かれてあります。(一部寄稿いただいたものもあります)<br>
        <span class="important_s">なお、惨劇RoopeRの脚本を見てしまうと、主人公としてゲームに参加できなくなる場合があります。</span>
        もちろん、脚本家としては遊べます。公開シート・非公開シート・解説に分けて記載していますので、そのまま利用して遊べるようになっています。
    </div>
    <h2>惨劇脚本リスト</h2>
    <div class="title_is_hidden">ネタバレ防止のためにタイトルを伏せてありますので、必要に応じて下のボタンで表示させて下さい。</div>
    <button class="show_title">脚本タイトルを表示</button>
    <div class="kyakuhon_list">
        <dl class="kyakuhon_list">
        <? foreach ($aList as $id => $oSangeki): ?>
        <? if ($bDisplaySecret || empty($oSangeki->secret)): ?>
            <dt class="<? if(!empty($oSangeki->secret)) echo 'secret' ?>">
                <span class="rule_prefix <?= $oSangeki->set ?>"><?= $oSangeki->set ?></span>
                <a href="./detail.php?id=<?= $id ?>">
                    <span class="real_title"><?= e($oSangeki->title) ?></span>
                    <span class="hide_title">脚本[<?= $id ?>]</span>
                </a>
                <span class="writer">作者: <?= e($oSangeki->writer) ?></span>
                <? if (!empty($oSangeki->recommended)): ?>
                <span class="recommended">オススメ！</span>
                <? endif; ?>
            </dt>
            <dd class="<? if(!empty($oSangeki->secret)) echo 'secret' ?>">
                <span class="loop"><strong><?= $oSangeki->loop ?></strong>ループ</span>
                <span class="day"><strong><?= $oSangeki->day ?></strong>日間</span>
                <span class="difficulity">
                    難易度<span><? for ($i = 1 ; $i <= 8 ; $i++) {
                        if ($i <= $oSangeki->difficulity) {
                            echo '★';
                        } else {
                            echo '☆';
                        }
                    } ?></span>
                    <span class="tag"><?= difficulityName($oSangeki->difficulity) ?></span>
                </span>
            </dd>
        <? endif; ?>
        <? endforeach; ?>
        </dl>
    </div>
    <button class="show_title">脚本タイトルを表示</button>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
    <script>
    $('.show_title').on('click', function() {
        if ($('.hide_title').is(':visible')) {
            if (confirm('脚本タイトルを表示するとネタバレになる可能性があります。\nよろしいですか？')) {
                $('.real_title').show();
                $('.hide_title').hide();
                $('.show_title').text('脚本タイトルを隠す');
            }
        } else {
            $('.real_title').hide();
            $('.hide_title').show();
            $('.show_title').text('脚本タイトルを表示');
        }
    });
    </script>
</body>
</html>
