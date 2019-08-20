<?

$oSangeki = (object)array(
    'title' => '不穏な噂 ver.MC',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'MCX',
    'rule' => array(
        '黒の学園',
        '絶対の意思',
        '双子のトリック',
    ),
    'special_rule' => "脚本家は移動斜めを使えない。",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '入院患者' => array(
            'role' => 'ツイン',
        ),
        '軍人' => array(
        ),
        'マスコミ' => array(
        ),
        'A.I.' => array(
            'role' => 'パラノイア',
        ),
        'サラリーマン' => array(
            'role' => 'クロマク',
        ),
        '刑事' => array(
        ),
        '教師' => array(
            'role' => 'ゼッタイシャ',
        ),
    ),
    'incident' => array(
        3 => array(
            'name' => '不安拡大',
            'criminal' => '教師',
        ),
        4 => array(
            'name' => 'テロリズム',
            'criminal' => '入院患者',
        ),
        5 => array(
            'name' => '病院の事件',
            'criminal' => 'A.I.',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "",
        'detail' => "",
        'template' => array(
            '各ループ共通' => array(
                2 => array(
                    '都市' => '暗躍+',
                    '病院' => '暗躍+',
                ),
            ),
        ),
    ),
);
