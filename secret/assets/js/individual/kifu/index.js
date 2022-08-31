if ($('body').hasClass('sangeki-kifu-index')) {
    // 棋譜初期化画面の処理

    $('select[name=set]').on('change', function () {
        var s = $(this).val();
        var $select = $('select.incident');
        $select.empty();
        $select.append('<option> </option>');
        $.each(aIncidents[s], function (k,v) {
            $select.append('<option>'+v+'</option>');
        });
    });
    $('select[name=day]').on('change', function () {
        var day = $(this).val();
        var $incidentPlans = $('.incident_list > li');
        $incidentPlans.hide();
        for (var i = 1 ; i <= day ; i++) {
            $incidentPlans.filter('[data-day='+i+']').show();
        }
    });
}
