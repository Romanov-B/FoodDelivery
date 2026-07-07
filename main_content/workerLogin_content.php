<?php
if (!empty($_COOKIE['logged']) && $_COOKIE['logged'] == true) {
    //Перенаправлення якщо користувач авторизований
    include('main_content/tableSelect_content.php');
}
else
{
    //Форма авторизації користувача
$html = "<h2>Ви не увійшли до системи</h2>";
$html .= "<p>";
$html .= "
<form method='post' action='index.php?content_ref=login_request' enctype='multipart/form-data'>
    Логін <br><input type='text' name='login' Value=''><br>
    Пароль <br><input type='text' name='password' Value=''><br>

    <input type='submit' value='Увійти'>
    <input type='reset' value='Очистити'>
</form>";
$html .= "</p>";

if(isset($_COOKIE['login_failed']) && $_COOKIE['login_failed']==true) {
    $html .= "<br><p>Помилка: неправильний логін\пароль або обліковий запис деактивовано</p>";
}

echo $html;
}
?>