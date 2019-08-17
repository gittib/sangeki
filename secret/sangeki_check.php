<?php
require_once(dirname(__FILE__) . '/common.php');

$aQuestions = array(
    (object)array(
        'rule' => '',
        'q' => "鑑識官の友好能力について、正しいのはどれ？",
        'radio' => array(
            1 => '友好２の能力のみループ１回制限<br>',
            2 => '友好５の能力のみループ１回制限<br>',
            3 => '両方ともループ１回制限<br>',
            4 => 'どちらの能力もループ１回制限ではない',
        ),
        'answer' => 3,
    ),
    (object)array(
        'rule' => 'BTX',
        'q' => "第1ループ1日目の事件フェイズにルールYが確定した。\nこの時、発生した事件はどれ？",
        'radio' => array(
            1 => '蝶の羽ばたき',
            2 => '邪気の汚染',
            3 => '病院の事件',
        ),
        'answer' => 3,
    ),
    (object)array(
        'rule' => 'BTX',
        'q' => "１つの脚本に友好無視のキャラクターは最大何人まで登場させられる？\nただし、イレギュラーは登場しないものとする。",
        'radio' => array(
            1 => '1人',
            2 => '2人',
            3 => '3人',
            4 => '4人',
            5 => '5人',
            6 => '6人',
        ),
        'answer' => 3,
    ),
);

session_start();
$checked = session('sangeki_kyakuhonka');
if (empty($checked) && !empty($_POST['answer'])) {
    $checked = true;
    $answers = $_POST['answer'];
    foreach ($aQuestions as $key => $val) {
        if (!isset($answers[$key]) || $val->answer != $answers[$key]) {
            $checked = false;
            $errorMessage = '間違いがあります。もう一度回答してください。';
            break;
        }
    }
    if ($checked) {
        $_SESSION['sangeki_kyakuhonka'] = true;
        header('Location: ' . $_SERVER['REQUEST_URI']);
        exit();
    }
}

if (empty($checked)): ?>
<html>
<head>
<? require(dirname(__FILE__) . '/secret/sangeki_head.php') ?>
    <title>惨劇RoopeR ペンスキーの脚本置き場</title>
</head>
<body class="sangeki_check">
    <div style="margin-bottom: 16px;">
        <h2><span>ペンスキーの</span><span>脚本置き場へ</span><span>ようこそ。</span></h2>
        ここにはペンスキーの考えた、惨劇RoopeRオリジナル脚本が置かれてあります。<br>
        <span style="color:red">なお、惨劇RoopeRの脚本を見てしまうと、ゲームに参加できなくなる場合があります。</span>
        つきましては、下記の問いにお答えください。全問正解した方にのみ脚本をお見せします。
    </div>
    <? if (!empty($errorMessage)): ?>
    <div class="error"><?= e($errorMessage) ?></div>
    <? endif; ?>
    <form method="post">
        <ul class="question_list">
            <? foreach ($aQuestions as $key => $val): ?>
            <li>
                <div class="q">
                    <span class="rule_prefix <?= $val->rule ?>"><?= $val->rule ?></span>
                    <?= nl2br(e($val->q)) ?>
                </div>
                <div class="a">
                    <? foreach($val->radio as $k => $row): ?>
                        <label>
                            <input type="radio" name="answer[<?= $key ?>]" value="<?=$k?>">
                            <?=$row?>
                        </label>
                    <? endforeach; ?>
                </div>
            </li>
            <? endforeach; ?>
        </ul>
        <input type="submit" value="送信">
    </form>
</body>
</html>
<?
exit();
endif;
?>
