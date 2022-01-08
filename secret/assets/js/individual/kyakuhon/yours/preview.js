if ($('body').hasClass('sangeki-kyakuhon-yours-preview')) {
    // 自作脚本プレビュー画面の処理

    const scenarioList = JSON.parse(localStorage.scenarioList || '[]');
    const scenario = scenarioList.find(item => item.id == scenarioId);

    $('.summary .loop').text(scenario.loop+'ループ');
    $('.summary .day').text(scenario.day+'日');
    $('.special_rule').text(scenario.specialRule);
    $('.ruleY').text(scenario.ruleY);
    $('.ruleX1').text(scenario.ruleX1);
    $('.ruleX2').text(scenario.ruleX2);
    if (scenario.plus) $('.tragedy_set .plus').text('＋');

    const $charaList = $('#character_list');
    Object.keys(scenario.characters).forEach(key => {
        const chara = scenario.characters[key];
        let $dom = $('#clone_base-character').clone();
        $dom.removeAttr('id');
        $dom.removeAttr('style');
        $dom.find('.chara_name').text(chara.name);
        const role = chara.role || 'パーソン';
        $dom.find('.role_name').text(role);
        if (role != 'パーソン') {
            $dom.find('.chara_role').addClass('special');
        }
        $dom.find('.chara_note').text(chara.note);
        $charaList.append($dom);
    });

    const $incidentOpenList = $('#incident_open_list');
    for (let i = 1 ; i <= scenario.day ; i++) {
        let $dom = $('#clone_base-incident_open').clone();
        $dom.removeAttr('id');
        $dom.removeAttr('style');
        $dom.find('.incident_day').text(i);
        const incident = scenario.incidents.find(item => item.day == i);
        if (incident) {
            if (incident.name == '偽装事件') {
                $dom.find('.incident_name').text(incident.note || '＞突然の死＜');
            } else {
                $dom.find('.incident_name').text(incident.name);
            }
        }
        $incidentOpenList.append($dom);
    }
    const $incidentHiddenList = $('#incident_hidden_list');
    Object.keys(scenario.incidents).forEach(key => {
        const incident = scenario.incidents[key];

        let $dom = $('#clone_base-incident_hidden').clone();
        $dom.removeAttr('id');
        $dom.removeAttr('style');
        $dom.find('.incident_day').text(incident.day);
        $dom.find('.incident_name').text(incident.name);
        $dom.find('.incident_criminal').text(incident.criminal);
        if (incident.note) {
            $dom.find('.incident_note').text('('+incident.note+')');
            $dom.find('.incident_note').removeAttr('style');
        }
        $incidentHiddenList.append($dom);
    });

    $('h3.title').text(scenario.title);
    $('.scenario_note').text(scenario.note);
    $('.scenario_advice').text(scenario.advice);
    $('.difficulity_name').text(difficultyName(scenario.difficulty));
    $('.difficulty_star').text(difficultyStar(scenario.difficulty));

    $('.toggle_private').on('click', function() {
        var $self = $(this);
        var $p = $('.private');
        if ($p.is(':visible')) {
            $p.hide();
            $self.text('非公開シート、脚本家の指針を表示');
        } else {
            if (confirm('非公開シートを表示します。よろしいですか？')) {
                $p.show();
                $self.text('非公開シート、脚本家の指針を隠す');
            }
        }
    });
}
