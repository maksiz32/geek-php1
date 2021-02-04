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
                =
                <input type="text" name="summa" value='<?php if(isset($summa)) echo $summa?>' disabled>
                <button type="submit">Вычислить</button>
            </form>
            </li><br>
            <li>Создать калькулятор, который будет определять тип выбранной пользователем операции, ориентируясь на нажатую кнопку. При желании сделать через ajax</li>
            <li>Добавить функционал отзывов в имеющийся у вас проект.</li>
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
</div>