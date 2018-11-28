<?
/* 
    Les formulaires

    Exercice 1
*/
function p7_ex1($formMethod, $exId) { // Not clean but work fine with my system ^^
    $met = $formMethod; 
    $exval = $exId;
    $formSelectState = func_get_args()[2];
    $formFileState = func_get_args()[3];
    $formFileAcept = func_get_args()[4];

    $file = ['index.php?view=7', 'user.php'];

    if ($met == 'post') { // Small bug return value in all same method form
        $nom = getPost('nom_'.$exval);
        $prenom = getPost('prenom_'.$exval);
    } else if ($met == 'get') {
        $nom = getGet('nom_'.$exval);
        $prenom = getGet('prenom_'.$exval);
    }

    if ($formSelectState) {
        $encrypt = 'enctype="multipart/form-data"';

        if (getPost('civ_.$exval') == 'mr') // With long list mmake loop ;)
            $activeMr = 'selected';
        else if (getPost('civ'))
            $activeMme = 'selected';
        
        $formSelect = '
            <label for="civ_'.$exval.'">Civilité : </label>
            <select name="civ_'.$exval.'" id="civ">
                <option value="mr" '.$activeMr.'>Mr</option>
                <option value="mme" '.$activeMme.'>Mme</option>
            </select><br />';
    }

    if ($formFileState) {
        if ($formFileAcept) {
            $pdf = '(pdf) ';
            $accept = 'accept=".pdf"';
        }

        $formFile = '
            <label for="file_'.$exval.'">Fichier '.$pdf.':</label>
            <input type="file" name="file_'.$exval.'" '.$accept.' />
            <br />';
    }

    // Use little hack navigator autoclose <p> balise
    return '
        <form method="'.$met.'" action="'.$file[0].'" name="" '.$encrypt.'> <!-- You can change by user.php -->
            <p>
                '.$formSelect.'
                <label for="nom_'.$exval.'">Votre nom :</label>
                <input type="text" name="nom_'.$exval.'" id="nom" value="'.$nom.'" />
                <br />
                <label for="prenom_'.$exval.'">Votre pr&eacute;nom :</label>
                <input type="text" name="prenom_'.$exval.'" id="prenom" value="'.$prenom.'" />
                <br />
                '.$formFile.'
                <input type="hidden" name="exercice" value="'.$exval.'" />
                <input type="hidden" name="view" value="7" />
                <input type="submit" name="send_'.$exval.'" value="Envoyer" />
            </p>
        </form>';
}

//$data[6][0] = p7_ex1('get', 'p7ex1');

// Exercice 2
function p7_ex2() {
    return p7_ex1('post', 'p7ex2'); // And why not ? :p
}

//$data[6][1] = p7_ex2();

// Exercice 3
function p7_ex3() {
    if (getGet('exercice') == 'p7ex1')
        return 'Nom : '.getGet('nom_p7ex1').'<br />Prenom : '.getGet('prenom_p7ex1');
    else
        return false;
}

//$data[6][2] = p7_ex3();

// Exercice 4
function p7_ex4() {
    if (getPost('exercice') == 'p7ex2')
        return 'Nom : '.getPost('nom_p7ex2').'<br />Prenom : '.getPost('prenom_p7ex2');
    else
        return false;
}

//$data[6][3] = p7_ex4();

// Exercice 5
function p7_ex5() {
    return p7_ex1('post', 'p7ex5', true);
}

// Exercice 6
function p7_ex6() {
    if (getPost('exercice') == 'p7ex6')
        return 'Bonjour '.getPost('civ_p7ex6').' '.getPost('nom_p7ex6').' '.getPost('prenom_p7ex6');
    else
        return p7_ex1('post', 'p7ex6', true);
}

// Exercice 7
function p7_ex7() {
    if (getPost('exercice') == 'p7ex7') {
        $path_parts = pathinfo($_FILES["file_p7ex7"]["name"]);

        return '
            Bonjour '.getPost('civ_p7ex7').' '.getPost('nom_p7ex7').' '.getPost('prenom_p7ex7').'<br />
            Fichier : '.$path_parts['filename'].'<br />Ext : '.$path_parts['extension'];
    } else
        return p7_ex1('post', 'p7ex7', true, true);
}

// Exercice 8
function p7_ex8() {
    if (getPost('exercice') == 'p7ex8') {
        $path_parts = pathinfo($_FILES["file_p7ex8"]["name"]);
        
        if ($path_parts['extension'] != 'pdf')
            return '/!\ Attention il faut un PDF /!\ <br />'.p7_ex1('post', 'p7ex8', true, true, true);
        else
            return '
                Bonjour '.getPost('civ_p7ex8').' '.getPost('nom_p7ex8').' '.getPost('prenom_p7ex8').'<br />
                Fichier : '.$path_parts['filename'].'<br />Ext : '.$path_parts['extension'];
    } else
        return p7_ex1('post', 'p7ex8', true, true, true);
}