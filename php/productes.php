<?php
  include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Productes</title>
  <style>
    #capa1{
      height: 600px;
      overflow-y: scroll;
    }
    th{
      background-color:white;
      position: sticky;
      top:0;
    }
    
    
  </style>
  <script>
    $(document).ready(function(){
      
    });

  </script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-10" id="capa1">  
        <table class="table table-striped table-hover" id="taula">
          <thead>
            <th>Nom</th>
            <th>Proveidor</th>
            <th>Categoria</th>
            <th>Quantitat per unitat</th>
            <th>Preu Unitat</th>
            <th>Unitats en stock</th>
            <th>Unitats encomendades</th>
            <th>Discontinuat</th>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT products.ProductName, suppliers.CompanyName, categories.CategoryName, products.QuantityPerUnit, products.UnitPrice, products.UnitsInStock, products.UnitsOnOrder, products.Discontinued
                      FROM products
                      LEFT JOIN suppliers
                      ON products.SupplierID = suppliers.SupplierID
                      LEFT JOIN categories
                      ON products.CategoryID = categories.CategoryID";
              $query = $con->query($sql);
              while($results = $query->FETCH_ASSOC()){
                if($results["Discontinued"]==0){
                  $discontinued = "Si";
                }else{
                  $discontinued="No";
                }
                echo "<tr> <td>".utf8_encode($results["ProductName"])."</td>
                          <td>".utf8_encode($results["CompanyName"])."</td>
                          <td>".utf8_encode($results["CategoryName"])."</td>
                          <td>".utf8_encode($results["QuantityPerUnit"])."</td>
                          <td>".utf8_encode($results["UnitsInStock"])."</td>
                          <td>".utf8_encode($results["UnitsOnOrder"])."</td>
                          <td>".utf8_encode($results["ProductName"])."</td>
                          <td>".$discontinued."</td>
                      </tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
      <a href="afegirproducte.php"> <button class="btn btn-info" id="afegir">Afegir Producte</button> </a>
      
    </div>
  </div>
  
</body>
</html>
<?php
include 'close.php';
?>