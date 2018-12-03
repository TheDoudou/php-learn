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
    'Les dates',
    'Calculatrice',
    'Pagination',
    'Controleur'];

if (getGet('view') == '10')
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

    if ($id == '10')
        include('lib/bonus1.php');
    else if ($id == '11')
        include('lib/bonus2.php');
    else if ($id == '12')
        include('lib/bonus3.php');
    else if (in_array($id, ['1', '2', '3', '4', '5', '6', '7', '8', '9']))
        include('lib/partie'.$id.'.php');
    else
        $return[0][0] = 'Cette page n\'existe pas.';

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

    } else if ($id == '10') {

        $return[0][0] = viewCalc();

    } else if ($id == '11') {

        $return[0][0] = pagination();

    } else if ($id == '12') {

        $return[0][0] = controleur();
    }

    return $return;
}

function generateMenu($l) { // Generate Header menu
    $return = '<nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container"><a class="navbar-brand" href="#">PHP By TheDoudou</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="../">Retour</a></li>
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Parties 1 à 5</a>
                            <div class="dropdown-menu" role="menu">';
    for ($i = 0; $i < 5; $i++) {
        $return .= '            <a href="index.php?view='.($i+1).'" class="dropdown-item" role="presentation">'.$l['title'][$i].'</a>';
    }
    $return .= '            </div>
                        </li>
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Parties 6 à 9</a>
                            <div class="dropdown-menu" role="menu">';
    for ($i = 5; $i < 9; $i++) {
        $return .= '            <a href="index.php?view='.($i+1).'" class="dropdown-item" role="presentation">'.$l['title'][$i].'</a>';
    }                   
    $return .= '            </div>
                        </li>
                        <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Bonus</a>
                            <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" role="presentation" href="index.php?view=10">Calculatrice<br></a>
                                <a class="dropdown-item" role="presentation" href="index.php?view=11">Pagination<br></a>
                                <a class="dropdown-item" role="presentation" href="index.php?view=12">Controleur<br></a>
                            </div>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="https://github.com/TheDoudou/php-learn/">Source</a></li>
                    </ul>
                </div>
            </div>
        </nav>';
    /*
    for ($i = 0; $i < count($l['title']); $i++) {
        $return .= '[<a href="index.php?view='.($i+1).'" class="dropdown-item" role="presentation">'.$l['title'][$i].'</a>] ';
        if ($i == 5)
            $return .= '<br />';
    }
    */

    return $return;
}

function generateBodyAnswer($data, $l) { // Generate body content
    
    for ($i = 0; $i < count($data); $i++) {
        if (getGet('view') <= 9)
            $return .= '<h2>'.$l['title'][getGet('view')-1].'</h2>';
        for ($j = 0; $j < count($data[$i]); $j++) {
            if (getGet('view') <= 9)
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


// Bonus File
$adresse_ip = $_SERVER['REMOTE_ADDR'];
$fname = '/volume1/web/be_code/php/data/ipliste.txt';
$file = fopen($fname, 'a+');
$read = fread($file, filesize($fname));
fwrite($file, $read);
fwrite($file, date('d/m/Y - H:i'));
fwrite($file, ' : ');
fwrite($file, $adresse_ip);
fwrite($file, '; ');
fclose($file);

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP - <? echo $t['title'][getGet('view')-1]; ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <? if (getGet('view') == '10') { ?>
        <link rel="stylesheet" type="text/css" href="assets/css/calc.css">
    <? } ?>
    <? if (getGet('view') == '11') { ?>
        <link rel="stylesheet" href="assets/css/Bold-BS4-Jumbotron-with-Particles-js.css">
    <? } ?>
</head>
<body>
    <header>
        <? echo generateMenu($t); ?><hr>
    </header>
    <?
        echo generateBodyAnswer(generateView(), $t);
    ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

    <? if (getGet('view') == '9') {?>
        <script src="assets/js/cal.js"></script>
    <? } ?>


    <? if (getGet('view') == '10') { // Test d'une calto ?>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="assets/js/calc.js"></script>
    <? } ?>
    <? if (getGet('view') == '11') { ?>
        <script src="assets/js/Bold-BS4-Jumbotron-with-Particles-js.js"></script>
    <? } ?>
</body>
</html>