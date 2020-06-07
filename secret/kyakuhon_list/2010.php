<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 6,
    'set' => 'MZ',
    'rule' => array(
        '漢の戦い',
        '滅亡を謳うもの',
        '通わぬ心',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '黒猫' => array(
            'role' => 'ミスリーダー',
        ),
        '異世界人' => array(
        ),
        '教祖' => array(
        ),
        '大物' => array(
            'role' => 'プロフェシー',
            'note' => '病院',
        ),
        'アイドル' => array(
            'role' => 'マジシャン',
        ),
        'マスコミ' => array(
        ),
        'サラリーマン' => array(
            'role' => 'ニンジャ',
        ),
        'お嬢様' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '異世界人',
        ),
        3 => array(
            'name' => '不安拡大',
            'criminal' => 'アイドル',
        ),
        4 => array(
            'name' => '陰謀工作',
            'criminal' => 'サラリーマン',
        ),
        5 => array(
            'name' => '自殺',
            'criminal' => '黒猫',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "",
        'detail' => "サラリーマンの役職を聞かれたらプロフェシーと答えます。",
        'template' => array(
            '基本' => array(
                1 => array(
                    '黒猫' => '友好禁止',
                    '異世界人' => '不安+1',
                ),
                2 => array(
                    'アイドル' => '不安+1',
                ),
                3 => array(
                    'アイドル' => '不安+1',
                ),
            ),
        ),
    ),
);
