<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 3,
    'set' => 'BTX',
    'rule' => array(
        '僕と契約しようよ！',
        '友情サークル',
        '不定因子χ',
    ),
    'special_rule' => '脚本家は友好禁止、移動斜め、暗躍+2を使えない',
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '黒猫' => array(
        ),
        '軍人' => array(
            'role' => 'フレンド',
        ),
        '入院患者' => array(
            'role' => 'ファクター',
        ),
        '大物' => array(
            'note' => '神社',
        ),
        '情報屋' => array(
        ),
        'A.I.' => array(
            'role' => 'ミスリーダー',
        ),
        '手先' => array(
            'role' => 'フレンド',
            'initPos' => '都市',
        ),
        'お嬢様' => array(
            'role' => 'キーパーソン',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '流布',
            'criminal' => '黒猫',
        ),
        4 => array(
            'name' => '行方不明',
            'criminal' => 'お嬢様',
        ),
        5 => array(
            'name' => '病院の事件',
            'criminal' => '軍人',
        ),
    ),
    'advice' => (object)array(
        'summary' => "",
        'detail' => "",
        'victoryConditions' => array(
            array(
                'condition' => '',
                'way' => array(
                ),
            ),
        ),
        'template' => array(
            '2ループ目以降' => array(
                1 => array(
                    '手先' => '友好禁止',
                ),
                2 => array(
                    '手先' => '不安+1',
                ),
            ),
            '最終ループ' => array(
                1 => array(
                    '巫女' => '不安+1',
                    '女子学生' => '不安+1',
                    'アイドル' => '移動横'
                ),
                2 => array(
                    '巫女' => '不安+1',
                    '女子学生' => '不安+1',
                ),
            ),
        ),
    ),
);
