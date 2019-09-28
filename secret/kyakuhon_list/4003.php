<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'HSA',
    'rule' => array(
        '墓所より出でし者',
        '恋愛風景',
        '魔女の呪い',
    ),
    'special_rule' => "・各ループ開始時、EXゲージは5になる。\n・EXゲージが5以上の時、リーダーは友好カウンターが不足していても友好能力の使用を宣言できる。その場合、拒否または解決後に友好の不足分だけEXゲージが減少する。\n・EXゲージが4以下の時、全てのキャラクターはウィッチとキーパーソンの能力を得る。\n・友好能力が無視されたとき、そのコスト分だけEXゲージが増加する。",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '異世界人' => array(
        ),
        'マスコミ' => array(
        ),
        '女の子' => array(
            'role' => 'ラバーズ',
        ),
        '転校生' => array(
            'role' => 'メインラバーズ',
            'note' => '2日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '',
            'criminal' => '',
        ),
        2 => array(
            'name' => '噂の御呪い',
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
                    '女の子' => '不安+1',
                ),
            ),
        ),
    ),
);
