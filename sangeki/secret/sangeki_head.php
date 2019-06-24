<?php
if (realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)) {
    $url = str_replace('/secret/'.basename(__FILE__), '/', $_SERVER["REQUEST_URI"]);
    header('Location: ' . $url);
    exit;
}
?>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
<link rel="stylesheet" href="screen.css?v=<?= filemtime('../sangeki/screen.css') ?>">
<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon" /> 
<link rel="icon" href="favicon.ico" type="image/vnd.microsoft.icon" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php if (strpos($_SERVER['REQUEST_URI'], 'sangeki_test') !== FALSE): ?>
<script>
$(function() {
    var $div = $('<div>').css({
        'height': '50px',
        'background-color': 'red',
    });
    $div.append($('<div>').css({
        'height': '50px',
        'background-color': 'red',
        'color': 'white',
    }).text('TEST'));
    $('body').prepend($div);
})
</script>
<?php endif; ?>
