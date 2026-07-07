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
            //Відображення фотографії за посиланням
            if ($names[$tmp2]->{'name'} == 'Photo_ref') {
                $html .= "<td><img src= photos/".$rows[$tmp2]." alt='photo'></td>";
            } else {
                $html .= '<td>' . $rows[$tmp2] . '</td>';
            }

            $tmp2 = $tmp2 + 1;
        }

        //Кнопка для редагування рядка
        $html .= "<td>
          <form method='post' action='index.php?content_ref=DB_table' enctype='multipart/form-data'>
              <input type='submit' name='editRow' value='Редагувати'>
              <input type='hidden' name='id' value='".$rows[0]."'>
              <input type='hidden' name='workTable' value='".$_POST['workTable']."'>
           </form><br>
        </td>";
        $html .=  '</tr>';
    }

    //Завершення та повернення готової таблиці

    $html .= '</table>';
    return $html;
}
$mysqli = new mysqli("localhost", 'root', '', "Food_Delivery");

$TABLE = $_POST['workTable'];

$result = mysqli_query($mysqli, "SELECT * FROM `$TABLE`");

$html .= "<p>";
$html .= build_table($result);
$html .= "</p>";
?>