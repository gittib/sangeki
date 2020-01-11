<?
require_once('../secret/common.php');
require_once('../secret/kifu_util.php');
require_once('../secret/detail_util.php');
require_once('../secret/rule_role_master.php');

if (empty($_GET['from']) || $_GET['from'] != 'kifu_init') {
    header('Location: kifu_init.php');
    return;
}
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
    $iRuleY = $oKifu->set == 'FS' ? 3 : 5;
    $aRuleY = array();
    $aRuleX = array();
    $aRole = array();
    foreach ($aRuleRoleMaster[$_GET['set']] as $sRuleName => $aVal) {
        if (count($aRuleY) < $iRuleY) {
            $aRuleY[] = $sRuleName;
        } else {
            $aRuleX[] = $sRuleName;
        }
        foreach ($aVal as $val) {
            $aRole[] = $val;
        }
    }
    $aRole = array_unique($aRole);

    $aInsidents = $aInsidentMaster[$oKifu->set];
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
            <div class="summary">棋譜入力画面の生成に失敗しました。<br><a href="kifu_init.php">棋譜設定画面</a>に戻って設定しなおして下さい。</div>
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
            <div class="summary">
                <p class="tr_name">惨劇セット：<?= getTragedySetName($oKifu->set) ?></p>
                <p><?= $oKifu->loop ?>ループ <?= $oKifu->day ?>日間</p>
            </div>
            <div class="rule_wrapper">
                <h3>ルール一覧</h3>
                <ul>
                  <li>
                    ルールY ：<select name="ruleY">
                        <option>？？？？？</option>
                        <? foreach ($aRuleY as $i => $val): ?>
                            <option value="<?= $i ?>"><?= e($val) ?></option>
                        <? endforeach; ?>
                    </select><br>
                  </li>
                  <li>
                    ルールX1：<select name="ruleX1">
                        <option>？？？？？</option>
                        <? foreach ($aRuleX as $i => $val): ?>
                            <option value="<?= $i ?>"><?= e($val) ?></option>
                        <? endforeach; ?>
                    </select><br>
                  </li>
                  <li>
                    ルールX2：<select name="ruleX1">
                        <option>？？？？？</option>
                        <? foreach ($aRuleX as $i => $val): ?>
                            <option value="<?= $i ?>"><?= e($val) ?></option>
                        <? endforeach; ?>
                    </select>
                  </li>
                </ul>
            </div>
            <div class="insident_wrapper">
                <h3>事件リスト</h3>
                <table class="insident_list">
                    <thead>
                        <th>日付</th>
                        <th>事件名</th>
                        <th>犯人</th>
                    </thead>
                    <? for ($d = 1 ; $d <= $oKifu->day ; $d++): ?>
                    <tbody>
                        <th><?= $d ?></th>
                        <td><select name="incident[<?= $d ?>]">
                            <option> </option>
                            <? foreach ($aInsidents as $key => $val): ?>
                            <option value="<?= $key ?>"><?= e($val) ?></option>
                            <? endforeach; ?>
                        </select></td>
                        <td><select name="criminal[<?= $d ?>]">
                            <option>？？？？？</option>
                            <? foreach ($aSelectedCharacter as $id => $chara): ?>
                            <option value="<?= $id ?>"><?= e($chara) ?></option>
                            <? endforeach; ?>
                        </select></td>
                    </tbody>
                    <? endfor; ?>
                </table>
            </div>
            <div class="kifu_wrapper">
                <div class="character_list_wrapper">
                    <h3>キャラクターリスト</h3>
                    <table class="character_list">
                        <thead>
                            <tr>
                                <th>&nbsp;</th>
                                <? foreach ($aRole as $role): ?>
                                <th><span class="vertical_text"><?= $role ?></span></th>
                                <? endforeach; ?>
                                <th>備考</th>
                            </tr>
                        </thead>
                        <? foreach ($aSelectedCharacter as $id => $chara): ?>
                        <tbody>
                            <tr>
                                <th><span><?= $chara ?></span></th>
                                <? foreach ($aRole as $role): ?>
                                <td class="role_check">　</td>
                                <? endforeach; ?>
                                <td><input class="memo" type="text" name="chara[<?= $id ?>]"></td>
                            </tr>
                        </tbody>
                        <? endforeach; ?>
                    </table>
                </div>
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
    $('.character_list .role_check').on('click', function () {
        var $self = $(this);
        switch ($self.text()) {
        case '○':
            $self.text('×');
            break;
        case '×':
            $self.text('？');
            break;
        case '？':
            $self.text('　');
            break;
        default:
            $self.text('○');
            break;
        }
    });
})();
</script>
</body>
</html>
