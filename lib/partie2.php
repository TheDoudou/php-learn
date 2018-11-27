<?
/* 
    Les conditions

    Exercice 1
*/ 
function p2_ex1() {
    $p2_ex1_age = 42;
    if ($p2_ex1_age < 18)
        $p2_ex1_txt = 'Vous aites mineur';
    else
        $p2_ex1_txt = 'Vous aites majeur';

    return $p2_ex1_txt;
}

//$data[1][0] = p2_ex1();

// Exercice 2
function p2_ex2() {
    $p2_ex2_IsEasy = true;
    if($p2_ex2_IsEasy)
        $p2_ex2_txt = 'C\'est facile!!';
    else
        $p2_ex2_txt = 'C\'est difficile !!!';

    return $p2_ex2_txt;
}

//$data[1][1] = p2_ex2();

// Exercice 3
function p2_ex3($array_optional_1 = array('genre' => 'homme', 'age' => 42)) {   // If param is array it's "optional" for p4_ex7 auto set for this exo
    $p2_ex3_genre = $array_optional_1['genre'];                                 // Add value in param for dont set with if
    $p2_ex3_age = $array_optional_1['age'];                                     // Use array for dont warning if not set and parse param in function


    if ($p2_ex3_genre == 'homme')
        $p2_ex3_txt = 'Vous êtes un homme ';
    else if ($p2_ex3_genre == 'femme')
        $p2_ex3_txt = 'Vous êtes une femme ';
    else if ($p2_ex3_genre == 'trans')
        $p2_ex3_txt = 'Vous êtes un autre ';

    if ($p2_ex3_age < 18)
        $p2_ex3_txt .= 'et vous êtes mineur';
    else
        $p2_ex3_txt .= 'et vous êtes majeur';

    return $p2_ex3_txt;
}

//$data[1][2] = p2_ex3();

// Exercice 4
function p2_ex4() {
    $p2_ex4_magnitude = 5;

    switch ($p2_ex4_magnitude) { // I don't use it generaly need break
        case 1:
            $p2_ex4_txt = "Micro-séisme impossible à ressentir.";
            break;
        case 2:
            $p2_ex4_txt = "Micro-séisme impossible à ressentir mais enregistrable par les sismomètres.";
            break;
        case 3:
            $p2_ex4_txt = "Ne cause pas de dégats mais commence à pouvoir être légèrement ressenti.";
            break;
        case 4:
            $p2_ex4_txt = "Séisme capable de faire bouger des objets mais ne causant généralement pas de dégats.";
            break;
        case 5:
            $p2_ex4_txt = "Séisme capable d'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.";
            break;
        case 6:
            $p2_ex4_txt = "Fort séisme capable d'engendrer des destructions majeures sur une large distance (180 km) autour de l'épicentre.";
            break;
        case 7:
            $p2_ex4_txt = "	Séisme capable de destructions majeures à modérées sur une très large zone en fonction de la distance.";
            break;
        case 8:
            $p2_ex4_txt = "Séisme capable de destructions majeures sur une très large zone de plusieurs centaines de kilomètres.";
            break;
        case 9:
            $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";
            break;
    }

    // it's realy more tiny
    if ($p2_ex4_magnitude == 1)
        $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";
    if ($p2_ex4_magnitude == 2)
        $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";
    if ($p2_ex4_magnitude == 3)
        $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";
    if ($p2_ex4_magnitude == 4)
        $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";
    if ($p2_ex4_magnitude == 5)
        $p2_ex4_txt = "Séisme capable d'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.";
    if ($p2_ex4_magnitude == 6)
        $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";
    if ($p2_ex4_magnitude == 7)
        $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";
    if ($p2_ex4_magnitude == 8)
        $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";
    if ($p2_ex4_magnitude == 9)
        $p2_ex4_txt = "Séisme capable de tout détruire sur une très vaste zone.";

    // Realy more tiny
    for ($i = 1; $i <= $p2_ex4_magnitude && $i <= 9; $i++) {
        if ($i == $p2_ex4_magnitude) // or put array in var (or not ;)). If in function remove $i <= 9 and change $p2_ex4_txt by return
            $p2_ex4_txt = ["1", "2", "3", "4", "5", "Séisme capable d'engendrer des dégats importants sur de vieux bâtiments ou bien des bâtiments présentants des défauts de construction. Peu de dégats sur des bâtiments modernes.", "7", "8", "9"][$i];
    }

    return $p2_ex4_txt;
}

//$data[1][3] = p2_ex4();

// Exercice 5
function p2_ex5() {
    $p2_maVariable != 'Homme';

    if ($p2_maVariable != 'Homme')
        $p2_ex5_txt = 'C\'est une développeuse !!!';
    else
        $p2_ex5_txt = 'C\'est un développeur !!!';

    return $p2_ex5_txt;
}

//$data[1][4] = p2_ex5();

// Exercice 6
function p2_ex6() {
    $p2_ex6_monAge = 42;

    if ($p2_ex6_monAge >= 18)
        $p2_ex6_txt = 'Tu es majeur';
    else
        $p2_ex6_txt = 'Tu n\'es pas majeur';

    return $p2_ex6_txt;
}

//$data[1][5] = p2_ex6();

// Exercice 7
function p2_ex7() {
    $p2_ex7_maVariable = true;

    if ($p2_ex7_maVariable == false)
        $p2_ex7_txt = 'c\'est pas bon !!!';
    else
        $p2_ex7_txt = 'c\'est ok !!';

    return $p2_ex7_txt;
}

//$data[1][6] = p2_ex7();

// Exercice 8
function p2_ex8() {
    $p2_ex8_maVariable;

    if ($p2_ex8_maVariable)
        $p2_ex8_txt = 'c\'est ok !!';
    else
        $p2_ex8_txt = 'c\'est pas bon !!!';

    return $p2_ex8_txt;
}

//$data[1][7] = p2_ex8();