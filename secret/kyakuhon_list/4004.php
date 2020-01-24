<?

$oSangeki = (object)array(
    'title' => '神のみぞ知る真相',
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
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
            'role' => 'メインラバーズ',
        ),
        '入院患者' => array(
        ),
        'サラリーマン' => array(
            'role' => 'ヴァンパイア',
        ),
        'マスコミ' => array(
        ),
        'A.I.' => array(
            'role' => 'ゴースト',
        ),
        '教師' => array(
            'role' => 'メインラバーズ',
        ),
        '委員長' => array(
            'role' => 'キーパーソン',
        ),
        '女子学生' => array(
        ),
        '転校生' => array(
            'role' => 'シリアルキラー',
            'note' => '最終日',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '冒涜殺人',
            'criminal' => '入院患者',
        ),
        2 => array(
            'name' => '噂の御呪い',
            'criminal' => '神格',
        ),
        3 => array(
            'name' => '穢れの噴出',
            'criminal' => '神社の群像',
        ),
        4 => array(
            'name' => '行方不明',
            'criminal' => 'マスコミ',
        ),
        5 => array(
            'name' => '狂気の夜',
            'criminal' => '都市の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "非常に窮屈な脚本です。\n脚本家が正しい手順を踏む限り、主人公がループ抜けする事はできません。それにも関わらず強固なCSに守られ、ルールや役職の手掛かりがほとんど手に入りません。\nただし、たった一つの突破口を突かれた瞬間、ほとんど全ての情報が主人公の元へと集まります。\n脚本の真実に気づければ、3ループ目で全役職を突き止める事もできるでしょう。",
        'detail' => "月夜の獣へのCSも行うため、サラリーマンには行動カードを一切セットしないようにして下さい。\n\n勝利手段はヴァンパイアによる主人公殺害能力だけです。キーパーソンとメインラバーズ2人もいますが、これは隠すべき役職なので放置します。\n\n穢れの噴出と行方不明で確実に都市へ暗躍２を積めるので、全ループそれで勝利して下さい。その上で、サラリーマンの不死を隠し通しつつ狂気の夜に合わせて主人公を殺害する必要があります。\n\nCS崩壊の脅威となる殺害能力は、A.I.とシリアルキラーと神格が起こす噂の御呪いの３つです。\nこの内A.I.は友好禁止で、シリアルキラーはテンプレに従って移動横を置くことで、それぞれサラリーマンを保護できます。神格の噂の御呪いが発生したら、サラリーマンの不死を確認するまでもなく致命傷なのでどの道影響はありません。\n\n最後の戦いではキーパーソンを隠します。候補は委員長のほか、教師、女子学生の3択です。\n神格が死亡していたとしてもキーパーソンだけは隠せるので、可能な限り頑張って下さい。頑張れとしか言えませんが。",
        'template' => array(
            '基本' => array(
                1 => array(
                    '神社' => '暗躍+1',
                    '都市' => '暗躍+2',
                    'A.I.' => '友好禁止',
                ),
                2 => array(
                    'A.I.' => '友好禁止',
                ),
                3 => array(
                    'A.I.' => '友好禁止',
                ),
                4 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                ),
                5 => array(
                    '転校生' => '移動横',
                ),
            ),
            '神格が出てきたら' => array(
                1 => array(
                    '神社' => '暗躍+1',
                    '都市' => '暗躍+2',
                    '神格' => '友好禁止',
                ),
                2 => array(
                    'A.I.' => '友好禁止',
                    '神格' => '不安-1',
                ),
                3 => array(
                    'A.I.' => '友好禁止',
                ),
                4 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                ),
                5 => array(
                    '転校生' => '移動横',
                ),
            ),
        ),
    ),
);
