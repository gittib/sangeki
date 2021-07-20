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
