<?

$oSangeki = (object)array(
    'title' => '名探偵は今どこに？',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'MCX',
    'rule' => array(
        'タイトロープ上の計画',
        '私は名探偵',
        '隔離病棟サイコ',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '軍人' => array(
            'role' => 'フレンド',
        ),
        '神格' => array(
            'note' => '3ループ目',
        ),
        '異世界人' => array(
            'role' => 'セラピスト',
        ),
        'サラリーマン' => array(
            'role' => 'クロマク',
        ),
        '大物' => array(
            'role' => 'メイタンテイ',
            'note' => '学校',
        ),
        '女の子' => array(
            'role' => 'ミスリーダー',
        ),
        '男子学生' => array(
            'role' => 'パラノイア',
        ),
        'お嬢様' => array(
            'role' => 'キラー',
        ),
        'イレギュラー' => array(
            'role' => 'フール',
        ),
        '教師' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '偽装自殺',
            'criminal' => 'お嬢様',
        ),
        2 => array(
            'name' => '銀の銃弾',
            'criminal' => 'イレギュラー',
        ),
        3 => array(
            'name' => 'テロリズム',
            'criminal' => '神格',
        ),
        5 => array(
            'name' => '自殺',
            'criminal' => '軍人',
        ),
    ),
    'advice' => (object)array(
        'notice' => 'プロモーションカード「女の子」を使用します。',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                0 => '手先は都市に配置すること',
                1 => array(
                    '手先' => '不安+1',
                ),
            ),
        ),
    ),
);
