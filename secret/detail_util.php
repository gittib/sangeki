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
    }
    foreach ($aRoleCount as $roleName => $n) {
        if ($n < 0) {
            $aErrorMessage[] = $roleName . 'が多すぎます。';
        } else if ($n > 0) {
            if ($roleName != 'マイナス') {
                $aErrorMessage[] = $roleName . 'が足りません。';
            }
        }
    }

    return $aErrorMessage;
}
