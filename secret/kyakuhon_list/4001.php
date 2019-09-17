<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'HSA',
    'rule' => array(
        '夜霧の悪夢 or 呪われし地',
        '恋愛風景',
        '一癖あるヤツラ',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '巫女' => array(
            'role' => 'シリアルキラー',
        ),
        '黒猫' => array(
        ),
        '鑑識官' => array(
            'role' => 'ゴースト',
        ),
        'イレギュラー' => array(
            'role' => 'ミスリーダー',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '呪いの目覚め',
            'criminal' => '神社',
        ),
        4 => array(
            'name' => '行方不明',
            'criminal' => 'ラバーズ',
        ),
        5 => array(
            'name' => '狂気の夜',
            'criminal' => '学校',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "1ループ目：メインラバーズで普通に頑張る",
        'template' => array(
            '開始時EXゲージ 1以下' => array(
                0 => '手先は病院に配置する',
                1 => array(
                    '大物' => '友好禁止',
                    '手先' => '不安+1',
                    'アイドル' => '移動横',
                ),
                2 => array(
                    '大物' => '友好禁止',
                    '病院' => '暗躍+2',
                    '異世界人' => '暗躍+1',
                ),
                3 => array(
                    '大物' => '友好禁止',
                ),
                4 => array(
                    '大物' => '友好禁止',
                ),
                5 => array(
                    '大物' => '友好禁止',
                ),
            ),
        ),
    ),
);
