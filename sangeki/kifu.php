<?
require_once('../secret/common.php');

if (isset($_POST['chara']) && is_array($_POST['chara'])) {
    $aData = array(
        'charas' => $_POST['chara'],
        'loop' => $_POST['loop'],
        'day' => $_POST['day'],
        'incidents' => array(),
    );
    $_SESSION['sangeki_kifu'] = json_encode($aData);
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

$aCharacter = array(
    '神格',
    '巫女',
    '異世界人',
    '黒猫',
    '幻想',
    '医者',
    'ナース',
    '軍人',
    '入院患者',
    '学者',
    'サラリーマン',
    '情報屋',
    '刑事',
    'アイドル',
    '大物',
    'マスコミ',
    '鑑識官',
    'A.I.',
    '男子学生',
    '女子学生',
    'お嬢様',
    '委員長',
    '教師',
    'イレギュラー',
    '転校生',
    '女の子',
    '手先',
);

$oKifu = json_decode(session('sangeki_kifu', '{"charas":[],"loop":0,"day":0,"incidents":[]}'));

$aSelectedCharacter = array(
    '1001' => '神社',
    '1002' => '病院',
    '1003' => '都市',
    '1004' => '学校',
);
if (!empty($oKifu->charas)) {
    foreach ($oKifu->charas as $id) {
        $aSelectedCharacter[$id] = $aCharacter[$id];
    }
}
?>
<html>
<head>
<?php require('../secret/sangeki_head.php') ?>
    <title>惨劇RoopeR 棋譜記録用</title>
</head>
<body class="kifu_input">
    <div class="top_text">
        <h2></h2>
    </div>
    <form method="post">
        <select name="loop">
        <? for ($i = 0 ; $i <= 8 ; $i++): ?>
            <option <?= ($i == $oKifu->loop) ? 'selected="selected"' : '' ?>><?= $i ?></option>
        <? endfor; ?>
        </select>ループ
        <select name="day">
        <? for ($i = 0 ; $i <= 8 ; $i++): ?>
            <option <?= ($i == $oKifu->day) ? 'selected="selected"' : '' ?>><?= $i ?></option>
        <? endfor; ?>
        </select>日
        <div class="available_character_list">
            <?php foreach ($aCharacter as $id => $val): ?>
            <label><p>
                <input type="checkbox" name="chara[]" value="<?= $id ?>" <?= isset($aSelectedCharacter[$id]) ? 'checked="checked"' : '' ?>>
                <?= e($val) ?>
            </p></label>
            <?php endforeach; ?>
        </div>
        <div class="submit_wrapper">
            <input type="submit" value="棋譜テンプレートを生成">
        </div>
        <? if ($oKifu->loop > 0 && $oKifu->day > 0): ?>
            <div class="kifu_wrapper">
                <dl>
                <? for ($l = 1 ; $l <= $oKifu->loop ; $l++): ?>
                    <dt><?= $l ?>ループ目</dt>
                    <dd><table class="kifu">
                        <thead>
                            <tr>
                                <th class="day">日</th>
                                <th> </th>
                                <? foreach ($aSelectedCharacter as $ch): ?>
                                <th><p><?= str_replace('ー', '｜', $ch) ?></p></th>
                                <? endforeach; ?>
                                <th class="memo">メモ欄</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? for ($d = 1 ; $d <= $oKifu->day ; $d++): ?>
                            <tr>
                                <td rowspan=2><?= $d ?></td>
                                <td>脚</td>
                                <? foreach ($aSelectedCharacter as $ch): ?>
                                <td class="scriptwriter"> </td>
                                <? endforeach; ?>
                                <td rowspan=2><input class="memo" name="memo[<?= $l ?>][<?= $d ?>]"></td>
                            </tr>
                            <tr>
                                <td>主</td>
                                <? foreach ($aSelectedCharacter as $ch): ?>
                                <td class="hero"> </td>
                                <? endforeach; ?>
                            </tr>
                            <? endfor; ?>
                        </tbody>
                    </table></dd>
                <? endfor; ?>
                </dl>
            </div>
        <? endif; ?>
    </form>
<?php require('../secret/sangeki_footer.php') ?>
<div id="scriptwriter_action_list" class="modal">
    <h4>脚本家</h4>
    <ul>
        <li>&nbsp;</li>
        <li>不安+1</li>
        <li>不安-1</li>
        <li>不安禁止</li>
        <li>友好禁止</li>
        <li>移動縦</li>
        <li>移動横</li>
        <li>移動斜め</li>
        <li>暗躍+1</li>
        <li>暗躍+2</li>
    </ul>
</div>
<div id="hero_action_list" class="modal">
    <h4>主人公</h4>
    <ul>
        <li>&nbsp;</li>
        <li>友好+1</li>
        <li>友好+2</li>
        <li>移動縦</li>
        <li>移動横</li>
        <li>移動禁止</li>
        <li>暗躍禁止</li>
        <li>不安-1</li>
        <li>不安+1</li>
    </ul>
</div>
<script>
$('table.kifu').on('click', 'td.scriptwriter', function() {
    var $self = $(this);
    $('#scriptwriter_action_list').off().on('click', 'li', function() {
        $self.text($(this).text());
        $('#scriptwriter_action_list').hide();
    });
    $('#scriptwriter_action_list').show();
});
$('table.kifu').on('click', 'td.hero', function() {
    var $self = $(this);
    $('#hero_action_list').off().on('click', 'li', function() {
        $self.text($(this).text());
        $('#hero_action_list').hide();
    });
    $('#hero_action_list').show();
});
$('.modal').on('click', function() { $(this).hide(); });
</script>
</body>
</html>
