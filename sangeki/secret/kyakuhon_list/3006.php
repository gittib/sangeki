<?

$oSangeki = (object)array(
    'title' => 'そして誰もいなくなった？',
    'secret' => false,
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'MCX',
    'rule' => array(
        '組み重なり事件キルト',
        '絶対の意思',
        '隔離病棟サイコ',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 6,
    'character' => array(
        '異世界人' => array(
        ),
        '入院患者' => array(
        ),
        'アイドル' => array(
            'role' => 'ミスリーダー',
        ),
        '情報屋' => array(
            'role' => 'パラノイア',
        ),
        'お嬢様' => array(
            'role' => 'フール',
        ),
        '男子学生' => array(
        ),
        '教師' => array(
            'role' => 'セラピスト',
        ),
        '手先' => array(
            'role' => 'ゼッタイシャ',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '偽装自殺',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '偽装自殺',
            'criminal' => 'アイドル',
        ),
        3 => array(
            'name' => '偽装自殺',
            'criminal' => '異世界人',
        ),
        4 => array(
            'name' => '偽装自殺',
            'criminal' => '男子学生',
        ),
        5 => array(
            'name' => '偽装自殺',
            'criminal' => 'お嬢様',
        ),
        6 => array(
            'name' => '偽装自殺',
            'criminal' => '教師',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                0 => '手先は病院に配置する',
                1 => array(
                    '手先' => '不安+1',
                    'アイドル' => '不安+1',
                    '男子学生' => '友好禁止',
                ),
            ),
        ),
    ),
);
