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
        'summary' => "",
        'detail' => "",
    ],
];
