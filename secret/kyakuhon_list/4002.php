<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'HSA',
    'rule' => array(
        '夜霧の悪夢',
        '恋愛風景',
        '魔女の呪い',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '巫女' => array(
            'role' => 'ラバーズ',
        ),
        '黒猫' => array(
        ),
        '情報屋' => array(
        ),
        'アイドル' => array(
        ),
        'マスコミ' => array(
            'role' => 'ミスリーダー',
        ),
        '刑事' => array(
        ),
        '女子学生' => array(
            'role' => 'ウィッチ',
        ),
        '転校生' => array(
            'role' => 'メインラバーズ',
            'note' => '2日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '呪いの目覚め',
            'criminal' => '神社の群像',
        ),
        3 => array(
            'name' => '噂の御呪い',
            'criminal' => '転校生',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                1 => array(
                    '巫女' => '移動縦',
                ),
            ),
        ),
    ),
);
