<?

$oSangeki = (object)array(
    'title' => 'イレギュラーの正体は？',
    'secret' => false,
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'MZ',
    'rule' => array(
        '封印されしもの',
        '神のサイコロ',
        '魔女のお茶会',
    ),
    'special_rule' => "",
    'loop' => 5,
    'day' => 4,
    'character' => array(
        '神格' => array(
            'note' => '1ループ目',
        ),
        '医者' => array(
            'role' => 'ウィッチ',
        ),
        'A.I.' => array(
            'role' => 'クロマク',
        ),
        'マスコミ' => array(
            'role' => 'フレンド',
        ),
        '大物' => array(
            'role' => 'ミスリーダー',
            'note' => '学校',
        ),
        'サラリーマン' => array(
            'role' => 'ゼッタイシャ',
        ),
        'イレギュラー' => array(
            'role' => 'ニンジャ',
        ),
        '女の子' => array(
            'role' => 'シリアルキラー',
        ),
        'お嬢様' => array(
            'role' => 'ウィッチ',
        ),
        '手先' => array(
            'role' => 'カルティスト',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '偽装自殺',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '行方不明',
            'criminal' => 'サラリーマン',
        ),
        3 => array(
            'name' => '告白',
            'criminal' => 'お嬢様',
        ),
        4 => array(
            'name' => '大暴動',
            'criminal' => 'A.I.',
        ),
    ),
    'advice' => (object)array(
        'notice' => 'プロモーションカード「女の子」を使用します。',
        'summary' => 'MZの熟練者に向けた脚本です。MZ初プレイには向きません。主人公は最後の戦いでしか勝てませんが、イレギュラーの役職を明かすのが非常に困難です。',
        'detail' => "各ループの必達目標は神社への暗躍+2とイレギュラーの殺害です。そのためにテンプレを遵守して下さい。\n1ループ目では暗躍+2、カルティスト、シリアルキラーで、初日に両方とも達成できます。2ループ目以降は神のサイコロと偽装自殺によりイレギュラーを封じ、最終日の大暴動で殺害しましょう。大暴動の犯人はA.I.なので、イレギュラーを都市に送ればシリアルキラーで犯人を殺される事も無くなります。\n最終的にイレギュラーの役職はマジシャン、ファクター、ニンジャの3択になります。これらが絞られないよう、イレギュラーへの不安と都市への暗躍には気をつけて下さい。",
        'template' => array(
            '1ループ目' => array(
                0 => '手先は病院に配置する',
                1 => array(
                    '手先' => '移動横',
                    'お嬢様' => '移動縦',
                    '神社' => '暗躍+2',
                ),
            ),
            '2ループ目以降' => array(
                0 => '手先は学校に配置。EXカードはイレギュラーにセット',
                1 => array(
                    '手先' => '不安+1',
                    'マスコミ' => '移動横',
                    '神格' => '移動縦',
                ),
                2 => array(
                    '手先' => '神社へ移動',
                    'イレギュラー' => '移動横',
                    '神社' => '暗躍+2',
                ),
            ),
        ),
    ),
);
