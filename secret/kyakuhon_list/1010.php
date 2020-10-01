<?

$oSangeki = (object)array(
    'title' => '招集命令',
    'writer' => 'ペンスキー',
    'difficulity' => 4,
    'set' => 'BTX',
    'rule' => array(
        '未来改変プラン',
        '友情サークル',
        '因果の糸',
    ),
    'special_rule' => "幻想はフレンドである。",
    'loop' => 2,
    'day' => 5,
    'character' => array(
        '幻想A' => array(
            'role' => 'フレンド',
        ),
        '幻想B' => array(
            'role' => 'フレンド',
        ),
        '妹' => array(
            'role' => 'タイムトラベラー',
        ),
        'ナース' => array(
            'role' => 'ミスリーダー',
        ),
        '刑事' => array(
        ),
        'サラリーマン' => array(
        ),
        '情報屋' => array(
        ),
        '男子学生' => array(
        ),
        'お嬢様' => array(
        ),
        '手先' => array(
            'role' => 'カルティスト',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => 'お嬢様',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => 'サラリーマン',
        ),
        3 => array(
            'name' => '不安拡大',
            'criminal' => '男子学生',
        ),
        4 => array(
            'name' => '蝶の羽ばたき',
            'criminal' => '手先',
        ),
        5 => array(
            'name' => '流布',
            'criminal' => '刑事',
        ),
    ),
    'advice' => (object)array(
        'notice' => "特殊ルールについて、「役職は過不足なく配役される」原則は守られた脚本である事を必ず説明して下さい。幻想はイレギュラーやコピーキャットではありません。",
        'summary' => "惨劇RoopeR Be Playing Stage Game の登場人物で構成された脚本です。\nループ数も短く、特殊ルールによって１ループ目開始時点からルールXが1つ確定しているため、比較的短い時間で遊ぶ事ができます。",
        'detail' => "１ループ目開始前からフレンドが公開されているので、各ループ開始時に2人の幻想へ友好カウンターを置いて下さい。\n",
    ),
);
