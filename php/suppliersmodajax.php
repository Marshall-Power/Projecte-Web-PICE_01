<?php

include 'connect.php';

$companyname = $_POST["nomcompanyia"];
$query = "SELECT CompanyName FROM suppliers WHERE CompanyName = '".$companyname."'";
$cerca = $con->query($query);
if($cerca->num_rows==0){
  $insert = "INSERT INTO suppliers (CompanyName, Address, ContactName, City, Country)
            VALUES ('".$_POST["nomcompanyia"]."','".$_POST["adreca"]."','".$_POST["nomcontacte"]."','".$_POST["ciutat"]."','".$_POST["pais"]."')";
  $result = $con->query($insert);
  
  echo "<tr> <td>".$_POST["nomcompanyia"]."</td><td>".$_POST["nomcontacte"]."</td><td>".$_POST["adreca"]."</td><td>".$_POST["ciutat"]."</td><td>".$_POST["pais"]."</td><td> <button class='btn btn-danger'> Modificar </button></td></tr>";
}else{
  echo "0";
}
  



include 'close.php';
?>