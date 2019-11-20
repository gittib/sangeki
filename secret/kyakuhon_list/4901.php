<?

$oSangeki = (object)array(
    'title' => 'シュタインズゲートの選択',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 7,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '魔女の呪い',
        '恐慌と妄執と',
    ),
    'special_rule' => "巫女は少女でなく少年として扱う。",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '巫女' => array(
            'role' => 'ウィッチ',
        ),
        '異世界人' => array(
            'role' => 'ミスリーダー',
        ),
        '軍人' => array(
        ),
        '大物' => array(
            'role' => 'ヴァンパイア',
            'note' => '学校',
        ),
        '情報屋' => array(
        ),
        'アイドル' => array(
        ),
        '女の子' => array(
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
            'name' => '呪いの目覚め',
            'criminal' => '学校の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '女子学生' => '暗躍+2',
                    '学校' => '暗躍+1',
                ),
            ),
        ),
    ),
);
