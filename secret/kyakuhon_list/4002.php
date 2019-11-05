<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '魔女の呪い',
        '恐慌と妄執と',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 4,
    'character' => array(
        '神格' => array(
            'note' => '4ループ目',
        ),
        '巫女' => array(
            'role' => 'キーパーソン',
        ),
        '鑑識官' => array(
            'role' => 'ヴァンパイア',
        ),
        'マスコミ' => array(
        ),
        'サラリーマン' => array(
            'role' => 'ウィッチ',
        ),
        'アイドル' => array(
            'role' => 'ミスリーダー',
        ),
        '委員長' => array(
            'role' => 'チキンハート',
        ),
        '教師' => array(
            'role' => 'シリアルキラー',
        ),
        'イレギュラー' => array(
            'role' => 'ゾンビ',
        ),
        '転校生' => array(
            'role' => 'ウィッチ',
            'note' => '2日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '立てこもり',
            'criminal' => 'アイドル',
        ),
        3 => array(
            'name' => '穢れの噴出',
            'criminal' => '神社の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "・キーパーソン呪って1勝\n・シリアルキラーで1勝\n・ゾンビ呪って1勝\n・立てこもりで1勝\n\n呪いカードは必ず学校に置く",
        'template' => array(
            '1ループ目' => array(
                0 => '学校に呪いカードを設置',
                1 => array(
                    'サラリーマン' => '暗躍+1',
                ),
                2 => array(
                    'サラリーマン' => '友好禁止',
                ),
            ),
            '2ループ目' => array(
                0 => '学校に呪いカードを設置',
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
