<?php

$oSangeki = (object)array(
    'title' => '無血の儀式',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'WM',
    'rule' => array(
        '血塗られた儀式',
        '不穏な噂',
        '見てしまった人々',
    ),
    'special_rule' => "神格は登場しない。",
    'loop' => 6,
    'day' => 4,
    'character' => array(
        '軍人' => array(
            'role' => 'イモータル',
        ),
        'A.I.' => array(
            'role' => 'ミスリーダー',
        ),
        'マスコミ' => array(
            'role' => 'ウィッチ',
        ),
        'アイドル' => array(
        ),
        '女子学生' => array(
        ),
        '教師' => array(
            'role' => 'モクゲキシャ',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '軍人',
        ),
        2 => array(
            'name' => '狂気殺人',
            'criminal' => 'アイドル',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "EXゲージがなかなか上がらない脚本です。Weird Mythologyらしさは無いため、WM初プレイには向きません。\n登場人物は極少ながら、直接役職を聞けるのはパーソンしかいません。しかし、主人公にとってはそれすらも重要な推理の材料となります。",
        'detail' => "EXゲージが上がったら脚本家は敗北します。マスコミの友好能力は絶対に使われてはなりません。友好禁止を全力で張り続けましょう。\n1ループ目は、狂気殺人でマスコミを殺害するのが目標です。殺害には失敗しても構いませんが、その場合は翌日以降も友好禁止を張り忘れないように。2ループ目以降は対処されるでしょうが、それでも手数を稼げるので、毎ループ狙いましょう。\nミスリーダーを使う場合、軍人を都市へ移動させるとフェイスレスに見せかけられます。\n\n軍人、A.I.、教師が担う役職については、主人公が正しく立ち回れば全て明かせるようになっています。特にモクゲキシャの能力を起動されると致命的です。軍人と教師が同一エリアに行かないよう気をつけましょう。不安-1も必要に応じて使って下さい。\n手が余るなら、神社と都市に暗躍カウンターを置いてCSを狙います。都市の方が優先度は高いですが、不穏な噂を使うかは主人公の推理状況に応じて判断しましょう。\n\n最後の戦いで隠す役職は、流れ次第です。学生のどちらかをブラフにする、軍人とA.I.と教師の組み合わせ、マスコミ＝ウィザード疑惑、辺りが狙い目になるかと思われます。",
        'template' => array(
            '各ループ共通' => array(
                1 => array(
                    'マスコミ' => '友好禁止',
                    'アイドル' => '不安+1',
                ),
                2 => array(
                    'マスコミ' => '友好禁止',
                    'アイドル' => '不安+1',
                ),
                3 => array(
                    'マスコミ' => '友好禁止',
                ),
                4 => array(
                    'マスコミ' => '友好禁止',
                ),
            ),
        ),
    ),
);