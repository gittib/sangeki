<?

$oSangeki = (object)array(
    'title' => '不穏な噂 ver.MC',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'MCX',
    'rule' => array(
        '黒の学園',
        '隔離病棟サイコ',
        '絶対の意思',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 6,
    'character' => array(
        '神格' => array(
            'note' => '3ループ目',
        ),
        '異世界人' => array(
            'role' => 'セラピスト',
        ),
        '入院患者' => array(
            'role' => 'ゼッタイシャ',
        ),
        '軍人' => array(
        ),
        '医者' => array(
            'role' => 'ミスリーダー',
        ),
        'A.I.' => array(
            'role' => 'パラノイア',
        ),
        'サラリーマン' => array(
            'role' => 'クロマク',
        ),
        '委員長' => array(
        ),
    ),
    'incident' => array(
        4 => array(
            'name' => '不安拡大',
            'criminal' => 'A.I.',
        ),
        5 => array(
            'name' => '病院の事件',
            'criminal' => '異世界人',
        ),
        6 => array(
            'name' => 'テロリズム',
            'criminal' => '入院患者',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                2 => array(
                    '都市' => '暗躍+',
                    '病院' => '暗躍+',
                ),
            ),
        ),
    ),
);
