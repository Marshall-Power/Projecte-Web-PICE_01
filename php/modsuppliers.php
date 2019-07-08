<?php
include 'connect.php';


if (isset($_POST["suppid"])){
  $query = "SELECT * FROM suppliers WHERE SupplierID ='".$_POST["suppid"]."'";
  $cerca = $con->query($query);
  $resultat = $cerca->FETCH_ASSOC();

  echo "<label for='mnomcomp'>Nom de la companyia: </label><br>
  <input type='text' id='mnomcomp' value='".$resultat["CompanyName"]."' autofocus><br>
  <label for='mnomcontacte'>Nom del contacte: </label> <br>
  <input type='text' id='mnomcontacte' value='".$resultat["ContactName"]."'><br>
  <label for='madress'>Adreça: </label><br>
  <input type='text' id='madress' value='".$resultat["Address"]."'><br>
  <label for='mciutat'>Ciutat: </label><br>
  <input type='text' id='mciutat' value='".$resultat["City"]."'><br>
  <label for='mpais'>Pais: </label><br>
  <input type='text' id='mpais' value='".$resultat["Country"]."'><br>
  <button class='btn btn-danger' id='modificar'>Modificar proveidor</button>
  ";
  }


include 'close.php';

?>