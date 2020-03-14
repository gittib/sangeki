<?

$oSangeki = (object)array(
    'title' => '完全な闇に紛れる悪意',
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
    'loop' => '∞',
    'day' => 3,
    'character' => array(
        '妹' => array(
            'role' => 'フレンド',
        ),
        '異世界人' => array(
        ),
        'ご神木' => array(
            'role' => 'フレンド',
        ),
        '黒猫' => array(
        ),
        '入院患者' => array(
            'role' => 'ミスリーダー',
        ),
        '医者' => array(
            'role' => 'ウィッチ',
        ),
        '手先' => array(
            'initPos' => '病院',
        ),
        '情報屋' => array(
        ),
        '刑事' => array(
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
        'summary' => "凶悪な特殊ルールに護られた脚本です。暗躍カウンターの所在が分からないため、ルールYの特定が非常に難しくなっています。",
        'detail' => "本来は公開情報であるはずの不安・暗躍の数が盤面に表されないため、今どこに何個のカウンターが乗っているかは脚本家が常に秘密裏に管理しておかねばなりません。脚本家行動カードは非公開かつループ1回制限なので、一度配置したカードはループ終了まで伏せて配置されたままにしておきましょう。管理の助けになります。\n\n勝利手段は巨大時限爆弾ほぼ一択です。しかし不穏な噂と行方不明により、非常に安定して達成が可能です。\n\n主人公としてこれを防ぐには、2人のフレンドを割ることが必須条件となります。しかも割るための手段は異世界人で殺すしかないため、主人公勝利のためには最低でも2ループを捨てる事になります。\n\n幸い脚本家は友好禁止も移動カードも持っていないため、見当さえつけば遂行するのは確実にできます。",
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
            '主人公の勝ち筋' => array(
                0 => '妹とご神木に友好+1してスタート',
                1 => array(
                    '妹' => '友好+2',
                    '異世界人' => '友好+2',
                    '病院' => '暗躍禁止',
                ),
                2 => array(
                    '妹' => '友好+2',
                    '医者' => '移動横',
                    '病院' => '暗躍禁止',
                ),
                3 => array(
                    '異世界人' => '友好+1',
                    '入院患者' => '移動横',
                    '病院' => '暗躍禁止',
                ),
            ),
        ),
    ),
);
