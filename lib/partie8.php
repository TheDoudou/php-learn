<?
/* 
    Variables superglobales, sessions et cookies

    Exercice 1
*/
function p8_ex1() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];  // Or get_browser(null, true)

    function get_client_ip_env() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
     
        return $ipaddress;
    }

    function get_client_ip_server() {
        $ipaddress = '';
        if ($_SERVER['HTTP_CLIENT_IP'])
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if($_SERVER['HTTP_X_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if($_SERVER['HTTP_X_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if($_SERVER['HTTP_FORWARDED_FOR'])
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if($_SERVER['HTTP_FORWARDED'])
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if($_SERVER['REMOTE_ADDR'])
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
     
        return $ipaddress;
    }

    $servName = $_SERVER['SERVER_NAME']; // No canonical use $_SERVER['HTTP_HOST']

    return '
        User Agent : '.$userAgent.'<br />
        Adresse ip : '.get_client_ip_env().'<br />
        Nom du serveur : '.$servName;
}

// Exercice 2
function p8_ex2() {
    session_start ();
    $_SESSION['nom'] = 'Poulet';
    $_SESSION['prenom'] = 'Super';
    $_SESSION['age'] = 42;

    return '<a href="session.php?ex=1">Voir les vars session</a>';
}

// Exercice 3
function p8_ex3() {
    if (getPost('pseudo') && getPost('password')) {
        $key = 'keyUseFor Encypt/Decrypt';
        $stringCrypt = getPost('pseudo').'[SPLIT]'.getPost('password');

        $mc_iv = mcrypt_create_iv(
            mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC),
            MCRYPT_DEV_URANDOM
        );

        $encode = base64_encode(
            $mc_iv .
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_128,
                hash('sha256', $key, true),
                $stringCrypt,
                MCRYPT_MODE_CBC,
                $mc_iv
            )
        );

        setcookie("actEncode", $encode, time()+3600);
    }

    return '
        <form method="POST" action="index.php?view=7">
            <p>
                <label for="pseudo">Votre pseudo :</label>
                <input type="text" name="pseudo" id="pseudo" value="'.getPost('pseudo').'" />
                <br />
                <label for="password">Votre pr&eacute;nom :</label>
                <input type="password" name="password" id="password" value="'.getPost('password').'" />
                <br />
                <input type="submit" name="send_'.$exval.'" value="Set Cookie" />
            </p>
        </form>';
}

// Exercice 4
function p8_ex4() {
    if ($_COOKIE["actEncode"] || getPost('pseudo'))
        return '<a href="session.php?ex=4">Voir le cookie</a>';
    else
        return "Il n'y a pas encore de cookie.";
}

// Exercice 5
function p8_ex5() {
    if (getPost('delCook'))
        setcookie("actEncode","",time()-1);

    if ($_COOKIE["actEncode"] || getPost('pseudo'))
        return '
            Vu que mon formulaire set de toute facon le cookie voici un bouton pour l\'effacer.<br />
            <form method="POST" action="index.php?view=7">
                <p>
                    <input type="submit" name="delCook" value="Effacer Cookie">
                <p>
            </form>';
    else
        return 'Il n\'y a pas encore de cookie';
}
