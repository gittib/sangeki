<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 5,
    'set' => 'UM',
    'rule' => array(
        '復讐者の誓い',
        'マスヒュプノスの合図',
        '開けてはならない扉',
    ),
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '入院患者' => array(
        ),
        'サラリーマン' => array(
            'role' => 'センドウシャ',
        ),
        '手先' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '',
            'criminal' => '入院患者',
        ),
        4 => array(
            'name' => '悪魔との契約',
            'criminal' => 'アベンジャー',
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
                    'アベンジャーが犯人の事件を起こす',
                ),
            ),
        ),
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '病院' => '暗躍+2',
                    '学校' => '暗躍+1',
                    '女子学生' => '不安+1',
                ),
            ),
        ),
    ),
);
