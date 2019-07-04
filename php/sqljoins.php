<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "proves";

  $con = new mysqli($server,$username,$password,$database);
  if($con->connect_error){
    die ("Error al connectarse".$con->connect_error);
  }

  $query = "SELECT order_details.Quantity, products.ProductName, order_details.UnitPrice 
            FROM order_details LEFT JOIN products 
            ON order_details.ProductID = products.ProductID
            WHERE orderID=10252";
  $result = $con->query($query);
  if ($result->num_rows==0){
    echo "No s'han trobat dades";
  }else{ 
    echo ("<table class='table'> 
            <thead>
              <tr>
                <th>Quantitat</th>
                <th>Nom</th>
                <th>Price</th>
              </tr>
            </thead>
          <tbody>
          ");
      while ($client = $result->FETCH_ASSOC()){
        echo utf8_encode("<tr><td>".$client["Quantity"]."</td><td>".$client["ProductName"]."</td><td>".$client["UnitPrice"]."</td></tr>");
      }
      echo ("</tbody> </table>");

  }

  $con->close();
?>