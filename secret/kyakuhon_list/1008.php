<?

$oSangeki = (object)array(
    'title' => '凶刃の向かう先は',
    'writer' => 'ペンスキー',
    'difficulity' => 3,
    'set' => 'BTX',
    'rule' => array(
        '殺人計画',
        '友情サークル',
        '因果の糸',
    ),
    'loop' => 4,
    'day' => 3,
    'character' => array(
        '黒猫' => array(
        ),
        '入院患者' => array(
        ),
        '軍人' => array(
            'role' => 'クロマク',
        ),
        'サラリーマン' => array(
            'role' => 'フレンド',
        ),
        'アイドル' => array(
            'role' => 'キラー',
        ),
        '情報屋' => array(
            'role' => 'キーパーソン',
        ),
        '男子学生' => array(
            'role' => 'ミスリーダー',
        ),
        '教師' => array(
            'role' => 'フレンド',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '殺人事件',
            'criminal' => 'サラリーマン',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '男子学生',
        ),
        3 => array(
            'name' => '行方不明',
            'criminal' => 'アイドル',
        ),
    ),
    'advice' => (object)array(
        'summary' => "初日の殺人事件がこの脚本のコンセプトです。\n起こすも起こさないもそれぞれメリットデメリットがあるため、主人公と脚本家の思惑が錯綜します。それらが絶妙に噛み合ったとき、至る結末は果たして平穏な日常か、あるいは惨劇か…",
        'detail' => "脚本家の勝利条件は、基本的にキーパーソンの殺害だけです。\n\n1ループ目は初日からキーパーソンへ暗躍+2を通してしまいましょう。行方不明の犯人がキラーなので、キーパーソンへの暗躍さえ通せれば問題なく敗北条件を満たせるでしょう。\n\n2ループ目以降は、初日の殺人事件のせめぎ合いとなります。初日は必ずサラリーマンと情報屋には行動カードを配置してください。\n\n殺人事件を起こすパターンと防ぐパターン、どちらのパターンでいくかはゲームの流れ次第です。\n\n起こす場合のメリットは、もちろんキーパーソンの殺害を狙えることです。\n起こす場合、初日は移動３枚使ってしまってもよいでしょう。また、クロマクを隠すならフレンドも殺害対象にカウントできます。\n\n起こさない場合のメリットは、殺人事件でキラーが殺される事故を防げることです。\n起こさない場合、サラリーマンには移動縦か不安-1を張ります。主人公が不安+1を張ったとしても、病院で事件を起こせれば致命傷は避けられます。\n\n最後の戦いで隠すべきは、クロマクか２人目のフレンドです。\nクロマクを隠すルートの場合、フレンドは初日の殺人事件の対象になります。移動を張って1ループ稼がせてもらいましょう。\nフレンドを隠すルートの場合、キラーによる主人公殺害能力の重要度が高まります。このルートでは、初日の殺人事件は起こさないほうが良いでしょう。とはいえ、結局は主人公との読み合いにはなりますが。",
        'victoryConditions' => array(
            array(
                'condition' => 'キーパーソンの殺害',
                'way' => array(
                    'キラーの能力',
                    '殺人事件',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    '殺人事件',
                ),
            ),
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    'キラーの能力',
                ),
            ),
        ),
        'template' => array(
            '1ループ目' => array(
                1 => array(
                    '神社' => 'ブラフ',
                    'アイドル' => '不安+1',
                    '情報屋' => '暗躍+2',
                ),
            ),
            '2ループ目以降、殺人事件を起こす場合' => array(
                1 => array(
                    'サラリーマン' => '移動縦',
                    '情報屋' => '移動斜め',
                ),
            ),
            '2ループ目以降、殺人事件を起こさない場合' => array(
                1 => array(
                    'サラリーマン' => '不安-1',
                    '情報屋' => '暗躍+1',
                    '軍人' => '移動縦',
                ),
            ),
        ),
    ),
);
