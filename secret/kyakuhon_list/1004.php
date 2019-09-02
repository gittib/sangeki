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
        '妄想拡大ウイルス',
    ),
    'loop' => 5,
    'day' => 6,
    'character' => array(
        '異世界人' => array(
        ),
        'ナース' => array(
            'role' => 'カルティスト',
        ),
        '軍人' => array(
        ),
        '刑事' => array(
            'role' => 'シリアルキラー',
        ),
        'サラリーマン' => array(
        ),
        '鑑識官' => array(
            'role' => 'ミスリーダー',
        ),
        'お嬢様' => array(
            'role' => 'クロマク',
        ),
        '委員長' => array(
            'role' => 'フレンド',
        ),
        '教師' => array(
        ),
    ),
    'incident' => array(
        5 => array(
            'name' => '邪気の汚染',
            'criminal' => '委員長',
        ),
        6 => array(
            'name' => '不安拡大',
            'criminal' => '異世界人',
        ),
    ),
    'advice' => (object)array(
        'summary' => '',
        'detail' => "",
        'template' => array(
            '' => array(
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
