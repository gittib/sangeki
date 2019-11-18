<?

$oSangeki = (object)array(
    'title' => 'シュタインズゲートの選択',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 7,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '鍵たる少女',
        '話を聞かない人々',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '巫女' => array(
            'role' => 'ミカケダオシ',
        ),
        '異世界人' => array(
        ),
        '大物' => array(
            'role' => 'ヴァンパイア',
            'note' => '学校'
        ),
        '情報屋' => array(
            'role' => 'チキンハート',
        ),
        'アイドル' => array(
        ),
        '女の子' => array(
            'role' => 'ミスリーダー',
        ),
        '委員長' => array(
            'role' => 'キーパーソン',
        ),
        '女子学生' => array(
            'role' => 'キーパーソン',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '女の子',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '女子学生' => '移動横',
                ),
            ),
        ),
    ),
);
