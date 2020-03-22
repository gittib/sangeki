<?

$oSangeki = (object)array(
    'title' => '教祖様がぴょんぴょんするんじゃぁ^～',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'MZ',
    'rule' => array(
        '漢の戦い',
        '神のサイコロ',
        '死のショウタイム',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'role' => 'ゼッタイシャ',
            'note' => '2ループ目',
        ),
        '教祖' => array(
        ),
        '軍人' => array(
        ),
        '医者' => array(
            'role' => 'マジシャン',
        ),
        'A.I.' => array(
            'role' => 'イモータル',
        ),
        '刑事' => array(
            'role' => 'ニンジャ',
        ),
        '大物' => array(
            'role' => 'シリアルキラー',
            'note' => '神社',
        ),
        'お嬢様' => array(
        ),
        '男子学生' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '偽装自殺',
            'criminal' => '神格',
        ),
        4 => array(
            'name' => '行方不明',
            'criminal' => '教祖',
        ),
        5 => array(
            'name' => '大暴動',
            'criminal' => '医者',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '神社' => '暗躍+1',
                    '軍人' => '移動縦',
                    '大物' => '暗躍+2',
                ),
            ),
            '2ループ目以降' => array(
                1 => array(
                    '軍人' => '移動縦',
                    '医者' => '不安+1',
                ),
                2 => array(
                    '教祖' => '不安+1',
                    '医者' => '不安+1',
                ),
                3 => array(
                    '教祖' => '不安+1',
                    '医者' => '不安+1',
                ),
                4 => array(
                    '教祖' => '不安+1',
                    '医者' => '不安+1',
                ),
                5 => array(
                    '医者' => '不安+1',
                ),
            ),
        ),
    ),
);
