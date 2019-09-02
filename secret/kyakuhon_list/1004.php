<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'BTX',
    'rule' => array(
        '封印されしもの',
        '友情サークル',
        '妄想拡大ウイルス',
    ),
    'loop' => 4,
    'day' => 6,
    'character' => array(
        '異世界人' => array(
            'role' => 'フレンド',
        ),
        'ナース' => array(
            'role' => 'クロマク',
        ),
        '軍人' => array(
        ),
        '刑事' => array(
        ),
        'サラリーマン' => array(
        ),
        '鑑識官' => array(
            'role' => 'ミスリーダー',
        ),
        '委員長' => array(
            'role' => 'フレンド',
        ),
        '男子学生' => array(
            'role' => 'カルティスト',
        ),
        '教師' => array(
        ),
    ),
    'incident' => array(
        2 => array(
            'name' => '蝶の羽ばたき',
            'criminal' => '男子学生',
        ),
        5 => array(
            'name' => '邪気の汚染',
            'criminal' => '教師',
        ),
        6 => array(
            'name' => '不安拡大',
            'criminal' => '異世界人',
        ),
    ),
    'advice' => (object)array(
        'summary' => '',
        'detail' => "脚本家の勝利手段は、封印されしものとフレンドの殺害だけです。なお、フレンドの殺害には妄想拡大ウイルスの利用が必須なため、基本的には封印されしものでの勝利を目指します。\n序盤は事件によって勝利し、CSを強固にしていきます。異世界人に暗躍を置きつつ、不安カウンターをばらまきましょう。",
    ),
);
