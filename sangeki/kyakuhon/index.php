<?
define('SECRET_DIR', realpath('../../secret').'/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'sangeki_check.php');

function getKyakuhonPathList() {
    $latestHash = null;
    $sHashFilePath = SECRET_DIR.'cache/latest_git_hash';
    if (file_exists($sHashFilePath)) {
        $fp = fopen($sHashFilePath, 'r');
        $latestHash = trim(fgets($fp));
        fclose($fp);
    }

    $aKyakuhon = [
        'hash' => null,
        'list' => [],
    ];
    $sKyakuhonListPath = SECRET_DIR.'cache/kyakuhon_list.php';
    if (file_exists($sKyakuhonListPath)) {
        require($sKyakuhonListPath);
    }
    if ($latestHash != $aKyakuhon['hash']) {
        $result = null;
        $path = SECRET_DIR . 'kyakuhon_list/';
        exec("find $path -type f", $result);
        $fp = fopen($sKyakuhonListPath, 'w');
        fwrite($fp, '<?php $aKyakuhon = [');
        fwrite($fp, '"hash" => "'.$latestHash.'",');
        fwrite($fp, '"list" => ["');
        fwrite($fp, implode('","', $result));
        fwrite($fp, '"]];');
        fclose($fp);
        require($sKyakuhonListPath);
    }
    return $aKyakuhon['list'];
}

$aList = getKyakuhonPathList();
$aTmp = array();
$bDisplaySecret = (!isProd() && isset($_GET['s']));
foreach ($aList['list'] as $val) {
    $id = str_replace('.php', '', $val);
    if (strpos($id, '9') === 0) {
        continue;
    }
    require($val);
    if (empty($oSangeki) || empty($oSangeki->title)) {
        continue;
    }
    if (!empty($oSangeki->secret)) {
        // secretな脚本
        if (!$bDisplaySecret) {
            continue;
        }
    }

    // 一覧で不要な情報はunsetしとく
    unset($oSangeki->character);
    unset($oSangeki->incident);
    unset($oSangeki->advice);

    $oSangeki->id = $id;
    $aTmp[$id] = $oSangeki;
    $oSangeki = null;
}

function sangekiSetIndex($o) {
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
function specialId($o) {
    // 百の位は特殊な意味付けって感じ
    return (int)(($o->id % 1000) / 100);
}
$fn = function($a, $b) {
    $setDiff = sangekiSetIndex($a) - sangekiSetIndex($b);  // 惨劇セット昇順
    $specialDiff = specialId($a) - specialId($b);   // 特殊ID
    $difficulityDiff = $a->difficulity - $b->difficulity;   // 難易度昇順
    $idDiff = $a->id - $b->id; // ID昇順

    if ($setDiff != 0) return $setDiff;
    else if ($specialDiff != 0) return $specialDiff;
    else if ($difficulityDiff != 0) return $difficulityDiff;
    else return $idDiff;
};
usort($aTmp, $fn);
$aPublicScenario = array();
foreach ($aTmp as $val) {
    $aPublicScenario[$val->id] = $val;
}
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
        <? foreach ($aPublicScenario as $id => $oSangeki): ?>
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
