<?php require_once(dirname(__FILE__) . '/common.php'); ?>
<header>
    <div id="nav-drawer">
    <h1><a href="<?= TOP_PATH ?>"><?= SITE_NAME ?></a></h1>
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <div class="menu_header">
            </div>
            <ul class="top_menu">
                <li><a href="<?= TOP_PATH ?>">TOP</a></li>
                <? foreach ($aTopMenu as $val): ?>
                <li><a href="<?= TOP_PATH . e($val->href) ?>"><?= e($val->link) ?></a></li>
                <? endforeach; ?>
            </ul>
        </div>
    </div>
</header>
