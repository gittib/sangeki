<?

$oSangeki = (object)array(
    'title' => 'サラリーマンがぴょんぴょんするんじゃぁ^～',
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'UM',
    'rule' => array(
        '復讐者の誓い',
        '問題児の苦悩',
        'マスヒュプノスの合図',
    ),
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '黒猫' => array(
        ),
        '神格' => array(
            'role' => 'アベンジャー',
            'note' => '1ループ目',
            'initPos' => '神社',
        ),
        '入院患者' => array(
        ),
        'マスコミ' => array(
            'role' => 'トラブルメイカー',
        ),
        'サラリーマン' => array(
            'role' => 'センドウシャ',
        ),
        '手先' => array(
            'role' => 'ミスリーダー',
            'initPos' => '都市',
        ),
        '委員長' => array(
            'role' => 'フレンド',
        ),
        '教師' => array(
        ),
        '転校生' => array(
            'role' => 'フレンド',
            'note' => '3日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '不法投棄',
            'criminal' => '入院患者',
        ),
        3 => array(
            'name' => '遂行者',
            'criminal' => '神格',
        ),
        4 => array(
            'name' => '告発',
            'criminal' => 'マスコミ',
        ),
        5 => array(
            'name' => '丑の刻参り',
            'criminal' => 'サラリーマン',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "UMならではの役職を存分に活用した脚本です。\nEXゲージを高める強制能力がとても誘発しやすく、1ループ目を中心に序盤は圧倒的な絶望感を叩きつけられるでしょう。\nパズル的な側面が強いため、1対1で遊んでも良いかも知れません。",
        'detail' => "最後の戦いは運ゲーなので、最初にループ抜け推奨と伝えてしまっても良いでしょう。\n\nとりあえず不安拡大が起これば脚本家勝利が確定します。不安を女の子へ、暗躍を神格へ載せましょう。翌日に怨嗟の雄叫びを確実に起こし、3日目にアベンジャーへの暗躍+2を確実に通します。さらにEXゲージも1上昇するため、アベンジャーの主人公殺害能力が使えるようになります。アベンジャーを隠す場合は丑の刻参りで主人公を殺害して下さい。\n\n2ループ目はイレイザーによる即死で終わらせます。友好+1の無視を先取りされないよう、教師は初日に移動させても良いでしょう。主人公らが自らケアしてくれる可能性も高いですが。\n\nイレイザーによる勝利は1ループしか見込めませんが、不死を活用して入院患者の役職隠しに一役買います。不死かつ主人公が触れられないキャラクターなので、都市か神社へ置く事で入院患者がスナイパーかどうか分からなくなります。",
        'victoryConditions' => array(
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    'アベンジャーの能力',
                    '丑の刻参り',
                ),
            ),
            array(
                'condition' => '復讐者の誓い',
                'way' => array(
                    'アベンジャーが犯人の事件を起こす',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    'アベンジャーの能力',
                    '遂行者',
                ),
            ),
        ),
        'template' => array(
            '基本' => array(
                0 => '手先は神社に配置',
                1 => array(
                    '神社' => '暗躍+1',
                    '手先' => '不安+1',
                    '女の子' => '不安+1',
                ),
                2 => array(
                    '神社' => '暗躍+1',
                    '女の子' => '不安+1',
                    '情報屋' => '不安+1',
                ),
                3 => array(
                    '神社' => '暗躍+1',
                    '情報屋' => '不安+1',
                ),
                4 => array(
                    '神社' => '暗躍+1',
                    '異世界人' => '不安+1',
                ),
                5 => array(
                    '神社' => '暗躍+1',
                    '異世界人' => '不安+1',
                    'イレギュラー' => '移動横',
                ),
            ),
            '不安拡大が発生した場合' => array(
                0 => '手先は神社に配置',
                1 => array(
                    '神社' => '暗躍+1',
                    '手先' => '不安+1',
                    '女の子' => '不安+1',
                ),
                2 => array(
                    '女の子' => '不安+1',
                    '情報屋' => '不安+1',
                ),
                3 => array(
                    '神社' => '暗躍+1',
                    '情報屋' => '暗躍+2',
                ),
            ),
            '2ループ目' => array(
                0 => '手先は神社に配置',
                1 => array(
                    '委員長' => '移動',
                ),
            ),
        ),
    ),
);
