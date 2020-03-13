<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 7,
    'set' => 'HSA',
    'rule' => array(
        '',
        '',
        '',
    ),
    'special_rule' => "・暗躍以外の脚本家行動カードは不安+1となる。\n・全ての脚本家行動カードと暗躍禁止はループ1回制限を得る。\n・配置された脚本家行動カードの内訳と不安カウンター、暗躍カウンターの個数は非公開情報である。",
    'loop' => 5,
    'day' => 4,
    'character' => array(
        '入院患者' => array(
        ),
        '刑事' => array(
        ),
        '手先' => array(
        ),
        'お嬢様' => array(
        ),
        '委員長' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '',
        ),
        4 => array(
            'name' => '',
            'criminal' => '',
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
                    '最終日にキーパーソンの友好2以下(消された記憶)',
                    '異世界人の友好能力',
                    '遂行者',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    '異世界人の友好能力',
                    '遂行者',
                ),
            ),
            array(
                'condition' => '戻らぬ子どもたち',
                'way' => array(
                    'ループ終了時にEXゲージ≦1かつ少年少女カード3枚に不安暗躍が乗っている',
                ),
            ),
        ),
        'template' => array(
            '基本' => array(
                0 => '手先は病院に配置',
                1 => array(
                    '手先' => '不安+1',
                    '軍人' => '友好禁止',
                    '異世界人' => '移動縦',
                ),
                2 => array(
                    'お嬢様' => '不安+1',
                ),
                3 => array(
                    'お嬢様' => '不安+1',
                    '教師' => '暗躍+1',
                ),
                4 => array(
                    '教師' => '暗躍+1',
                ),
            ),
            '異世界人の役職が割れていたら' => array(
                0 => '手先は病院に配置',
                1 => array(
                    '手先' => '不安+1',
                    '軍人' => '友好禁止',
                    'お嬢様' => '不安+1',
                ),
                2 => array(
                    'お嬢様' => '不安+1',
                ),
                3 => array(
                    'お嬢様' => '不安+1',
                    '教師' => '暗躍+1',
                ),
                4 => array(
                    '教師' => '暗躍+1',
                ),
            ),
        ),
    ),
);
