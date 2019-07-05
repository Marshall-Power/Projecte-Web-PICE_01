<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "proves";

  $con = new mysqli($server,$username,$password,$database);
  if($con->connect_error){
    die ("Error al connectarse".$con->connect_error);
  }

  $query = "SELECT suppliers.CompanyName, products.productID, products.ProductName, categories.CategoryName, products.UnitPrice, suppliers.CompanyName
            FROM products
            LEFT JOIN categories
            ON products.CategoryID = categories.CategoryID
            LEFT JOIN suppliers 
            ON products.SupplierID = suppliers.SupplierID
            ";
            
  $result = $con->query($query);
  if ($result->num_rows==0){
    echo "No s'han trobat dades";
  }else{ 
    echo ("<table class='table'> 
            <thead>
              <tr>
                <th>Companyia</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Category ID</th>
                <th>Unit Price </th>
              </tr>
            </thead>
          <tbody>
          ");
      while ($client = $result->FETCH_ASSOC()){
        echo utf8_encode("<tr><td>".$client["CompanyName"]."</td><td>".$client["productID"]."</td><td>".$client["ProductName"]."</td><td>".$client["CategoryName"]."</td><td>".$client["UnitPrice"]."</td></tr>");
      }
      echo ("</tbody> </table>");

  }

  $con->close();
?>