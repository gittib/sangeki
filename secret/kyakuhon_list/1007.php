<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'BTX',
    'rule' => array(
        '僕と契約しようよ！',
        '友情サークル',
        '不定因子χ',
    ),
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '異世界人' => array(
        ),
        '黒猫' => array(
        ),
        '医者' => array(
            'role' => 'ミスリーダー',
        ),
        '入院患者' => array(
            'role' => 'ファクター',
        ),
        '情報屋' => array(
        ),
        'A.I.' => array(
            'role' => 'フレンド',
        ),
        'マスコミ' => array(
            'role' => 'フレンド',
        ),
        'お嬢様' => array(
            'role' => 'キーパーソン',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '自殺',
            'criminal' => '情報屋',
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
            'criminal' => 'マスコミ',
        ),
    ),
    'advice' => (object)array(
        'summary' => "",
        'detail' => "",
        'victoryConditions' => array(
            array(
                'condition' => 'キーパーソンの殺害',
                'way' => array(
                    '病院の事件',
                    '異世界人の友好能力',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    '病院の事件',
                    '異世界人の友好能力',
                ),
            ),
            array(
                'condition' => '僕と契約しようよ！',
                'way' => array(
                    'ループ終了時にキーパーソンの上に暗躍カウンターが2個以上',
                ),
            ),
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    '病院の事件',
                ),
            ),
        ),
        'template' => array(
            '基本' => array(
                1 => array(
                    'お嬢様' => '不安+1',
                    'マスコミ' => '不安+1',
                    '異世界人' => '移動縦',
                ),
                2 => array(
                    'お嬢様' => '不安+1',
                    'マスコミ' => '不安+1',
                    '異世界人' => '移動横',
                ),
                3 => array(
                    'お嬢様' => '不安+1',
                    'マスコミ' => '不安+1',
                ),
                4 => array(
                    'お嬢様' => '不安+1',
                    'マスコミ' => '不安+1',
                ),
                5 => array(
                    'お嬢様' => '暗躍+1',
                    'マスコミ' => '不安+1',
                ),
            ),
        ),
    ),
);
