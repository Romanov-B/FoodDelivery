<?php
    setcookie('logged', '', 1);
    unset($_COOKIE['logged']);
    header('Location: index.php');
?>