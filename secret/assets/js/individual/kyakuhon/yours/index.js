if ($('body').hasClass('sangeki-kyakuhon-yours-index')) {
    // 自作脚本リストの処理

    var scenarioList = JSON.parse(localStorage.scenarioList || '[]');

    function reloadScenarioList() {
        const hash = () => dateStr() + Math.random().toString(10).slice(2);
        scenarioList = JSON.parse(localStorage.scenarioList || '[]');
        $('#kyakuhon_list').empty();
        scenarioList.forEach((item) => {
            let $dom = $('#clone_base-kyakuhon_column').clone();
            const isPlus = item.plus || 0;
            $dom.removeAttr('id');
            $dom.attr('data-id', item.id);
            $dom.find('button.delete').attr('data-id', item.id);
            $dom.find('.rule_prefix').text(item.set+(isPlus ? '＋' : ''));
            $dom.find('.rule_prefix').addClass(item.set);
            $dom.find('a.view').attr('href', './preview.php?id='+item.id+'&set='+item.set+'&plus='+isPlus);
            $dom.find('a.edit').attr('href', './edit.php?id='+item.id+'&set='+item.set+'&plus='+isPlus);
            $dom.find('.title').text('['+item.id+']'+item.title);
            $dom.find('.loop > strong').text(item.loop);
            $dom.find('.day > strong').text(item.day);
            $dom.find('.difficulty .star').text(difficultyStar(item.difficulty));
            $dom.find('.difficulty .tag').text(difficultyName(item.difficulty));

            $('#kyakuhon_list').append($dom);

            if (!item.hash) {
                item.hash = hash();
            }
        });
        localStorage.scenarioList = JSON.stringify(scenarioList);
    }
    reloadScenarioList();

    $('.download_file_name').text(SCENARIO_LIST_FILE_NAME);

    $('#kyakuhon_list').on('click', 'button.delete[data-id]', function () {
        const id = $(this).attr('data-id');
        if (confirm('ID:['+id+']の脚本を削除しますか？')) {
            scenarioList = scenarioList.filter(item => item.id != id);
            localStorage.scenarioList = JSON.stringify(scenarioList);
            reloadScenarioList();
        }
    });

    $('.create_new').on('click', function() {
        var tmp = $('select[name=set]').val().split('-');
        const setName = tmp[0];
        const isPlus = (tmp[1] == 'plus');
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
            'plus': isPlus,
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
        localStorage.scenarioList = JSON.stringify(scenarioList);
        reloadScenarioList();
    });

    $('.open_export_console').on('click', () => {
        $('.open_export_console').remove();
        $('.export_console').removeAttr('style');
    });

    $('.save_as').on('click', () => {
        // 脚本データ文字列を取得
        const json = {
            'thisIs': 'sangekiRoopeR',
            'scenarioList': JSON.parse(localStorage.scenarioList),
        };
        const txt = JSON.stringify(json);
        if (!txt) return;

        // 文字列をBlob化
        const blob = new Blob([txt], { type: 'text/plain' });

        // ダウンロード用のaタグ生成
        const a = document.createElement('a');
        a.href =  URL.createObjectURL(blob);
        a.download = SCENARIO_LIST_FILE_NAME;
        a.click();
    });

    $('.add_scenario_from_file').on('change', function(e) {
        const $self = $(this);
        const fileReader = new FileReader();
        fileReader.addEventListener('load', data => {
            try {
                const fileData = JSON.parse(data.target.result);
                if (fileData.thisIs == 'sangekiRoopeR' && fileData.scenarioList) {
                    if (confirm('ファイルから読み込んだ脚本データを追加します。よろしいですか？')) {
                        const listForThisBrowser = JSON.parse(localStorage.scenarioList || '[]');
                        const hashes = listForThisBrowser.map(i => i.hash || '');
                        let addId = 1;
                        listForThisBrowser.forEach(item => {
                            if (addId <= item.id) addId = item.id + 1;
                        });
                        Object.keys(fileData.scenarioList).forEach(key => {
                            const item = fileData.scenarioList[key];
                            if (hashes.indexOf(item.hash || '') == -1) {
                                item.id = addId;
                                listForThisBrowser.push(item);
                                addId++;
                            }
                        });
                        localStorage.scenarioList = JSON.stringify(listForThisBrowser);
                        reloadScenarioList();
                    }
                } else {
                    throw new Error();
                }
            } catch (ignore) {
                alert('ファイルの読み込みに失敗しました。');
            }
            $self.val('');
        });
        fileReader.readAsText(e.target.files[0]);
    });
}
