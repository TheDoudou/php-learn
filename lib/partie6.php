<?
/* 
    Les paramètres

    Exercice 1
*/

function p6_ex1($nom, $prenom) {
    $regex = "/^[\p{L}'][ \p{L}'-]*[\p{L}]$/u";
    
    if (preg_match($regex, $nom.' '.$prenom))
        return 'Salut '.$prenom.', la famille '.$nom.' vas bien ?';
    else
        return 'Pas de get url (ou vide) : <a id="p6_ex1" href="index.php?view=6&nom=Nemare&prenom=Jean">index.php?nom=Nemare&prenom=Jean</a>'; 
}

//$data[5][0] = p6_ex1(getGet('nom'), getGet('prenom'));

// Exercice 2 Regex second secure
function p6_ex2($age) {
    $regex = '/^[0-9]{2}$/';

    if (preg_match($regex, $age))
        return 'Salut tu a : '.$age .' ans';
    else
        return 'Pas de get url (ou vide) : <a id="p6_ex2" href="index.php?view=6&age=42">index.php?age=42</a>';
}

//$data[5][1] = p6_ex2(getGet('age'));

// Exercice 3
function p6_ex3() {
    $dateDebut = func_get_args()[0]; // Hoooooooooo why not ;)
    $dateFin = func_get_args()[1];
    $regex = '/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/';
    $rand1 = date('d/m/Y', mt_rand(1262055681, time()-86400));
    $rand2 = date('d/m/Y', time());
    $url = 'index.php?dateDebut='.$rand1.'&dateFin='.$rand2.'&view=6';

    if (preg_match($regex, $dateDebut) && preg_match($regex, $dateFin))
        return 'Date début : '.$dateDebut .'<br />Date fin : '.$dateFin;
    else
        return 'Pas de get url (ou vide) : <a id="p6_ex3" href="'.$url.'">'.$url.'</a>';
}

//$data[5][2] = p6_ex3(getGet('dateDebut'), getGet('dateFin'));

// Exercice 4 or compare
function p6_ex4($langage, $serveur) {
    $d['lang'] = ['html', 'php', 'css', 'python']; // Etc etc
    $d['serv'] = ['apache', 'lamp', 'ngix', 'mamp'];
    $rand = mt_rand(0, 3);
    $url = 'index.php?langage='.$d['lang'][$rand].'&serveur='.$d['serv'][$rand].'&view=6';

    if (in_array(strtolower($langage), $d['lang']) && in_array(strtolower($serveur), $d['serv']))
        return 'Langage : '.$langage .'<br />Serveur : '.$serveur;
    else
        return 'Pas de get url (ou vide) : <a id="p6_ex4" href="'.$url.'">'.$url.'</a>';
}

//$data[5][3] = p6_ex4(getGet('langage'), getGet('serveur'));

// Exercice 5
function p6_ex5($week) {
    $regex = '/^[0-9]{2}$/';
    $rand = mt_rand(1, 53);
    
    if (preg_match($regex, $week)) {
        return 'Semaine : '.$week;
    } else
        return 'Pas de get url (ou vide) : <a id="p6_ex5" href="index.php?view=6&semaine='.$rand.'">index.php?semaine='.$rand.'</a>';
}

//$data[5][4] = p6_ex5(getGet('semaine'));

// Exercice 6
function p6_ex6() {
    $building = func_get_args()[0];
    $room = func_get_args()[1];
    $d = ['1' => ['1', '2'], '12' => ['101'], 'Chez Leon' => ['Grande salle', 'Petite salle']];
    $rand1 = array_rand($d, 1);
    $rand2 = array_rand($d[$rand1], 1);
    $url = 'index.php?batiment='.$rand1.'&salle='.$rand2.'&view=6';

    if (array_key_exists(strtolower($building), $d) && in_array(strtolower($room), $d[$building]))
        return 'Batiment : '.$building .'<br />Salle : '.$room;
    else
        return 'Pas de get url (ou vide) : <a id="p6_ex6" href="'.$url.'">'.$url.'</a>';
}

//$data[5][5] = p6_ex6(getGet('batiment'), getGet('salle'));