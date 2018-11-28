<?
function viewCalc() {

    return '
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
                    <div id="(" class="operator">(</div>
                </div>
                <div class="row">
                    <div id="4" class="input">4</div>
                    <div id="5" class="input">5</div>
                    <div id="6" class="input">6</div>
                    <div id="*" class="operator">×</div>
                    <div id=")" class="operator">)</div>
                </div>
                <div class="row">
                    <div id="1" class="input">1</div>
                    <div id="2" class="input">2</div>
                    <div id="3" class="input">3</div>
                    <div id="-" class="operator">-</div>
                    <div id="" class="operator"></div>
                </div>
                <div class="row">
                    <div id="reset" class="c  input">C</div>
                    <div id="0" class="input">0</div>
                    <div id="." class="input">.</div>
                    <div id="+" class="operator">+</div>
                    <div id="" class="operator"></div>
                </div>
            </div>
            <button id="equals" class="equals">=</button>
        </div>

    </div>';
    
}