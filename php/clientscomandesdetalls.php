<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "proves";

  $con = new mysqli($server,$username,$password,$database);
  if($con->connect_error){
    die ("Error al connectarse".$con->connect_error);
  }

  $clientid = $_GET["orderid"];
  $query = "SELECT * FROM orders WHERE CustomerID ='$clientid'";
  $result = $con->query($query);
  if ($result->num_rows==0){
    echo "No s'han trobat dades";
  }else{ 
    echo (
      "<table class='table table-striped'>
      <caption> <u>Comandes del client seleccionat <u></caption> 
      <thead>
        <tr>
          <th>OrderID</th>
          <th>OrderDate</th>
          <th>Address</th>
          <th>City</th>
          <th>Country</th>
        </tr>
      </thead>
      <tbody>    
    ");
    while($client = $result->FETCH_ASSOC()){
      echo utf8_encode("<tr taula-id='2'><td>".$client["OrderID"]."</td><td>".$client["OrderDate"]."</td><td>".$client["ShipAddress"]."</td><td>".$client["ShipCity"]."</td><td>".$client["ShipCountry"]."</td></tr>");     
    }
    echo "</tbody></table>";
  }
    

  $con->close();
?>