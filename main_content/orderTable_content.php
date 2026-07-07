<?php
function build_table($db_result)
{
    //Початок таблиці
    $html = '<table border="1">';

    //Перший рядок таблиці (зміст колонок)
    $html .= '<tr>';
    $names = mysqli_fetch_fields($db_result);
    $html .= '<tr>';

    $tmp = 0;
    while (count($names) > $tmp) {
        $html .= '<td>' . $names[$tmp]->{'name'} . '</td>';

        $tmp = $tmp + 1;
    }
    $html .= '</tr>';

    //Основний контент таблиці
    $tmp = 0;
    while ($rows = mysqli_fetch_array($db_result)) {
        $html .= '<tr>';

        $tmp2 = 0;
        while (count($rows) / 2 > $tmp2) {
            if ($names[$tmp2]->{'name'} == 'Photo') {
                $html .= "<td><img src= photos/".$rows[$tmp2]." alt='photo'></td>";
            } else {
                $html .= '<td>' . $rows[$tmp2] . '</td>';
            }

            $tmp2 = $tmp2 + 1;
        }

        $html .=  '</tr>';
    }


    //Завершення та повернення готової таблиці

    $html .= '</table>';
    return $html;
}

if (!empty($_COOKIE['order_id'])) {
$mysqli = new mysqli("localhost", 'root', '', "Food_Delivery");

$result = mysqli_query($mysqli, "SELECT Products.id, Products.Product_name, Products.PricePerUnit, 1_Product_In_Order.Amount,
Products.PricePerUnit*1_Product_In_Order.Amount AS Total
FROM Products INNER JOIN 1_Product_In_Order on products.id = 1_Product_In_Order.FK_Product
WHERE 1_Product_In_Order.FK_Order =".$_COOKIE['order_id']);

$html = "<h2>Замовлені продукти</h2>";
$html .= "<p>";
$html .= build_table($result);
$html .= "</p>";
} else {
    $html = "<h2>Активного замовлення немає</h2>";
}
echo $html;
?>