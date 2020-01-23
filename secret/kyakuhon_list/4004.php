<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '恋愛風景',
        '一癖あるヤツラ',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'role' => 'ラバーズ',
            'note' => '3ループ目',
        ),
        '黒猫' => array(
            'role' => 'シリアルキラー',
        ),
        '異世界人' => array(
            'role' => 'キーパーソン',
        ),
        '入院患者' => array(
            'role' => 'メインラバーズ',
        ),
        'サラリーマン' => array(
            'role' => 'ヴァンパイア',
        ),
        'マスコミ' => array(
            'role' => 'メインラバーズ',
        ),
        'A.I.' => array(
            'role' => 'ミスリーダー',
        ),
        '教師' => array(
        ),
        'お嬢様' => array(
            'role' => 'ゴースト',
        ),
        '男子学生' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '呪いの目覚め',
            'criminal' => '神社の群像',
        ),
        4 => array(
            'name' => '噂の御呪い',
            'criminal' => '神格',
        ),
        5 => array(
            'name' => '行方不明',
            'criminal' => 'ヴァンパイア',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
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
            '2ループ目以降' => array(
                0 => '都市に呪いカードを設置',
            ),
        ),
    ),
);
