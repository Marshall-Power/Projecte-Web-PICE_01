<?php
include 'connect.php';

$producte = $_POST["nomcompanyia"];
$sql = "SELECT ProductName FROM products WHERE ProductName = '".$producte."'";
$query = $con->query($sql);
if($query->num_rows != 0){
  echo true;
}else{echo false;}

include 'close.php';
?>