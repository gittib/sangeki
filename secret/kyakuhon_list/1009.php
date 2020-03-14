<?

$oSangeki = (object)array(
    'title' => '',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 7,
    'set' => 'BTX',
    'rule' => array(
        '巨大時限爆弾Xの存在',
        '不穏な噂',
        '友情サークル',
    ),
    'special_rule' => "・暗躍以外の脚本家行動カードは不安+1となる。\n・全ての脚本家行動カードと暗躍禁止はループ1回制限を得る。\n・配置された脚本家行動カードの内訳と不安カウンター、暗躍カウンターの個数は非公開情報である。",
    'loop' => 5,
    'day' => 3,
    'character' => array(
        '妹' => array(
            'role' => 'フレンド',
        ),
        '異世界人' => array(
        ),
        '黒猫' => array(
        ),
        '入院患者' => array(
            'role' => 'フレンド',
        ),
        '医者' => array(
            'role' => 'ウィッチ',
        ),
        '情報屋' => array(
        ),
        '刑事' => array(
        ),
        'A.I.' => array(
            'role' => 'ミスリーダー',
        ),
        '手先' => array(
            'initPos' => '都市',
        ),
        'お嬢様' => array(
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '不安拡大',
            'criminal' => '手先',
        ),
        2 => array(
            'name' => '蝶の羽ばたき',
            'criminal' => '黒猫',
        ),
        3 => array(
            'name' => '行方不明',
            'criminal' => '入院患者',
        ),
    ),
    'advice' => (object)array(
        'notice' => "＜特殊ルールについて＞\n・友好カウンターは普通に見えます。\n・不安カウンターと暗躍カウンターも見えないだけで、増減できます。ミスリーダーの能力も有効です。\n・不安カウンター、暗躍カウンターが増減した場合でも、その事実を主人公へ伝える必要はありません。",
        'summary' => "",
        'detail' => "",
        'victoryConditions' => array(
            array(
                'condition' => '巨大時限爆弾Xの存在',
                'way' => array(
                    '病院へ暗躍カウンターを2つ置く',
                ),
            ),
            array(
                'condition' => 'フレンドの殺害',
                'way' => array(
                    '異世界人の友好能力',
                ),
            ),
        ),
        'template' => array(
            '基本' => array(
                0 => '手先は病院に配置',
                1 => array(
                    '手先' => '不安+1',
                    'お嬢様' => '不安+1',
                ),
                2 => array(
                    'お嬢様' => '不安+1',
                ),
                3 => array(
                    '入院患者' => '不安+1',
                ),
            ),
        ),
    ),
);
