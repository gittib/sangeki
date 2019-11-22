<?

$oSangeki = (object)array(
    'title' => 'そっちの世界線じゃなくて',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 7,
    'set' => 'HSA',
    'rule' => array(
        '高貴なる血族',
        '魔女の呪い',
        '恐慌と妄執と',
    ),
    'special_rule' => "巫女は少女でなく少年として扱う。",
    'loop' => 5,
    'day' => 6,
    'character' => array(
        '巫女' => array(
            'role' => 'ウィッチ',
            'note' => '漆原るか',
        ),
        '異世界人' => array(
            'role' => 'ミスリーダー',
            'note' => '阿万音鈴羽',
        ),
        '軍人' => array(
            'note' => '天王寺裕吾',
        ),
        '学者' => array(
            'role' => 'ヴァンパイア',
            'note' => 'Dr.中鉢',
        ),
        '情報屋' => array(
            'role' => 'ウィッチ',
            'note' => '桐生萌郁',
        ),
        'アイドル' => array(
            'note' => 'フェイリス',
        ),
        '女の子' => array(
            'role' => 'シリアルキラー',
            'note' => '天王寺綯',
        ),
        '委員長' => array(
            'role' => 'キーパーソン',
            'note' => '牧瀬紅莉栖',
        ),
        '女子学生' => array(
            'role' => 'チキンハート',
            'note' => '椎名まゆり',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '呪いの目覚め',
            'criminal' => '学校の群像',
        ),
        3 => array(
            'name' => '不安拡大',
            'criminal' => 'アイドル',
        ),
        4 => array(
            'name' => '立てこもり',
            'criminal' => '女子学生',
        ),
        5 => array(
            'name' => '行方不明',
            'criminal' => '委員長',
        ),
    ),
    'advice' => (object)array(
        'notice' => "プロモーションカード「女の子」と「学者」を使用します。無い場合は「お嬢様」と「医者」で代用可能です。",
        'summary' => "特殊ルールでピンときた方もいるかと思いますが、STEINS;GATEをフィーチャーした脚本です。\nキャラクター一覧の特記は、それぞれのキャラクターがシュタゲの誰をイメージしているかを記しています。ゲームには特に関係ありません。",
        'detail' => "",
        'template' => array(
            '1ループ目' => array(
                0 => '呪いカードは置かない',
                1 => array(
                    '委員長' => '暗躍+2',
                    '女子学生' => '移動',
                ),
            ),
            '2ループ目以降' => array(
                1 => array(
                    '委員長' => '暗躍+2',
                    '学校' => '暗躍+1',
                    'アイドル' => '不安+1',
                ),
            ),
        ),
    ),
);
