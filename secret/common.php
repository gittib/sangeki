<?php
session_start();
ob_start();

if (!defined('PUBLIC_DIR')) {
    define('PUBLIC_DIR', realpath(__DIR__ . '/../sangeki') . '/');
}
if (!defined('SECRET_DIR')) {
    define('SECRET_DIR', __DIR__ . '/');
}

if (!defined('SITE_NAME')) {
    define('SITE_DOMAIN', $_SERVER['SERVER_NAME']);
    define('SITE_NAME', 'ペンスキーの惨劇RoopeR脚本部屋');
    $aPath = explode('/', $_SERVER['REQUEST_URI']);
    define('TOP_PATH', '/'.$aPath[1].'/');
    define('REDIRECT_QR_SALT', 'sda27');

    define('SCRIPT_SHARE_SITE_URL', 'https://sangeki.boardgame.work');
}


function isProd() {
    return file_exists(__DIR__ . '/../.env.prod');
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

function schema() {
    if (($_SERVER['SERVER_PORT'] ?? 80) == 443) {
        return 'https';
    }
    return 'http';
}

function shortHash($s, $salt = REDIRECT_QR_SALT, $algo = 'CRC32') {
    $s .= $salt;
    $s = hash($algo, $s);
    $s = pack('H*', $s);
    $s = base64_encode($s);
    $s = rtrim($s, '=');
    return strtr($s, '+/', '-_');    
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
        default:
            return '特殊';
    }
}

function gitHash() {
    $latestHash = 'invalid';
    $sHashFilePath = SECRET_DIR.'cache/latest_git_hash';
    if (file_exists($sHashFilePath)) {
        $fp = fopen($sHashFilePath, 'r');
        $latestHash = trim(fgets($fp));
        fclose($fp);
    }
    return $latestHash;
}

function dd($arg) {
    ob_end_clean();
    header("Content-Type: text/plain");
    var_dump($arg);
    exit;
}

function abort() {
    ob_end_clean();
    header("HTTP/1.1 404 Not Found");
    require(SECRET_DIR . '404.php');
    exit;
}
