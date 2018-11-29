<?
function controleur() {
    $page = ['lion.php', 'impala.php', 'crocodile.php', 'elephant.php', 'tigre.php'];

    if (!in_array(getGet('page'), $page))
        $include = 'lion.php';
    else if(in_array(getGet('page'), $page))
        $include = getGet('page');

    include('controleur/header.php');
    include('controleur/'.$include);
    include('controleur/footer.php');

    return '';
}