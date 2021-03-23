<?php

$oSangeki = (object)[
    'title' => '学校の惨劇',
    'writer' => 'ペンスキー',
    'secret' => true,
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
        'summary' => "",
        'detail' => "",
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
                    '学校' => '暗躍+1',
                    '女子学生' => '不安+1',
                ],
            ],
        ],
    ],
];
