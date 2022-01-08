if ($('body').hasClass('sangeki-kifu-input')) {
    // 棋譜入力画面の処理

    $('#font_size_change').on('change', function () {
        $('html').css('font-size', $(this).val());
    });

    $('#shinkaku_loop').on('change', function() {
        if ($(this).val()) {
            $('tbody[data-chara_id=1001]').show();
        } else {
            $('tbody[data-chara_id=1001]').hide();
        }
    });
    $('#tenkousei_day').on('change', function() {
        if ($(this).val()) {
            $('tbody[data-chara_id=1307]').show();
        } else {
            $('tbody[data-chara_id=1307]').hide();
        }
    });
    $('.character_list .role_check > p').on('click', function () {
        var $self = $(this);
        switch ($self.text()) {
        case '○':
            $self.text('×');
            break;
        case '×':
            $self.text('？');
            break;
        case '？':
            $self.text('　');
            break;
        default:
            $self.text('○');
            break;
        }
    });
    $('.role_switch').on('change', function () {
        const $self = $(this);
        const selector = '.role_index_' + $self.data('role_index');
        if ($self.prop('checked')) {
            $(selector).removeClass('ignore_role');
        } else {
            $(selector).addClass('ignore_role');
        }
    });
    $('.save_action').on('click', function () {
        var dataType = $(this).data('type');
        $('#outtype').val(dataType);

        // name属性値指定でformを選択
        var form = document.main_form;

        if (dataType == 'csv' || dataType == 'json') {
            form.target = '_self';
        } else {
            window.open('', 'kifu_output');
            form.target = 'kifu_output';
        }
        form.submit();
    });
}
