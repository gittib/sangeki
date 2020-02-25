<?

$oSangeki = (object)array(
    'title' => '絶望の偽装事件',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'MZ',
    'rule' => array(
        'シークレットレコード',
        '不定因子χ怪',
        '死のショウタイム',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'role' => 'ファクター',
            'note' => '4ループ目',
        ),
        'A.I.' => array(
            'role' => 'マジシャン',
        ),
        'コピーキャット' => array(
        ),
        '女子学生' => array(
            'role' => 'ミスリーダー',
        ),
        '教師' => array(
            'role' => 'クロマク',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '偽装事件',
            'note' => '告白',
            'criminal' => '女子学生',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                0 => '手先は病院に配置する',
                1 => array(
                    '手先' => '移動横',
                    'お嬢様' => '移動縦',
                    '神社' => '暗躍+2',
                ),
            ),
            '2ループ目以降' => array(
                0 => '手先は学校に配置。EXカードはイレギュラーにセット',
                1 => array(
                    '手先' => '不安+1',
                    'マスコミ' => '移動横',
                    '神格' => '移動縦',
                ),
                2 => array(
                    '手先' => '神社へ移動',
                    'イレギュラー' => '移動横',
                    '神社' => '暗躍+2',
                ),
            ),
        ),
    ),
);
