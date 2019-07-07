<?php include 'connect.php'; 

$nom = $_POST["nom"];
$desc = $_POST["descripcio"];

if(isset($nom) && isset($desc)){
  $sql = "INSERT INTO categories (CategoryName, Description)
        VALUES ('".$nom."','".$desc."')";
}else{
  echo "Emplena tots els camps!";
}

if($con->query($sql) == true){
  echo "Dades introduides correctament!";
}else{
  echo "error: ".$con->error;
}



include 'close.php'; ?>