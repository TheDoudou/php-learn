<?
ini_set('display_errors', 1);
/* 
    /!\ I don't use { } if not necesary, add it if you modify the code

    Les variables
    include('lib/partie1.php');

    Les conditions
    include('lib/partie2.php');

    Les boucles
    include('lib/partie3.php');

    Les fonctions
    include('lib/partie4.php');

    Les tableaux
    include('lib/partie5.php');
    
    Les paramètres
    include('lib/partie6.php');

    Les formulaires
    include('lib/partie7.php');

    Les variables superglobales, sessions et cookies
    include('lib/partie8.php');

    Les dates
    include('lib/partie9.php');
*/

// Title for h2
$t['title'] = [
    'Les variables',
    'Les conditions',
    'Les boucles',
    'Les fonctions',
    'Les tableaux',
    'Les paramètres',
    'Les formulaires',
    'Les variables globales, $SESSION',
    'Les dates'];

if (getGet('view') == 'calc1')
    $t['stitle'] = 'Calculatrice ';
else
    $t['stitle'] = 'Exercice '; // And h3

function getGet($k) { // Fist secure for $_GET
    if (array_key_exists($k, $_GET))
        return htmlspecialchars($_GET[$k]);
    else return false;
}

function getPost($k) { // Fist secure for $_POST
    if (array_key_exists($k, $_POST))
        return htmlspecialchars($_POST[$k]);
    else return false;
}

function partie($id) { // Generate array with answer data

    if ($id == 'calc1')
        include('lib/bonus'.substr($id, -1).'.php');
    else
        include('lib/partie'.$id.'.php');

    $answerCount[0] = 7; // How many categorie
    $answerCount[1] = [6, 8, 8, 8, 4, 6, 5]; // And how many answer

    if ($id == '1' || $id == '2' || $id == '3') {

        for ($i = 1; $i <= $answerCount[1][$id-1]; $i++) {
            $animfunc = 'p'.$id.'_ex'.$i;
            $return[0][$i-1] = $animfunc();
        }

    } else if ($id == '4') {
        include('lib/partie2.php');
        
        $return[0][0] = p4_ex1();
        $return[0][1] = p4_ex2('test');
        $return[0][2] = p4_ex3('Tes', 'Doudou');
        $return[0][3] = p4_ex4(10, 50);
        $return[0][4] = p4_ex5('TheDoudou', 42);
        $return[0][5] = p4_ex6('The', 'Doudou', 42);
        $return[0][6] = p4_ex7();
        $return[0][7] = p4_ex8();

    } else if ($id == '5') {
        
        $return[0][0] = p5_ex1();
        $return[0][1] = p5_ex2(p5_ex1());
        $return[0][2] = p5_ex3();
        $return[0][3] = p5_ex4(array("Alex", "Max", "Dominique", "Jojo", "Leslie", "Charlie", "Lou"));

    } else if ($id == '6') {

        $return[0][0] = p6_ex1(getGet('nom'), getGet('prenom'));
        $return[0][1] = p6_ex2(getGet('age'));
        $return[0][2] = p6_ex3(getGet('dateDebut'), getGet('dateFin'));
        $return[0][3] = p6_ex4(getGet('langage'), getGet('serveur'));
        $return[0][4] = p6_ex5(getGet('semaine'));
        $return[0][5] = p6_ex6(getGet('batiment'), getGet('salle'));

    } else if ($id == '7') {
        
        $return[0][0] = p7_ex1('get', 'p7ex1');
        $return[0][1] = p7_ex2();
        $return[0][2] = p7_ex3();
        $return[0][3] = p7_ex4();
        $return[0][4] = p7_ex5();
        $return[0][5] = p7_ex6();
        $return[0][6] = p7_ex7();
        $return[0][7] = p7_ex8();

    } else if ($id == '8') {
        
        $return[0][0] = p8_ex1();
        $return[0][1] = p8_ex2();
        $return[0][2] = p8_ex3();
        $return[0][3] = p8_ex4();
        $return[0][4] = p8_ex5();

    } else if ($id == '9') {
        
        $return[0][0] = p9_ex1();
        $return[0][1] = p9_ex2();
        $return[0][2] = p9_ex3();
        $return[0][3] = p9_ex4();
        $return[0][4] = p9_ex5();
        $return[0][5] = p9_ex6();
        $return[0][6] = p9_ex7();
        $return[0][7] = p9_ex8();
        $return[0][8] = p9_ex9();

    } else if ($id == 'calc1') {

        $return[0][0] = viewCalc();

    }
    return $return;
}

function generateMenu($l) { // Generate Header menu
    for ($i = 0; $i < count($l['title']); $i++) {
        $return .= '[<a href="index.php?view='.($i+1).'">'.$l['title'][$i].'</a>] ';
        //if ($i == 4)
        //    $return .= '<br />';
    }

    return $return;
}

function generateBodyAnswer($data, $l) { // Generate body content
    
    for ($i = 0; $i < count($data); $i++) {
        $return .= '<h2>'.$l['title'][getGet('view')-1].'</h2>';
        for ($j = 0; $j < count($data[$i]); $j++) {
            $return.= '<h3>'.$l['stitle'].' '.($j+1).'</h3>';
            $return.= '<p>'.$data[$i][$j].'</p>';
        }
    }

    return $return;
}

function generateView() { // Gestion view for menu
    if (getGet('view')) 
        $return = partie(getGet('view'));
    else
        $return = partie(1);

    return $return;
}
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - <? echo $t['title'][getGet('view')]; ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <? if (getGet('view') == 'calc1') { ?>
        <link rel="stylesheet" type="text/css" href="assets/css/calc.css">
    <? } ?>
</head>
<body>
    <header>
        <a href="../">Retour</a><hr>
        <? echo generateMenu($t); ?><hr>
    </header>
    <?
        echo generateBodyAnswer(generateView(), $t);
    ?>


    <script src="assets/js/main.js"></script>

    <? if (getGet('view') == 9) {?>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="assets/js/cal.js"></script>
    <? } ?>


    <? if (getGet('view') == 'calc1') { // Test d'une calto ?>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="assets/js/calc.js"></script>
    <? } ?>
</body>
</html>