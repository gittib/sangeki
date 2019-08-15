<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => false,
    'writer' => 'ペンスキー',
    'difficulity' => 3,
    'set' => 'WM',
    'rule' => array(
        '血塗られた儀式',
        '不穏な噂',
        '見てしまった人々',
    ),
    'special_rule' => "",
    'loop' => '∞',
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
        '女の子' => array(
            'role' => 'ウィッチ',
        ),
        'お嬢様' => array(
        ),
        '教師' => array(
            'role' => 'モクゲキシャ',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '狂気殺人',
            'criminal' => 'A.I.',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '女の子',
        ),
    ),
    'advice' => (object)array(
        'notice' => 'プロモーションカード「女の子」を使用します',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                1 => array(
                    '女の子' => '友好禁止',
                    'お嬢様' => '移動縦',
                    '教師' => '移動横',
                ),
                2 => array(
                    '女の子' => '友好禁止',
                ),
                3 => array(
                    '女の子' => '友好禁止',
                ),
                4 => array(
                    '女の子' => '友好禁止',
                ),
            ),
        ),
    ),
);
