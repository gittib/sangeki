<?php
if (realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)) {
    $url = str_replace('/secret/'.basename(__FILE__), '/', $_SERVER["REQUEST_URI"]);
    header('Location: ' . $url);
    exit;
}
?>
<footer>
    <div class="credit">
        本ページはBakaFire Partyのゲーム「<a href="http://bakafire.main.jp/rooper/sr_top.htm" target="_blank">惨劇RoopeR</a>」のファンページです。また、惨劇コモンズの画像素材を利用しています。<br><br>
        <a href="http://bakafire.main.jp/rooper/sr_dl_04_sozai.htm" target="_blank">惨劇コモンズ by BakaFire, 紺ノ玲</a> is licensed under a <a href="http://creativecommons.org/licenses/by-sa/2.1/jp/" target="_blank">Creative Commons 表示 - 継承 2.1 日本 License</a>
    </div>
</footer>
