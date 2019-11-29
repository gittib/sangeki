<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 2,
    'set' => 'BTX',
    'rule' => array(
        '僕と契約しようよ！',
        '潜む殺人鬼',
        '因果の糸',
    ),
    'loop' => 4,
    'day' => 4,
    'character' => array(
        '巫女' => array(
        ),
        '入院患者' => array(
            'role' => 'フレンド',
        ),
        'サラリーマン' => array(
        ),
        '情報屋' => array(
        ),
        '女子学生' => array(
            'role' => 'キーパーソン',
        ),
        'お嬢様' => array(
            'role' => 'シリアルキラー',
        ),
        '男子学生' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => 'サラリーマン',
        ),
        2 => array(
            'name' => '自殺',
            'criminal' => '女子学生',
        ),
        4 => array(
            'name' => '蝶の羽ばたき',
            'criminal' => '巫女',
        ),
    ),
    'advice' => (object)array(
        'summary' => "",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '男子学生' => '移動',
                    '女子学生' => '暗躍+2'
                    '神社' => '暗躍+1'
                ),
            ),
        ),
    ),
);
