<?
define('SECRET_DIR', realpath('../../secret').'/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'sangeki_check.php');

class ScenarioIndex {
    const SCENARIO_LIST_PATH = SECRET_DIR.'cache/kyakuhon_list.php';

    public static function getScenarioList() {
        $latestHash = 'invalid';
        $sHashFilePath = SECRET_DIR.'cache/latest_git_hash';
        if (file_exists($sHashFilePath)) {
            $fp = fopen($sHashFilePath, 'r');
            $latestHash = trim(fgets($fp));
            fclose($fp);
        }

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
        foreach ($result as $val) {
            $id = self::getScenarioId($val);
            $bSecret = false;
            require($val);
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
        $t = str_replace('/', '-', $t);
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

$aList = ScenarioIndex::getScenarioList();
$bDisplaySecret = (!isProd() && isset($_GET['s']));
?>
<html>
<head>
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title>脚本リスト - <?= SITE_NAME ?></title>
</head>
<body class="kyakuhon_list">
<? require(SECRET_DIR.'sangeki_header.php'); ?>
    <div class="top_text">
        <h2><span>ペンスキーの</span><span>脚本置き場へ</span><span>ようこそ。</span></h2>
        ここにはペンスキーの考えた、惨劇RoopeRオリジナル脚本が置かれてあります。(一部寄稿いただいたものもあります)<br>
        <span class="important_s">なお、惨劇RoopeRの脚本を見てしまうと、主人公としてゲームに参加できなくなる場合があります。</span>
        もちろん、脚本家としては遊べます。公開シート・非公開シート・解説に分けて記載していますので、そのまま利用して遊べるようになっています。
    </div>
    <h2>惨劇脚本リスト</h2>
    <div class="title_is_hidden">ネタバレ防止のためにタイトルを伏せてありますので、必要に応じて下のボタンで表示させて下さい。</div>
    <button class="show_title">脚本タイトルを表示</button>
    <div class="kyakuhon_list">
        <dl class="kyakuhon_list">
        <? foreach ($aList as $id => $oSangeki): ?>
        <? if ($bDisplaySecret || empty($oSangeki->secret)): ?>
            <dt class="<? if(!empty($oSangeki->secret)) echo 'secret' ?>">
                <span class="rule_prefix <?= $oSangeki->set ?>"><?= $oSangeki->set ?></span>
                <a href="./detail.php?id=<?= $id ?>">
                    <span class="real_title"><?= e($oSangeki->title) ?></span>
                    <span class="hide_title">脚本[<?= $id ?>]</span>
                </a>
                <span class="writer">作者: <?= e($oSangeki->writer) ?></span>
                <? if (!empty($oSangeki->recommended)): ?>
                <span class="recommended">オススメ！</span>
                <? endif; ?>
            </dt>
            <dd class="<? if(!empty($oSangeki->secret)) echo 'secret' ?>">
                <span class="loop"><strong><?= $oSangeki->loop ?></strong>ループ</span>
                <span class="day"><strong><?= $oSangeki->day ?></strong>日間</span>
                <span class="difficulity">
                    難易度<span><? for ($i = 1 ; $i <= 8 ; $i++) {
                        if ($i <= $oSangeki->difficulity) {
                            echo '★';
                        } else {
                            echo '☆';
                        }
                    } ?></span>
                    <span class="tag"><?= difficulityName($oSangeki->difficulity) ?></span>
                </span>
            </dd>
        <? endif; ?>
        <? endforeach; ?>
        </dl>
    </div>
    <button class="show_title">脚本タイトルを表示</button>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
    <script>
    $('.show_title').on('click', function() {
        if ($('.hide_title').is(':visible')) {
            if (confirm('脚本タイトルを表示するとネタバレになる可能性があります。\nよろしいですか？')) {
                $('.real_title').show();
                $('.hide_title').hide();
                $('.show_title').text('脚本タイトルを隠す');
            }
        } else {
            $('.real_title').hide();
            $('.hide_title').show();
            $('.show_title').text('脚本タイトルを表示');
        }
    });
    </script>
</body>
</html>
