<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'MCX',
    'rule' => array(
        '殺人計画',
        '私は名探偵',
        '愚者のダンス',
    ),
    'special_rule' => "",
    'loop' => 6,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'role' => 'フレンド',
            'note' => '2ループ目',
        ),
        '異世界人' => array(
            'role' => 'ミスリーダー',
        ),
        '入院患者' => array(
            'role' => 'フレンド',
        ),
        '医者' => array(
            'role' => 'キーパーソン',
        ),
        '大物' => array(
            'role' => 'メイタンテイ',
            'note' => '病院',
        ),
        'サラリーマン' => array(
            'role' => 'クロマク',
        ),
        '教師' => array(
        ),
        '男子学生' => array(
            'role' => 'フール',
        ),
        '転校生' => array(
            'role' => 'キラー',
            'note' => '5日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '自殺',
            'criminal' => '医者',
        ),
        3 => array(
            'name' => '前兆',
            'criminal' => '男子学生',
        ),
        5 => array(
            'name' => '病院の事件',
            'criminal' => '入院患者',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                0 => "手先は病院に配置する",
                1 => array(
                    '手先' => '暗躍+1',
                    '病院' => '暗躍+2',
                    '異世界人' => '不安+1',
                ),
            ),
        ),
    ),
);
