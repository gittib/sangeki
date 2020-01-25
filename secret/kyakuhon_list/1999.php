<?

$oSangeki = (object)array(
    'title' => '未完成の脚本',
    'writer' => 'ペンスキー',
    'difficulity' => 1,
    'set' => 'MZ',
    'rule' => array(
        '封印されしもの',
        '通わぬ心',
        '不定因子χ',
    ),
    'loop' => 4,
    'day' => 4,
    'character' => array(
        '巫女' => array(
            'role' => 'カルティスト',
        ),
        '医者' => array(
            'role' => 'クロマク',
        ),
        'サラリーマン' => array(
            'role' => 'ファクター',
        ),
        'アイドル' => array(
            'role' => 'ミスリーダー',
        ),
        '女子学生' => array(
            'role' => 'マジシャン',
        ),
        '男子学生' => array(
        ),
    ),
    'incident' => array(
        2 => array(
            'name' => '不安拡大',
            'criminal' => '巫女',
        ),
        4 => array(
            'name' => '殺人事件',
            'criminal' => '女子学生',
        ),
    ),
    'advice' => (object)array(
        'summary' => "",
        'detail' => "",
        'victoryConditions' => array(
            array(
                'condition' => '巨大時限爆弾Xの存在',
                'way' => array(
                    'ウィッチの初期エリアに暗躍カウンターが2個以上',
                ),
            ),
        ),
        'template' => array(
        ),
    ),
);
