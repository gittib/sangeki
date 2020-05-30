<?

$oSangeki = (object)array(
    'title' => '彼はパーソン',
    'writer' => 'ペンスキー',
    'recommended' => true,
    'difficulity' => 4,
    'set' => 'BTX',
    'rule' => array(
        '僕と契約しようよ！',
        '友情サークル',
        '恋愛風景',
    ),
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'note' => '2ループ目',
        ),
        '異世界人' => array(
            'role' => 'キーパーソン',
        ),
        '入院患者' => array(
            'role' => 'メインラバーズ',
        ),
        'サラリーマン' => array(
        ),
        'A.I.' => array(
            'role' => 'フレンド',
        ),
        '転校生' => array(
            'role' => 'ラバーズ',
            'note' => '2日目'
        ),
        'お嬢様' => array(
            'role' => 'フレンド',
        ),
        '教師' => array(
            'role' => 'ミスリーダー',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '流布',
            'criminal' => 'A.I.',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '教師',
        ),
        3 => array(
            'name' => '殺人事件',
            'criminal' => 'お嬢様',
        ),
        4 => array(
            'name' => '自殺',
            'criminal' => '転校生',
        ),
        5 => array(
            'name' => '蝶の羽ばたき',
            'criminal' => '入院患者',
        ),
    ),
    'advice' => (object)array(
        'summary' => '惨劇RoopeRを2,3回経験した主人公向けです。ルールXを豪快に活用したロックギミックと、それによるルールYの隠蔽が特徴です。',
        'detail' => "ミスリーダーの能力は毎日使って下さい。隠す必要は全くありません。その上で不安拡大と転校生の自殺を発生させるのが必達目標です。逆に3日目の殺人事件は起こしてはいけません。\n主人公は最後の戦いでしか勝てませんが、勝つための鍵は友好能力を使うことそのものにあります。この脚本には友好無視の役職が無いため、全キャラクターの友好能力が使われるとルールYを特定されます。そうなるとほぼ主人公の勝利が確定してしまいます。ゲーム中でまだ友好能力を使われていないキャラクターが誰なのかは意識し、最低1人はゲーム中通して友好能力を使われないよう警戒しましょう。最有力候補は神格です。\n行動カードの置き方のテンプレを記しますが、絶対ではありません。特に終盤に近づくにつれて、テンプレが有効でない局面も出てくるでしょう。",
        'victoryConditions' => array(
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    'メインラバーズの能力',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    'A.I.の友好能力',
                    '異世界人の友好能力',
                    '殺人事件',
                ),
            ),
            array(
                'condition' => '僕と契約しようよ！',
                'way' => array(
                    'キーパーソンに暗躍カウンターを２つ乗せる',
                ),
            ),
        ),
        'template' => array(
            'A.I.に友好が乗っていないなら↓' => array(
                1 => array(
                    '教師' => '不安+1',
                    '異世界人' => '友好禁止',
                ),
                2 => array(
                    '教師' => '不安+1',
                    '転校生' => '不安+1',
                ),
                3 => array(
                    '転校生' => '不安+1',
                ),
                4 => array(
                    '転校生' => '不安+1',
                ),
            ),
            'フレンドの能力でA.I.に友好が乗っていたら↓' => array(
                1 => array(
                    '教師' => '不安+1',
                    'A.I.' => '暗躍+2',
                ),
                2 => array(
                    '教師' => '不安+1',
                    '転校生' => '不安+1',
                ),
                3 => array(
                    '転校生' => '不安+1',
                ),
                4 => array(
                    '転校生' => '不安+1',
                ),
            ),
        ),
    ),
);
