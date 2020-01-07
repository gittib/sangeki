<?

$oSangeki = (object)array(
    'title' => 'サラリーマンがぴょんぴょんするんじゃぁ^～',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'UM',
    'rule' => array(
        '復讐者の誓い',
        '戻らぬ子どもたち',
        'マスヒュプノスの合図',
    ),
    'loop' => 5,
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
        '情報屋' => array(
            'role' => 'パイドパイパー',
        ),
        'マスコミ' => array(
            'role' => 'フレンド',
        ),
        'サラリーマン' => array(
            'role' => 'センドウシャ',
        ),
        '手先' => array(
            'initPos' => '都市',
        ),
        'お嬢様' => array(
        ),
        'イレギュラー' => array(
            'role' => 'イレイザー',
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
            'criminal' => '情報屋',
        ),
        5 => array(
            'name' => '丑の刻参り',
            'criminal' => 'サラリーマン',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "UMならではの役職を存分に活用した脚本です。\nEXゲージを高める強制能力がとても誘発しやすく、1ループ目を中心に序盤は圧倒的な絶望感を叩きつけられるでしょう。\nパズル的な側面が強いため、1対1で遊んでも良いかも知れません。",
        'detail' => "手先はどのループでも都市へ配置して下さい。\n基本は丑の刻参りでの勝利を目指します。黒猫がいるので神社への暗躍はあと1つ置けば準備完了です。不安拡大が起これば不法投棄を確実に起こせる上、不法投棄が起これば丑の刻参りの準備完了です。それら全ての事件において、センドウシャが大活躍します。隠すのはほぼ不可能なので、最初からガンガン使いましょう。\n遂行者で丑の刻参りを止めようとも、犯人がアベンジャーなので起こしたら主人公は敗北します。\n\n2ループ目はイレイザーで即終了させます。こいつが隠すべき役職は自分自身ではなく入院患者なので、主人公に時間を与える必要はありません。\n\n告発は起こさない方が良いです。3日目にアベンジャーへ暗躍+1を張ることで、アベンジャーによる主人公殺害を狙えますが、安定しない上にルールが割れてしまいます。\n\n最後の戦いでは、スナイパーがいるかどうかを焦点にします。最終日にイレギュラーを神社か都市へ送ることで、入院患者がスナイパーかパーソンか判別不能になります。情報屋の友好能力は絶対に使われないよう気をつけて下さい。\n\n\nちなみに怪しい脚本名が付いてますが、これは主人公の勝利手順に関係しています。\n脚本家は基本的に、当日翌日の犯人に不安+1と神社に暗躍+1を置き続けるのですが、丑の刻参り以外は不安-1を1枚張られれば止められてしまいます。これを防ぐためにセンドウシャがいますが、適切に移動させられると事件発生は回避できるようになっています。\n主人公がそこに気づけば、サラリーマンは病院へ行ってからまた都市へ戻ってくるでしょう。",
        'victoryConditions' => array(
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    'アベンジャーの能力',
                    'イレイザーの能力',
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
                    '入院患者' => '不安+1',
                ),
                2 => array(
                    '神社' => '暗躍+1',
                    '入院患者' => '不安+1',
                    '神格' => '不安+1',
                ),
                3 => array(
                    '神社' => '暗躍+1',
                    '神格' => '不安+1',
                ),
                4 => array(
                    '神社' => '暗躍+1',
                    'サラリーマン' => '不安+1',
                ),
                5 => array(
                    '神社' => '暗躍+1',
                    'サラリーマン' => '不安+1',
                    'イレギュラー' => '移動横',
                ),
            ),
        ),
    ),
);
