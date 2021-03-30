<?php

$oSangeki = (object)[
    'title' => 'ホシに願いを',
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'BTX',
    'rule' => [
        '未来改変プラン',
        '友情サークル',
        '因果の糸',
    ],
    'special_rule' => "幻想はフレンドである。",
    'loop' => 3,
    'day' => 6,
    'character' => [
        '幻想A' => [
            'role' => 'フレンド',
        ],
        '幻想B' => [
            'role' => 'フレンド',
        ],
        '妹' => [
            'role' => 'タイムトラベラー',
        ],
        'ナース' => [
        ],
        '刑事' => [
            'role' => 'ミスリーダー',
        ],
        'サラリーマン' => [
        ],
        '情報屋' => [
        ],
        '男子学生' => [
        ],
        'お嬢様' => [
        ],
        '手先' => [
            'role' => 'カルティスト',
        ],
    ],
    'incident' => [
        1 => [
            'name' => '不安拡大',
            'criminal' => 'お嬢様',
        ],
        2 => [
            'name' => '不安拡大',
            'criminal' => 'サラリーマン',
        ],
        3 => [
            'name' => '不安拡大',
            'criminal' => '男子学生',
        ],
        4 => [
            'name' => '不安拡大',
            'criminal' => 'ナース',
        ],
        5 => [
            'name' => '蝶の羽ばたき',
            'criminal' => '手先',
        ],
    ],
    'advice' => (object)[
        'notice' => "特殊ルールについて、「役職は過不足なく配役される」原則は守られた脚本である事を必ず説明して下さい。幻想はイレギュラーやコピーキャットではありません。",
        'summary' => "惨劇RoopeR Be Playing Stage Game の登場人物で構成された脚本です。\nループ数も短く、特殊ルールによって１ループ目開始時点からルールXが1つ確定しているため、比較的短い時間で遊ぶ事ができます。",
        'detail' => "１ループ目開始前からフレンドが公開されているので、各ループ開始時に2人の幻想へ友好カウンターを置いて下さい。\n\n脚本家の勝利手段は蝶の羽ばたきとタイムトラベラーの能力ですが、メインは蝶の羽ばたきです。\n蝶の羽ばたきは勝利条件なので起こすべきですが、事件の犯人へ友好カウンターを乗せられる点も見逃せません。お嬢様を筆頭に、どの事件の犯人でも友好カウンターを乗せる価値があります。\n\n不安拡大を起こすのは簡単ですが、1ループ目から全て起こすのはやめておきましょう。犯人バレを防ぐために重要です。\n\nなお、実は犯人を特定されると、不安カウンターに関係なく事件を防がれてしまいます。その鍵を握るのは幻想と妹です。また、刑事の友好4能力も少々厄介です。\n\n\n主人公の勝ち筋は、妹で手先の事件を止める事です。\n一見難しそうですが、幻想への友好+2を通すだけで達成できます。\n幻想に友好3が乗った時点で、2人の幻想の友好3能力を連続使用して、全てのキャラクターを妹の元へと誘う事ができるようになります。あとは妹に友好5を溜めて手先を呼び寄せ、事件を起こさないようお願いすれば、主人公の勝利確定となります。",
        'victoryConditions' => [
            [
                'condition' => '未来改変プラン',
                'way' => [
                    '蝶の羽ばたきを起こす',
                ],
            ],
            [
                'condition' => 'タイムトラベラーの能力',
                'way' => [
                    'ループ最終日にタイムトラベラーの友好カウンターが2つ以下',
                ],
            ],
        ],
        'template' => [
            '1ループ目' => [
                0 => '手先は都市に配置',
                1 => [
                    'お嬢様' => '移動横',
                    'サラリーマン' => '不安+1',
                ],
            ],
            'サラリーマンに不安+2スタート' => [
                0 => '手先は学校に配置',
                1 => [
                    'ナース' => '移動横',
                    'サラリーマン' => '不安+1',
                ],
                2 => [
                    'サラリーマン' => '不安+1',
                ],
            ],
        ],
    ],
];
