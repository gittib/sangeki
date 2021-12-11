function difficultyName(difficulty) {
    switch (difficulty) {
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

var scenarioList = JSON.parse(localStorage.getItem('scenarioList') || '[]');

if ($('body').hasClass('your_kyakuhon_list')) {
    console.log('自作脚本リスト');

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

            let difficultyStar = '';
            for (let i = 1 ; i <= 8 ; i++) {
                if (i <= item.difficulty) {
                    difficultyStar += '★';
                } else {
                    difficultyStar += '☆';
                }
            }
            $dom.find('.difficulty .star').text(difficultyStar);
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
    var scenario = scenarioList.find(item => item.id == scenarioId);
    $('[name=title]').val(scenario.title);
    $('[name=loop]').val(scenario.loop);
    $('[name=day]').val(scenario.day);
    $('[name=difficulty]').val(scenario.difficulty);
    $('[name=ruleY]').val(scenario.ruleY);
    $('[name=ruleX1]').val(scenario.ruleX1);
    $('[name=ruleX2]').val(scenario.ruleX2);

    setInterval(function() {
        scenario.title = $('[name=title]').val();
        scenario.loop = $('[name=loop]').val();
        scenario.day = $('[name=day]').val();
        scenario.difficulty = $('[name=difficulty]').val();
        scenario.ruleY = $('[name=ruleY]').val();
        scenario.ruleX1 = $('[name=ruleX1]').val();
        scenario.ruleX2 = $('[name=ruleX2]').val();
        updateScenario();
    }, 2000);

    $('.add_chara').on('click', function() {
    });
    $('.add_incident').on('click', function() {
    });

    function updateScenario() {
        scenarioList.splice(scenarioIndex, 1, scenario);
        localStorage.setItem('scenarioList', JSON.stringify(scenarioList));
    }
}
