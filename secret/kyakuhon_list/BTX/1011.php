<?php

$oSangeki = (object)[
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'BTX',
    'rule' => [
        '巨大時限爆弾Xの存在',
        '不穏な噂',
        '妄想拡大ウイルス',
    ],
    'loop' => 3,
    'day' => 4,
    'character' => [
        '妹' => [
        ],
        '入院患者' => [
        ],
        '大物' => [
            'note' => '病院',
        ],
        '情報屋' => [
        ],
        'サラリーマン' => [
            'role' => 'ウィッチ',
        ],
        'A.I.' => [
            'role' => 'ミスリーダー',
        ],
        '女子学生' => [
        ],
        '教師' => [
        ],
    ],
    'incident' => [
        2 => [
            'name' => '不安拡大',
            'criminal' => 'サラリーマン',
        ],
        3 => [
            'name' => '行方不明',
            'criminal' => '教師',
        ],
        4 => [
            'name' => '流布',
            'criminal' => 'A.I.',
        ],
    ],
    'advice' => (object)[
        'summary' => "",
        'detail' => "",
    ],
];
