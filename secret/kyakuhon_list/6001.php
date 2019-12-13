<?

$oSangeki = (object)array(
    'title' => 'サラリーマンがぴょんぴょんするんじゃぁ^～',
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'UM',
    'rule' => array(
        '復讐者の誓い',
        '問題児の苦悩',
        'マスヒュプノスの合図',
    ),
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'role' => 'アベンジャー',
            'note' => '1ループ目',
            'initPos' => '神社',
        ),
        '黒猫' => array(
            'role' => 'フレンド',
        ),
        '入院患者' => array(
        ),
        'マスコミ' => array(
            'role' => 'フレンド',
        ),
        'サラリーマン' => array(
            'role' => 'センドウシャ',
        ),
        '手先' => array(
            'initPos' => '都市',
        ),
        '委員長' => array(
            'role' => 'トラブルメイカー',
        ),
        'イレギュラー' => array(
            'role' => 'イレイザー',
        ),
        '転校生' => array(
            'role' => 'ミスリーダー',
            'note' => '3日目',
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
        4 => array(
            'name' => '自殺',
            'criminal' => '転校生',
        ),
        5 => array(
            'name' => '丑の刻参り',
            'criminal' => 'サラリーマン',
        ),
    ),
    'advice' => (object)array(
        'summary' => "最後の戦いはほぼ不可能なので、最初にループ抜け推奨と伝えてしまっても良いでしょう。",
        'detail' => "",
        'victoryConditions' => array(
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    'アベンジャーの能力',
                    'イレイザーの能力',
                    '丑の刻参り',
                ),
            ),
            array(
                'condition' => '復讐者の誓い',
                'way' => array(
                    'アベンジャーが犯人の事件を起こす',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    'アベンジャーの能力',
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
                    '転校生' => '不安+1',
                ),
                4 => array(
                    '神社' => '暗躍+1',
                    '転校生' => '不安+1',
                    'サラリーマン' => '不安+1',
                ),
                5 => array(
                    '神社' => '暗躍+1',
                    'サラリーマン' => '不安+1',
                ),
            ),
            '2ループ目' => array(
                1 => array(
                    '委員長' => '移動',
                ),
            ),
        ),
    ),
);
