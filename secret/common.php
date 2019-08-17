<?php
if (realpath($_SERVER["SCRIPT_FILENAME"]) == realpath(__FILE__)) {
    $url = str_replace('/secret/'.basename(__FILE__), '/', $_SERVER["REQUEST_URI"]);
    header('Location: ' . $url);
    exit;
}



function isProd() {
    return file_exists(dirname(__FILE__) . '/../../.env.prod');
}

function e($s) {
    return htmlspecialchars($s, ENT_QUOTES);
}

function session($key, $defaultValue = '') {
    if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
    } else {
        return $defaultValue;
    }
}

function difficulityName($difficulity) {
    if (empty($difficulity)) {
        return '';
    }
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
