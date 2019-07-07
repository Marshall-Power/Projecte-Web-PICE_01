<?php include 'connect.php';?>

<?php


$sql = "UPDATE categories
        SET CategoryID='".$_POST["idcat"]."', 
            CategoryName='".$_POST["nomcategoria"]."',
            Description='".$_POST["descrip"]."'
        WHERE CategoryID = 1";

$query = $con->query($sql);
echo "Dades modificades";

?>





















<?php include 'close.php' ?>