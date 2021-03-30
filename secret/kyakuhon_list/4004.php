<?php

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
            'note' => '2ループ目',
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
        ),
        '女子学生' => array(
            'role' => 'キーパーソン',
        ),
        '転校生' => array(
            'role' => 'シリアルキラー',
            'note' => '最終日',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '冒涜殺人',
            'criminal' => '女子学生',
        ),
        2 => array(
            'name' => '穢れの噴出',
            'criminal' => '神社の群像',
        ),
        3 => array(
            'name' => '噂の御呪い',
            'criminal' => '神格',
        ),
        4 => array(
            'name' => '行方不明',
            'criminal' => 'マスコミ',
        ),
        5 => array(
            'name' => '狂気の夜',
            'criminal' => '病院の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "非常に窮屈な脚本です。\n脚本家が正しい手順を踏む限り、主人公がループ抜けする事はできません。それにも関わらず強固なCSに守られ、ルールや役職の手掛かりがほとんど手に入りません。\nただし、たった一つの突破口を突かれた瞬間、ほとんど全ての情報が主人公の元へと集まります。",
        'detail' => "月夜の獣へのCSも行うため、サラリーマンには行動カードを一切セットしないようにして下さい。\n\n勝利手段はヴァンパイアによる主人公殺害能力だけです。キーパーソンとメインラバーズ2人もいますが、これは隠すべき役職なので勝利手段に使ってはいけません。\n\n穢れの噴出と行方不明で確実に都市へ暗躍２を積めるので、全ループそれで勝利して下さい。その上で、サラリーマンの不死を隠し通しつつ狂気の夜に合わせて主人公を殺害する必要があります。\n\nCS崩壊の脅威となる殺害能力は、A.I.の友好能力とシリアルキラーの２つです。\nこの内A.I.は友好禁止で、シリアルキラーはテンプレに従って移動横を置くことで、それぞれサラリーマンを保護できます。\n神格の噂の御呪いでも呪いカードが発生しますが、事件発生した時点で致命傷なのでどの道影響はありません。\n\n最後の戦いではキーパーソンを隠します。候補は委員長、女子学生の2択です。\n神格が死亡していたとしてもキーパーソンだけは隠せるので、可能な限り頑張って下さい。ほぼ不可能とは思いますが。。\n\n\n・噂の御呪いの起こし方\nこの脚本では、噂の御呪いが全ての鍵となっています。そして、主人公が気づければ確実に事件を起こす事ができます。\n\n重要となるのが、2日目は脚本家が暗躍に2手割かなければならない事です。つまり、AI.マスコミ神格のうち、2人にはカードすら置かれません。\n\nまず前提条件として、初日にA.I.への友好+1かマスコミへの友好+2、どちらかを通す必要があります。\n次に2日目、A.I.マスコミ神格のうち、脚本家行動カードを置かれていないキャラに下記のテンプレの通りにカードを置きます。残る1手は都市への暗躍禁止となります。\nA.I.と神格が通れば穢れの噴出と不安+1手置きで不安臨界達成です。\nマスコミと神格なら不安2で3日目を迎えますが、不安+1とマスコミでやはり不安臨界達成できます。\n最後にA.I.とマスコミが通った場合。これも穢れの噴出とマスコミの能力で2日目に不安臨界達成できます。\n\n都市への暗躍を禁止されれば、ヴァンパイアが動き出すのは4日目。3日目の噂の御呪いには間に合いません。",
        'template' => array(
            '神格が出てくる前' => array(
                1 => array(
                    'A.I.' => '友好禁止',
                ),
                2 => array(
                    'A.I.' => '友好禁止',
                    '神社' => '暗躍+1',
                    '都市' => '暗躍+2',
                ),
                3 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                ),
                4 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                ),
                5 => array(
                    'A.I.' => '友好禁止',
                    '転校生' => '移動横',
                ),
            ),
            '神格が出てきたら' => array(
                1 => array(
                    'A.I.' => 'ブラフ',
                    '神格' => '友好禁止',
                ),
                2 => array(
                    'A.I.' => '友好禁止',
                    '神社' => '暗躍+1',
                    '都市' => '暗躍+2',
                ),
                3 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                ),
                4 => array(
                    'A.I.' => '友好禁止',
                    'マスコミ' => '不安+1',
                ),
                5 => array(
                    'A.I.' => '友好禁止',
                    '転校生' => '移動横',
                ),
            ),
            '噂の御呪いの起こし方' => array(
                1 => array(
                    'A.I.' => '友好+1',
                    'マスコミ' => '友好+2',
                ),
                2 => array(
                    'A.I.' => '友好+2',
                    'マスコミ' => '友好+2',
                    '神格' => '不安+1',
                ),
            ),
        ),
    ),
);

