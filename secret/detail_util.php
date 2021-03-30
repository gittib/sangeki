<?php

function roleSpec ($r) {
    $role = isset($r['role']) ? $r['role'] : 'パーソン';
    $sZettai = '◇';
    $sYuukouMushi = '&#x2661;';
    $sFushi = '☆';

    switch ($role) {
        case 'カルティスト':
        case 'ウィッチ':
        case 'ゼッタイシャ':
        case 'パラノイア':
            $sZettai = '◆';
        case 'キラー':
        case 'クロマク':
        case 'ファクター':
        case 'ニンジャ':
        case 'ドリッパー':
        case 'ヴァンパイア':
        case 'ウェアウルフ':
        case 'ナイトメア':
        case 'ディープワン':
        case 'フェイスレス':
        case 'イレイザー':
        case 'アベンジャー':
            $sYuukouMushi = '<span class="black_heart">&#x1f5a4;</span>';
            break;
    }

    switch ($role) {
        case 'タイムトラベラー':
        case 'イモータル':
        case 'メイタンテイ':
        case 'ヴァンパイア':
        case 'ナイトメア':
        case 'ミカケダオシ':
        case 'ヒトハシラ':
        case 'フェイスレス':
        case 'イレイザー':
        case 'パイドパイパー':
            $sFushi = '★';
            break;
    }

    return array($role, $sZettai, $sYuukouMushi, $sFushi);
}
function initPos($name, $aCharacter = array()) {
    $name = rtrim($name, 'ABCDE');
    if (isset($aCharacter['initPos'])) {
        $name = $aCharacter['initPos'];
    }

    switch ($name) {
        case '神社':
        case 'shrine':
        case '巫女':
        case '異世界人':
        case '黒猫':
        case '幻想':
        case '妹':
        case '教祖':
        case 'ご神木':
            return 'shrine';
        case '病院':
        case 'hospital':
        case '入院患者':
        case '医者':
        case 'ナース':
        case '軍人':
        case '学者':
            return 'hospital';
        case '都市':
        case 'city':
        case 'アイドル':
        case 'サラリーマン':
        case '情報屋':
        case '刑事':
        case 'A.I.':
        case 'AI':
        case '大物':
        case 'マスコミ':
        case '鑑識官':
        case 'コピーキャット':
            return 'city';
        case '学校':
        case 'school':
        case '男子学生':
        case '女子学生':
        case 'お嬢様':
        case '教師':
        case 'イレギュラー':
        case '委員長':
        case '女の子':
            return 'school';
        case 'other':
        case '神格':
        case '転校生':
        case '手先':
        default:
            return 'other';
    }
}
function characterSpec($name) {
    switch (rtrim($name, 'ABCDE')) {
        case '妹':
            return array('少女', '妹');
        case '異世界人':
            return array('少女');
        case '男子学生':
        case 'イレギュラー':
        case 'コピーキャット':
            return array('学生', '少年');
        case '巫女':
        case 'アイドル':
        case '女子学生':
        case 'お嬢様':
        case '委員長':
        case '女の子':
        case '転校生':
            return array('学生', '少女');
        case '黒猫':
            return array('動物');
        case '幻想':
            return array('虚構', '女性');
        case '入院患者':
            return array('少年');
        case '医者':
        case '軍人':
        case '学者':
        case 'サラリーマン':
        case '刑事':
        case '大物':
        case 'マスコミ':
        case '鑑識官':
        case '手先':
            return array('大人', '男性');
        case 'ナース':
        case '情報屋':
        case '教師':
        case '教祖':
            return array('大人', '女性');
        case 'A.I.':
        case 'AI':
            return array('造物');
        case 'ご神木':
            return array('樹木');
        case '神格':
            return array('男性', '女性');
        default:
            return array();
    }
}
function getRuleWithNote($sRule) {
    if (strpos($sRule, '/') > 0) {
        // スラッシュで区切るとルールの備考を設定できる（狂った真実とか用）
        list($sRule, $sNote) = explode('/', $sRule);
        echo e(trim($sRule)) . '<br><span class="note">(' . e(trim($sNote)) . ')</span>';
    } else {
        echo e(trim($sRule));
    }
}
function incidentPublicNote($incident) {
    $sBikou = '';
    switch ($incident['name']) {
    case '穢れの噴出':
    case '死者の黙示録':
        $sBikou = '(必要死体:2)';
        break;
    case '呪いの目覚め':
        $sBikou = '(必要死体:1)';
        break;
    case '狂気の夜':
        $sBikou = '(必要死体:0)';
        break;
    case '遂行者':
    case '前兆':
    case '悪魔との契約':
        $sBikou = '(不安臨界-1)';
        break;
    case '猟奇殺人':
    case '怨嗟の雄叫び':
        $sBikou = '(不安臨界+1)';
        break;
    case '陰謀工作':
    case '猟犬の嗅覚':
    case '模倣犯':
        $sBikou = '(暗躍で判定)';
        break;
    }
    if (!empty($sBikou)) {
        return '<span class="note">' . $sBikou . '</span>';
    } else {
        return '';
    }
}

