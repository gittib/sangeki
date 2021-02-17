<?

$oSangeki = (object)[
    'title' => '悪夢の無限回廊',
    'writer' => 'ペンスキー',
    'difficulity' => 7,
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
        ],
        'A.I.' => [
            'role' => 'プロフェシー',
        ],
        '女の子' => [
            'role' => 'ミスリーダー',
        ],
        '男子学生' => [
        ],
        'お嬢様' => [
            'role' => 'ウィッチ',
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
        'summary' => "日数の短さゆえ、情報がほとんど得られない脚本です。主人公には、毎ループ同じ惨劇が突きつけられるでしょう。\nわずかな手掛かりからループ突破へと繋げる観察力と発想力が求められます。",
        'detail' => "脚本家の勝利条件は異世界人の自殺のみですが、初日の不安拡大をほぼ確実に起こせるので非常に簡単に達成できます。\n\nこの脚本を回す際は、以下の２点に気をつけて下さい。\n\n・教祖の役職が明かされないようにする事。\n・プロフェシーに異世界人の自殺を妨害させない事。\n\nシリアルキラーを使われると確実に教祖を殺害できるのですが、そこに気づかれるまでは殺されないように気をつけて下さい。シリアルキラーを隠すこと自体も重要ですが、異世界人の友好能力も常に警戒が必要です。\n\n最後の戦いについては、何も心配は要りません。入院患者、情報屋、大物の友好能力を使うことはできないため、誰にウィッチが配役されているか、主人公に知るすべはありません。立ち回り次第で、お嬢様や男子学生の友好無視チェックも相当遅らせる事ができるでしょう。\n\n\n主人公の勝ち筋は、教祖に友好+1された状態でループを開始することです。\n脚本家は女の子の不安臨界を満たさねばならないため、教祖の友好能力で友好+1することができます。すると初日から女の子に友好３が乗り、プロフェシーの元へいざなう事ができるでしょう。",
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
                    'お嬢様' => '上半分へ移動',
                ],
            ],
            '教祖の役職の割り方（主人公の手順）' => [
                1 => [
                    '異世界人' => '移動',
                    '誰か' => '移動禁止',
                    'もう一人' => '移動禁止',
                ],
            ],
        ],
    ],
];
