<?php require_once(dirname(__FILE__) . '/common.php'); ?>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
<link rel="stylesheet" href="<?= TOP_PATH ?>screen.css?v=<?= filemtime(dirname(__FILE__) . '/../sangeki/screen.css') ?>">
<link rel="shortcut icon" href="<?= TOP_PATH ?>favicon.ico" type="image/vnd.microsoft.icon" /> 
<link rel="icon" href="<?= TOP_PATH ?>favicon.ico" type="image/vnd.microsoft.icon" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/2899befb82.js" crossorigin="anonymous"></script>
<?php if (!isProd()): ?>
<script>
$(function() {
    var $div = $('<div>').css({
        'position': 'fixed',
        'z-index': '10000',
        'top': '0',
        'background-color': 'red',
        'padding': '16px',
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
    $('body').append($div);
})
</script>
<?php endif; ?>
