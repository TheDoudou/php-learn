<?
/* 
    Les fonctions

    Exercice 1
*/
function p4_ex1() {
    return true;
}

//$data[3][0] = p4_ex1();

// Exercice 2
function p4_ex2($var) {
    return 'La var : '.$var;
}

//$data[3][1] = p4_ex2('test');

// Exercice 3
function p4_ex3($fname, $lname) {
    return 'Les vars : '.$fname.' '.$lname;
}

//$data[3][2] = p4_ex3('The', 'Doudou');

// Exercice 4
function p4_ex4($num1, $num2) {
    if ($num1 > $num2)
        $retour = 'Le premier nombre est plus grand';
    else if ($num1 < $num2)
        $retour = 'Le premier nombre est plus petit';
    else
        $retour = 'Les deux nombres sont identiques';

    return $retour;
}

//$data[3][3] = p4_ex4(10, 50);

// Exercice 5
function p4_ex5($var, $num) {
    return $var.$num;
}

//$data[3][4] = p4_ex5('TheDoudou', 42);

// Exercice 6
function p4_ex6($nom, $prenom, $age) {
    return "Bonjour $nom $prenom,tu as $age ans";
}

//$data[3][5] = p4_ex6('The', 'Doudou', 42);

// Exercice 7
function p4_ex7() {
    return p2_ex3(['genre' => 'femme', 'age' => 12]);
}

//$data[3][6] = p4_ex7();

// Exercice 8
function p4_ex8($num1 = 1, $num2 = 2, $num3 = 3) {
    return $num1+$num2+$num3;
}

//$data[3][7] = p4_ex8();