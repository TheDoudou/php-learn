<?

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


if (getGet('app') == 'cal' && getPost('month') && getPost('year')) {
    $month = ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
    
    $date = $month[(getPost('month')-1)].' '.getPost('year');
    $day = date("w", mktime(0, 0, 0, getPost('month'), 1, getPost('year')))-1; // 1 Monday
    $nbDay = cal_days_in_month(CAL_GREGORIAN, getPost('month'), getPost('year'));
    
    echo '
        <table class="tg" border=1>
            <colgroup>
                <col style="width: 100px">
                <col style="width: 100px">
                <col style="width: 100px">
                <col style="width: 100px">
                <col style="width: 100px">
                <col style="width: 100px">
                <col style="width: 100px">
            </colgroup>
            <tr>
                <th class="tg-c3ow" colspan="7">'.$date.'</th>
            </tr>
            <tr>
                <td class="tg-svo0">Lundi</td>
                <td class="tg-svo0">Mardi</td>
                <td class="tg-svo0">Mercredi</td>
                <td class="tg-svo0">Jeudi</td>
                <td class="tg-svo0">Vendredi</td>
                <td class="tg-svo0">Samedi</td>
                <td class="tg-svo0">Dimanche</td>
            </tr>';
        $count = 1;

        for ($i = 0; $i < 35; $i++) {
            if ($i == 0 || $i == 7 || $i == 14 || $i ==  21 || $i == 28)
                echo '<tr>';
            if ($i >= $day && $count <= cal_days_in_month(CAL_GREGORIAN, getPost('month'), getPost('year'))) {
                echo '<td class="tg-c3ow">'.$count.'</td>';
                $count++;
            }else
                echo '<td class="tg-c3ow"></td>';
            if ($i == 6 || $i == 13 || $i == 20 || $i ==  27 || $i == 34)
                echo '</tr>';
        }

        echo '</table>';
        exit;
}

header('Location: http://thedoudou.myds.me/be_code/php/'); 