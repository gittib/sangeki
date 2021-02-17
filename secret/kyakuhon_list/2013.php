<?

$oSangeki = (object)[
    'title' => '悪夢の無限回廊',
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'MZ',
    'rule' => [
        '因果の絆',
        '魔女のお茶会',
        '滅亡を謳うもの',
    ],
    'special_rule' => "脚本家は「友好禁止」を使用できない。",
    'loop' => 6,
    'day' => 2,
    'character' => [
        '神格' => [
            'role' => 'シリアルキラー',
            'note' => '2ループ目',
        ],
        '教祖' => [
            'role' => 'フレンド',
        ],
        '異世界人' => [
            'role' => 'フレンド',
        ],
        '入院患者' => [
        ],
        '大物' => [
            'role' => 'ウィッチ',
            'note' => '学校',
        ],
        '情報屋' => [
            'role' => 'ウィッチ',
        ],
        'A.I.' => [
            'role' => 'プロフェシー',
        ],
        '女の子' => [
            'role' => 'ミスリーダー',
        ],
        '男子学生' => [
        ],
    ],
    'incident' => [
        1 => [
            'name' => '不安拡大',
            'criminal' => '女の子',
        ],
        2 => [
            'name' => '自殺',
            'criminal' => '異世界人',
        ],
    ],
    'advice' => (object)[
        'notice' => "",
        'summary' => "",
        'detail' => "",
        'victoryConditions' => [
            [
                'condition' => 'フレンドの殺害',
                'way' => [
                    '自殺',
                    'シリアルキラーの能力',
                ],
            ],
            [
                'condition' => 'キーパーソンの殺害(要EXカード)',
                'way' => [
                    '自殺',
                    'シリアルキラーの能力',
                ],
            ],
        ],
        'template' => [
            '基本' => [
                1 => [
                    '男子学生' => '移動縦',
                    '異世界人' => '不安+1',
                ],
                2 => [
                    '異世界人' => '神社へ移動',
                ],
            ],
        ],
    ],
];
