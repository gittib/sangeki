<?

$oSangeki = (object)array(
    'title' => '不穏な噂 ver.MC',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'MCX',
    'rule' => array(
        '殺人計画',
        '隔離病棟サイコ',
        '愚者のダンス',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 6,
    'character' => array(
        '異世界人' => array(
            'role' => 'セラピスト',
        ),
        '黒猫' => array(
            'role' => 'フール',
        ),
        '入院患者' => array(
            'role' => 'キーパーソン',
        ),
        '軍人' => array(
            'role' => 'ミスリーダー',
        ),
        'アイドル' => array(
            'role' => 'キラー',
        ),
        'A.I.' => array(
            'role' => 'パラノイア',
        ),
        'サラリーマン' => array(
            'role' => 'クロマク',
        ),
        '教師' => array(
            'role' => 'フレンド',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '前兆',
            'criminal' => '黒猫',
        ),
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
