
(function () {
    let currentInput = [];
    let currentCalculated = null;
    let previousInput = [];
    let numberInputs = getElement(".input:not(.c)");
    let operatorInputs = getElement(".operator");
    let equalsButton = getElement("#equals");
    let resetButton = getElement("#reset");
    let previousViewer = getElement(".previous")[0];
    let currentViewer = getElement(".current")[0];

    function onNumberClicked() {
        let value = this.getAttribute("id");
        currentInput.push(value);
        render();
    }

    function onOperatorClicked() {
        let value = this.getAttribute("id");
        if (previousInput.length > 0 && currentInput.length < 1)
            currentInput = currentInput.concat(
                roundNum(eval(previousInput.join("")))
            );
        currentInput.push(value);
        render();
    }

    function roundNum(num) {
        return Math.round(num * 100) / 100;
    }

    function onEqualClicked() {
        
        for (i = 0; i < currentInput.length; i++) {
            if (currentInput[i] == '+')
                currentInput[i] = '%2B'
        }

        $.get("http://thedoudou.myds.me/be_code/php/lib/api.php?app=calc1&calcValue="+currentInput.join(""),
            function (data) {
                console.log(data)

                if (data == 'No Sign')
                    previousInput = ['No Sign']
                else if (data.includes('PAS DE DIVISION PAR 0'))
                    previousInput = ['Div By 0']
                else {
                    currentCalculated = data
                    currentCalculated = roundNum(currentCalculated);

                    previousInput = currentInput.splice(0);

                    for (i = 0; i < previousInput.length; i++) {
                        if (previousInput[i] == '%2B')
                        previousInput[i] = '+'
                    }
                }

                currentInput = [];
                render();
            })
    }

    function onResetClicked() {
        currentInput = [];
        previousInput = [];
        render();
    }

    function getElement(element) {
        return element.charAt(0) === "#"
            ? document.querySelector(element)
            : document.querySelectorAll(element);
    }

    function render() {
        function renderPrevious() {
            previousViewer.innerHTML = previousInput.join("");
        }
        function renderCurrent() {
            const inputMapping = {
                "/": "÷",
                "*": "×"
            };
            currentViewer.innerHTML = "";
            if (currentCalculated == null) {
                currentInput.forEach(e => {
                    if (["/", "*", "-", "+", "(", ")"].includes(e)) {
                        let spanNumber = document.createElement("span");
                        spanNumber.className = "sign";
                        spanNumber.innerHTML = inputMapping[e] || e;
                        currentViewer.appendChild(spanNumber);
                    } else {
                        let spanNumber = document.createElement("span");
                        spanNumber.innerHTML = inputMapping[e] || e;
                        currentViewer.appendChild(spanNumber);
                    }
                });
            } else {
                currentViewer.innerHTML = currentCalculated;
                currentCalculated = null;
            }
        }
        renderPrevious();
        renderCurrent();
    }

    numberInputs.forEach(e => {
        e.onclick = onNumberClicked;
    });

    operatorInputs.forEach(e => {
        e.onclick = onOperatorClicked;
    });

    equalsButton.onclick = onEqualClicked;
    resetButton.onclick = onResetClicked;
})();

