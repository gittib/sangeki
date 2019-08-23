<?

$oSangeki = (object)array(
    'title' => '不穏な噂 ver.MC',
    'secret' => true,
    'writer' => 'ペンスキー',
    'difficulity' => 6,
    'set' => 'MCX',
    'rule' => array(
        '黒の学園',
        '隔離病棟サイコ',
        '愚者のダンス',
    ),
    'special_rule' => "",
    'loop' => 4,
    'day' => 6,
    'character' => array(
        '異世界人' => array(
            'role' => 'セラピスト',
        ),
        '入院患者' => array(
            'role' => 'フール',
        ),
        '軍人' => array(
            'role' => 'フレンド',
        ),
        'A.I.' => array(
            'role' => 'パラノイア',
        ),
        'サラリーマン' => array(
            'role' => 'クロマク',
        ),
        '教師' => array(
            'role' => 'ミスリーダー',
        ),
        '女子学生' => array(
        ),
        '委員長' => array(
        ),
    ),
    'incident' => array(
        4 => array(
            'name' => '不安拡大',
            'criminal' => 'A.I.',
        ),
        5 => array(
            'name' => 'テロリズム',
            'criminal' => '入院患者',
        ),
        6 => array(
            'name' => '病院の事件',
            'criminal' => '異世界人',
        ),
    ),
    'advice' => (object)array(
        'notice' => '',
        'summary' => "ボードへの暗躍と事件によって、強力なPPを迫る脚本です。基本的にループ抜けされる事はありません。\nルールY敗北条件は達成不可能ですが、それ故に最後の戦いでは極めて隠蔽性が高いです。",
        'detail' => "脚本家の勝利手段は、病院の事件またはテロリズムによる主人公の殺害だけです。その達成のために、クロマクは重要な役割を持ちます。\n3日目を迎えるかサラリーマンが移動させられたら、必ず能力を使ってボードに暗躍を積んで下さい。その翌日、病院と都市のうち、クロマクで暗躍を置いたエリアに暗躍+1、もう一方に暗躍+2を置きます。これでどちらかのエリアに暗躍が2つ溜まるので、対応する事件を起こすよう動きます。\nA.I.のパラノイアは、一切隠す必要ありません。不安拡大を必ず起こしたいので、初日から毎日能力を使って暗躍を積みましょう。異世界人がA.I.を殺害しに来たら、移動で妨害してください。1日遅らせれば十分です。\n軍人の能力で主人公の死亡を防がれると敗北します。軍人に友好が3つ乗ったら、それ以降は毎日友好禁止を張らなければなりません。また、軍人の役職は可能な限り隠しましょう。\n隔離病棟サイコがあるので、2ループ目開始時はほぼ確実にEXゲージが上昇します。そうなると初日からセラピストが有効となるので、処理を間違えないよう気をつけて下さい。\n\n最後の戦いでは、ルールYが何なのかを焦点にします。2人いるパーソンが両方割れると黒の学園で確定されてしまうので、教師の動きには警戒が必要です。",
        'template' => array(
            '各ループ共通' => array(
                4 => array(
                    '都市' => '暗躍+○',
                    '病院' => '暗躍+○',
                ),
            ),
        ),
    ),
);
