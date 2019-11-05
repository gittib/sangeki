<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '魔女の呪い',
        '',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 4,
    'character' => array(
        '医者' => array(
            'role' => 'ヴァンパイア',
        ),
        'アイドル' => array(
            'role' => 'キーパーソン',
        ),
        'サラリーマン' => array(
            'role' => 'ミスリーダー',
        ),
        '学校初期' => array(
            'role' => 'ウィッチ',
        ),
        'イレギュラー' => array(
            'role' => 'ゾンビ',
        ),
        '転校生' => array(
            'note' => '2日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '立てこもり',
            'criminal' => 'サラリーマン',
        ),
        3 => array(
            'name' => '穢れの噴出',
            'criminal' => '神社の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                0 => '学校に呪いカードを設置',
                1 => array(
                    '医者' => '不安+1',
                ),
            ),
        ),
    ),
);
