if ($('body').hasClass('sangeki-kyakuhon-detail')) {
    // 脚本詳細画面の処理

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
    $('.qr_wrapper img').on('click', function() {
        $(this).toggleClass('zoom');
    });
    $('.show_kifu_qr').on('click', function() {
        const $dom = $('.kifu_link_share_wrapper');
        const $img = $dom.find('img');
        if (!$img.attr('src')) {
            $img.attr('src', $img.data('src'));
        }
        $dom.show();
    });
    $('.hide_kifu_qr').on('click', function() {
        $('.kifu_link_share_wrapper').hide();
    });
}
