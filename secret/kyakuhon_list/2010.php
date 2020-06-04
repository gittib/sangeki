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
    'day' => 4,
    'character' => array(
        '黒猫' => array(
        ),
        '異世界人' => array(
            'role' => 'マジシャン',
        ),
        '入院患者' => array(
            'role' => 'プロフェシー',
        ),
        'コピーキャット' => array(
            'role' => 'マジシャン',
        ),
        'サラリーマン' => array(
            'role' => 'ニンジャ',
        ),
        '女の子' => array(
            'role' => 'ミスリーダー',
        ),
        '男子学生' => array(
        ),
        '教師' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '男子学生',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '異世界人',
        ),
        3 => array(
            'name' => '陰謀工作',
            'criminal' => 'サラリーマン',
        ),
        4 => array(
            'name' => '自殺',
            'criminal' => '黒猫',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "動画化したい",
        'detail' => "サラリーマンの役職を聞かれたらプロフェシーと答えます。",
        'template' => array(
            '基本' => array(
                1 => array(
                    '男子学生' => '友好禁止',
                ),
                2 => array(
                    '異世界人' => '不安+1',
                ),
            ),
        ),
    ),
);
