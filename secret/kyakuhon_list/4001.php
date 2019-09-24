<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'HSA',
    'rule' => array(
        '墓所より出でし者',
        '鍵たる少女',
        '魔女の呪い',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '異世界人' => array(
            'role' => 'キーパーソン',
        ),
        '黒猫' => array(
        ),
        'ナース' => array(
        ),
        '情報屋' => array(
        ),
        'アイドル' => array(
        ),
        'マスコミ' => array(
            'role' => 'ミスリーダー',
        ),
        '刑事' => array(
        ),
        '女子学生' => array(
            'role' => 'ウィッチ',
        ),
        '手先' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '邪気の汚染',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '噂の御呪い',
            'criminal' => 'アイドル',
        ),
        3 => array(
            'name' => '冒涜殺人',
            'criminal' => '異世界人',
        ),
        5 => array(
            'name' => '狂気の夜',
            'criminal' => '神社',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "手先は基本的に都市に配置します。\n1ループ目は呪いは置かず、初日で終わらせます。邪気の汚染でゾンビを湧かせてキーパーソンを殺害しましょう。綺麗に決まれば、キーパーソンの死亡原因はヴァンパイア・ナイトメア・シリアルキラー・ゾンビの4択となります。\n\n\n最後の戦いでは、ミスリーダー以外隠せる役職はありません。ミスリーダーはゾンビ化しないため、下手にゾンビを移動させて特定されることが無いように気をつけて下さい。",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '手先' => '不安+1',
                    'ナース' => '友好禁止',
                    '異世界人' => '暗躍+2',
                ),
            ),
            '2ループ目' => array(
                1 => array(
                    '女子学生' => '移動横',
                    '黒猫' => '移動縦',
                    'ナース' => '友好禁止',
                ),
            ),
        ),
    ),
);
