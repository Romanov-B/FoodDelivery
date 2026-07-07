<?php
    //Форма переключення між робочими таблицями
    $html = "<h2>Виберіть таблицю для роботи</h2>";
    $html .= "<p>";
    $html = "<form method='post' action='index.php?content_ref=DB_table' enctype='multipart/form-data'>
    <select name='workTable' id='workTable'>
    <option value=''>Виберіть таблицю</option>
    <option value='Positions'>Посади</option>
    <option value='Employee'>Працівники</option>
    <option value='Measuring_Unit'>Одиниці виміру</option>
    <option value='Categories'>Категорії продуктів</option>
    <option value='Products'>Продукти</option>
    <option value='City'>Міста</option>
    <option value='Street'>Вулиці</option>
    <option value='Order'>Замовлення</option>
    <option value='1_Product_In_Order'>Товари в замовленні</option>
    <option value='Operations'>Операції</option>
    <option value='Processing_Stages'>Етапи виконання</option>
    <option value='Delivery_Runs'>Подорожі</option>
    <option value='Order_Delivery'>Доставка 1 замовлення</option>
    <input type='submit' value='Вибрати'>
    </form>";
    $html .= "</p>";

    echo $html;
?>