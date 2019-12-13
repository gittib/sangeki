<?

$oSangeki = (object)array(
    'title' => '異世界人がぴょんぴょんするんじゃぁ^～',
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
        '黒猫' => array(
            'role' => 'フレンド',
        ),
        '異世界人' => array(
            'role' => 'センドウシャ',
        ),
        '手先' => array(
            'initPos' => '神社',
        ),
        '入院患者' => array(
            'role' => 'ミスリーダー',
        ),
        'サラリーマン' => array(
            'role' => 'フレンド',
        ),
        '情報屋' => array(
            'role' => 'アベンジャー',
        ),
        '女の子' => array(
        ),
        '委員長' => array(
            'role' => 'トラブルメイカー',
        ),
        'イレギュラー' => array(
            'role' => 'イレイザー',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '怨嗟の雄叫び',
            'criminal' => '女の子',
        ),
        3 => array(
            'name' => '悪魔との契約',
            'criminal' => '情報屋',
        ),
        4 => array(
            'name' => '自殺',
            'criminal' => '入院患者',
        ),
        5 => array(
            'name' => '丑の刻参り',
            'criminal' => '異世界人',
        ),
    ),
    'advice' => (object)array(
        'summary' => "最後の戦いは運ゲーなので、最初にループ抜け推奨と伝えてしまっても良いでしょう。",
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
                0 => '手先は神社に配置',
                1 => array(
                    '神社' => '暗躍+1',
                    '手先' => '不安+1',
                    '女の子' => '不安+1',
                ),
                2 => array(
                    '神社' => '暗躍+1',
                    '女の子' => '不安+1',
                    '情報屋' => '不安+1',
                ),
                3 => array(
                    '神社' => '暗躍+1',
                    '情報屋' => '不安+1',
                    '入院患者' => '不安+1',
                ),
                4 => array(
                    '神社' => '暗躍+1',
                    '入院患者' => '不安+1',
                    '異世界人' => '不安+1',
                ),
                5 => array(
                    '神社' => '暗躍+1',
                    '異世界人' => '不安+1',
                ),
            ),
        ),
    ),
);
