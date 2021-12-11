if ($('body').hasClass('your_kyakuhon_list')) {
    // 自作脚本リストの処理
    JSON.parse(localStorage.getItem('scenarioList') || '[]').forEach((item) => {
        let $dom = $('#clone_base-kyakuhon_column');
        $dom.removeAttr('id');
        $dom.removeAttr('style');
        $dom.find('a.link').attr('href', './detail.php?id='+item.id);
        $dom.find('.loop > strong').text(item.loop);
        $dom.find('.day > strong').text(item.day);
        $('#kyakuhon_list').append($dom);
    });
}
