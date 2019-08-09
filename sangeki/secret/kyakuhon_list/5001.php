<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'WM',
    'rule' => array(
        '黄衣の王',
        '見てしまった人々',
        '無貌の神',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '異世界人' => array(
            'role' => 'ウィザード',
        ),
        '入院患者' => array(
        ),
        '刑事' => array(
        ),
        '女子学生' => array(
            'role' => 'カルティスト',
        ),
        '男子学生' => array(
        ),
        '教師' => array(
            'role' => 'ヒトハシラ',
        ),
        '手先' => array(
            'role' => 'フェイスレス',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '猟犬の嗅覚',
            'criminal' => '教師',
        ),
        5 => array(
            'name' => '病院の事件',
            'criminal' => '入院患者',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "ループ開始時のEXゲージによって、テンプレや注意事項が異なります。感応のまじない、フェイスレスの能力、手先の行動指針、その変遷に注意しましょう。\nまたルールの隠蔽も重要となります。",
        'detail' => "無貌の神は可能な限り隠します。よって手先をミスリーダーと誤認させつつ、ウィザードの存在を気取られないよう立ち回りましょう。\nまずEXゲージ1以下でループが開始した場合、脚本家は事件だけで確実に勝利できます。\n不安拡大を起こして入院患者に不安、教師に暗躍を置きましょう。フェイスレスのミスリーダー能力は必要に応じて使って下さい。翌日にテンプレに従う事で、病院と教師、どちらの暗躍が通ったとしても病院の事件で主人公は死亡します。\nループ開始時EXゲージ2の場合は注意が必要です。不安拡大を引き起こすため、手先の初期配置はミスリーダーいるエリアにします。\n\n最後の戦いでは、ヒトハシラかモクゲキシャを隠します。普通にループ消費ならヒトハシラの全滅能力は使って良いでしょう。逆に、発狂狙いならモクゲキシャの能力が有用です。どちらを使い、どちらを隠すかは状況に応じて判断して下さい。",
        'template' => array(
            '開始時EX 1以下' => array(
                1 => array(
                    '手先' => '不安+1',
                ),
                2 => array(
                    '病院' => '暗躍+2',
                    '教師' => '暗躍+1',
                ),
            ),
            '開始時EX 1かつ手先に友好+2' => array(
                1 => array(
                    '手先' => '友好禁止',
                ),
                2 => array(
                    '病院' => '暗躍+2',
                    '教師' => '暗躍+1',
                ),
            ),
            '開始時EX 2' => array(
                0 => '手先はミスリーダーの初期エリアに配置する',
                1 => array(
                    '手先' => '不安+1',
                ),
            ),
            '開始時EX 3' => array(
                1 => array(
                ),
            ),
        ),
    ),
);
