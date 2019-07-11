<?php include 'connect.php';

$nom = $_POST["nom"];
$prov = $_POST["prov"];
if(isset($_FILES["foto"])){
  $file = $_FILES["foto"]["tmp_name"];
  $filename = $_FILES["foto"]["name"];
  if(!file_exists("uploads/")){
    mkdir("uploads/","0777");
  }
  if(file_exists("uploads/".basename($filename))){
    echo "Ja existeix";
  }else{
    if (move_uploaded_file($file, "uploads/".basename($filename))){
      echo "Imatge pujada correctament";
    }else{echo "Error!";}
  }
}

$insert = "INSERT INTO products (ProductName, SupplierID, Image)
            VALUES ('".$nom."','".$prov."','".$filename."')";
$doinsert = $con->query($insert);

$select = "SELECT ProductName, SupplierID, Image
            FROM products";
$doselect = $con->query($select);
$resultat = $doselect->FETCH_ASSOC();
echo "Nom:".$resultat["ProductName"]."<br>";
echo "ID de proveidor:".$resultat["SupplierID"]."<br>";
echo "<img src='uploads/".$resultat["Image"]."'>";


include 'close.php';
?>