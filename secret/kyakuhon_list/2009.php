<?

$oSangeki = (object)array(
    'title' => 'にとうりゅう　みだれうち',
    'writer' => 'ペンスキー',
    'secret' => true,
    'difficulity' => 6,
    'set' => 'MZ',
    'rule' => array(
        'シークレットレコード',
        '憎愛スパイラル',
        '死のショウタイム',
    ),
    'special_rule' => "脚本家は1ループにつき1回しか友好禁止を使用できない。",
    'loop' => 5,
    'day' => 4,
    'character' => array(
        '教祖' => array(
            'role' => 'ゼッタイシャ',
        ),
        'ご神木' => array(
            'role' => 'キーパーソン',
        ),
        '妹' => array(
            'role' => 'ミスリーダー',
        ),
        '入院患者' => array(
            'role' => 'マジシャン',
        ),
        '医者' => array(
            'role' => 'フレンド',
        ),
        'コピーキャット' => array(
        ),
        '情報屋' => array(
        ),
        'サラリーマン' => array(
            'role' => 'イモータル',
        ),
        'お嬢様' => array(
        ),
        '男子学生' => array(
            'role' => 'クロマク',
        ),
    ),
    'incident' => array(
        1 => array(
            'name' => '連続殺人',
            'criminal' => '教祖',
        ),
        2 => array(
            'name' => '連続殺人',
            'criminal' => '教祖',
        ),
        3 => array(
            'name' => '連続殺人',
            'criminal' => '教祖',
        ),
        4 => array(
            'name' => '連続殺人',
            'criminal' => '教祖',
        ),
    ),
    'advice' => (object)array(
        'notice' => "",
        'summary' => "FF5ではお世話になりました。\n\n死のショウタイムと、あまりにも大量の殺害手段が組み合わされた脚本です。\nループ抜けはほぼ不可能ですが、殺害手段と新キャラクターを活用する事で、役職を明かしていけるようになっています。",
        'detail' => "まず1ループ目はキーパーソンの殺害で即終了を狙います。サラリーマンの友好能力を防げれば、2ループ目で主人公の手数を縛れます。\n\n2ループ目以降は基本的にキーパーソン、フレンドの殺害と死のショウタイムの達成を目指して動きます。入院患者がマジシャンなので、教祖へ不安+1を置くことで主人公の手を大きく制限する事ができます。初日の連続殺人は基本的に学校で発生することでしょう。\n\nコピーキャットの友好能力には警戒が必要です。\nコピーキャット自身はパーソンなので、生存者の状況によっては役職持ちが全員バレます。\n最後の戦いで隠すべき役職はルールYの残り2役職ですが、妹がミスリーダーなので、コピーキャットに所在を割られた時点でほぼ主人公の勝利です。ルールXの役職も、殺せば割れるため隠し切るのは難しいでしょう。\nコピーキャットの友好能力では死体は対象外のため、パーソンとルールYの役職候補は可能な限り殺害しましょう。",
        'template' => array(
            '基本' => array(
                1 => array(
                    '教祖' => '不安+1',
                    '医者' => '何か',
                ),
            ),
        ),
    ),
);
