if ($('body').hasClass('your_kyakuhon_list')) {
    console.log('自作脚本リスト');

    // 自作脚本リストの処理
    JSON.parse(localStorage.getItem('scenarioList') || '[]').forEach((item) => {
        let $dom = $('#clone_base-kyakuhon_column').clone();
        $dom.removeAttr('id');
        $dom.find('a.link').attr('href', './detail.php?id='+item.id);
        $dom.find('.title').text(item.title);
        $dom.find('.loop > strong').text(item.loop);
        $dom.find('.day > strong').text(item.day);
        $('#kyakuhon_list').append($dom);
    });
}
