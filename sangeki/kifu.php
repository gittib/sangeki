<?
require_once('../secret/common.php');
require_once('../secret/kifu_util.php');

$errors = isValid();
$aSelectedCharacter = getCharacterList($_GET['ch']);

$oKifu = (object)array(
    'loop' => isset($_GET['loop']) ? $_GET['loop'] : 0,
    'day' => isset($_GET['day']) ? $_GET['day'] : 0,
    'chara' => getBoardMaster() + $aSelectedCharacter,
);
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
            <input type="hidden" name="chara" value="<?= e(json_encode($oKifu->aSelectedCharacter)) ?>">
            <input type="hidden" name="action">
            <input type="hidden" name="memo">
            <div class="kifu_wrapper">
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
    var aAction = {};
    var aMemo = {};
    if (localStorage.getItem('aAction')) {
        aAction = JSON.parse(localStorage.getItem('aAction'));
        $.each(aAction, function(loop, val) {
            $.each(val, function(day, val2) {
                $.each(val2, function(idx, val3) {
                    $.each(val3, function(type, val4) {
                        if (!aAction[loop][day][idx][type] || aAction[loop][day][idx][type].trim().length <= 0) {
                            delete aAction[loop][day][idx][type];
                        } else {
                            let $td = $('td.'+type+'[data-loop='+loop+'][data-day='+day+'][data-index='+idx+']');
                            $td.text(val4);
                        }
                    });
                    if (!Object.keys(aAction[loop][day][idx]).length) {
                        delete aAction[loop][day][idx];
                    }
                });
                if (!Object.keys(aAction[loop][day]).length) {
                    delete aAction[loop][day];
                }
            });
            if (!Object.keys(aAction[loop]).length) {
                delete aAction[loop];
            }
        });
        let s = JSON.stringify(aAction);
        localStorage.setItem('aAction', s);

        console.log(s);
    }
    if (localStorage.getItem('aMemo')) {
        aMemo = JSON.parse(localStorage.getItem('aMemo'));
        $.each(aMemo, function(loop, val) {
            $.each(val, function(day, val2) {
                let $input = $('input.memo[data-loop='+loop+'][data-day='+day+']');
                if ($input.size() > 0) {
                    $input.val(val2);
                }
                if (!aMemo[loop][day] || aMemo[loop][day].trim().length <= 0) {
                    delete aMemo[loop][day];
                }
            });
            if (!Object.keys(aMemo[loop]).length) {
                delete aMemo[loop];
            }
        });
        let s = JSON.stringify(aMemo);
        localStorage.setItem('aMemo', s);

        console.log(s);
    }

    $('.reset_all_action').on('click', function() {
        if (confirm('行動ログをすべて削除します。よろしいですか？')) {
            aAction = {};
            localStorage.removeItem('aAction');
            aMemo = {};
            localStorage.removeItem('aMemo');
            $('td.scriptwriter').text('');
            $('td.hero').text('');
            $('td input.memo').val('');
        }
    });

    $('table.kifu').on('click', 'td.scriptwriter', function() {
        openModal($(this), $('#scriptwriter_action_list'));
    });
    $('table.kifu').on('click', 'td.hero', function() {
        openModal($(this), $('#hero_action_list'));
    });
    $('table.kifu').on('change', 'input.memo', function() {
        let $self = $(this);
        let loop = $self.data('loop');
        let day = $self.data('day');
        let memo = $self.val();
        if (memo.length > 0) {
            if (aMemo[loop] == undefined) {
                aMemo[loop] = {};
            }
            aMemo[loop][day] = $self.val();
        } else {
            delete aMemo[loop][day];
            if (!Object.keys(aMemo[loop]).length) {
                delete aMemo[loop];
            }
        }
        localStorage.setItem('aMemo', JSON.stringify(aMemo));
    });
    $('.modal').on('click.dismiss', function() { $(this).hide(); });

    $('form .save_action[data-type]').on('click', function() {
        var $form = $(this).closest('form');
        $form.find('input[name=outtype]').val($(this).data('type'));
        $form.find('input[name=action]').val(JSON.stringify(aAction));
        $form.find('input[name=memo]').val(JSON.stringify(aMemo));
        $form.submit();
    });

    function openModal($self, $modal) {
        var loop = $self.data('loop');
        var day = $self.data('day');
        var idx = $self.data('index');
        var type = ($modal.attr('id') == 'hero_action_list') ? 'hero' : 'scriptwriter';
        $modal.find('.explain .loop').text(loop);
        $modal.find('.explain .day').text(day);
        $modal.find('.explain .character').text($self.data('character'));
        $modal.off('click.set_action').on('click.set_action', 'li', function() {
            let act = $(this).text();
            if (aAction[loop] == undefined) {
                aAction[loop] = {};
            }
            if (aAction[loop][day] == undefined) {
                aAction[loop][day] = {};
            }
            if (aAction[loop][day][idx] == undefined) {
                aAction[loop][day][idx] = {};
            }
            aAction[loop][day][idx][type] = act;
            $self.text(act);
            $modal.hide();

            localStorage.setItem('aAction', JSON.stringify(aAction));
        });
        $modal.show();
    }
})();
</script>
</body>
</html>
