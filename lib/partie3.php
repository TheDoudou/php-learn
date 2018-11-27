<?
/* 
    Les boucles

    Exercice 1
*/
function p3_ex1() {
    for ($i = 0; $i <= 10; $i++)
        $return .= $i.' ';
    
    return $return;
}

//$data[2][0] = p3_ex1();

// Exercice 2
function p3_ex2() {
    $rand = mt_rand(1, 100); // mt_rand is very better
    for ($i = 0; $i <= 20; $i++) {
        if ($i % 5 == 0 && $i != 0)
            $return .= 'resultat : '.($i * $rand).'<br />';
        else
            $return .= 'resultat : '.($i * $rand).', ';
    }

    return $return;
}

//$data[2][1] = p3_ex2();

// Exercice 3
function p3_ex3() {
    $hundred = 100;
    $rand = mt_rand(1, 100);
    for ($i = 20; $hundred >= $i; $hundred--) {
        if ($hundred % 5 == 0 && $hundred != 100)
            $return .= 'resultat : '.($hundred * $rand).'<br />';
        else
            $return .= 'resultat : '.($hundred * $rand).', ';
    }

    return $return;
}

//$data[2][2] = p3_ex3();

// Exercice 4
function p3_ex4() {
    for ($i = 1; $i <= 10; $i = $i += ($i/2))
        $return .= $i." - ";

    return $return;
}

//$data[2][3] = p3_ex4();

// Exercice 5
function p3_ex5() {
    function p3_ex5_loop() {
        for ($i = 1; $i <= 15; $i++)
            $return .= "On y arrive presque.<br />";
        return $return;
    }
    // Just add loop()."<br />".
    return "XX fois (il faut juste répondre à la question ?)"; // 15
}

//$data[2][4] = p3_ex5();

// Exercice 6
function p3_ex6() {
    function p3_ex6_loop() {
        for ($i = 20; $i >= 0; $i--)
            $return .= "C'est presque bon.<br />";
        return $return;
    }
    // Just add p3_ex6_loop()."<br />".
    return "XX fois (si c'est le cas c'est en comm php)"; // 21
}

//$data[2][5] = p3_ex6();

// Exercice 7
function p3_ex7() {
    function p3_ex7_loop() {
        for ($i = 1; $i <= 100; $i += 15)
            $return .= "C'est presque bon.<br />";
        return $return;
    }
    // Just add p3_ex7_loop()."<br />".
    return "XX fois (y'a aussi les boucles mais en comm aussi)"; // 7
}

//$data[2][6] = p3_ex7();

// Exercice 8
function p3_ex8() {
    function p3_ex8_loop() {
        for ($i = 200; $i >= 0; $i -= 12)
            $return .= "C'est presque bon.<br />";
        return $return;
    }
    // Just add p3_ex8_loop()."<br />".
    return 'XX fois'; // 17
}

//$data[2][7] = p3_ex8();