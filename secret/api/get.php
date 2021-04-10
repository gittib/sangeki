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
            foreach ($oSangeki->character as $k => $v) {
                $oSangeki->character[$k]['name'] = $k;
            }
            foreach ($oSangeki->incident as $k => $v) {
                $oSangeki->incident[$k]['day'] = $k;
            }
            $oSangeki->template_info = [];
            foreach ($oSangeki->template ?? [] as $loop => $v) {
                foreach ($v as $day => $vv) {
                    $aSet = [];
                    foreach ($vv as $target => $card) {
                        $aSet[] = [
                            'taget' => $target,
                            'card' => $card,
                        ];
                    }
                    $oSangeki->template_info[] = [
                        'loop' => $loop,
                        'day' => $day,
                        'set' => $aSet,
                    ];
                }
            }
            $ret[] = $oSangeki;

            unset($oSangeki);
        }
    }
    echo json_encode($ret);
    exit;
}
