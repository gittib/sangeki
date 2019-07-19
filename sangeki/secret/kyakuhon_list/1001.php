<?

$oSangeki = (object)array(
    'title' => '噂の果ての真相',
    'writer' => 'ペンスキー',
    'difficulity' => 3,
    'set' => 'BTX',
    'rule' => array(
        '巨大時限爆弾Xの存在',
        '不穏な噂',
        '不定因子χ',
    ),
    'loop' => 4,
    'day' => 6,
    'character' => array(
        '神格' => array(
            'note' => '3ループ目',
        ),
        '異世界人' => array(
        ),
        '情報屋' => array(
        ),
        'アイドル' => array(
            'role' => 'ウィッチ',
        ),
        'サラリーマン' => array(
        ),
        '委員長' => array(
            'role' => 'ミスリーダー',
        ),
        'お嬢様' => array(
        ),
        '教師' => array(
            'role' => 'ファクター',
        ),
    ),
    'incident' => array(
        3 => array(
            'name' => '殺人事件',
            'criminal' => 'お嬢様',
        ),
        4 => array(
            'name' => '病院の事件',
            'criminal' => '委員長',
        ),
        6 => array(
            'name' => '自殺',
            'criminal' => '教師',
        ),
    ),
    'advice' => (object)array(
        'summary' => "ルールX『不穏な噂』を最大限活用した脚本です。このルールすげぇよ！",
        'detail' => "脚本家の勝利手段は病院の事件で主人公を殺害するか、都市に暗躍カウンターを２つ置くかのいずれかです。そして、不穏な噂の強力なサポートによって、そのうちいずれかはほぼ確実に実行可能となっています。\n1ループ目はできれば巨大時限爆弾で勝利したいところ。初日に病院へ暗躍+2、都市へ暗躍+1を置きましょう。都市への暗躍が通ったら、最終日に不穏な噂で2個目を置いて勝利確定です。もし都市の方を防がれたら、仕方ないので病院の事件での勝利を目指します。\n病院の事件を狙う場合、基本的にミスリーダーは隠す必要ありません。能力をガンガン使い、不安+1も置きまくりましょう。病院の事件を起こすとしても、犯人候補を増やせればそれだけ主人公を手間取らせる事ができます。\n\n異世界人は脚本家にとって大きな脅威となります。病院の事件の犯人を殺されたり、ファクターを明かされたりすると敗北一直線なので、友好能力を使われないよう警戒しましょう。\n神格の暗躍除去も脅威ですが、移動でなんとかなるので異世界人よりは危険は少ないです。\n\n最後の戦いで隠すのは、もちろんファクターです。3日目の殺人事件で露見しないよう、不穏な噂で都市に暗躍を置くのは最終日にしましょう。また、最終日の自殺は絶対に起こしてはなりません。",
        'template' => array(
            '各ループ共通' => array(
                1 => array(
                    '病院' => '暗躍+2',
                    '都市' => '暗躍+1',
                ),
            ),
        ),
    ),
);
