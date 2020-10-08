<?

$oSangeki = (object)array(
    'title' => '因果の途絶',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'MZ',
    'rule' => array(
        '因果の絆',
        '通わぬ心',
        '魔女のお茶会',
    ),
    'special_rule' => "「不安-1」はループ1回制限を失う。",
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '神格' => array(
            'role' => 'シリアルキラー',
            'note' => '最終ループ',
        ),
        '巫女' => array(
            'role' => 'ウィッチ',
        ),
        '軍人' => array(
        ),
        'マスコミ' => array(
            'role' => 'フレンド',
        ),
        'アイドル' => array(
            'role' => 'ウィッチ',
        ),
        '委員長' => array(
        ),
        '教師' => array(
            'role' => 'マジシャン',
        ),
        '女の子' => array(
            'role' => 'ミスリーダー',
        ),
        '転校生' => array(
            'role' => 'フレンド',
            'note' => '2日目',
        ),
    ),
    'incident' => array(
        3 => array(
            'name' => '自殺',
            'criminal' => '転校生',
        ),
        5 => array(
            'name' => '自殺',
            'criminal' => '女の子',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "5ループで遊ぶ事もできます。その場合、難易度は5くらいです。\n\nMZで自殺あり、最終ループで登場する神格がシリアルキラー、ルールXのみで勝ち続けるギミック。\n以上のように非常に悪質な要素が詰まった脚本です。また、その解法も一般的とはとても言えません。\n脚本家として回すのは簡単ですが、主人公には特異な閃きが要求されます。",
        'detail' => "脚本家の勝利手段ですが、転校生の自殺しかありません。ただし、テンプレを守れば確実に達成できます。序盤のループは非常に安定して敗北条件を満たせるでしょう。\nなお、友好禁止の置き場所が3日目まで指定されているので、主人公はかなり自由に友好能力を使用できます。特に教師の友好能力によって転校生の自殺を止められると即終了なので、その警戒は怠らないで下さい。\n\n最後の戦いで隠すのは、2人目のフレンドです。割る手段がシリアルキラーを除いて存在しないため、ほぼ心配は無いでしょう。\n\n主人公の勝ち筋は、最終日の自殺を起こすことです。そのためには女の子の役職を明かした上で、ルールYと最終日の犯人を推理する事が求められます。\n\n女の子が死亡した状態で次のループが始まると、彼女にEXカードがセットされ、役職がキーパーソンへと変化します。するとミスリーダーが使えないため、3日目の自殺を起こす事はほぼ不可能になります。\n一応、代わりに女の子の自殺を敗北条件に加えられますが、特殊ルールによって犯人にずっと不安-1を置き続けられるため、シリアルキラーが絡まなければ達成は不可能でしょう。",
        'template' => [
            '女の子がミスリーダーの場合' => [
                1 => [
                    '女の子' => '友好禁止',
                    '教師' => '移動',
                ],
                2 => [
                    '転校生' => '友好禁止',
                    '教師' => '病院へ移動',
                ],
                3 => [
                    '転校生' => '不安+1',
                    '女の子' => '友好禁止',
                ],
            ],
            '女の子がキーパーソンの場合' => [
                1 => [
                    '女の子' => '不安+1',
                    '教師' => '不安+1',
                ],
                2 => [
                    '女の子' => '不安+1',
                    '転校生' => '不安+1',
                    '教師' => '友好禁止',
                ],
                3 => [
                    '女の子' => '不安+1',
                    '転校生' => '不安+1',
                    '教師' => '友好禁止',
                ],
                4 => [
                    '女の子' => '不安+1',
                    '教師' => '友好禁止',
                ],
                5 => [
                    '女の子' => '不安+1',
                ],
            ],
        ],
    ),
);
