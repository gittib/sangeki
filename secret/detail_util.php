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
function initPos($name) {
    switch ($name) {
        case '神社':
        case 'shrine':
        case '巫女':
        case '異世界人':
        case '黒猫':
        case '幻想':
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
    switch ($name) {
        case '異世界人':
            return array('少女');
        case '男子学生':
        case 'イレギュラー':
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
            return array('大人', '女性');
        case 'A.I.':
        case 'AI':
            return array('造物');
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
function insidentPublicNote($insident) {
    $sBikou = '';
    switch ($insident['name']) {
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
        $sBikou = '(不安臨界-1)';
        break;
    case '猟奇殺人':
        $sBikou = '(不安臨界+1)';
        break;
    case '陰謀工作':
    case '猟犬の嗅覚':
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

    foreach ($oSangeki->character as $name => $chara) {
        if (empty($chara['role']) || $chara['role'] == 'パーソン') continue;
        $role = $chara['role'];
        if ($name == 'イレギュラー') {
            if (isset($aRoleCount[$role])) {
                $aRoleCount[$role]--;
                $aErrorMessage[] = 'イレギュラーの役職が不正です。';
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
            $aErrorMessage[] = $roleName . 'が多すぎます。';
        } else if ($n > 0) {
            if ($roleName == 'マイナス' && in_array('最低の却本', $aRuleList)) {
                // 最低の却本なら、マイナスの人数は足りなくてもOK
            } else {
                $aErrorMessage[] = $roleName . 'が足りません。';
            }
        }
    }

    $getCharacters = function ($role) use ($aRoleCharacter) {
        return isset($aRoleCharacter[$role]) ? $aRoleCharacter[$role] : array();
    };
    if (in_array('僕と契約しようよ！', $aRuleList) || in_array('鍵たる少女', $aRuleList)) {
        $aTmp = $getCharacters('キーパーソン');
        foreach ($aTmp as $name) {
            if (!in_array('少女', characterSpec($name))) {
                $aErrorMessage[] = $name . 'は少女でないため、キーパーソンを割り当てられません。';
            }
        }
    }
    if (in_array('高貴なる血族', $aRuleList)) {
        $aVampSex = array();
        $aTmp = $getCharacters('ヴァンパイア');
        foreach ($aTmp as $name) {
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

    return $aErrorMessage;
}
