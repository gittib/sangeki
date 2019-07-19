<?
require_once('./secret/sangeki_check.php');
exec('ls ./secret/kyakuhon_list/', $files);

function df ($difficulity) {
    if (empty($difficulity)) {
        return '';
    }
    switch ($difficulity) {
        case 1:
            return '練習用';
        case 2:
            return '簡単';
        case 3:
            return '易しい';
        case 4:
            return '普通';
        case 5:
            return '難しい';
        case 6:
            return '困難';
        case 7:
            return '惨劇';
        case 8:
            return '悪夢';
    }
}
?>
<html>
<head>
<?php require('./secret/sangeki_head.php') ?>
    <title>脚本リスト</title>
</head>
<body class="kyakuhon_list">
    <div style="margin-bottom: 32px;">
        <h2><span>ペンスキーの</span><span>脚本置き場へ</span><span>ようこそ。</span></h2>
        ここにはペンスキーの考えた、惨劇RoopeRオリジナル脚本が置かれてあります。<br>
        <span style="color:red">なお、惨劇RoopeRの脚本を見てしまうと、主人公としてゲームに参加できなくなる場合があります。</span>
        もちろん、脚本家としては遊べます。公開シート・非公開シート・解説に分けて記載していますので、そのまま利用して遊べるようになっています。
    </div>
    <h2>惨劇脚本リスト</h2>
    <div style="margin: 8px;">ネタバレ防止のためにタイトルを伏せてありますので、必要に応じて下のボタンで表示させて下さい。</div>
    <button class="show_title">脚本タイトルを表示</button>
    <div class="kyakuhon_list">
        <dl class="kyakuhon_list">
        <? foreach ($files as $val):
            $id = str_replace('.php', '', $val);
            if (strpos($id, '0') === 0) {
                continue;
            }
            require('./secret/kyakuhon_list/' . $val);
            if (empty($oSangeki) || empty($oSangeki->title) || !empty($oSangeki->secret)) {
                continue;
            }
        ?>
            <dt>
                <span class="rule_prefix <?= $oSangeki->set ?>"><?= $oSangeki->set ?></span>
                <a href="./detail.php?id=<?= $id ?>">
                    <span class="real_title"><?= e($oSangeki->title) ?></span>
                    <span class="hide_title">****タイトル****</span>
                </a>
                <span class="writer">作者: <?= e($oSangeki->writer) ?></span>
            </dt>
            <dd>
                <span class="loop"><strong><?= $oSangeki->loop ?></strong>ループ</span>
                <span class="day"><strong><?= $oSangeki->day ?></strong>日間</span>
                <span class="difficulity">
                    難易度
                    <span><? for ($i = 1 ; $i <= 8 ; $i++) {
                        if ($i <= $oSangeki->difficulity) {
                            echo '★';
                        } else {
                            echo '☆';
                        }
                    } ?></span>
                    <span class="tag"><?= df($oSangeki->difficulity) ?></span>
                </span>
            </dd>
        <?
            unset($oSangeki);
            endforeach;
        ?>
        </dl>
    </div>
    <button class="show_title">脚本タイトルを表示</button>
<?php require('./secret/sangeki_footer.php') ?>
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
