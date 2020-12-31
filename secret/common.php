<?php
session_start();

if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'ペンスキーの惨劇RoopeR脚本部屋');
    $aPath = explode('/', $_SERVER['REQUEST_URI']);
    define('TOP_PATH', '/'.$aPath[1].'/');
}


function isProd() {
    return file_exists(dirname(__FILE__) . '/../.env.prod');
}

function e($s) {
    return htmlspecialchars($s, ENT_QUOTES);
}

function endsWith($haystack, $needle) {
  return (strrpos($haystack, $needle) === strlen($haystack) - strlen($needle));
}

function session($key, $defaultValue = '') {
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    } else {
        return $defaultValue;
    }
}

function difficulityName($difficulity) {
    switch ($difficulity) {
        case 1:
            return '練習用';
        case 2:
            return '簡単';
        case 3:
            return '易しい';
        case 4:
            return '普通';
        case 5:
            return '難しい';
        case 6:
            return '困難';
        case 7:
            return '惨劇';
        case 8:
            return '悪夢';
    }
}


$aTopMenu = array(
    (object)array(
        'href' => 'kyakuhon/',
        'link' => '脚本リスト',
        'img_src' => 'images/kyakuhonka.png',
        'img_alt' => '惨劇 脚本家',
        'text' => "主にペンスキーの考えた自作脚本が転がってます。一部寄稿いただいた脚本もあります。紙の用意がいらないので、ペンスキーの脚本はほぼ全てここに集約されてる模様。",
    ),
    (object)array(
        'href' => 'kifu/',
        'link' => '棋譜記録機能',
        'img_src' => 'images/heros.png',
        'img_alt' => '主人公たち',
        'text' => "各ループ各ターン、脚本家がどこにどのカードを置いたかは、時に推理を進めるための重要な手がかりとなります。\n紙とペンがあるならそっちの方が良いとは思いますが、お気に召したら嬉しい限りです。",
    ),
    (object)array(
        'href' => 'column/',
        'link' => '駄文',
        'img_src' => 'images/uzai.png',
        'img_alt' => '脚本を彩る名優たち',
        'text' => "ペンスキー流の脚本の書き方とか、関連アイディアの投棄場。脚本リストに挙がっているものの一部で実際に使われているアイディアもあります。\nもう脚本を自作されている方には何を今更といった感じですが、読み物としてでも楽しんで頂ければ幸い。\n惨劇RoopeRの脚本書くの楽しいよ！",
    ),
);
