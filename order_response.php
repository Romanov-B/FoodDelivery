<?php
if(array_key_exists( 'initOrder', $_POST ))
{
  $mysqli = new mysqli("localhost","root", "" ,"Food_Delivery");

  $query = "INSERT INTO `ORDER` (`Client_name`, `Client_Phone`, `Client_Location`, `Building`) VALUES (" 
  . "'" . $_POST['name']. "'" . ', '. "'" . $_POST['phone']. "'" . ', '. "'"
  . $_POST['location'] . "'". ', '. "'". $_POST['building']. "'". ')';
  
  print_r($query);

  $query = mysqli_query($mysqli, $query);

  // Check connection
 if (!$query) {
   echo "Query failed".$mysqli -> mysqli_error;
  exit();
 }
 else {
 echo "Connection Success";
     setcookie('order_id', $mysqli->insert_id, time()+3600,'/');
     header('Location: index.php?content_ref=order');
     exit();
 }
}

if (!empty($_COOKIE['order_id']) && array_key_exists( 'addProduct', $_POST )) {
  print_r("adding product...");
  $mysqli = new mysqli("localhost","root", "" ,"Food_Delivery");
  $query = "INSERT INTO 1_Product_In_Order (Amount, FK_Product, FK_Order) VALUES (";
  $query .= $_POST['amount'] . ',' . $_POST['ID'] . ','. $_COOKIE['order_id']. ')';
  $query = mysqli_query($mysqli, $query);
  
  if (!$query) {
    echo "Query failed".$mysqli -> mysqli_error;
   exit();
  }
  else {
  echo "Connection Success";
  header('Location: index.php?content_ref=order');
      exit();
  }
}

if(array_key_exists('finalizeOrder', $_POST ))
{
  setcookie('order_id', '', 1);
  unset($_COOKIE['order_id']);
  header('Location: index.php?content_ref=order');
  exit();
}
?>