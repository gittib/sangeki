<?

$oSangeki = (object)array(
    'title' => '女の戦い',
    'writer' => 'ペンスキー',
    'difficulity' => 1,
    'set' => 'BTX',
    'rule' => array(
        '僕と契約しようよ！',
        '潜む殺人鬼',
        '因果の糸',
    ),
    'loop' => 4,
    'day' => 4,
    'character' => array(
        '巫女' => array(
        ),
        'ナース' => array(
            'role' => 'フレンド',
        ),
        'サラリーマン' => array(
        ),
        'アイドル' => array(
            'role' => 'キーパーソン',
        ),
        '女子学生' => array(
            'role' => 'シリアルキラー',
        ),
        '委員長' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => 'サラリーマン',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '巫女',
        ),
        4 => array(
            'name' => '殺人事件',
            'criminal' => '女子学生',
        ),
    ),
    'advice' => (object)array(
        'summary' => "BTXを初めて遊ぶ主人公に向けた脚本です。惨劇RoopeR自体初めてでも問題ありません。\nルールの組み合わせにより安定した勝利手段を持ち、脚本家初心者でも扱いやすくなっています。\nなお、練習用の割りには主人公の勝利は難しいです。",
        'detail' => "脚本家の勝利手段はルールYによるものだけですが、事件や役職のサポートにより2,3ループは安定して稼げます。それぞれのループでは、以下の勝利条件を目指して動くのがおすすめです。\n\n・1ループ目：シリアルキラーによるキーパーソン殺害\n・2ループ目：不安拡大によってキーパーソンへ暗躍+2\n・3ループ目：2ループ目と同様\n・4ループ目：暗躍+2を通すかシリアルキラーの殺人事件\n\nまず1ループ目はシリアルキラーでキーパーソンを殺害し、初日で終わらせてしまいます。万が一初日で終わらなかった場合、サラリーマンの友好能力を使用されないように友好禁止を張り続けて下さい。\n\n2ループ目は因果の糸により、事件の圧力が凶悪に増します。\nサラリーマンに不安+2されていれば、テンプレに従う事で2つの不安拡大を確実に起こし、アイドルへ暗躍カウンターを2つ乗せて勝利できます。\nさらにテンプレ以外にも不安をバラまき、犯人の特定を防ぎましょう。2ループ目にもサラリーマンへ友好カウンターを置いてもらえれば、3ループ目も同じパターンで勝利できます。\n\nサラリーマンの不安拡大が起こせない場合、行動カードの読み合いになります。\nアイドルには毎日カードをセットして下さい。置くカードは移動か暗躍がおすすめです。それと並行して巫女と女子学生に不安を積み、事件発生を狙います。全く安定はしませんが、暗躍+2さえ通せれば勝利できます。そこは頑張って読み合いに打ち勝って下さい。\n\n最後の戦いではフレンドを隠します。一応巫女で割られますが、不安のやり取りなどで忙しいため、あまり警戒しなくても良いでしょう。それよりもシリアルキラーの方が要注意です。フレンド候補はナースの他に巫女、委員長なので、この2人がフレンドでないとバレただけでアウトです。主人公がシリアルキラーを活用しだしたら警戒して下さい。",
        'victoryConditions' => array(
            array(
                'condition' => '僕と契約しようよ！',
                'way' => array(
                    'アイドルへ暗躍カウンターを2つ置く',
                    '不安拡大',
                ),
            ),
            array(
                'condition' => 'キーパーソンの殺害',
                'way' => array(
                    'シリアルキラー',
                    '殺人事件',
                ),
            ),
        ),
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '委員長' => '移動縦',
                    'アイドル' => '移動横',
                    '神社' => '暗躍+1',
                ),
            ),
            '因果の糸でサラリーマンに不安+2されたら' => array(
                1 => array(
                    'サラリーマン' => '不安+1',
                    'アイドル' => '移動横'
                ),
                2 => array(
                    '巫女' => '不安+1',
                ),
            ),
            '最終ループ' => array(
                1 => array(
                    '巫女' => '不安+1',
                    '女子学生' => '不安+1',
                    'アイドル' => '移動横'
                ),
                2 => array(
                    '巫女' => '不安+1',
                    '女子学生' => '不安+1',
                ),
            ),
        ),
    ),
);
