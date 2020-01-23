<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'HSA',
    'rule' => array(
        '月夜の獣',
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
        ),
        '入院患者' => array(
        ),
        'サラリーマン' => array(
            'role' => 'ウェアウルフ',
        ),
        'マスコミ' => array(
            'role' => 'メインラバーズ',
        ),
        'A.I.' => array(
            'role' => 'ゴースト',
        ),
        '教師' => array(
            'role' => 'メインラバーズ',
        ),
        '委員長' => array(
        ),
        '男子学生' => array(
        ),
        '転校生' => array(
            'role' => 'シリアルキラー',
            'note' => '最終日',
        ),
    ),
    'incident' => array(
        2 => array(
            'name' => '穢れの噴出',
            'criminal' => '病院の群像',
        ),
        3 => array(
            'name' => '行方不明',
            'criminal' => '委員長',
        ),
        4 => array(
            'name' => '噂の御呪い',
            'criminal' => '神格',
        ),
        5 => array(
            'name' => '狂気の夜',
            'criminal' => '都市の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "非常に窮屈な脚本です。\n脚本家が正しい手順を踏む限り、主人公がループ抜けする事はできません。それにも関わらず、ルールや役職の手掛かりがほとんど手に入りません。\nただし、たった一つの突破口を突かれた瞬間、全ての情報が主人公の元へと集まります。\n脚本の構造に気づければ、3ループ目で全役職を突き止める事もできるでしょう。",
        'detail' => "勝利手段はウェアウルフの能力だけです。サラリーマンは絶対に死なせてはなりません。死亡要因はA.I.の友好能力による噂の御呪いと、シリアルキラーの能力の２つです。A.I.は友好禁止で止めるしかありませんが、シリアルキラーはテンプレに従って移動横を置けば確実にサラリーマンを保護できます。\n\n神格が出てきたら、噂の御呪いを起こされないよう注意して下さい。と言ってもマスコミがいるので、主人公に気づかれたらどうしようもありません。\nルールYのCSを頑張っておくと、ちょっとだけ悪あがきができるかも知れません。その場合はサラリーマンをヴァンパイアに見立て、都市へと暗躍を積むのがおすすめです。キーパーソン候補は教師が最有力でしょう。\n\nメインラバーズ2人が割れたら、暗躍を2枚同時置きしてさっさと最後の戦いへ行ってしまっても良いです。",
        'template' => array(
            '基本' => array(
                2 => array(
                    'A.I.' => '友好禁止',
                ),
                3 => array(
                    'A.I.' => '友好禁止',
                ),
                4 => array(
                    'A.I.' => '友好禁止',
                ),
                5 => array(
                    '転校生' => '移動横',
                ),
            ),
            '神格が出てきたら' => array(
                1 => array(
                    'マスコミ' => '友好禁止',
                ),
                2 => array(
                    'A.I.' => '友好禁止',
                ),
                3 => array(
                    'A.I.' => '友好禁止',
                ),
                4 => array(
                    'A.I.' => '友好禁止',
                ),
                5 => array(
                    '転校生' => '移動横',
                ),
            ),
        ),
    ),
);
