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
        '恋愛風景',
    ),
    'special_rule' => "巫女は少女でなく少年として扱う。",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '巫女' => array(
            'role' => 'ヴァンパイア',
        ),
        '異世界人' => array(
            'role' => 'ミスリーダー',
        ),
        '軍人' => array(
        ),
        'A.I.' => array(
            'role' => 'メインラバーズ',
        ),
        '情報屋' => array(
            'role' => 'ウィッチ',
        ),
        'アイドル' => array(
            'role' => 'ラバーズ',
        ),
        '女の子' => array(
        ),
        '委員長' => array(
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
        3 => array(
            'name' => '噂の御呪い',
            'criminal' => 'アイドル',
        ),
        5 => array(
            'name' => '行方不明',
            'criminal' => '女子学生',
        ),
    ),
    'advice' => (object)array(
        'notice' => 'プロモーションカード「女の子」を使用します。',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '女子学生' => '暗躍+2',
                    '学校' => '暗躍+1',
                    'アイドル' => '不安+1',
                ),
            ),
        ),
    ),
);
