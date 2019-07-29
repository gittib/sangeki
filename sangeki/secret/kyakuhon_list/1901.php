<?

$oSangeki = (object)array(
    'title' => '悪辣なる報道',
    'writer' => 'ペンスキー',
    'difficulity' => 8,
    'set' => 'BTX',
    'rule' => array(
        '殺人計画',
        '潜む殺人鬼',
        '因果の糸',
    ),
    'special_rule' => "",
    'loop' => 6,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'note' => '最終ループ',
        ),
        '入院患者' => array(
        ),
        '軍人' => array(
        ),
        '大物' => array(
            'note' => '学校',
            'role' => 'キラー',
        ),
        'A.I.' => array(
            'role' => 'シリアルキラー',
        ),
        'マスコミ' => array(
            'role' => 'フレンド',
        ),
        'サラリーマン' => array(
            'role' => 'キーパーソン',
        ),
        '委員長' => array(
        ),
        'お嬢様' => array(
        ),
        '転校生' => array(
            'role' => 'クロマク',
            'note' => '3日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '自殺',
            'criminal' => 'サラリーマン',
        ),
        2 => array(
            'name' => '蝶の羽ばたき',
            'criminal' => '神格',
        ),
        3 => array(
            'name' => '不安拡大',
            'criminal' => 'マスコミ',
        ),
        4 => array(
            'name' => '遠隔殺人',
            'criminal' => '転校生',
        ),
        5 => array(
            'name' => '流布',
            'criminal' => 'お嬢様',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "非常に理不尽な脚本です。6ループと一見長く見えますが、主人公に与えられた猶予は思いのほか短いです。\n最後の戦いは運ゲーになるためループ抜け推奨ですが、脚本の全容を把握した上で完璧なカード配置を求められます。",
        'detail' => "3ループ目まで、脚本家の勝利手段が厳密に定められています。これに従うことで、ループを追うごとに主人公に絶望を叩きつけられます。\n\n・1ループ目：シリアルキラーによるフレンドの殺害\n・2ループ目：キーパーソンの自殺\n・3ループ目以降：遠隔殺人でPP\n\n1,2ループ目は準備の時間です。テンプレに従う事で3ループ目以降に凶悪なPPを仕掛けられます。ただし、1ループ目にサラリーマンへ友好カウンターが置かれないと脚本が瓦解します。大物へ友好禁止を張り続け、サラリーマンの能力使用を促しましょう。\n3ループ目、ここからが本番です。これ以降毎日A.I.へ友好禁止と、マスコミへ不安+1を張り続け、不安拡大を引き起こします。その不安を転校生へ、暗躍をサラリーマンへ乗せましょう。翌日にテンプレに従う事で、遠隔殺人で確実に勝利できます。なお、マスコミとサラリーマンへ暗躍を積むムーブは4日目でなくとも構いません。マスコミに不安-1が張られなかったら、翌日に暗躍を準備してしまいましょう。そうする事で、4日目もA.I.に友好禁止を張れます。\n4ループ目は流布の発生を狙います。4ループ目以降に流布が起きれば、サラリーマンへ友好水増しからループ抜けのチャンスを失わせる事ができます。\n最後の戦いではキラーを隠します。大物の友好能力は拒否してはなりません。".
                    "\n\n主人公の勝ち方は、A.I.によって流布を起こし、マスコミから友好カウンターを取り去る事です。そのための手順は以下の通り。\nまず2日目までマスコミに不安-1を積み、お嬢様に友好を3つ乗せる。\nそして3日目にお嬢様が神社にいないようにし、転校生にカードが置かれていれば不安-1を張っておく。この間にサラリーマンに暗躍が乗ってはならないため、3日目までサラリーマンに暗躍禁止を張り続ける。ただし、サラリーマンがフリーだったらA.I.へ友好+1を試す。\nすると脚本家は4日目のテンプレに従わねばならず、A.I.とお嬢様がフリーになるため、一気にA.I.の友好能力が使えるようになる。なお、ここでマスコミへ暗躍禁止を張る事で流布をケアできる。\n以上、ここでマスコミから友好カウンターを取り除く事で、次のループでは不安拡大をほぼ確実に封じる事ができます。ここまで来れば主人公の勝利はほぼ確実となります。",
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '大物' => '友好禁止',
                    '神社' => '暗躍+1',
                ),
                2 => array(
                    'サラリーマン' => '移動縦',
                    '大物' => '移動横',
                ),
                3 => array(
                    '大物' => '友好禁止',
                ),
                4 => array(
                    '大物' => '友好禁止',
                ),
                5 => array(
                    '大物' => '友好禁止',
                ),
            ),
            '2ループ目' => array(
                1 => array(
                    'サラリーマン' => '不安+1',
                    'A.I.' => '移動斜め',
                    '神社' => '暗躍+2',
                ),
            ),
            '3ループ目' => array(
                1 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                    'サラリーマン' => '暗躍+1',
                ),
                2 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                    'お嬢様' => '移動縦',
                ),
                3 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                    '転校生' => '移動縦',
                ),
                4 => array(
                    '転校生' => '不安+1',
                    'サラリーマン' => '暗躍+1',
                    'マスコミ' => '暗躍+2',
                ),
            ),
            '主人公の勝ち筋(脚本家の手筋ではありません)' => array(
                1 => array(
                    'マスコミ' => '不安-1',
                    'お嬢様' => '友好+2',
                    'サラリーマン' => '暗躍禁止',
                ),
                2 => array(
                    'マスコミ' => '不安-1',
                    'お嬢様' => '友好+1',
                ),
                3 => array(
                    '転校生' => '不安-1',
                    '委員長' => '友好+2',
                    'お嬢様' => '都市へ移動',
                ),
                4 => array(
                    'マスコミ' => '暗躍禁止',
                    'A.I.' => '友好+2',
                    'お嬢様' => '都市へ移動',
                ),
            ),
        ),
    ),
);
