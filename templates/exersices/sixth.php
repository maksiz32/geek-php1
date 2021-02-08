<div class="main" style="margin: 20px 40px;">
    <h1>Практическая работа №6</h1>
        <ol>
            <li>Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега &lt;select&gt;. Оставьте введенные значения в форме, и выбранную операцию тоже!<br><br>
            <form action="" method="post">
                <input type="text" name="argF" value='<?php if(isset($argF)) echo $argF?>'>
                    <select name="operation">
                        <option value="sum" <?php if(isset($operation) && $operation == 'sum') echo "selected"?>>+</option>
                        <option value="minus" <?php if(isset($operation) && $operation == 'minus') echo "selected"?>>-</option>
                        <option value="mult" <?php if(isset($operation) && $operation == 'mult') echo "selected"?>>*</option>
                        <option value="del" <?php if(isset($operation) && $operation == 'del') echo "selected"?>>/</option>
                    </select>
                <input type="text" name="argS" value='<?php if(isset($argS)) echo $argS?>'>
                <button type="submit">=</button>
                <input type="text" name="summa" value='<?php if(isset($summa)) echo $summa?>' disabled>
            </form>
            </li><br>
            <li>Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку. При желании сделать через ajax<br><br>
            <form action="" method="post">
                <input type="text" name="argF1" value='<?php if(isset($argF1)) echo $argF1?>'>
                И
                <input type="text" name="argS1" value='<?php if(isset($argS1)) echo $argS1?>'>
                <button type="submit" name="sum">+</button>
                <button type="submit" name="minus">-</button>
                <button type="submit" name="mult">*</button>
                <button type="submit" name="del">/</button>
                <input type="text" name="summa1" value='<?php if(isset($summa1)) echo $summa1?>' disabled>
            </form>
            </li><br>
            <!-- <li>Создать калькулятор ajax<br><br>
                <input type="text" name="argF2" id="argF2">
                И
                <input type="text" name="argS2" id="argS2">
                <button type="submit" id="start" name="sum">+</button>
                <button type="submit" id="start" name="minus">-</button>
                <button type="submit" id="start" name="mult">*</button>
                <button type="submit" id="start" name="del">/</button>
                <input type="text" name="summa2" id="summa2" disabled>
            </li> -->
            <li>**. Вместо отзывов к сайту сделайте отзывы к товару. На странице с отдельным товаром.</li>
            <li>Создать страницу каталога товаров: ВАЖНО
                <ul>
                    <li>товары хранятся в БД;</li>
                    <li>страница формируется автоматически;</li>
                    <li>по клику на товар открывается карточка товара с подробным описанием.</li>
                    <li>подумать, как лучше всего хранить изображения товаров.</li>
                    <li>сделать заготовочку кнопки КУПИТЬ</li>
                </ul>
            </li>
        <li>*Написать CRUD-блок для управления выбранным модулем через единую функцию (doFeedbackAction()).</li>
        </ol>
<!-- <script>
    window.onload = function () {
        document.getElementById('start').onclick = function () {
            (async () => {
                const response = await fetch('apicalc', {
                    method: 'POST',
                    headers: //{
                    //     'Content-Type': 'application/x-www-form-urlencoded'
                    // },
                    new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        op1: '2',
                        op2: '2',
                        opType: 'sum'
                    }),

                });
                const answer = await response.json();
                console.log(answer);
            })();
        }
    }
</script> -->
</div>