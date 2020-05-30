<?

$oSangeki = (object)array(
    'title' => '惨劇へのエスコート',
    'writer' => 'ペンスキー',
    'recommended' => true,
    'difficulity' => 4,
    'set' => 'MZ',
    'rule' => array(
        '忍び寄る魔手',
        '神のサイコロ',
        '死のショウタイム',
    ),
    'loop' => 3,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'note' => '2ループ目',
        ),
        '巫女' => array(
            'role' => 'マジシャン',
        ),
        '医者' => array(
            'role' => 'カルティスト',
        ),
        'ナース' => array(
            'role' => 'ニンジャ',
        ),
        'A.I.' => array(
            'role' => 'イモータル',
        ),
        'アイドル' => array(
            'role' => 'キーパーソン',
        ),
        'サラリーマン' => array(
            'role' => 'ゼッタイシャ',
        ),
        '情報屋' => array(
            'role' => 'シリアルキラー',
        ),
        'イレギュラー' => array(
            'role' => 'ミスリーダー',
        ),
    ),
    'incident' => array(
        2 => array(
            'name' => '告白',
            'criminal' => '医者',
        ),
        3 => array(
            'name' => '不安拡大',
            'criminal' => 'A.I.',
        ),
        4 => array(
            'name' => '陰謀工作',
            'criminal' => 'アイドル',
        ),
        5 => array(
            'name' => '打開',
            'criminal' => 'サラリーマン',
        ),
    ),
    'advice' => (object)array(
        'summary' => 'シンプルかつ短時間で終わる脚本なので、MZ初プレイにもおすすめな脚本です。脚本家の勝利手段が限られており、1ループ初日から4人もの役職を明かしてしまいます。何をすれば良いか、メッセージが強烈に伝わるので、早々に行動カードの読み合いへともつれ込みます。',
        'detail' => "1ループ目初日はテンプレに従ってカードを置いてください。そして脚本家能力フェイズでミスリーダーとマジシャンを使い、アイドルと情報屋を神社で二人きりにします。\n2ループ目は陰謀工作を狙います。初日にアイドルへ暗躍+2を置きましょう。合わせて情報屋にもカードを置き、暗躍禁止されないよう祈ります。暗躍が通れば、事件発生からそのままニンジャで殺害できます。\n最終ループは愚直な移動合戦です。シリアルキラー、ニンジャ、陰謀工作を最大限活用して頑張って下さい。",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    'アイドル' => '移動横',
                    '情報屋' => '移動斜め',
                    '巫女' => '移動縦',
                ),
            ),
            '2ループ目' => array(
                1 => array(
                    'アイドル' => '暗躍+2',
                    '情報屋' => '不安+1',
                    'イレギュラー' => '不安+1',
                ),
            ),
        ),
    ),
);
