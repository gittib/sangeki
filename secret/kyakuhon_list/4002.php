<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '魔女の呪い',
        '恐慌と妄執と',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 4,
    'character' => array(
        '巫女' => array(
            'role' => 'シリアルキラー',
        ),
        '鑑識官' => array(
            'role' => 'ヴァンパイア',
        ),
        'サラリーマン' => array(
            'role' => 'ウィッチ',
        ),
        'アイドル' => array(
            'role' => 'ミスリーダー',
        ),
        '男子学生' => array(
            'role' => 'ウィッチ',
        ),
        '委員長' => array(
            'role' => 'キーパーソン',
        ),
        '教師' => array(
            'role' => 'チキンハート',
        ),
        'イレギュラー' => array(
            'role' => 'ゾンビ',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '立てこもり',
            'criminal' => 'アイドル',
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
