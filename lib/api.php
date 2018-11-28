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

class Calc {
    const PAT = '/(?:\-?\d+(?:\.?\d+)?[\+\-\*\/])+\-?\d+(?:\.?\d+)?/';
    const PD = 10;

    public function calcul($in){
        if(strpos($in, '+') != null || strpos($in, '-') != null || strpos($in, '/') != null || strpos($in, '*') != null){
            
            $in = str_replace(',', '.', $in);
            $in = preg_replace('[^0-9\.\+\-\*\/\(\)]', '', $in);

            $i = 0;
            while((strpos($in, '(') || strpos($in, ')')) && $i < self::PD) { // Not very good
                $in = preg_replace_callback('/\(([^\(\)]+)\)/', 'self::callback', $in);

                $i++;
            }

            if ($i == self::PD) {
                return 'Error ()';
            }

            if(preg_match(self::PAT, $in, $match))
                return $this->compute($match[0]);
            
            if(is_numeric($in))
                return $in;

            return 0;
        } else
        return 'No Sign';

        return $in;
    }

    private function eval_expression($expression)
    {
        ob_start();
        eval('echo (' .  $expression . ');');
        $result = ob_get_contents();
        ob_end_clean();
        if (strpos($result, 'Warning: Division by zero')!==false)
        {
            throw new Exception('Stop PAS DE DIVISION PAR 0 Grrrr (ou alors 42)');
        }
        else return (float)$result;
    }

    private function compute($in){
        $com = create_function('', 'return '.$this->eval_expression($in).';');
        return 0 + $com();
        
    }

    private function callback($in){
        if(is_numeric($in[1])){
            return $in[1];
        }
        elseif(preg_match(self::PAT, $in[1], $match)){
            return $this->compute($match[0]);
        }

        return 0;
    }
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

} else if (getGet('app') == 'calc1' && getGet('calcValue')) {
    $calc = new Calc();
    $result = $calc->calcul(getGet('calcValue'));

    echo $result;
    
    exit;
}

header('Location: http://thedoudou.myds.me/be_code/php/'); 