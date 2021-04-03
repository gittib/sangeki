<?php

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'MZ',
    'rule' => array(
        '因果の絆',
        '不定因子χ怪',
        '憎愛スパイラル',
    ),
    'special_rule' => "脚本家は友好禁止を使用できない。\n友好+2は友好+3として扱う。",
    'loop' => 6,
    'day' => 3,
    'character' => array(
        '神格' => array(
            'note' => '2ループ目',
        ),
        '異世界人' => array(
            'role' => 'フレンド',
        ),
        '幻想' => array(
            'role' => 'ミスリーダー',
        ),
        '入院患者' => array(
            'role' => 'ゼッタイシャ',
        ),
        '医者' => array(
            'role' => 'ファクター',
        ),
        '情報屋' => array(
        ),
        '委員長' => array(
        ),
        '女の子' => array(
            'role' => 'シリアルキラー',
        ),
        '転校生' => array(
            'role' => 'フレンド',
            'note' => '2日目',
        ),
    ),
    'incident' => array(
        2 => array(
            'name' => '不安拡大',
            'criminal' => '入院患者',
        ),
        3 => array(
            'name' => '自殺',
            'criminal' => '転校生',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "非常に特殊なパズル脚本です。",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '医者' => '暗躍+2',
                ),
            ),
            '基本' => array(
                3 => array(
                    '転校生' => '不安+1',
                ),
            ),
        ),
    ),
);
