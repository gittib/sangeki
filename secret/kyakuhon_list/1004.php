<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'BTX',
    'rule' => array(
        '封印されしもの',
        '潜む殺人鬼',
        '不定因子χ',
    ),
    'loop' => 4,
    'day' => 6,
    'character' => array(
        '巫女' => array(
        ),
        '入院患者' => array(
            'role' => 'シリアルキラー',
        ),
        '医者' => array(
        ),
        '軍人' => array(
        ),
        '刑事' => array(
        ),
        'サラリーマン' => array(
            'role' => 'クロマク',
        ),
        'イレギュラー' => array(
            'role' => 'ミスリーダー',
        ),
    ),
    'incident' => array(
        4 => array(
            'name' => '不安拡大',
            'criminal' => '',
        ),
        5 => array(
            'name' => '邪気の汚染',
            'criminal' => '',
        ),
        6 => array(
            'name' => '行方不明',
            'criminal' => 'シリアルキラー',
        ),
    ),
    'advice' => (object)array(
        'summary' => '',
        'detail' => "",
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
        ),
    ),
);
