<?
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

function viewCalc() {
    $calc = new Calc();

    $result = $calc->calcul('(2/2)');

    return $result.'
    <div class="page">
        <div class="calculator">
            <div class="display">
                <span class="previous"></span>
                <span id="style-3" class="current">
                </span>
            </div>
            <div class="inputs">
                <div class="row">
                    <div id="7" class="input">7</div>
                    <div id="8" class="input">8</div>
                    <div id="9" class="input">9</div>
                    <div id="/" class="operator">÷</div>
                </div>
                <div class="row">
                    <div id="4" class="input">4</div>
                    <div id="5" class="input">5</div>
                    <div id="6" class="input">6</div>
                    <div id="*" class="operator">×</div>
                </div>
                <div class="row">
                    <div id="1" class="input">1</div>
                    <div id="2" class="input">2</div>
                    <div id="3" class="input">3</div>
                    <div id="-" class="operator">-</div>
                </div>
                <div class="row">
                    <div id="reset" class="c  input">C</div>
                    <div id="0" class="input">0</div>
                    <div id="." class="input">.</div>
                    <div id="+" class="operator">+</div>
                </div>
            </div>
            <button id="equals" class="equals">=</button>
        </div>

    </div>';

}



if ($_GET['calcValue']) { 

    exit;
} 