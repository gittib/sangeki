<?

$oSangeki = (object)array(
    'title' => 'とっても小さな惨劇',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 3,
    'set' => 'WM',
    'rule' => array(
        '血塗られた儀式',
        '不穏な噂',
        '見てしまった人々',
    ),
    'special_rule' => "神格は登場しない。",
    'loop' => 6,
    'day' => 4,
    'character' => array(
        '軍人' => array(
            'role' => 'イモータル',
        ),
        'A.I.' => array(
            'role' => 'ミスリーダー',
        ),
        'サラリーマン' => array(
        ),
        '女子学生' => array(
            'role' => 'ウィッチ',
        ),
        'お嬢様' => array(
            'role' => 'モクゲキシャ',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '狂気殺人',
            'criminal' => 'お嬢様',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '女子学生',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "EXゲージがなかなか上がらない脚本です。Weird Mythologyらしさは無いため、WM初プレイには向きません。\n登場人物は極少ながら、直接役職を聞けるのはパーソンしかいません。しかし、主人公にとってはそれすらも重要な推理の材料となります。",
        'detail' => "EXゲージが上がったら脚本家は敗北します。女子学生の友好能力は絶対に使われてはなりません。友好禁止を全力で張り続けましょう。\n１ループ目は、狂気殺人で女子学生を殺害するのが目標です。殺害には失敗しても構いませんが、その場合は翌日以降も友好禁止を張り忘れないように。\n軍人、A.I.、お嬢様が担う役職については、主人公が正しく立ち回れば全て明かせるようになっています。特にモクゲキシャの能力を起動されると致命的です。軍人とお嬢様が同一エリアに行かないよう気をつけましょう。不安-1も必要に応じて使って下さい。\n手が余るなら、神社と学校に暗躍カウンターを置いてCSを狙います。学校の方が優先度は高いですが、不穏な噂を使うかは主人公の推理状況に応じて判断しましょう。不穏な噂もバラしたくはないので、無理はしなくて良いです。",
        'template' => array(
            '各ループ共通' => array(
                1 => array(
                    '女子学生' => '友好禁止',
                    'お嬢様' => '不安+1',
                ),
                2 => array(
                    '女子学生' => '友好禁止',
                ),
                3 => array(
                    '女子学生' => '友好禁止',
                ),
                4 => array(
                    '女子学生' => '友好禁止',
                ),
            ),
        ),
    ),
);
