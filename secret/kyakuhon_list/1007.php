<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'BTX',
    'rule' => array(
        '僕と契約しようよ！',
        '友情サークル',
        '因果の糸',
    ),
    'loop' => 5,
    'day' => 6,
    'character' => array(
        '巫女' => array(
            'role' => 'キーパーソン',
        ),
        '異世界人' => array(
        ),
        '手先' => array(
            'role' => 'フレンド',
        ),
        'お嬢様' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '行方不明',
            'criminal' => 'キーパーソン',
        ),
        3 => array(
            'name' => '病院の事件',
            'criminal' => '',
        ),
        6 => array(
            'name' => '流布',
            'criminal' => 'フレンド',
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
