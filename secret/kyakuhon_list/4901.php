<?

$oSangeki = (object)array(
    'title' => '世界線変動率 0.523307%',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 7,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '恋愛風景',
        '話を聞かない人々',
    ),
    'special_rule' => "巫女は少女でなく少年として扱う。",
    'loop' => 4,
    'day' => 6,
    'character' => array(
        '巫女' => array(
            'role' => 'ヴァンパイア',
            'note' => '漆原るか',
        ),
        '異世界人' => array(
            'note' => '阿万音鈴羽',
        ),
        '軍人' => array(
            'role' => 'ラバーズ',
            'note' => '天王寺裕吾',
        ),
        '学者' => array(
            'role' => 'チキンハート',
            'note' => 'Dr.中鉢',
        ),
        '情報屋' => array(
            'note' => '桐生萌郁',
        ),
        'アイドル' => array(
            'role' => 'ミスリーダー',
            'note' => 'フェイリス',
        ),
        '女の子' => array(
            'role' => 'メインラバーズ',
            'note' => '天王寺綯',
        ),
        '委員長' => array(
            'note' => '牧瀬紅莉栖',
        ),
        '女子学生' => array(
            'role' => 'キーパーソン',
            'note' => '椎名まゆり',
        ),
        '手先' => array(
            'role' => 'ミカケダオシ',
            'note' => '4℃',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '呪いの目覚め',
            'criminal' => '学校の群像',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '女の子',
        ),
        3 => array(
            'name' => '噂の御呪い',
            'criminal' => '軍人',
        ),
        5 => array(
            'name' => '立てこもり',
            'criminal' => '学者',
        ),
        6 => array(
            'name' => '行方不明',
            'criminal' => '巫女',
        ),
    ),
    'advice' => (object)array(
        'notice' => "プロモーションカード「女の子」「学者」を使用します。",
        'summary' => "特殊ルールや脚本名でピンときた方もいるかと思いますが、STEINS;GATEをフィーチャーした脚本です。\nキャラクター一覧の特記は、それぞれのキャラクターがシュタゲの誰をイメージしているかを記しています。\nちなみに、脚本名の世界線では綯さまの、あのエピソードが拝めます()\n\nゲームには特に関係しませんが、雰囲気を感じ取ってもらえたら嬉しいです。",
        'detail' => "最後の戦いは運ゲーになるので、最初にループ抜け推奨と伝えてしまってもよいでしょう。\n\n1ループ目はメインラバーズによる勝利を狙います。学校へ人を集めてミスリーダーを使い、女の子の不安拡大を起こしましょう。そこから軍人の自殺に繋ぎ、メインラバーズで主人公を殺害します。\n\n2ループ目以降は、ヴァンパイアによるキーパーソン殺害を狙います。1ループ目で不安拡大に失敗した場合も同様に狙って下さい。ミスリーダーは最後の戦いで隠さなければならないため、1ループ目以外では能力使用は控えましょう。",
        'template' => array(
            '1ループ目' => array(
                0 => '手先→病院に配置、学者→不安+1',
                1 => array(
                    '女子学生' => '移動縦',
                    'アイドル' => '移動横',
                    '軍人' => '不安+1',
                ),
            ),
            '2ループ目以降' => array(
                0 => '学者→不安+1',
                1 => array(
                    '女子学生' => '暗躍+2',
                    '学校' => '暗躍+1',
                    '軍人' => '不安+1',
                ),
            ),
        ),
    ),
);
