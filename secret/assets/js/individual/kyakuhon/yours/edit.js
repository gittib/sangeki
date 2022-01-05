if ($('body').hasClass('your_kyakuhon_edit')) {
    // 自作脚本編集画面の処理

    var scenarioList = JSON.parse(localStorage.scenarioList || '[]');

    const scenarioIndex = (() => {
        let idx = 0;
        let target = 0;
        scenarioList.forEach(item => {
            if (item.id == scenarioId) {
                target = idx;
            }
            idx++;
        });
        return target;
    })();
    const $charaList = $('.character_list');
    const $charaCount = $('.character_count span');
    const $incidentList = $('.incident_list');
    var scenario = scenarioList.find(item => item.id == scenarioId);
    $('[name=title]').val(scenario.title);
    $('[name=loop]').val(scenario.loop);
    $('[name=day]').val(scenario.day);
    $('[name=specialRule]').val(scenario.specialRule);
    $('[name=difficulty]').val(scenario.difficulty);
    $('[name=ruleY]').val(scenario.ruleY);
    $('[name=ruleX1]').val(scenario.ruleX1);
    $('[name=ruleX2]').val(scenario.ruleX2);
    $('[name=scenarioNote]').val(scenario.note);
    $('[name=advice]').val(scenario.advice);
    Object.keys(scenario.characters).forEach(key => {
        const chara = scenario.characters[key];
        let $dom = $('#clone_base-character_row').clone();
        $dom.removeAttr('id');
        $dom.find('select[name=chara_name]').val(chara.name);
        $dom.find('select[name=chara_role]').val(chara.role);
        $dom.find('input[name=chara_note]').val(chara.note);
        $charaList.append($dom);
    });
    $charaCount.text(scenario.characters.length);
    Object.keys(scenario.incidents).forEach(key => {
        const incident = scenario.incidents[key];
        let $dom = $('#clone_base-incident_row').clone();
        $dom.removeAttr('id');
        $dom.find('select[name=incident_day]').val(incident.day);
        $dom.find('select[name=incident_name]').val(incident.name);
        $dom.find('select[name=criminal_name]').val(incident.criminal);
        $dom.find('input[name=incident_note]').val(incident.note);
        $incidentList.append($dom);
    });

    setInterval(function() { updateScenario(); }, 2000);

    $('.add_chara').on('click', function() {
        // キャラ追加
        let chara = {
            'name': '',
            'role': '',
            'note': '',
        };
        let $dom = $('#clone_base-character_row').clone();
        $dom.removeAttr('id');
        $dom.find('select[name=chara_name]').val(chara.name);
        $dom.find('select[name=chara_role]').val(chara.role);
        $dom.find('input[name=chara_note]').val(chara.note);
        $charaList.append($dom);
        scenario.characters.push(chara);
        updateScenario();
    });
    $('.add_incident').on('click', function() {
        // 事件追加
        let maxDay = 0;
        $incidentList.find('select[name=incident_day]').each(function() {
            const day = Number($(this).val());
            if (day > maxDay) {
                maxDay = day;
            }
        });
        if (maxDay >= 8) maxDay = 7;
        let incident = {
            'day': maxDay+1,
            'name': '',
            'criminal': '',
            'note': '',
        };
        let $dom = $('#clone_base-incident_row').clone();
        $dom.removeAttr('id');
        $dom.find('select[name=incident_day]').val(incident.day);
        $dom.find('select[name=incident_name]').val(incident.name);
        $dom.find('select[name=criminal_name]').val(incident.criminal);
        $dom.find('input[name=incident_note]').val(incident.note);
        $incidentList.append($dom);
        scenario.incidents.push(incident);
        updateScenario();
    });

    $('div.editor').on('click', 'button.character_sort_up', function() {
        let $dom = $(this).closest('.character_row');
        const $prev = $dom.prev('.character_row');
        if ($prev && $prev.length > 0) {
            let chara = {
                'name': $dom.find('select[name=chara_name]').val(),
                'role': $dom.find('select[name=chara_role]').val(),
                'note': $dom.find('input[name=chara_note]').val(),
            };
            $dom.remove();
            $dom = $('#clone_base-character_row').clone();
            $dom.removeAttr('id');
            $dom.find('select[name=chara_name]').val(chara.name);
            $dom.find('select[name=chara_role]').val(chara.role);
            $dom.find('input[name=chara_note]').val(chara.note);
            $prev.before($dom);
            updateScenario();
        }
    });
    $('div.editor').on('click', 'button.character_sort_down', function() {
        let $dom = $(this).closest('.character_row');
        const $next = $dom.next('.character_row');
        if ($next && $next.length > 0) {
            let chara = {
                'name': $dom.find('select[name=chara_name]').val(),
                'role': $dom.find('select[name=chara_role]').val(),
                'note': $dom.find('input[name=chara_note]').val(),
            };
            $dom.remove();
            $dom = $('#clone_base-character_row').clone();
            $dom.removeAttr('id');
            $dom.find('select[name=chara_name]').val(chara.name);
            $dom.find('select[name=chara_role]').val(chara.role);
            $dom.find('input[name=chara_note]').val(chara.note);
            $next.after($dom);
            updateScenario();
        }
    });
    $('div.editor').on('click', 'button.delete', function() {
        if (confirm('削除しますか？')) {
            $(this).closest('li').remove();
            updateScenario();
        }
    });

    function updateScenario() {
        scenario.title = $('[name=title]').val();
        scenario.loop = $('[name=loop]').val();
        scenario.day = $('[name=day]').val();
        scenario.specialRule = $('[name=specialRule]').val();
        scenario.difficulty = $('[name=difficulty]').val();
        scenario.ruleY = $('[name=ruleY]').val();
        scenario.ruleX1 = $('[name=ruleX1]').val();
        scenario.ruleX2 = $('[name=ruleX2]').val();
        scenario.note = $('[name=scenarioNote]').val();
        scenario.advice = $('[name=advice]').val();

        let charas = [];
        $charaList.children().each(function() {
            let $dom = $(this);
            charas.push({
                'name': $dom.find('select[name=chara_name]').val(),
                'role': $dom.find('select[name=chara_role]').val(),
                'note': $dom.find('input[name=chara_note]').val(),
            });
        });
        scenario.characters = charas;
        $charaCount.text(charas.length);

        let incidents = [];
        $incidentList.children().each(function() {
            let $dom = $(this);
            let i = {
                'day': $dom.find('select[name=incident_day]').val(),
                'name': $dom.find('select[name=incident_name]').val(),
                'criminal': $dom.find('select[name=criminal_name]').val(),
                'note': $dom.find('input[name=incident_note]').val(),
            };
            incidents.push(i);
        });
        scenario.incidents = incidents;

        scenarioList.splice(scenarioIndex, 1, scenario);
        localStorage.scenarioList = JSON.stringify(scenarioList);
    }
}
