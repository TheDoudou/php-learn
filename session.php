<?
echo '<a href="index.php?view=7">Retour</a><hr>';

if ($_GET['ex'] == 1) {
    session_start ();
    echo '<h3>Exercice 1 : </h3>';
    echo $_SESSION['prenom'].' '.$_SESSION['nom'].', age :'.$_SESSION['age'].'<br />';
    

} else if ($_GET['ex'] == 4 && $_COOKIE["actEncode"]) {
    $key = 'keyUseFor Encypt/Decrypt';

    $d = base64_decode($_COOKIE["actEncode"]);
    $mc_iv = substr($d, 0, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC));

    $decrypted = explode( "[SPLIT]", rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_128,
            hash('sha256', $key, true),
            substr($d, mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC)),
            MCRYPT_MODE_CBC,
            $mc_iv
        ),
        "\0"
    ));

    echo 'Salut '.$decrypted[0].' ton password est '.$decrypted[1].'<br />Le cookie : '.$_COOKIE["actEncode"];
}