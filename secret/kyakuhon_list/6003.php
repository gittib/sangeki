<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 5,
    'set' => 'UM',
    'rule' => array(
        '消された記憶',
        '問題児の苦悩',
        '',
    ),
    'loop' => 5,
    'day' => 5,
    'character' => array(
        '異世界人' => array(
        ),
        '軍人' => array(
        ),
        '入院患者' => array(
            'role' => 'センドウシャ',
        ),
        '手先' => array(
            'role' => 'フレンド',
            'initPos' => '病院',
        ),
        '情報屋' => array(
        ),
        '委員長' => array(
            'role' => 'イレイザー',
        ),
        'お嬢様' => array(
        ),
        '転校生' => array(
            'role' => 'キーパーソン',
            'note' => '3日目',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '遂行者',
            'criminal' => '軍人',
        ),
        2 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        3 => array(
            'name' => '怨嗟の雄叫び',
            'criminal' => 'お嬢様',
        ),
        4 => array(
            'name' => '模倣犯',
            'criminal' => 'イレイザー',
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
                'condition' => 'キーパーソンの殺害',
                'way' => array(
                    '消された記憶',
                    '遂行者',
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
