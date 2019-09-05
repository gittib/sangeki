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
        <div class="period_wrapper">
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
        </div>
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
                <div class="button_wrapper">
                    <button class="reset_all_action">行動ログを全て削除</button>
                </div>
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
                    </table></dd>
                <? endfor; ?>
                </dl>
            </div>
        <? endif; ?>
    </form>
<?php require('../secret/sangeki_footer.php') ?>
<div id="scriptwriter_action_list" class="modal">
    <h4>脚本家</h4>
    <div class="explain">
        <span class="loop"></span>ループ<span class="day"></span>日目に<span class="character"></span>にセットされた脚本家行動カードを選択してください。
    </div>
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
        <li>不安-1</li>
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
                            if ($td.size() > 0) {
                                $td.text(val4);
                            } else {
                                delete aAction[loop][day][idx][type];
                            }
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

        aMemo = JSON.parse(localStorage.getItem('aMemo'));
        $.each(aMemo, function(loop, val) {
            $.each(val, function(day, val2) {
                let $input = $('input.memo[data-loop='+loop+'][data-day='+day+']');
                if ($input.size() > 0) {
                    $input.text(val2);
                } else {
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
