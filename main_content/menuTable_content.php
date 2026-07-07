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

//Зєднання з БД
$mysqli = new mysqli("localhost", 'root', '', "Food_Delivery");

//Запит
$result = mysqli_query($mysqli, "SELECT Products.ID AS ID, Product_name, Photo_ref AS Photo, Description, Category_name AS Category,
Measuring_Unit_name AS 'Measuring unit', PricePerUnit 
FROM Products INNER JOIN Categories ON Products.FK_Category = Categories.ID 
            INNER JOIN Measuring_Unit ON Measuring_Unit.ID = Products.FK_Measuring_Unit");

//Відображення даних
$html = "<h2>Меню</h2>";
$html .= "<p>";
$html .= build_table($result);
$html .= "</p>";

echo $html;
?>