<?php
include 'connect.php';

$suppid = $_POST["suppid"];

$delete = "DELETE FROM suppliers WHERE SupplierID = '".$suppid."'";
$doit = $con->query($delete);

include 'close.php';
?>