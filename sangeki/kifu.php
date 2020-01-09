<?
require_once('../secret/common.php');
require_once('../secret/kifu_util.php');
require_once('../secret/detail_util.php');
require_once('../secret/rule_role_master.php');

$errors = isValid($_GET);
if (empty($errors)) {
    $aSelectedCharacter = getCharacterList($_GET['ch']);

    $oKifu = (object)array(
        'set' => $_GET['set'],
        'loop' => $_GET['loop'],
        'day' => $_GET['day'],
        'chara' => $aSelectedCharacter,
        'target' => array_merge(getBoardMaster(), $aSelectedCharacter),
    );
    $aRole = array();
    foreach ($aRuleRoleMaster[$_GET['set']] as $aVal) {
        foreach ($aVal as $val) {
            $aRole[] = $val;
        }
    }
    $aRole = array_unique($aRole);
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
    <? if (!empty($errors)): ?>
        <div class="error">
            <span class="summary">以下のエラーのため、棋譜入力画面を生成できません。<br><a href="kifu_init.php">棋譜設定画面</a>に戻って入力し直してください。</span>
            <ul><? foreach ($errors as $val): ?>
                <li><?= $val ?></li>
            <? endforeach; ?></ul>
        </div>
    <? else: ?>
        <div class="button_wrapper">
            <button class="reset_all_action">行動ログを全て削除</button>
        </div>
        <form method="post" action="kifu_output.php">
            <input type="hidden" name="outtype">
            <input type="hidden" name="loop" value="<?= $oKifu->loop ?>">
            <input type="hidden" name="day" value="<?= $oKifu->day ?>">
            <input type="hidden" name="chara" value="<?= e(json_encode($oKifu->chara)) ?>">
            <input type="hidden" name="action">
            <input type="hidden" name="memo">
            <div class="kifu_wrapper">
                <div class="tr_name">惨劇セット：<?= getTragedySetName($oKifu->set) ?></div>
                <table class="character_list">
                    <tr>
                        <th>&nbsp;</th>
                        <th>備考</th>
                        <? foreach ($aRole as $role): ?>
                        <th><span class="vertical_text"><?= $role ?></span></th>
                        <? endforeach; ?>
                    </tr>
                    <? foreach ($aSelectedCharacter as $id => $chara): ?>
                    <tr>
                        <td><?= $chara ?></td>
                        <td><input type="text" name="chara[<?= $id ?>]"></td>
                        <? foreach ($aRole as $role): ?>
                        <td>？</td>
                        <? endforeach; ?>
                    </tr>
                    <? endforeach; ?>
                </table>
                <dl>
                <? for ($l = 1 ; $l <= $oKifu->loop ; $l++): ?>
                    <dt><?= $l ?>ループ目</dt>
                    <dd>
                        <table class="kifu">
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
                                    <? foreach ($aSelectedCharacter as $id => $val): ?>
                                    <td class="scriptwriter" data-loop="<?= $l ?>" data-day="<?= $d ?>" data-index="<?= $id ?>" data-character="<?= $val ?>">
                                    </td>
                                    <? endforeach; ?>
                                    <td rowspan=2><input class="memo" data-loop="<?= $l ?>" data-day="<?= $d ?>" name="memo[<?= $l ?>][<?= $d ?>]"></td>
                                </tr>
                                <tr>
                                    <td>主</td>
                                    <? foreach ($aSelectedCharacter as $id => $val): ?>
                                    <td class="hero" data-loop="<?= $l ?>" data-day="<?= $d ?>" data-index="<?= $id ?>" data-character="<?= $val ?>">
                                    </td>
                                    <? endforeach; ?>
                                </tr>
                                <? endfor; ?>
                            </tbody>
                        </table>
                    </dd>
                <? endfor; ?>
                </dl>
            </div>
            <div class="button_wrapper">
                <input type="button" class="save_action" data-type="csv" value="行動ログをCSVダウンロード">
                <input type="button" class="save_action" data-type="json" value="行動ログをjsonダウンロード">
                <input type="button" class="save_action" data-type="html" value="行動ログをブラウザで表示">
            </div>
        </form>
    <? endif; ?>
<?php require('../secret/sangeki_footer.php') ?>
<div id="scriptwriter_action_list" class="modal">
    <h4>脚本家</h4>
    <div class="explain">
        <span class="loop"></span>ループ<span class="day"></span>日目に<span class="character"></span>にセットされた脚本家行動カードを選択してください。
    </div>
    <ul>
        <li>&nbsp;</li>
        <li>不安+1</li>
        <li>不安 -1</li>
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
    <div class="explain">
        <span class="loop"></span>ループ<span class="day"></span>日目に<span class="character"></span>にセットされた主人公行動カードを選択してください。
    </div>
    <ul>
        <li>&nbsp;</li>
        <li>友好+1</li>
        <li>友好+2</li>
        <li>移動縦</li>
        <li>移動横</li>
        <li>移動禁止</li>
        <li>暗躍禁止</li>
        <li>不安 -1</li>
        <li>不安+1</li>
    </ul>
</div>
<script>
(function() {
})();
</script>
</body>
</html>
