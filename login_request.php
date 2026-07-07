<?php
//Зєднання з БД
$mysqli = new mysqli("localhost",'root','',"Food_Delivery");

$html = "";
//Перевірка Зєднання з БД
if ($mysqli -> connect_errno) {
  $html .= "<p>Failed to connect to MySQL: " . $mysqli -> connect_error."</p>";
  echo $html;
}
else {
  $html .= "<p>Connection Success</p>";
}
//Перевірка логіну та паролю
$query = mysqli_query($mysqli, "SELECT * FROM EMPLOYEE WHERE login ='".$_POST['login']."' AND  password ='".$_POST['password']."'".
"AND Deactivation_datetime IS NULL");

if($query != false && $query->num_rows > 0) {
  //Успішна авторизація
  setcookie('logged', true, time()+3600,'/');
  header('Location: index.php?content_ref=workLogin');
} else {
  //Неуспішна авторизація
  setcookie('login_failed', true, time()+1,'/');
  $html = "<p>Помилка при авторизації</p>";
  header('Location: index.php?content_ref=workLogin');
}
echo $html;
?>