<?php

$oSangeki = (object)[
    'title' => '学校の惨劇',
    'writer' => 'ペンスキー',
    'difficulity' => 1,
    'set' => 'FS',
    'rule' => [
        '守るべき場所',
        '不穏な噂',
    ],
    'loop' => 3,
    'day' => 2,
    'character' => [
        '巫女' => [
        ],
        'サラリーマン' => [
            'role' => 'カルティスト',
        ],
        'アイドル' => [
            'role' => 'ミスリーダー',
        ],
        'お嬢様' => [
        ],
        '男子学生' => [
        ],
        '委員長' => [
            'role' => 'キーパーソン',
        ],
    ],
    'incident' => [
        1 => [
            'name' => '行方不明',
            'criminal' => 'アイドル',
        ],
        2 => [
            'name' => '自殺',
            'criminal' => '委員長',
        ],
    ],
    'advice' => (object)[
        'summary' => "ボードへの暗躍を重視した練習用脚本です。暗躍カウンターの効果と、ルールを絞らせない事の重要性を理解するのに適しています。",
        'detail' => "1ループ目は行方不明を起こし、不穏な噂と合わせて初日に学校へ暗躍カウンターを２つ乗せて勝利します。無事に暗躍を乗せられたら、2日目はブラフを置いて情報を与えないようにしましょう。学校以外のボードへ暗躍+2を通せると強力なCSになります。ただし、カルティストの能力は使ってはいけません。\n\n2ループ目、アイドルへの不安は警戒されるはずなので、そのスキを突いて委員長の自殺を狙います。男子学生に不安を癒やされないよう、友好禁止で妨害しましょう。\n\n3ループ目は厳しいゲームとなるでしょう。\nどちらの事件を起こすか、それを目指してどのカードをどこに配置するか。主人公との読み合いになります。",
        'victoryConditions' => [
            [
                'condition' => '守るべき場所',
                'way' => [
                    '学校に暗躍カウンターを２つ以上置く',
                ],
            ],
            [
                'condition' => 'キーパーソンの殺害',
                'way' => [
                    '自殺',
                ],
            ],
        ],
        'template' => [
            '1ループ目' => [
                1 => [
                    'アイドル' => '不安+1',
                    '男子学生' => '友好禁止',
                    '学校' => '暗躍+1',
                ],
            ],
            '2ループ目' => [
                1 => [
                    'アイドル' => '移動横',
                    '男子学生' => '友好禁止',
                    '委員長' => '不安+1',
                ],
            ],
        ],
    ],
];