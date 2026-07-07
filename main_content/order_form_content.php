<?php
if (empty($_COOKIE['order_id'])) {
    //Контактні дані для подальшого формування замовлення
    $html = "<h2>Введіть контактні дані</h2>";
    $html .= "<p>";
    $html .= "
    <form method='post' action='order_response.php' enctype='multipart/form-data'>
        Ім'я <br><input type='text' name='name' Value=''><br>
        Номер телефону <br><input type='text' name='phone' Value=''><br>
        Адреса <br><input type='text' name='location' Value=''><br>
        Будинок <br><input type='text' name='building' Value=''><br>
        Квартира <br><input type='text' name='apartment' Value=''><br>

        <input type='submit' name = 'initOrder' value='Відправити'>
        <input type='reset' value='Очистити'>
    </form>";
    $html .= "</p>";

    echo $html;
} else {
    //При існуванні контактних даних додавання товару до списку в замовленні
    $html = "<h2>Введіть дані товару</h2>";
    $html .= "<p>";
    $html .= "
    <form method='post' action='order_response.php' enctype='multipart/form-data'>
       ID продукту <br><input type='text' name='ID' Value=''><br>
       Кількість одиниць <br><input type='text' name='amount' Value=''><br>

       <input type='submit' name = 'addProduct' value='Відправити'>
      <input type='reset' value='Очистити'>
    </form>";
    $html .="<form method='post' action='order_response.php' enctype='multipart/form-data'>
    <input type='submit' name = 'finalizeOrder' value='Завершити формування замовлення'>
    </form>";
    $html .= "</p>";
    echo $html;
}
?>