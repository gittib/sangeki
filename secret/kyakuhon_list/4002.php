<?

$oSangeki = (object)array(
    'title' => '',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 6,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '恐慌と妄執と',
        '魔女の呪い',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '巫女' => array(
            'role' => 'シリアルキラー',
        ),
        '刑事' => array(
            'role' => 'ウィッチ',
        ),
        '情報屋' => array(
            'role' => 'チキンハート',
        ),
        '鑑識官' => array(
            'role' => 'ヴァンパイア',
        ),
        'マスコミ' => array(
        ),
        'サラリーマン' => array(
            'role' => 'ウィッチ',
        ),
        '委員長' => array(
            'role' => 'ミスリーダー',
        ),
        '女子学生' => array(
            'role' => 'キーパーソン',
        ),
        'イレギュラー' => array(
            'role' => 'ゾンビ',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '立てこもり',
            'criminal' => '委員長',
        ),
        2 => array(
            'name' => '行方不明',
            'criminal' => '情報屋',
        ),
        4 => array(
            'name' => '穢れの噴出(必要死体:2)',
            'criminal' => '神社の群像',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "CS、PPのバランスが良く、多岐にわたる勝利条件を駆使する脚本です。ルールの特定すら一筋縄ではいかないため、主人公の情報整理能力が問われます。",
        'detail' => "ゾンビ、ヴァンパイア、(登場はしませんが)メインラバーズの圧力をかけ、CSとPP両面から攻めていきます。\n・キーパーソン呪って1勝\n・立てこもりで1勝\n・ゾンビで1勝\n・あとはがんばれ、って感じです。\n\n魔女の呪いによる呪いカードは必ず都市に置いて下さい。これでキーパーソンかゾンビを呪えば勝利確定です。ゾンビが死亡したら都市へ送りつつ、都市に暗躍+1、神社に暗躍+2を置きましょう。\n穢れの噴出による不安カウンターは、メインラバーズのCSに役立ちます。メインラバーズ候補は予め決めておき、毎回そのキャラに不安を乗せるようにして下さい。\n行方不明は最終手段です。発生すれば勝利確定ですが、安定もしない上にチキンハートが割れてしまいます。\n最後の戦いではヴァンパイアを隠します。キーパーソンの殺害能力はできれば終盤に、慎重に使って下さい。",
        'template' => array(
            '1ループ目' => array(
                0 => '都市に呪いカードを設置',
                1 => array(
                    '女子学生' => '移動横',
                ),
                2 => array(
                    'サラリーマン' => '友好禁止',
                ),
            ),
            '2ループ目以降' => array(
                0 => '都市に呪いカードを設置',
            ),
        ),
    ),
);
