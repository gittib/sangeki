<?php require_once(dirname(__FILE__) . '/common.php'); ?>
<header>
    <div id="nav-drawer">
        <input id="nav-input" type="checkbox" class="nav-unshown">
        <label id="nav-open" for="nav-input"><span></span></label>
        <label class="nav-unshown" id="nav-close" for="nav-input"></label>
        <div id="nav-content">
            <div class="menu_header">
            </div>
            <ul class="top_menu">
                <li><a href="<?= TOP_PATH ?>">TOP</a></li>
                <li><a href="<?= TOP_PATH ?>kyakuhon/">脚本リスト</a></li>
                <li><a href="<?= TOP_PATH ?>kifu/">棋譜記録機能</a></li>
            </ul>
        </div>
    </div>
</header>
