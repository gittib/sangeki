<?php require_once(dirname(__FILE__) . '/common.php'); ?>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
<link rel="stylesheet" href="screen.css?v=<?= filemtime('../sangeki/screen.css') ?>">
<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon" /> 
<link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php if (!isProd()): ?>
<script>
$(function() {
    var $div = $('<div>').css({
        'background-color': 'red',
    });
    $div.on('click', function() {
        $(this).remove();
    })
    $div.append($('<span>').css({
        'font-size': '48px',
        'font-weight': 'bold',
        'color': 'white',
    }).text('TEST'));
    $div.append($('<span>').css({
        'color': 'white',
    }).text('タップしてテストヘッダを隠す'));
    $('body').prepend($div);
})
</script>
<?php endif; ?>
