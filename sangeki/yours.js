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
            $dom.find('.rule_prefix').text(item.set);
            $dom.find('.rule_prefix').addClass(item.set);
            $dom.find('a.link').attr('href', './detail.php?id='+item.id);
            $dom.find('.title').text(item.title);
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

    $('.create_new').on('click', function() {
        let maxId = Math.max(scenarioList.map(item => item.id));
        scenarioList.push({
            'id': maxId+1,
            'title': '新規脚本',
            'set': 'BTX',
            'loop': 1,
            'day': 1,
            'difficulty': 1,
            'specialRule': '',
            'ruleY': '',
            'ruleX1': '',
            'ruleX2': '',
            'characters': [],
            'incidents': [],
        });
        localStorage.setItem('scenarioList', JSON.stringify(scenarioList));
    });
}
