<?php
require_once(SECRET_DIR.'class/ScenarioIndex.php');

switch ($_GET['type']) {
case 'list':
    senarioList();
    break;
case 'rule':
    ruleMaster();
    break;
default:
    abort();
}

function senarioList() {
    $aScenario = ScenarioIndex::getScenarioList();
    $ret = [];
    foreach ($aScenario as $id => $val) {
        $kyakuhonPath = SECRET_DIR.'kyakuhon_list/'.$id.'.php';
        require($kyakuhonPath);
        if (!empty($oSangeki)) {
            $oSangeki->id = $id;
            if (empty($oSangeki->difficulty)) {
                $oSangeki->difficulty = $oSangeki->difficulity;
            }
            $oSangeki->characterList = [];
            foreach ($oSangeki->character as $k => $v) {
                $v['name'] = $k;
                $oSangeki->characterList[] = $v;
            }
            $oSangeki->incidentList = [];
            foreach ($oSangeki->incident as $k => $v) {
                $v['day'] = $k;
                $oSangeki->incidentList[] = $v;
            }
            $oSangeki->templateInfo = [];
            if (!empty($oSangeki->advice->template)) {
                foreach ($oSangeki->advice->template as $loop => $v) {
                    $aSetPerLoop = [
                        'loop' => $loop,
                        'standby' => null,
                        'perDay' => [],
                    ];
                    foreach ($v as $day => $vv) {
                        if (is_string($vv)) {
                            $aSetPerLoop['standby'] = $vv;
                        } else {
                            $aSet = [
                                'day' => $day,
                                'pattern' => [],
                            ];
                            foreach ($vv as $target => $card) {
                                $aSet['pattern'][] = [
                                    'target' => $target,
                                    'card' => $card,
                                ];
                            }
                            $aSetPerLoop['perDay'][] = $aSet;
                        }
                    }
                    $oSangeki->templateInfo[] = $aSetPerLoop;
                }
                unset($oSangeki->advice->template);
            }

            $ret[] = $oSangeki;

            unset($oSangeki);
        }
    }
    echo json_encode($ret, JSON_UNESCAPED_UNICODE);
    exit;
}

function ruleMaster() {
    require(SECRET_DIR.'rule_role_master.php');
    $ret = [];
    foreach ($aRuleRoleMaster as $setName => $rules) {
        $setInfo = [
            "setName" => $setName,
            "rules" => [],
        ];
        foreach ($rules as $ruleName => $roles) {
            $ruleInfo = [
                "ruleName" => $ruleName,
                "isRuleY" => isRuleY($ruleName),
                "roles" => [],
            ];
            foreach ($roles as $roleName) {
                $ruleInfo["roles"][] = $roleName;
            }
            $setInfo["rules"][] = $ruleInfo;
        }
        $ret[] = $setInfo;
    }
    echo json_encode($ret, JSON_UNESCAPED_UNICODE);
    exit;
}

function isRuleY($ruleName) {
    switch ($ruleName) {
        case 'だごん様の御言葉':
        case 'シークレットレコード':
        case 'ストリキニーネの雫':
        case 'タイトロープ上の計画':
        case '僕と契約しようよ！':
        case '呪われし地':
        case '因果の絆':
        case '墓所より出でし者':
        case '外なる神への大合唱':
        case '夜霧の悪夢':
        case '守るべき場所':
        case '封印されしもの':
        case '巨大時限爆弾Xの存在':
        case '巨大時限爆弾Yの存在':
        case '復讐者の灯火':
        case '復讐者の誓い':
        case '忍び寄る魔手':
        case '忘我の果て':
        case '月夜の獣':
        case '未来改変プラン':
        case '殺人計画':
        case '消された記憶':
        case '漢の戦い':
        case '組み重なり事件キルト':
        case '絶望のカウントダウン':
        case '血塗られた儀式':
        case '高貴なる血族':
        case '黄衣の王':
        case '黒の学園':
            return true;
        default:
            return false;
    }
}
