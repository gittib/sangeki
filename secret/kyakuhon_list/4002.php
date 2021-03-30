<?php

$oSangeki = (object)array(
    'title' => '全てが終わったその後に',
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'HSA',
    'rule' => array(
        '呪われし地',
        '怪物の暗躍',
        '魔女の呪い',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 6,
    'character' => array(
        '巫女' => array(
            'role' => 'ミスリーダー',
            'sg' => '漆原るか',
        ),
        '異世界人' => array(
            'sg' => '阿万音鈴羽',
        ),
        '入院患者' => array(
            'role' => 'ミカケダオシ',
            'sg' => 'ダル',
        ),
        '軍人' => array(
            'sg' => 'Mr.ブラウン',
        ),
        'アイドル' => array(
            'sg' => 'フェイリス',
        ),
        '情報屋' => array(
            'sg' => '桐生萌郁',
        ),
        '女の子' => array(
            'role' => 'ウィッチ',
            'sg' => '天王寺綯',
        ),
        '委員長' => array(
            'sg' => '牧瀬紅莉栖',
        ),
        '女子学生' => array(
            'sg' => '椎名まゆり',
        ),
        '転校生' => array(
            'role' => 'ゴースト',
            'note' => '6日目',
            'sg' => '比屋定真帆',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '遂行者',
            'criminal' => '女の子',
        ),
        2 => array(
            'name' => '邪気の汚染',
            'criminal' => '異世界人',
        ),
        3 => array(
            'name' => '穢れの噴出',
            'criminal' => '学校の群像',
        ),
        4 => array(
            'name' => '噂の御呪い',
            'criminal' => '入院患者',
        ),
        5 => array(
            'name' => '死者の黙示録',
            'criminal' => '病院の群像',
        ),
        6 => array(
            'name' => '狂気の夜',
            'criminal' => '神社の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "かなり理不尽な脚本なので、許してくれる寛容な主人公相手に披露して下さい。\n脚本家が正しい手順を踏む限り、全てのループにおいて主人公は5日目までに敗北します。そして転校生が登場するのは6日目です。\nつまり主人公は、転校生の存在を1度も見ないまま最後の戦いに挑まねばなりません。",
        'detail' => "呪われし地と魔女の呪いによる呪いカードは置いてはいけません。逆に怪物の暗躍は一切隠さずフル活用します。\n毎ループ必ず、初日と2日目に怪物の暗躍を使い、学校へ暗躍カウンターを積んでください。これにより穢れの噴出を起こし、不安を入院患者へ、暗躍を病院へ積みます。そして4日目に噂の御呪いを起こして下さい。翌日に死者の黙示録が確定で発生し、病院の呪いを受け取れるキャラクターが居なくなります。これで勝利確定です。\nここで軍人が死なないように立ち回ると、ヴァンパイアへのCSになります。少なくとも1ループ目では殺されないように、なるべく頑張って下さい。\n\n遂行者は脚本家にとって大きな脅威となります。\n入院患者が殺されると脚本が崩壊するので、初日に不安カウンターが2個置かれないように注意してください。軍人は必ずケアしましょう。\n\n最後の戦いでは、もちろんゴーストを隠します。死者の黙示録発生後にゴーストの能力が起動するタイミングは無いため、病院へ人を集められても問題はありません。\n\nちなみに、軍人の友好5能力を使われるとゲームセットです。アイドルもいるため、軍人に友好カウンターが2個乗った時点で、ほぼほぼ友好禁止を鉄板張りする事になります。",
        'template' => array(
            '各ループ共通' => array(
                0 => '呪いカードは置かない',
                1 => array(
                    '軍人' => '友好禁止',
                ),
                4 => array(
                    '入院患者' => '不安+1',
                ),
            ),
        ),
    ),
);
