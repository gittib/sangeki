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

    $aTmp = array();
    foreach (getBoardMaster() as $key => $val) {
        $aTmp[$key] = $val;
    }
    foreach ($aSelectedCharacter as $key => $val) {
        $aTmp[$key] = $val;
    }
    $oKifu = (object)array(
        'set' => $_GET['set'],
        'loop' => $_GET['loop'],
        'day' => $_GET['day'],
        'chara' => $aSelectedCharacter,
        'target' => $aTmp,
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
    <? if (!empty($errors)): ?>
        <div class="error">
            <div class="summary">棋譜入力画面の生成に失敗しました。<br><a href="kifu_init.php">棋譜設定画面</a>に戻って設定しなおして下さい。</div>
            <ul><? foreach ($errors as $val): ?>
                <li><?= $val ?></li>
            <? endforeach; ?></ul>
        </div>
    <? else: ?>
        <h1>惨劇RoopeR 棋譜入力画面</h1>
        <div class="button_wrapper">
            フォントサイズ：<select id="font_size_change">
                <option value="12px">最小</option>
                <option value="14px">小</option>
                <option value="16px" selected="selected">中</option>
                <option value="18px">大</option>
                <option value="20px">最大</option>
            </select>
        </div>
        <form id="main_form" method="post" action="kifu_output.php">
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
                        <option value="">？？？？？</option>
                        <? foreach ($aRuleY as $i => $val): ?>
                            <option><?= e($val) ?></option>
                        <? endforeach; ?>
                    </select><br>
                  </li>
                  <li>
                    ルールX1：<select name="ruleX1">
                        <option value="">？？？？？</option>
                        <? foreach ($aRuleX as $i => $val): ?>
                            <option><?= e($val) ?></option>
                        <? endforeach; ?>
                    </select><br>
                  </li>
                  <? if ($oKifu->set != 'FS'): ?>
                  <li>
                    ルールX2：<select name="ruleX1">
                        <option value="">？？？？？</option>
                        <? foreach ($aRuleX as $i => $val): ?>
                            <option><?= e($val) ?></option>
                        <? endforeach; ?>
                    </select>
                  </li>
                  <? endif; ?>
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
                        <td><?= empty($_GET['insident'][$d]) ? '' : $_GET['insident'][$d] ?></td>
                        <td>
                            <? if (!empty($_GET['insident'][$d])): ?>
                            <input type="hidden" name="insident[<?= $d ?>]" value="<?= $_GET['insident'] ?>">
                            <select name="criminal[<?= $d ?>]">
                                <option value="">？？？？？</option>
                                <? if (in_array($_GET['insident'][$d], array('狂気の夜', '呪いの目覚め', '穢れの噴出', '死者の黙示録'))): ?>
                                    <? foreach (getBoardMaster() as $id => $board): ?>
                                    <option value="<?= $id ?>"><?= e($board) ?>の群像</option>
                                    <? endforeach; ?>
                                <? else: ?>
                                    <? foreach ($aSelectedCharacter as $id => $chara): ?>
                                    <option value="<?= $id ?>"><?= e($chara) ?></option>
                                    <? endforeach; ?>
                                <? endif; ?>
                            </select>
                            <? endif; ?>
                        </td>
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
                                <th>役職</th>
                                <th>キャラ</th>
                                <? foreach ($aRole as $role): ?>
                                <th><span class="vertical_text"><?= $role ?></span></th>
                                <? endforeach; ?>
                                <th class="memo">備考</th>
                            </tr>
                        </thead>
                        <? foreach ($aSelectedCharacter as $id => $chara): ?>
                        <tbody>
                            <tr>
                                <td class="role_select">
                                    <select name="chara_role[<?= $id ?>]">
                                        <option>？？？？？</option>
                                        <option>パーソン</option>
                                        <? foreach ($aRole as $role): ?>
                                        <option><?= $role ?></option>
                                        <? endforeach; ?>
                                    </select>
                                </td>
                                <td class="chara_name"><span><?= $chara ?></span></td>
                                <? foreach ($aRole as $role): ?>
                                <td class="role_check">　</td>
                                <? endforeach; ?>
                                <td><input class="memo" type="text" name="chara_memo[<?= $id ?>]" placeholder="メモ"></td>
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
                                    <th>脚本家行動カード</th>
                                    <th>主人公行動カード</th>
                                </tr>
                            </thead>
                            <? for ($d = 1 ; $d <= $oKifu->day ; $d++): ?>
                            <tbody>
                                <tr>
                                    <td rowspan="2"><?= $d ?></td>
                                    <td class="set_card">
                                        <ul>
                                            <? for ($i = 0 ; $i < 3 ; $i++): ?><li>
                                                <select name="scriptwriter_chara[<?= $l ?>][<?= $d ?>][<?= $i ?>]">
                                                <? foreach ($oKifu->target as $id => $val): ?>
                                                    <option value="<?= $id ?>"><?= $val ?></option>
                                                <? endforeach; ?>
                                                </select>に<select name="scriptwriter_card[<?= $l ?>][<?= $d ?>][<?= $i ?>]">
                                                    <option>&nbsp;</option>
                                                    <option>不安+1</option>
                                                    <option>不安-1</option>
                                                    <option>不安禁止</option>
                                                    <option>友好禁止</option>
                                                    <option>移動縦</option>
                                                    <option>移動横</option>
                                                    <option>移動斜め</option>
                                                    <option>暗躍+1</option>
                                                    <option>暗躍+2</option>
                                                </select>
                                                <br>
                                            </li><? endfor; ?>
                                        </ul>
                                    </td>
                                    <td class="set_card">
                                        <ul>
                                            <? for ($i = 0 ; $i < 3 ; $i++): ?><li>
                                                    <select name="hero_chara[<?= $l ?>][<?= $d ?>][<?= $i ?>]">
                                                    <? foreach ($oKifu->target as $id => $val): ?>
                                                        <option value="<?= $id ?>"><?= $val ?></option>
                                                    <? endforeach; ?>
                                                    </select>に<select name="hero_card[<?= $l ?>][<?= $d ?>][<?= $i ?>]">
                                                        <option>&nbsp;</option>
                                                        <option>友好+1</option>
                                                        <option>友好+2</option>
                                                        <option>移動縦</option>
                                                        <option>移動横</option>
                                                        <option>移動禁止</option>
                                                        <option>暗躍禁止</option>
                                                        <option>不安-1</option>
                                                        <option>不安+1</option>
                                                    </select>
                                            </li><? endfor; ?>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="memo">
                                        <textarea name="memo[<?= $l ?>][<?= $d ?>]" placeholder="メモ"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                            <? endfor; ?>
                        </table>
                    </dd>
                <? endfor; ?>
                </dl>
            </div>
            <div class="button_wrapper">
                <input type="button" class="save_action" data-type="csv" value="行動ログをCSVダウンロード">
                <input type="button" class="save_action" data-type="json" value="行動ログをjsonダウンロード">
                <input type="button" class="save_action" data-type="html" value="行動ログをブラウザで表示">

                <input type="hidden" name="data_type" id="data_type">
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
    $('#font_size_change').on('change', function () {
        $('html').css('font-size', $(this).val());
    });
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
    $('.save_action').on('click', function () {
        $('#data_type').val($(this).data('type'));
        $('#main_form').submit();
    });
})();
</script>
</body>
</html>
