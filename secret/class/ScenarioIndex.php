<?php
require_once(realpath(__DIR__.'/../common.php'));

class ScenarioIndex {
    const SCENARIO_LIST_PATH = SECRET_DIR.'cache/kyakuhon_list.php';

    public static function getScenarioList() {
        $latestHash = gitHash();

        $oScenario = (object)[
            'hash' => null,
            'list' => [],
        ];
        if (file_exists(self::SCENARIO_LIST_PATH)) {
            require(self::SCENARIO_LIST_PATH);
        }
        if (empty($oScenario->hash) || $latestHash != $oScenario->hash) {
            self::createScenarioListCache($latestHash);
            require(self::SCENARIO_LIST_PATH);
        }
        return $oScenario->list;
    }

    private static function createScenarioListCache($latestHash) {
        $result = null;
        $path = SECRET_DIR . 'kyakuhon_list/';
        exec("find $path -type f", $result);

        $aTmp = [];
        foreach ($result as $fullPath) {
            if (!endsWith($fullPath, 'php')) {
                // PHPじゃない
                continue;
            }

            $id = self::getScenarioId($fullPath);
            $bSecret = false;
            require($fullPath);
            if (empty($oSangeki) || empty($oSangeki->title)) {
                // 未完成な脚本
                continue;
            }
            if (!empty($oSangeki->secret)) {
                // secretな脚本
                $bSecret = true;
            }

            $oSangeki->id = $id;
            $oSangeki->secret = $bSecret;
            $oSangeki->path = $fullPath;
            $aTmp[$id] = $oSangeki;
            $oSangeki = null;
        }

        $fn = function($a, $b) {
            $setDiff = self::sangekiSetIndex($a) - self::sangekiSetIndex($b);  // 惨劇セット昇順
            $specialDiff = self::specialId($a) - self::specialId($b);   // 特殊ID
            $difficulityDiff = $a->difficulity - $b->difficulity;   // 難易度昇順
            $idDiff = $a->id - $b->id; // ID昇順

            if ($setDiff != 0) return $setDiff;
            else if ($specialDiff != 0) return $specialDiff;
            else if ($difficulityDiff != 0) return $difficulityDiff;
            else return $idDiff;
        };
        usort($aTmp, $fn);
        $oScenario = (object)[
            'hash' => $latestHash,
            'list' => [],
        ];
        foreach ($aTmp as $val) {
            $oScenario->list[$val->id] = $val;
        }

        $e = function($s) {
            if (is_bool($s)) {
                if ($s) return 'true'; else return 'false';
            }
            if (is_int($s)) {
                return $s;
            }
            return '"' . str_replace('"', '\"', $s) . '"';
        };

        $sFileText = '<?php $oScenario = (object)[';
        $sFileText .= '"hash" => "'.$latestHash.'",';
        $sFileText .= '"list" => [';
        foreach ($oScenario->list as $val) {
            $sFileText .= '"'.$val->id.'" => (object)[';
            $sFileText .= '"secret"=>'.$e($val->secret).',';
            $sFileText .= '"recommended"=>'.$e($val->recommended ?? false).',';
            $sFileText .= '"title"=>'.$e($val->title).',';
            $sFileText .= '"writer"=>'.$e($val->writer).',';
            $sFileText .= '"set"=>'.$e($val->set).',';
            $sFileText .= '"difficulity"=>'.$e($val->difficulity).',';
            $sFileText .= '"loop"=>'.$e($val->loop).',';
            $sFileText .= '"day"=>'.$e($val->day).',';
            $sFileText .= '"path"=>'.$e($val->path).',';
            $sFileText .= '],';
        }
        $sFileText .= ']];';

        $fp = fopen(self::SCENARIO_LIST_PATH, 'w');
        fwrite($fp, $sFileText);
        fclose($fp);

        chmod(self::SCENARIO_LIST_PATH, 0777);
    }

    private static function getScenarioId($s) {
        $sDirPath = SECRET_DIR.'kyakuhon_list/';
        $t = str_replace($sDirPath, '', $s);
        $t = preg_replace(';^.*/;', '', $t);
        return str_replace('.php', '', $t);
    }

    private static function sangekiSetIndex($o) {
        switch ($o->set) {
        case 'FS':
            return 0;
        case 'BTX':
            return 1;
        case 'MZ':
            return 2;
        case 'MC':
        case 'MCX':
            return 3;
        case 'HSA':
            return 4;
        case 'WM':
            return 5;
        case 'UM':
            return 6;
        default:
            return 99;
        }
    }

    private static function specialId($o) {
        // 百の位は特殊な意味付けって感じ
        return (int)(($o->id % 1000) / 100);
    }
}
