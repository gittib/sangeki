<?php

$oSangeki = (object)array(
    'title' => 'そして誰もいなくなった？',
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'MCX',
    'rule' => array(
        '組み重なり事件キルト',
        '絶対の意思',
        '隔離病棟サイコ',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 6,
    'character' => array(
        'A.I.' => array(
            'role' => 'セラピスト',
        ),
        'サラリーマン' => array(
            'role' => 'パラノイア',
        ),
        '鑑識官' => array(
        ),
        '男子学生' => array(
            'role' => 'ミスリーダー',
        ),
        'お嬢様' => array(
            'role' => 'フール',
        ),
        '教師' => array(
        ),
        '手先' => array(
            'role' => 'ゼッタイシャ',
            'initPos' => '都市',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '偽装自殺',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '偽装自殺',
            'criminal' => 'お嬢様',
        ),
        3 => array(
            'name' => '偽装自殺',
            'criminal' => '鑑識官',
        ),
        4 => array(
            'name' => '偽装自殺',
            'criminal' => '男子学生',
        ),
        5 => array(
            'name' => '偽装自殺',
            'criminal' => '教師',
        ),
        6 => array(
            'name' => '偽装自殺',
            'criminal' => 'サラリーマン',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "主人公は最後の戦いでしか勝てませんが、人数も少なく、比較的簡単な脚本です。アホみたいな事件リストに笑ってもらえれば幸い(笑)",
        'detail' => "手先とサラリーマンの偽装自殺は確実に起こせます。他の日も、鑑識官以外の事件はだいたい簡単に起こせるでしょう。たぶん。\n役職が学生に寄っている上に教師がいるため、手先とA.I.の役職を隠すCSが非常に重要となります。基本方針としてはA.I.をメイタンテイに見立て、手先がゼッタイシャと気取られないようにしましょう。パラノイアに頼らずにサラリーマンの事件を毎ループ起こすことで、ゼッタイシャの択を広げられます。\nA.I.がセラピストだとバレたら一巻の終わりです。事件で不安を無くしたフールや鑑識官、教師などをうまく移動させて、能力の発露を隠しましょう。",
        'template' => array(
            '各ループ共通' => array(
                0 => '手先は都市に配置すること',
                1 => array(
                    '手先' => '不安+1',
                ),
            ),
        ),
    ),
);
