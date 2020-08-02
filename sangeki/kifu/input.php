<?
define('SECRET_DIR', '../../secret/');
require_once(SECRET_DIR.'common.php');
require_once(SECRET_DIR.'kifu_util.php');
require_once(SECRET_DIR.'detail_util.php');
require_once(SECRET_DIR.'rule_role_master.php');

if (empty($_GET['from']) || $_GET['from'] != 'kifu_init') {
    header('Location: .');
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
<?php require(SECRET_DIR.'google_analytics.php') ?>
<?php require(SECRET_DIR.'sangeki_head.php') ?>
    <title>惨劇RoopeR 棋譜記録用 - <?= SITE_NAME ?></title>
</head>
<body class="kifu_input">
<? require(SECRET_DIR.'sangeki_header.php'); ?>
    <? if (!empty($errors)): ?>
        <div class="error">
            <div class="summary">棋譜入力画面の生成に失敗しました。<br><a href="javascript:history.back();">棋譜設定画面</a>に戻って設定しなおして下さい。</div>
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
        <form id="main_form" name="main_form" method="post" action="output.php" target="_blank">
            <input type="hidden" name="outtype" id="outtype">
            <input type="hidden" name="loop" value="<?= $oKifu->loop ?>">
            <input type="hidden" name="day" value="<?= $oKifu->day ?>">
            <div class="summary">
                <p class="tr_name">惨劇セット：<?= getTragedySetName($oKifu->set) ?></p>
                <p><?= $oKifu->loop ?>ループ <?= $oKifu->day ?>日間</p>
            </div>
            <div class="rule_wrapper">
                <h3>ルール一覧</h3>
                <ul>
                  <li>
                    ルールY ：<div class="rule ruleY">
                        <? foreach ($aRuleY as $i => $val): ?>
                            <label>
                                <input type="checkbox" name="ruleY[]" value="<?= e($val) ?>" checked="checked"/><?= e($val) ?>
                            </label>
                        <? endforeach; ?>
                    </div>
                  </li>
                  <li>
                    ルールX1：<div class="rule ruleX1">
                        <? foreach ($aRuleX as $i => $val): ?>
                            <label>
                                <input type="checkbox" name="ruleX1[]" value="<?= e($val) ?>" checked="checked"/><?= e($val) ?>
                            </label>
                        <? endforeach; ?>
                    </div>
                  </li>
                  <?php if ($oKifu->set != 'FS'): ?>
                  <li>
                    ルールX2：<div class="rule ruleX2">
                        <? foreach ($aRuleX as $i => $val): ?>
                            <label>
                                <input type="checkbox" name="ruleX2[]" value="<?= e($val) ?>" checked="checked"/><?= e($val) ?>
                            </label>
                        <? endforeach; ?>
                    </div>
                  </li>
                  <?php endif; ?>
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
                    <? $sInsident = empty($_GET['insident'][$d]) ? '' : $_GET['insident'][$d]; ?>
                    <tbody>
                        <th><?= $d ?></th>
                        <td><?= $sInsident ?></td>
                        <td>
                            <? if (!empty($sInsident)): ?>
                            <input type="hidden" name="insident[<?= $d ?>][name]" value="<?= $sInsident ?>">
                            <select name="insident[<?= $d ?>][criminal]">
                                <option value="">？？？？？</option>
                                <? if (in_array($sInsident, array('狂気の夜', '呪いの目覚め', '穢れの噴出', '死者の黙示録'))): ?>
                                    <? foreach (getBoardMaster() as $id => $board): ?>
                                    <option value="<?= $id ?>"><?= e($board) ?>の群像</option>
                                    <? endforeach; ?>
                                <? else: ?>
                                    <? foreach ($oKifu->chara as $id => $chara): ?>
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
                    <div>
                        神格登場ループ：
                        <select name="shinkaku_loop" id="shinkaku_loop">
                            <option></option>
                            <? for ($l = 1 ; $l <= $oKifu->loop ; $l++): ?>
                            <option value="<?= $l ?>"><?= $l ?>ループ目</option>
                            <? endfor; ?>
                        </select>
                    </div>
                    <div>
                        転校生登場日：
                        <select name="tenkousei_day" id="tenkousei_day">
                            <option></option>
                            <? for ($d = 1 ; $d <= $oKifu->day ; $d++): ?>
                            <option value="<?= $d ?>"><?= $d ?>日目</option>
                            <? endfor; ?>
                        </select>
                    </div>
                    <div class="character_list_scroll_view">
                        <table class="character_list">
                            <thead>
                                <tr>
                                    <th>役職</th>
                                    <th>キャラ</th>
                                    <? foreach ($aRole as $role): ?>
                                    <th><span class="vertical_text"><?= $role ?></span></th>
                                    <? endforeach; ?>
                                    <th>キャラ</th>
                                    <th class="memo">備考</th>
                                </tr>
                            </thead>
                            <? foreach ($oKifu->chara as $id => $chara): ?>
                            <tbody data-chara_id="<?= $id ?>" <?= in_array($id, array('1001', '1307')) ? ' style="display:none;" ' : '' ?>>
                                <tr>
                                    <td class="role_select">
                                        <select name="chara_info[<?= $id ?>][role]">
                                            <option>？？？？？</option>
                                            <option>パーソン</option>
                                            <? foreach ($aRole as $role): ?>
                                            <option><?= e($role) ?></option>
                                            <? endforeach; ?>
                                        </select>
                                    </td>
                                    <td class="chara_name"><span><?= e($chara) ?></span></td>
                                    <? foreach ($aRole as $role): ?>
                                    <td class="role_check">　</td>
                                    <? endforeach; ?>
                                    <td class="chara_name"><span><?= e($chara) ?></span></td>
                                    <td><input class="memo" type="text" name="chara_info[<?= $id ?>][memo]" placeholder="<?= e($chara) ?>に関するメモ"></td>
                                </tr>
                            </tbody>
                            <? endforeach; ?>
                        </table>
                    </div>
                </div>
                <dl>
                <? for ($l = 1 ; $l <= $oKifu->loop ; $l++): ?>
                    <dt><?= $l ?>ループ目</dt>
                    <dd>
                        <div>
                            <? if (array_key_exists('1901', $oKifu->chara)): ?>
                                手先初期配置：
                                <select name="action_info[<?= $l ?>][initialize][tesaki_board]">
                                    <? foreach (getBoardMaster() as $id => $board): ?>
                                    <option value="<?= $id ?>"><?= $board ?></option>
                                    <? endforeach; ?>
                                </select>
                                <br>
                            <? endif; ?>
                            <? if (array_key_exists('1105', $oKifu->chara)): ?>
                                学者カウンター：
                                <select name="action_info[<?= $l ?>][initialize][gakusha_counter]">
                                    <option value="">無し</option>
                                    <option value="不安">不安カウンター</option>
                                    <option value="暗躍">暗躍カウンター</option>
                                    <option value="友好">友好カウンター</option>
                                </select>
                                <br>
                            <? endif; ?>
                        </div>
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
                                                <select name="action_info[<?= $l ?>][<?= $d ?>][scriptwriter][<?= $i ?>][chara]">
                                                    <option>&nbsp;</option>
                                                    <? foreach ($oKifu->target as $id => $val): ?>
                                                    <option value="<?= $id ?>"><?= $val ?></option>
                                                    <? endforeach; ?>
                                                </select>に<select name="action_info[<?= $l ?>][<?= $d ?>][scriptwriter][<?= $i ?>][card]">
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
                                                    <select name="action_info[<?= $l ?>][<?= $d ?>][hero][<?= $i ?>][chara]">
                                                        <option>&nbsp;</option>
                                                        <? foreach ($oKifu->target as $id => $val): ?>
                                                        <option value="<?= $id ?>"><?= $val ?></option>
                                                        <? endforeach; ?>
                                                    </select>に<select name="action_info[<?= $l ?>][<?= $d ?>][hero][<?= $i ?>][card]">
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
                                        <textarea name="action_info[<?= $l ?>][<?= $d ?>][memo]" placeholder="メモ"></textarea>
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
            </div>
        </form>
    <? endif; ?>
<?php require(SECRET_DIR.'sangeki_footer.php') ?>
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

    $('#shinkaku_loop').on('change', function() {
        if ($(this).val()) {
            $('tbody[data-chara_id=1001]').show();
        } else {
            $('tbody[data-chara_id=1001]').hide();
        }
    });
    $('#tenkousei_day').on('change', function() {
        if ($(this).val()) {
            $('tbody[data-chara_id=1307]').show();
        } else {
            $('tbody[data-chara_id=1307]').hide();
        }
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
        var dataType = $(this).data('type');
        $('#outtype').val(dataType);

        // name属性値指定でformを選択
        var form = document.main_form;

        if (dataType == 'csv') {
            form.target = '_self';
        } else {
            window.open('', 'kifu_output');
            form.target = 'kifu_output';
        }
        form.submit();
    });
})();
</script>
</body>
</html>
