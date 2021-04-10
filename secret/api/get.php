<?php
require_once(SECRET_DIR.'class/ScenarioIndex.php');

switch ($_GET['type']) {
case 'list':
    senarioList();
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
            foreach ($oSangeki->character as $k => $v) {
                $oSangeki->character[$k]['name'] = $k;
            }
            foreach ($oSangeki->incident as $k => $v) {
                $oSangeki->incident[$k]['day'] = $k;
            }
            $oSangeki->templateInfo = [];
            if (!empty($oSangeki->advice->template)) {
                foreach ($oSangeki->advice->template as $loop => $v) {
                    foreach ($v as $day => $vv) {
                        $aSet = [];
                        foreach ($vv as $target => $card) {
                            $aSet[] = [
                                'taget' => $target,
                                'card' => $card,
                            ];
                        }
                        $oSangeki->templateInfo[] = [
                            'loop' => $loop,
                            'day' => $day,
                            'set' => $aSet,
                        ];
                    }
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