function isExistSummaryQr($ruleSetName) {
    switch ($ruleSetName) {
    case 'FS':
    case 'BTX':
    case 'MZ':
    case 'MCX':
    case 'HSA':
    case 'WM':
        return true;
    default:
        return false;
    }
}

function getTragedySetName($setPrefix) {
    switch ($setPrefix) {
    case 'FS':
        return 'First Steps';
    case 'BTX':
        return 'Basic Tragedy Χ';
    case 'MZ':
        return 'Midnight Zone';
    case 'MCX':
        return 'Mistery Circle Χ';
    case 'HSA':
        return 'Hounted State Again';
    case 'WM':
        return 'Weird Mythology';
    case 'UM':
        return 'Unvoiced Malice';
    default:
        return '謎の惨劇セット';
    }
}

function decorateSentence($s) {
    $esc = nl2br(e(trim($s)));
    $esc = str_replace('[b]', '<strong>', $esc);
    $esc = str_replace('[/b]', '</strong>', $esc);
    return $esc;
}

function exCharacterCheck($oSangeki) {
    $aExCharacters = array();
    foreach ($oSangeki->character as $name => $ch) {
        $name = rtrim($name, 'ABCDE');
        switch($name) {
        case '幻想':
        case '学者':
        case '女の子':
        case 'ご神木':
        case '教祖':
        case 'コピーキャット':
        case '妹':
            $aExCharacters[] = $name;
        }
    }
    if (empty($aExCharacters)) {
        return '';
    } else {
        return 'プロモーションカード「' . implode('」「', array_unique($aExCharacters)) . "」を使用します。\n";
    }
}

