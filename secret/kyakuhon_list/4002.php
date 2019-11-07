<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 5,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '恐慌と妄執と',
        '魔女の呪い',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '巫女' => array(
            'role' => 'シリアルキラー',
        ),
        '刑事' => array(
            'role' => 'ウィッチ',
        ),
        '大物' => array(
            'note' => '学校',
        ),
        '鑑識官' => array(
            'role' => 'ヴァンパイア',
        ),
        'マスコミ' => array(
            'role' => 'チキンハート',
        ),
        'サラリーマン' => array(
            'role' => 'ウィッチ',
        ),
        '教師' => array(
            'role' => 'ミスリーダー',
        ),
        '女子学生' => array(
            'role' => 'キーパーソン',
        ),
        'イレギュラー' => array(
            'role' => 'ゾンビ',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '立てこもり',
            'criminal' => '教師',
        ),
        2 => array(
            'name' => '行方不明',
            'criminal' => '大物',
        ),
        4 => array(
            'name' => '穢れの噴出',
            'criminal' => '神社の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "・キーパーソン呪って1勝\n・立てこもりで1勝\n・ゾンビで1勝\n\n呪いカードは必ず置く",
        'template' => array(
            '1ループ目' => array(
                0 => '都市に呪いカードを設置',
                1 => array(
                    '女子学生' => '移動横',
                ),
                2 => array(
                    'サラリーマン' => '友好禁止',
                ),
            ),
            '2ループ目' => array(
                0 => '都市に呪いカードを設置',
                1 => array(
                    'アイドル' => '不安+1',
                ),
            ),
            '3ループ目' => array(
                0 => '学校に呪いカードを設置',
                1 => array(
                    'イレギュラー' => '移動縦',
                ),
            ),
        ),
    ),
);
