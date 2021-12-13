function difficultyName(difficulty) {
    switch (Number(difficulty)) {
    case 1: return '練習用';
    case 2: return '簡単';
    case 3: return '易しい';
    case 4: return '普通';
    case 5: return '難しい';
    case 6: return '困難';
    case 7: return '惨劇';
    case 8: return '悪夢';
    default: return '特殊';
    }
}
function difficultyStar(difficulty) {
    let star = '';
    for (let i = 1 ; i <= 8 ; i++) {
        if (i <= Number(difficulty)) {
            star += '★';
        } else {
            star += '☆';
        }
    }
    return star;
}

var scenarioList = JSON.parse(localStorage.getItem('scenarioList') || '[]');

if ($('body').hasClass('your_kyakuhon_list')) {
    // 自作脚本リストの処理
    function reloadScenarioList() {
        scenarioList = JSON.parse(localStorage.getItem('scenarioList') || '[]');
        $('#kyakuhon_list').empty();
        scenarioList.forEach((item) => {
            let $dom = $('#clone_base-kyakuhon_column').clone();
            $dom.removeAttr('id');
            $dom.attr('data-id', item.id);
            $dom.find('button.delete').attr('data-id', item.id);
            $dom.find('.rule_prefix').text(item.set);
            $dom.find('.rule_prefix').addClass(item.set);
            $dom.find('a.view').attr('href', './preview.php?id='+item.id+'&set='+item.set);
            $dom.find('a.edit').attr('href', './edit.php?id='+item.id+'&set='+item.set);
            $dom.find('.title').text('['+item.id+']'+item.title);
            $dom.find('.loop > strong').text(item.loop);
            $dom.find('.day > strong').text(item.day);
            $dom.find('.difficulty .star').text(difficultyStar(item.difficulty));
            $dom.find('.difficulty .tag').text(difficultyName(item.difficulty));

            $('#kyakuhon_list').append($dom);
        });
    }
    reloadScenarioList();

    $('#kyakuhon_list').on('click', 'button.delete[data-id]', function () {
        const id = $(this).attr('data-id');
        if (confirm('ID:['+id+']の脚本を削除しますか？')) {
            scenarioList = scenarioList.filter(item => item.id != id);
            localStorage.setItem('scenarioList', JSON.stringify(scenarioList));
            reloadScenarioList();
        }
    });

    $('.create_new').on('click', function() {
        const setName = $('select[name=set]').val();
        if (!setName) {
            alert('惨劇セットを指定して下さい。');
            return;
        }
        let maxId = 0;
        scenarioList.forEach(item => {
            if (maxId < item.id) maxId = item.id;
        });
        scenarioList.push({
            'id': maxId+1,
            'title': '新規脚本',
            'set': setName,
            'loop': 1,
            'day': 1,
            'difficulty': 1,
            'specialRule': '',
            'ruleY': '',
            'ruleX1': '',
            'ruleX2': '',
            'characters': [],
            'incidents': [],
            'note': '',
            'advice': '',
        });
        localStorage.setItem('scenarioList', JSON.stringify(scenarioList));
        reloadScenarioList();
    });
}
if ($('body').hasClass('your_kyakuhon_edit')) {
    const scenarioIndex = (function() {
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
        let incident = {
            'day': 1,
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

        let incidents = [];
        $incidentList.children().each(function() {
            let $dom = $(this);
            incidents.push({
                'day': $dom.find('select[name=incident_day]').val(),
                'name': $dom.find('select[name=incident_name]').val(),
                'criminal': $dom.find('select[name=criminal_name]').val(),
                'note': $dom.find('input[name=incident_note]').val(),
            });
        });
        scenario.incidents = incidents;

        scenarioList.splice(scenarioIndex, 1, scenario);
        localStorage.setItem('scenarioList', JSON.stringify(scenarioList));
    }
}
if ($('body').hasClass('your_kyakuhon_preview')) {
    const scenario = scenarioList.find(item => item.id == scenarioId);

    $('.summary .loop').text(scenario.loop+'ループ');
    $('.summary .day').text(scenario.day+'日');
    $('.special_rule').text(scenario.specialRule);
    $('.ruleY').text(scenario.ruleY);
    $('.ruleX1').text(scenario.ruleX1);
    $('.ruleX2').text(scenario.ruleX2);

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
}
