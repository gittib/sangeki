<?

$oSangeki = (object)array(
    'title' => '教祖様がぴょんぴょんするんじゃぁ^～',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'MZ',
    'rule' => array(
        '',
        '神のサイコロ',
        '死のショウタイム',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 4,
    'character' => array(
        '教祖' => array(
            'role' => 'ゼッタイシャ',
        ),
        'ご神木' => array(
            'role' => 'マジシャン',
        ),
        'コピーキャット' => array(
            'role' => 'ゼッタイシャ',
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
            'criminal' => 'コピーキャット',
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
