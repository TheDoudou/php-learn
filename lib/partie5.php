<?
/* 
    Les tableaux

    Exercice 1
*/
function p5_ex1() {
    $mois = [ // ou Array()
        'janvier', 'février', 'mars',
        'avril', 'mai', 'juin',
        'juillet', 'aout', 'septembre',
        'octobre', 'novembre', 'décembre'
    ];

    return $mois;
}

//$data[4][0] = p5_ex1();

// Exercice 2
function p5_ex2($array) {
    $array[7] = 'août';
    return $array[2].' '.$array[5].' '.$array[7];
}

//$data[4][1] = p5_ex2(p5_ex1());

// Exercice 3
function p5_ex3() {
    $array = [
        01 => 'Ain', 02 => 'Allier',
        07 => 'Ardèche', 15 => 'Cantal',
        26 => 'Drôme', 38 => 'Isère',
        42 => 'Loire', 43 => 'Haute-Loire',
        63 => 'Puy-de-Dôme', 69 => 'Rhône',
        73 => 'Savoie', 74 => 'Haute-Savoie'
    ];

    $retour = $array[69].'<br />';

    $array[57] = 'Metz';
    
    ksort($array);

    foreach ($array as $key => $value) {
        $retour .= "{$key} => {$value}<br />"; 
    }

    return $retour;
}

//$data[4][2] = p5_ex3();

// Exercice 4
function p5_ex4($array) {
    $retour = '';
    foreach ($array as $value) {
        if ($value == 'Jojo')
            $retour .=  "Mail : Salut $value, devine quoi ! Je m dans samedi dans deux semaines ! Grosse bringue de breton ^^ BZH représente<br />";
        else
            $retour .= "Mail : Salut $value, devine quoi ! Je me marie dans samedi dans deux semaines ! J'espère te compter parmi les invités ! Gros bisous :)<br />";
    }

    return $retour;
}

//$data[4][3] = p5_ex4(array("Alex", "Max", "Dominique", "Jojo", "Leslie", "Charlie", "Lou"));