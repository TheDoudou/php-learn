<?
/* 
    Variables superglobales, sessions et cookies

    Exercice 1
*/
function p9_ex1() {
    return date("d/m/Y");
}

// Exercice 2
function p9_ex2() {
    return date("d-m-y");
}

// Exercice 3
function p9_ex3() {
    setlocale (LC_TIME, 'fr_FR.utf8','fra');
    return  strftime("%A %d %B %Y");
}

// Exercice 4
function p9_ex4() {
    $dtime = DateTime::createFromFormat("d/m G:i", "02/08 15:00");
    $timestamp = $dtime->getTimestamp();

    return 'Timetamp : '.time().'<br />02/08 15:00 : '.$timestamp;
}

// Exercice 5
function p9_ex5() {
    $start = strtotime('16-05-2016');
    $end = strtotime('now');
    $return = ceil(abs($end - $start) / 86400);

    return $return.' jours entre le 16-05-2016 et le '.date('d-m-Y').'.';
}

// Exercice 6
function p9_ex6() {
    return cal_days_in_month(CAL_GREGORIAN, 2, 2017); // Active calandar module for php
}

// Exercice 7
function p9_ex7() {
    return Date('d-m-Y', strtotime("+20 days"));
}

// Exercice 8
function p9_ex8() {
    return Date('d-m-Y', strtotime("-22 days"));
}

// Exercice 9
function p9_ex9() {
    setlocale(LC_TIME, "fr_FR");



    $return = '<h3>TP</h3>';

    $return .= '
        <form method="GET">
            <p>
            <label for="">Choisir le mois et l\'année : </label><br />
            <select name="month" id="selectMonth">';

    for ($i = 0; $i < 12; $i++) {
        $return .= '<option value="'.date('m', strtotime("+ $i months")).'">'.strftime("%B", date('U', strtotime("+ $i months"))).'</option>';
    }

    $return .= '</select><select name="year" id="selectYear">';

    for ($i = 0; $i < 10; $i++) {
        $return .= '<option value="'.strftime("%Y", date('U', strtotime("+ $i years"))).'">'.strftime("%Y", date('U', strtotime("+ $i years"))).'</option>';
    }

    $return .= '</select>
            </p>
        </form><br /><div id="results">';


    return $return;
}

