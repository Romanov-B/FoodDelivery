<?php
    //Форма для вибору таблиці
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
    </form><br>";

    if($_POST['workTable'] == '') {
        header("Location: index.php?content_ref=workLogin");
    }

    //Кнопка додавання запису до вибраної таблиці
    $html .= "<form method='post' action='index.php?content_ref=DB_table' enctype='multipart/form-data'>
    <input type='hidden' name='workTable' value='".$_POST['workTable']."'>
    <input type='submit' name='addRow' value='Додати запис'>
    </form><br>";
    $html .= "<h2>".$_POST['workTable']."</h2>";

    //Форма редагування таблиці
    if (isset($_POST['editRow'])) {
        $html.="<p>Редагування існуючого запису</p>";
    //Створення динамічної форми таблиці
        //Підключення до БД
        $mysqli = new mysqli("localhost", 'root', '', "Food_Delivery");
        //Вибір таблиці для роботи
        $TABLE = $_POST['workTable'];
        //Отримання потрібного елементу таблиці
        $result = mysqli_query($mysqli, "SELECT * FROM `$TABLE` WHERE ID = ".$_POST['id']);
        //Імена колонок таблиці
        $names = mysqli_fetch_fields($result);
        //Значення в рядку таблиці
        $rows = mysqli_fetch_array($result);

        //Початок форми
        $html .="<form method='post' action='index.php?content_ref=DB_table' enctype='multipart/form-data'>";
        //Динамічна генерація форми за вибраною таблицею та даними вибраного рядка
        $tmp = 0;
        while (count($names) > $tmp) {
            //Назва ітерованого параметру
            $colName = $names[$tmp]->{'name'};
            //Додавання параметру та його значення до форми
            $html.= $colName."<input type='text' name='".$colName."' Value='".$rows[$tmp]."'><br>";

            $tmp = $tmp+1;
        }
        //Кінець форми
        $html .="<input type='hidden' name='workTable' value='".$_POST['workTable']."'>";
        $html .="<input type='hidden' name='id' value='".$_POST['id']."'>";
        $html .= "<input type='submit' name='editConfirm' value='Підтвердити зміни'></form><br>";
    }
    

    //Редагування запису в таблиці
    if (isset($_POST['editConfirm'])) {
        //Підключення до БД
        $mysqli = new mysqli("localhost", 'root', '', "Food_Delivery");
        //Вибір таблиці для роботи
        $TABLE = $_POST['workTable'];
        //Отримання редагованого елементу таблиці
        $oldRow = mysqli_query($mysqli, "SELECT * FROM `$TABLE` WHERE ID = ".$_POST['id']);
        //Імена колонок таблиці
        $names = mysqli_fetch_fields($oldRow);
        //Початкові значення в рядку таблиці
        $oldRows = mysqli_fetch_array($oldRow);

        //Формування запиту на редагування

        //Початок запиту
        $query = "UPDATE `$TABLE` SET";

        $tmp = 0;
        $paramCount = 0;

        //Ітерація для кожної колонки
        while (count($names) > $tmp) {
            //Назва ітерованого параметру
            $colName = $names[$tmp]->{'name'};

            if($_POST[$colName]!=$oldRows[$tmp])
            {
                if($paramCount >=1)
                {
                    //Кома між параметрами
                    $query.= ",";
                }
                //Додавання зміни параметру до запиту
                $query.= " ".$colName."='".$_POST[$colName]."'";
                
                //Рахуєм кількість змінених значень таблиці
                $paramCount = $paramCount+1;
            }
            $tmp = $tmp+1;
        }
        //Кінець тексту запиту
        $query.= " WHERE ID =".$_POST['id'];

        if($paramCount == 0) {
            $html.=" Жодне поле не було змінено";
        }
        else {
            //Повернення результату запиту
            $UpdateQuery=mysqli_query($mysqli,$query);
            if($UpdateQuery) {
                //Повідомлення про оновлення запису таблиці
                $html.="<p>Оновлено рядок ".$_POST['id']."</p>";
                $html.="<p>Було змінено ".$paramCount." параметрів.</p>";
            }
            else
            {
                $html.="<p>Виникла помилка при обробці запиту.</p>";
            }
        }
    }
    //Форма додавання запису до таблиці
    if (isset($_POST['addRow'])) {
        $html.="<p>Створення нового запису</p>";
    //Створення динамічної форми таблиці
        //Підключення до БД
        $mysqli = new mysqli("localhost", 'root', '', "Food_Delivery");
        //Вибір таблиці для роботи
        $TABLE = $_POST['workTable'];
        //Отримання потрібного елементу таблиці
        $result = mysqli_query($mysqli, "SELECT * FROM `$TABLE`");
        //Імена колонок таблиці
        $names = mysqli_fetch_fields($result);

        //Початок форми
        $html .="<form method='post' action='index.php?content_ref=DB_table' enctype='multipart/form-data'>";
        //Динамічна генерація форми за вибраною таблицею та даними вибраного рядка
        $tmp = 0;
        while (count($names) > $tmp) {
            //Назва ітерованого параметру
            $colName = $names[$tmp]->{'name'};
            //Додавання параметру та його значення до форми
            $html.= $colName."<input type='text' name='".$colName."' Value=''><br>";

            $tmp = $tmp+1;
        }
        //Кінець форми
        $html .="<input type='hidden' name='workTable' value='".$_POST['workTable']."'>";
        $html .="<input type='submit' name='addConfirm' value='Створити запис'></form><br>";
    }

    //Додавання запису до таблиці
    if(isset($_POST['addConfirm'])) {
        //Підключення до БД
        $mysqli = new mysqli("localhost", 'root', '', "Food_Delivery");
        //Вибір таблиці для роботи
        $TABLE = $_POST['workTable'];
        //Отримання структури таблиці
        $tbl = mysqli_query($mysqli, "SELECT * FROM `$TABLE`");
        //Імена колонок таблиці
        $names = mysqli_fetch_fields($tbl);

        //Формування запиту на редагування

        //Початок запиту
        $query = "INSERT INTO `$TABLE` (";

        //
        $tmp = 0;
        $paramCount = 0;

        //Додавання назв параметрів у запит
        while (count($names) > $tmp) {
            //Назва ітерованого параметру
            $colName = $names[$tmp]->{'name'};

                if($_POST[$colName] != "") {
                    if($paramCount >=1)
                    {
                        //Кома між параметрами
                        $query.= ",";
                    }
                    //Додавання назви параметру до запиту
                    $query.= " `".$colName."`";
                
                    //Рахуєм кількість параметрів таблиці
                    $paramCount = $paramCount+1;
                }
                
            
            $tmp = $tmp+1;
        }

        $query .= ") VALUES (";

        //Додавання значень параметрів у запит
        $tmp = 0;
        $valCount = 0;
        while (count($names) > $tmp) {
            //Назва ітерованого параметру
            $colName = $names[$tmp]->{'name'};

                
                if($_POST[$colName] != '') {
                    if($valCount >=1)
                    {
                        //Кома між параметрами
                        $query.= ",";
                    }
                //Додавання значення параметру до запиту
                $query.= " '".$_POST[$colName]."'";
                
                //Рахуєм кількість значень таблиці
                $valCount = $valCount+1;
                }
            
            $tmp = $tmp+1;
        }
        $query .= ")";

        print_r($query);

        $AddQuery = mysqli_query($mysqli, $query);

            //Повернення результату запиту
            //$UpdateQuery=mysqli_query($mysqli,$query);
            if($AddQuery) {
                //Повідомлення про оновлення запису таблиці
                $html.="<p>Було додано запис з ".$paramCount." вручну заданих параметрів.</p>";
            }
            else
            {
                $html.="<p>Виникла помилка при обробці запиту.</p>";
            }
    }

    //Запис вибраної таблиці у памяті
    setcookie('tbl', $_POST['workTable'], time()+3600, '/');
    
    include("rawTable_content.php");
    echo $html;
?>