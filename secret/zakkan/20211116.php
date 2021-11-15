<?php
require_once(SECRET_DIR.'common.php');
$url = schema() . '://' . $_SERVER["HTTP_HOST"] . '/zakkan/20211116';
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php'); ?>
<?php require(SECRET_DIR.'sangeki_head.php'); ?>
    <title>れうさん惨劇セット雑感 - <?= SITE_NAME ?></title>
    <link rel="canonical" href="<?= $url ?>">
</head>
<body class="column">
<?php require(SECRET_DIR.'sangeki_header.php'); ?>
    <h2>れうさん惨劇セット雑感</h2>
    <div>
        れうさん惨劇セットが面白そうだったので、自分用のメモとして各ルール雑感をまとめてみる。
        なおエアプなので、間違いや認識違いが含まれてる可能性あり。
    </div>
    <h3>ルールY</h3>
    <dl class="tips">
        <dt>輪廻する純真　稼げるループ数：２～３</dt>
        <dd>
            イノセントは死亡するタイムトラベラーという雰囲気。友好積まなきゃいけないのは同じなので、死亡するぶん脚本家よりになっている(ループ数が増える)。<br>
            マリスが安定して1ループ稼いでくれるのがでかい。ただし1人上限なので、悪意の檻や悪性惨劇臨界点と組み合わせた場合は稼げるループ数は1ループ減る計算。
        </dd>
        <dt>袋小路の世界　稼げるループ数：３～４</dt>
        <dd>
            ボードへの暗躍が非常に強く、脚本家カードの手置きだけでも２ループ目くらいまで簡単にとれてしまいそう。他のルールYを採用し、袋小路の世界へのCSを弄するのも非常に簡単かつ強力。<br>
            デッドエンドは死体があるほど強化されるため、殺害手段の幅広さが脚本難易度に直結する。シリアルキラーや遂行者すら脚本家有利に働きうる。<br>
            日数調整がかなりシビアな印象。殺害手段のバリエーションと合わせて、脚本作成の腕が問われる。
        </dd>
        <dt>暴虐の王　稼げるループ数：１～２</dt>
        <dd>
            タイラントがかなり目立つため、序盤の情報の落ち方がとても独特な印象。ただし目立ちすぎて強くはない気がする。<br>
            盤面全体で、ループ１回制限を持たない友好能力がどれだけ使いやすいかによってタイラントの強さも変わってくる。ん？サラリーマンさん？<br>
            ウェアウルフよろしく、タイラントの殺害手段を用意しておかないと軽率にタブーを満たしうる。クロマクの影が薄いので最後の戦いは脚本家有利なのも要注意。
        </dd>
        <dt>蘇る霧の街　稼げるループ数：２～３</dt>
        <dd>
            ルールY固有の役職が追加されず、敗北条件も至ってノーマルなCSの要。特に輪廻する純真へのCSがやりやすいと思う。<br>
            フレンドを殺すにしてももう一人のフレンドを隠せるし、ルールYだけで必要なパーツが揃っている感じ。幅広い脚本が書けそう。
        </dd>
        <dt>彼女たちの最終決戦　稼げるループ数：２～３</dt>
        <dd>
            ケイヤクシャを巡る攻防。他のキャラクターをケイヤクシャに見せかけるもよし、クロマクを暴れさせてガンガン暗躍を積むもよし。<br>
            暗躍はメインヒロインも要求してるので、クロマクを隠すか否かで展開が大きく変わってきそう。<br>
            というかメインヒロインさん、こんな役職名なのに主人公にとって殺し得なんすね…
        </dd>
    </dl>
    <h3>ルールX</h3>
    <dl class="tips">
        <dt>悪意の檻　稼げるループ数：２～３</dt>
        <dd>
            マリス、フレンド、ミスリーダーと、使いやすい役職が揃った安定版ルールX。迷ったらコレって感じ。<br>
            ３人とも１ループ稼げるだけのパワーがあり、誰を隠すかだけでも個性が出せそう。
        </dd>
        <dt>不死を殺す者　稼げるループ数：１～２</dt>
        <dd>
            ケイヤクシャは殺せないので犯人に適任ですよ、というメッセージを感じる。<br>
            これを選ぶならやはりケイヤクシャは重要な事件の犯人にしたい。<br>
            複数人殺せる事件の犯人をケイヤクシャにすると、アンデッドをかなり強力に隠せそう。
        </dd>
        <dt>錯綜する情報　稼げるループ数：１～２</dt>
        <dd>
            インフルエンサーが非常に厄介。こいつのせいで、惨劇セット全体としてミスリーダーが暴れやすい印象。<br>
            ミスリーダー自体とアンデッドも追加されるため、惨劇のサポートと最後の戦いを両立できるルールという趣き。
        </dd>
        <dt>不穏な噂　稼げるループ数：０～２</dt>
        <dd>
            脚本によってはボードの暗躍は意味を成さないが、袋小路の世界の圧がすごいのでCSのサポートとして雑に使うものアリな気がする。<br>
            全てのルールYがループ終了時敗北条件を持っているため、うまく使えば相当後半まで袋小路の世界を切れないという立ち回りもできそう。
        </dd>
        <dt>殺人鬼の鼓動　稼げるループ数：０～２</dt>
        <dd>
            死体の数に比例して凶悪度が増す惨劇セットなので、シリアルキラーの影響は大きい。<br>
            ちょうどアンデッドも追加されるため、不死者を犯人にしてシリアルキラーに殺される事故を防ぐといった事もできる。<br>
            逆に不死の多さを利用して、シリアルキラーを隠す脚本も書けそう。
        </dd>
        <dt>世界崩壊カウントダウン　稼げるループ数：０</dt>
        <dd>
            この惨劇セットのループ跨ぎ要因枠。とんでもないルールを追加する舞台装置。<br>
            初日のキーパーソンの自殺が不可避というような、他のセットではタブーな脚本でもこれを採用すれば作成できる。<br>
            日数よりループ数の多い脚本とか転校生の扱いがどうなるのかとか、裁定が色々と複雑そう。
        </dd>
        <dt>悪性惨劇臨界点　稼げるループ数：２</dt>
        <dd>
            偶数ループでパーソンの事件が凶悪化。しかもマリスまで追加される。
            ただし、惨劇セット全体を通して不安臨界をいじる非公開要因が他に無いので(無いよね…？)、逆手に取って犯人がパーソンか否か判別する事ができる。
        </dd>
    </dl>
</body>
</html>
