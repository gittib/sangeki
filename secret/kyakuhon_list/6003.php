<?php

$oSangeki = (object)array(
    'title' => '反逆の豆腐メンタル',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'UM',
    'rule' => array(
        '消された記憶',
        '問題児の苦悩',
        '戻らぬ子どもたち',
    ),
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '異世界人' => array(
        ),
        '軍人' => array(
            'role' => 'パイドパイパー',
        ),
        '入院患者' => array(
            'role' => 'センドウシャ',
        ),
        '手先' => array(
            'role' => 'フレンド',
            'initPos' => '病院',
        ),
        '大物' => array(
            'role' => 'トラブルメイカー',
            'note' => '神社',
        ),
        'マスコミ' => array(
            'role' => 'ミスリーダー',
        ),
        '教師' => array(
            'role' => 'イレイザー',
        ),
        'お嬢様' => array(
        ),
        '転校生' => array(
            'role' => 'キーパーソン',
            'note' => '3日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '遂行者',
            'criminal' => '軍人',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        3 => array(
            'name' => '怨嗟の雄叫び',
            'criminal' => 'お嬢様',
        ),
        4 => array(
            'name' => '模倣犯',
            'criminal' => '教師',
        ),
        5 => array(
            'name' => '告発',
            'criminal' => '異世界人',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "難易度を高める要素が多く、凶悪な印象を与える脚本です。ただし、手先の役職が割れると盤石な体制は崩れ、ゲームは一気に主人公へと傾きます。\n彼は果たして脚本家の手先なのか、あるいは主人公へと手を差し伸べるのか。主人公の発想力が問われます。",
        'detail' => "手先の初期配置は常に病院にしてください。\n\n手先の役職が公開されない限り、ループ抜けされることはありません。ルールYや各種事件を大胆に活用して下さい。\n遂行者だけは起こしてはなりませんが、他の事件は犯人が割れようと一向に構いません。特に模倣犯は、犯人がイレイザーなので確実に発生できます。模倣する事件は基本的に怨嗟の雄叫びを選んで下さい。\n\nまず1ループ目は、イレイザーでさっさと終わらせます。\nイレイザーにカードが置かれるよう仕向け、条件を満たしたらすぐに主人公を殺害しましょう。\n以降2度とカードは置かれないでしょうが、1ループだけでも浪費させ、大物や異世界人を妨害できれば十分です。\n\n次に2ループ目は消された記憶によるキーパーソン殺害を目標に動きます。\n怨嗟の雄叫びと模倣犯を起こし、最終日にキーパーソンを死亡させましょう。また、いずれかのキャラクターをスナイパーに見立てて転校生を移動させるとルールXのCSになります。\n\n最後の戦いでは、ミスリーダーを隠します。\n一人でも多くの役職を隠すため、極力神社から人を離しましょう。パーソンが少ないため、お嬢様の役職が割れるだけでも痛手です。",
        'victoryConditions' => array(
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    'イレイザーの能力',
                ),
            ),
            array(
                'condition' => 'キーパーソンの殺害',
                'way' => array(
                    '最終日にキーパーソンの友好2以下(消された記憶)',
                    '異世界人の友好能力',
                    '遂行者',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    '異世界人の友好能力',
                    '遂行者',
                ),
            ),
            array(
                'condition' => '戻らぬ子どもたち',
                'way' => array(
                    'ループ終了時にEXゲージ≦1かつ少年少女カード3枚に不安暗躍が乗っている',
                ),
            ),
        ),
        'template' => array(
            '基本' => array(
                0 => '手先は病院に配置',
                1 => array(
                    '手先' => '不安+1',
                    '軍人' => '友好禁止',
                    '異世界人' => '移動縦',
                ),
                2 => array(
                    'お嬢様' => '不安+1',
                ),
                3 => array(
                    'お嬢様' => '不安+1',
                    '教師' => '暗躍+1',
                ),
                4 => array(
                    '教師' => '暗躍+1',
                ),
            ),
            '異世界人の役職が割れていたら' => array(
                0 => '手先は病院に配置',
                1 => array(
                    '手先' => '不安+1',
                    '軍人' => '友好禁止',
                    'お嬢様' => '不安+1',
                ),
                2 => array(
                    'お嬢様' => '不安+1',
                ),
                3 => array(
                    'お嬢様' => '不安+1',
                    '教師' => '暗躍+1',
                ),
                4 => array(
                    '教師' => '暗躍+1',
                ),
            ),
        ),
    ),
);
