<?

$oSangeki = (object)array(
    'title' => '教祖様がぴょんぴょんするんじゃぁ^～',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'MZ',
    'rule' => array(
        '因果の絆',
        '',
        '死のショウタイム',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '教祖' => array(
            'role' => 'フレンド',
        ),
        'A.I.' => array(
            'role' => 'イモータル',
        ),
        '大物' => array(
            'role' => 'シリアルキラー',
            'note' => '神社',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '偽装自殺',
            'criminal' => '',
        ),
        4 => array(
            'name' => '行方不明',
            'criminal' => '教祖',
        ),
        5 => array(
            'name' => '大暴動',
            'criminal' => '',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                0 => '',
                1 => array(
                    '' => '',
                ),
            ),
        ),
    ),
);
