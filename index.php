<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Доставка продуктів </title>
    <link rel="stylesheet" href="MyStyle.css">
</head>

<body>
    <div id="wrap">
        <div id="header">
            <h1> Доставка продуктів харчування </h1>
            <?php
            //Перевірка та відображення чи працівник увійшов в систему
            if (!empty($_COOKIE['logged']) && $_COOKIE['logged'] == true) {
                echo "<p>Ви увійшли в систему як працівник</p>";

                //Вихід з системи
                echo  "
                    <form action='logOut.php'>
                        <input type='submit' value='Вийти' />
                    </form>";
            }
            ?>
        </div>

        <div id="nav">
            <a href="index.php">
                <img src="main_logo.jpg" alt="Logo" width="75" height=75" style="margin: 10px">
            </a>
            <ul>
                <li> Навігація </li>
                <li><a href="index.php"> На головну </a></li>
                <li><a href="index.php?content_ref=workLogin"> Для працівників </a></li>
                <li><a href="https://khmnu.edu.ua/"> Сайт ХНУ </a></li>
            </ul>
        </div>
        <div id="main">
            
            <?php
            //Вибір головного контенту, що показується користувачу
            if (empty($_GET['content_ref'])) {
                include("main_content/mainPage_content.php");
            } else {
                $content = $_GET['content_ref'];

                if ($content == 'menu') {
                    include("main_content/menuTable_content.php");
                }

                if ($content == 'order') {
                    include("main_content/order_form_content.php");
                }

                if ($content == 'order_table') {
                    include("main_content/orderTable_content.php");
                }

                if ($content == 'workLogin') {
                    include("main_content/workerLogin_content.php");
                }

                if ($content == 'login_request') {
                    include("login_request.php");
                }

                if ($content == 'DB_table') {
                    include("main_content/tableControl_content.php");
                }
            }
            ?>

        </div>
        <div id="sidebar">
            <h3> Меню </h3>
            <ul>
                <li><a href="index.php?content_ref=menu"> Каталог продуктів </a></li><br>
                <li><a href="index.php?content_ref=order"> Замовити </a></li><br>
                <li><a href="index.php?content_ref=order_table"> Товари в замовленні </a></li><br>
            </ul>
        </div>
        <div id="footer">
            &copy; Романов Богдан Усі права захищені
        </div>
    </div>
</body>

</html>