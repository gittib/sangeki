if ($('body').hasClass('sangeki-kyakuhon-index')) {
    // 脚本一覧画面の処理

    $('.show_title').on('click', function() {
        if ($('.hide_title').is(':visible')) {
            if (confirm('脚本タイトルを表示するとネタバレになる可能性があります。\nよろしいですか？')) {
                $('.real_title').show();
                $('.hide_title').hide();
                $('.show_title').text('脚本タイトルを隠す');
            }
        } else {
            $('.real_title').hide();
            $('.hide_title').show();
            $('.show_title').text('脚本タイトルを表示');
        }
    });
}
