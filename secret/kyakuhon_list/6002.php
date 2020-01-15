<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'UM',
    'rule' => array(
        '絶望のカウントダウン',
        '問題児の苦悩',
        '',
    ),
    'loop' => 4,
    'day' => 5,
    'character' => array(
        '巫女' => array(
            'role' => 'フレンド',
        ),
        '異世界人' => array(
            'role' => 'イレイザー',
        ),
        '軍人' => array(
        ),
        '大物' => array(
            'role' => 'センドウシャ',
            'note' => '学校',
        ),
        '教師' => array(
        ),
        '男子学生' => array(
            'role' => 'ミスリーダー',
        ),
        'お嬢様' => array(
        ),
        '手先' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '遂行者',
            'criminal' => '軍人',
        ),
        2 => array(
            'name' => '怨嗟の雄叫び',
            'criminal' => '男子学生',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "",
        'detail' => "",
        'victoryConditions' => array(
            array(
                'condition' => '主人公の殺害',
                'way' => array(
                    'イレイザーの能力',
                ),
            ),
            array(
                'condition' => '絶望のカウントダウン',
                'way' => array(
                    'ループ終了時にイレイザーの初期エリアに暗躍カウンターがX個ある(X=3-Exゲージ)',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    '遂行者',
                ),
            ),
        ),
        'template' => array(
            '基本' => array(
                0 => '手先は神社に配置',
                1 => array(
                    '神社' => '暗躍+1',
                    '手先' => '不安+1',
                    '入院患者' => '不安+1',
                ),
            ),
        ),
    ),
);
