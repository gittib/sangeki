<?php
function getBoardMaster() {
    return array(
        '101' => '神社',
        '102' => '病院',
        '103' => '都市',
        '104' => '学校',
    );
}

function getCharacterMaster($withBoard = true) {
    $aCharacter = array(
        '1001' => '神格',
        '1002' => '巫女',
        '1003' => '異世界人',
        '1004' => '黒猫',
        '1005' => '幻想',
        '1006' => '妹',
        '1101' => '医者',
        '1102' => 'ナース',
        '1103' => '軍人',
        '1104' => '入院患者',
        '1105' => '学者',
        '1201' => 'サラリーマン',
        '1202' => '情報屋',
        '1203' => '刑事',
        '1204' => 'アイドル',
        '1205' => '大物',
        '1206' => 'マスコミ',
        '1207' => '鑑識官',
        '1208' => 'A.I.',
        '1209' => 'コピーキャット',
        '1301' => '男子学生',
        '1301' => '女子学生',
        '1302' => 'お嬢様',
        '1303' => '委員長',
        '1304' => '教師',
        '1305' => 'イレギュラー',
        '1306' => '転校生',
        '1307' => '女の子',
        '1901' => '手先',
    );

    if ($withBoard) {
        return getBoardMaster() + $aCharacter;
    } else {
        return $aCharacter;
    }
}

function getCharacterList($aCharaIds) {
    $aSelected = array();

    $aChara = getCharacterMaster(false);
    foreach ($aChara as $id => $name) {
        if ($name == '神格' || $name == '転校生') {
            $aSelected[$id] = $name;
        } else if (in_array($id, $aCharaIds)) {
            $aSelected[$id] = $name;
        }
    }

    return $aSelected;
}

function isValid($aParams) {
    require(dirname(__FILE__) . '/rule_role_master.php');
    $errors = array();
    if (empty($aParams['set']) || empty($aRuleRoleMaster[$aParams['set']])) {
        $errors[] = '惨劇セットが設定されていません。';
    }
    if (empty($aParams['loop'])) {
        $errors[] = 'ループ数が設定されていません。';
    }
    if (empty($aParams['day'])) {
        $errors[] = '日数が設定されていません。';
    }
    if (empty($aParams['ch'])) {
        $errors[] = 'キャラクターが設定されていません。';
    }
    return $errors;
}
