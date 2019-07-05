<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "proves";

  $con = new mysqli($server,$username,$password,$database);
  if($con->connect_error){
    die ("Error al connectarse".$con->connect_error);
  }

  $orderid = $_GET["comandid"];
  
  
  echo "<div class='row'>
          <div class=col-md-5>";
  $query = "SELECT customers.ContactName
            FROM orders
            LEFT JOIN customers
            ON orders.CustomerID = customers.CustomerID
            WHERE orders.ORDERID = '$orderid'
            ";
  $resultat = $con->query($query);;
  if($resultat->num_rows==0){
  echo "No s'han trobat dades";
  }else{
    while($customer = $resultat->FETCH_ASSOC()){
      echo $customer["ContactName"];
    }
  }        
  
  echo "</div>
        </div>";

  $con->close();
?>