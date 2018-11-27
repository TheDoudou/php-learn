<?

/* 
    /!\ I don't use { } if not necesary, add it if you modify the code

    Les variables
*/

// Exercice 1
function p1_ex1() {
    $p1_ex1_nom = 'Pioupiou';
    $p1_ex1_prenom = 'TheDoudou';
    $p1_ex1_age = 34;

    return "Bonjour $p1_ex1_prenom, enfant de la famille $p1_ex1_nom ayant atteint de level $p1_ex1_age !";
}

//$data[0][0] = p1_ex1();

// Exercice 2
function p1_ex2() {
    $p1_ex2_km = 1;
    return $p1_ex2_km.' '.($p1_ex2_km += 2).' '.($p1_ex2_km += 122);
}

//$data[0][1] = p1_ex2();

// Exercice 3
function p1_ex3() {

    $p1_ex3_string = 'Super';   // = (string) 'Super';
    $p1_ex3_int = 42;           // = (integer) 42;
    $p1_ex3_float = 42.42;      // = (float) 42.42;
    $p1_ex3_bool = true;        // = (boolean) true; /false ou 0/1

    return "String : $p1_ex3_string<br />Integer1 : $p1_ex3_int<br />Float : $p1_ex3_float<br />Boolean : $p1_ex3_bool";
}

//$data[0][2] = p1_ex3();

// Exercice 4
function p1_ex4() {
    settype($p1_ex4_int, "integer");
    return 'Vide : '.$p1_ex4_int.'<br />Valeur : '.$p1_ex4_int += 42;
}

//$data[0][3] = p1_ex4();

// Exercice 5
function p1_ex5() {
    $p1_ex5_add = 3 + 4;
    $p1_ex5_mult = 5 * 20;
    $p1_ex5_div = 45 / 5;
    
    return "3 + 4 = $p1_ex5_add<br />5 * 20 = $p1_ex5_mult<br />45 / 5 = $p1_ex5_div"; 
}

//$data[0][4] = p1_ex5();

// Exercice 6
function p1_ex6() {
    $p1_ex6_price = 785;
    $p1_ex6_percent = 30;
    $p1_ex6_ristourne = ($p1_ex6_percent * $p1_ex6_price) / 100;
    $p1_ex6_price_reduction = $p1_ex6_price - $p1_ex6_ristourne;

    return "Prix produit : $p1_ex6_price €<br />
    Prix réduit : $p1_ex6_price_reduction €<br />
    Ristourne de : $p1_ex6_ristourne €<br />
    Pourcentage : $p1_ex6_percent %";
}

//$data[0][5] = p1_ex6();