function rolesCountCheck($oSangeki) {
    require(dirname(__FILE__) . '/rule_role_master.php');

    $aRuleList = array();
    $aRoleCharacter = array();
    $aErrorMessage = array();
    $aRoleCount = array();

    $addRole = function ($role) use (&$aRoleCount) {
        if (!isset($aRoleCount[$role])) {
            $aRoleCount[$role] = 1;
        } else {
            $aRoleCount[$role]++;
        }

        // 上限チェック
        switch ($role) {
        case 'フレンド':
            if ($aRoleCount[$role] > 2) $aRoleCount[$role] = 2;
            break;
        case 'ミスリーダー':
        case 'フール':
        case 'ゴースト':
        case 'ディープワン':
        case 'ウィザード':
        case 'センドウシャ':
        case 'トラブルメイカー':
            if ($aRoleCount[$role] > 1) $aRoleCount[$role] = 1;
            break;
        }
    };

    if (empty($aRuleRoleMaster) || empty($aRuleRoleMaster[$oSangeki->set])) {
        return array('未対応の惨劇セットです');
    }

    foreach ($oSangeki->rule as $s) {
        $aTmp = explode('/', $s);
        $sRule = trim($aTmp[0]);
        if (!isset($aRuleRoleMaster[$oSangeki->set][$sRule])) {
            $aErrorMessage[] = "「{$sRule}」というルールはありません";
        } else {
            $aRuleList[] = $sRule;
            foreach ($aRuleRoleMaster[$oSangeki->set][$sRule] as $sRole) {
                $addRole($sRole);
            }
        }
    }

    $sCopyCatRole = null;
    $bPersonExists = false;
    foreach ($oSangeki->character as $name => $chara) {
        $name = rtrim($name, 'ABCDE');
        if ($name == 'コピーキャット') {
            // コピーキャットは後から判定する
            $sCopyCatRole = empty($chara['role']) ? 'パーソン' : $chara['role'];
            continue;
        }

        if (empty($chara['role']) || $chara['role'] == 'パーソン') {
            $bPersonExists = true;
            if (in_array($name, array('イレギュラー', 'AI', 'A.I.'))) {
                $aErrorMessage[] = "{$name}はパーソンにできません";
            }
            continue;
        }

        if ($name == '妹') {
            $sHeart = '&#x2661;';
            $ret = roleSpec($chara);
            if ($ret[2] != $sHeart) {
                $aErrorMessage[] = "{$name}は友好無視の役職にできません";
            }
        }

        $role = $chara['role'];
        if ($name == 'イレギュラー') {
            if (isset($aRoleCount[$role])) {
                $aRoleCount[$role]--;
                $aErrorMessage[] = 'イレギュラーの役職が不正です';
            }
        } else {
            if (empty($aRoleCount[$role])) {
                $aRoleCount[$role] = -1;
            } else {
                $aRoleCount[$role]--;
            }
        }

        if (!isset($aRoleCharacter[$role])) {
            $aRoleCharacter[$role] = array();
        }
        $aRoleCharacter[$role][] = $name;
    }
    foreach ($aRoleCount as $roleName => $n) {
        if ($n < 0) {
            $aErrorMessage[] = $roleName . 'が多すぎます';
        } else if ($n > 0) {
            if ($roleName == 'マイナス' && in_array('最低の却本', $aRuleList)) {
                // 最低の却本なら、マイナスの人数は足りなくてもOK
            } else {
                $aErrorMessage[] = $roleName . 'が足りません';
            }
        }
    }
    if (!empty($sCopyCatRole)) {
        // コピーキャットの役職判定
        if (!empty($aRoleCharacter[$sCopyCatRole])) {
            // OK
        } else if ($sCopyCatRole = 'パーソン' && $bPersonExists) {
            // OK
        } else {
            $aErrorMessage[] = 'コピーキャットの役職が不正です';
        }
    }

    $getCharacters = function ($role) use ($aRoleCharacter) {
        return isset($aRoleCharacter[$role]) ? $aRoleCharacter[$role] : array();
    };
    if (in_array('僕と契約しようよ！', $aRuleList) || in_array('鍵たる少女', $aRuleList)) {
        $aTmp = $getCharacters('キーパーソン');
        foreach ($aTmp as $name) {
            $name = rtrim($name, 'ABCDE');
            if (!in_array('少女', characterSpec($name))) {
                $aErrorMessage[] = $name . 'は少女でないため、キーパーソンを割り当てられません';
            }
        }
    }
    if (in_array('漢の戦い', $aRuleList)) {
        $aTmp = $getCharacters('ニンジャ');
        foreach ($aTmp as $name) {
            $name = rtrim($name, 'ABCDE');
            if (!in_array('男性', characterSpec($name))) {
                $aErrorMessage[] = $name . 'は男性でないため、ニンジャを割り当てられません';
            }
        }
    }
    if (in_array('高貴なる血族', $aRuleList)) {
        $aVampSex = array();
        $aTmp = $getCharacters('ヴァンパイア');
        foreach ($aTmp as $name) {
            $name = rtrim($name, 'ABCDE');
            $spec = characterSpec($name);
            if ($name == '神格') {
                $aVampSex[] = '神格';
            } else if (in_array('少年', $spec) || in_array('男性', $spec)) {
                $aVampSex[] = '男性';
            } else if (in_array('少女', $spec) || in_array('女性', $spec)) {
                $aVampSex[] = '女性';
            } else {
                $aErrorMessage[] = 'ヴァンパイアの性別が不正です';
            }
        }
        $aTmp = $getCharacters('キーパーソン');
        foreach ($aTmp as $name) {
            $name = rtrim($name, 'ABCDE');
            $spec = characterSpec($name);
            if ($name == '神格') {
                // 神格は固有の性別なのでセーフ
            } else if (in_array('少年', $spec) || in_array('男性', $spec)) {
                if (in_array('男性', $aVampSex)) {
                    $aErrorMessage[] = 'ヴァンパイアとキーパーソンが同性です';
                }
            } else if (in_array('少女', $spec) || in_array('女性', $spec)) {
                if (in_array('女性', $aVampSex)) {
                    $aErrorMessage[] = 'ヴァンパイアとキーパーソンが同性です';
                }
            } else {
                $aErrorMessage[] = 'キーパーソンの性別が不正です';
            }
        }
    }
    if (in_array('滅亡を謳うもの', $aRuleList)) {
        $bSusideExists = false;
        foreach ($oSangeki->incident as $date => $aIns) {
            $bSusideExists |= $aIns['name'] == '自殺';
        }
        if (!$bSusideExists) {
            $aErrorMessage[] = '「滅亡を謳うもの」がありますが、事件に自殺がありません';
        }
    }
    if (in_array('狂った真実', $aRuleList)) {
        $bJohoyaExists = false;
        foreach ($oSangeki->character as $name => $chara) {
            $bJohoyaExists |= rtrim($name, 'ABCDE') == '情報屋';
        }
        if (!$bJohoyaExists) {
            $aErrorMessage[] = '「狂った真実」がありますが、情報屋が登場しません';
        }
    }


    // 事件と犯人のチェック
    $aTmpChara = array_merge(array_keys($oSangeki->character), array(
        '神社の群像',
        '病院の群像',
        '都市の群像',
        '学校の群像',
    ));
    foreach ($oSangeki->incident as $date => $aIns) {
        if ($date > $oSangeki->day) {
            $aErrorMessage[] = '最終日より後に'.$aIns['name'].'が設定されています';
        }
        if (!in_array($aIns['name'], $aIncidentMaster[$oSangeki->set])) {
            $aErrorMessage[] = '「'.$aIns['name'].'」という名前の事件はありません';
        }
        if (!in_array($aIns['criminal'], $aTmpChara)) {
            $aErrorMessage[] = $date.'日目の犯人「'.$aIns['criminal'].'」は脚本に登場しません';
        }
    }


    return $aErrorMessage;
}
