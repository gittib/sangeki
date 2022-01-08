/**
 * 難易度文言を取得
 */
function difficultyName(difficulty) {
    switch (Number(difficulty)) {
    case 1: return '練習用';
    case 2: return '簡単';
    case 3: return '易しい';
    case 4: return '普通';
    case 5: return '難しい';
    case 6: return '困難';
    case 7: return '惨劇';
    case 8: return '悪夢';
    default: return '特殊';
    }
}

/**
 * 難易度表示星マークを取得
 */
function difficultyStar(difficulty) {
    let star = '';
    for (let i = 1 ; i <= 8 ; i++) {
        if (i <= Number(difficulty)) {
            star += '★';
        } else {
            star += '☆';
        }
    }
    return star;
}

/**
 * 現在日時の日付文字列を取得
 */
function dateStr() {
    const e = s => ("0"+s).slice(-2);
    const d = new Date();
    const yyyy = d.getFullYear();
    const mm = d.getMonth() + 1;
    const dd = d.getDate();
    const hh = d.getHours();
    const ii = d.getMinutes();
    const ss = d.getSeconds();
    return e(yyyy)+e(mm)+e(dd)+e(hh)+e(ii)+e(ss);
}
