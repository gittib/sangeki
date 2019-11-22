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
        '学者' => array(
            'role' => 'ウィッチ',
        ),
        'A.I.' => array(
            'role' => 'メインラバーズ',
        ),
        '情報屋' => array(
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
        4 => array(
            'name' => '不安拡大',
            'criminal' => 'A.I.',
        ),
        5 => array(
            'name' => '行方不明',
            'criminal' => '巫女',
        ),
    ),
    'advice' => (object)array(
        'notice' => "プロモーションカード「女の子」と「学者」を使用します。\n無い場合は「お嬢様」と「医者」で代用可能です。",
        'summary' => "",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                0 => '呪いカードは置かない',
                1 => array(
                    '女子学生' => '暗躍+2',
                    '学校' => '暗躍+1',
                    'アイドル' => '不安+1',
                ),
            ),
        ),
    ),
);
