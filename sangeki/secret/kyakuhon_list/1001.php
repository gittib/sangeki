<?

$oSangeki = (object)array(
    'title' => '迷惑な友人',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 3,
    'set' => 'BTX',
    'rule' => array(
        '殺人計画',
        '潜む殺人鬼',
        '因果の糸',
    ),
    'loop' => 4,
    'day' => 4,
    'character' => array(
        '医者' => array(
            'role' => 'シリアルキラー',
        ),
        '巫女' => array(
        ),
        'サラリーマン' => array(
            'role' => 'フレンド',
        ),
        'アイドル' => array(
            'role' => '',
        ),
        '男子学生' => array(
            'role' => '',
        ),
        '女子学生' => array(
            'role' => '',
        ),
    ),
    'incident' => array(
        2 => array(
            'name' => '不安拡大',
            'criminal' => 'サラリーマン',
        ),
        3 => array(
            'name' => '行方不明',
            'criminal' => 'アイドル',
        ),
        4 => array(
            'name' => '殺人事件',
            'criminal' => '巫女',
        ),
    ),
    'advice' => (object)array(
        'summary' => "簡単な脚本です。序盤はシリアルキラーと因果の糸で圧倒的な動きを見せますが、情報もボロボロ落ちるのであっという間に詰めの段階に入ります。",
        'detail' => "",
    ),
);
