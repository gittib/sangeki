<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 4,
    'set' => 'UM',
    'rule' => array(
        '復讐者の誓い',
        'マスヒュプノスの合図',
        '開けてはならない扉',
    ),
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'role' => 'アベンジャー',
            'note' => '1ループ目',
        ),
        '黒猫' => array(
        ),
        '入院患者' => array(
        ),
        'サラリーマン' => array(
            'role' => 'センドウシャ',
        ),
        '手先' => array(
            'initPos' => '都市',
        ),
        '委員長' => array(
            'role' => 'トラブルメーカー',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '不法投棄',
            'criminal' => '入院患者',
        ),
        3 => array(
            'name' => '悪魔との契約',
            'criminal' => '神格',
        ),
        5 => array(
            'name' => '丑の刻参り',
            'criminal' => 'サラリーマン',
        ),
    ),
    'advice' => (object)array(
        'summary' => "",
        'detail' => "",
        'victoryConditions' => array(
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    'アベンジャーの能力',
                ),
            ),
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    'アベンジャーの能力',
                    '丑の刻参り',
                ),
            ),
            array(
                'condition' => '復讐者の誓い',
                'way' => array(
                    '悪魔との契約を起こす',
                ),
            ),
        ),
        'template' => array(
            '基本' => array(
                1 => array(
                    '神社' => '暗躍+1',
                    '手先' => '不安+1',
                    '入院患者' => '不安+1',
                ),
                2 => array(
                    '神社' => '暗躍+1',
                    '入院患者' => '不安+1',
                    '神格' => '不安+1',
                ),
                3 => array(
                    '神社' => '暗躍+1',
                    '神格' => '不安+1',
                ),
            ),
        ),
    ),
);
