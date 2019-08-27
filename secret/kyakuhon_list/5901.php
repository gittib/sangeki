<?

$oSangeki = (object)array(
    'title' => '世界線変動率 0.523307%',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'WM',
    'rule' => array(
        'だごん様の御言葉',
        '狂った真実 / 黄衣の王',
        '偉大なる種族',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '巫女' => array(
        ),
        '軍人' => array(
            'role' => 'ディープワン',
        ),
        '学者' => array(
            'role' => 'パラノイア',
        ),
        '情報屋' => array(
            'role' => 'カルティスト',
        ),
        '女子学生' => array(
            'role' => 'キーパーソン',
        ),
        'お嬢様' => array(
        ),
        '女の子' => array(
            'role' => 'シリアルキラー',
        ),
        '転校生' => array(
            'role' => 'タイムトラベラー',
            'note' => '3日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '学者',
        ),
        2 => array(
            'name' => '猟犬の嗅覚',
            'criminal' => '女の子',
        ),
        5 => array(
            'name' => '狂気殺人',
            'criminal' => '軍人',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                0 => '学者には不安カウンターを乗せる',
                1 => array(
                    'お嬢様' => '移動',
                    '学者' => '不安+1',
                ),
            ),
        ),
    ),
);
