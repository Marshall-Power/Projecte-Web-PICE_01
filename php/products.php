<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "proves";

  $con = new mysqli($server,$username,$password,$database);
  if($con->connect_error){
    die ("Error al connectarse".$con->connect_error);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Productes SQL Test</title>
  <style>
    #navbar{
      text-align: center;
      position:sticky;
      bottom: 0px;
      margin-bottom:10px;
    }
  </style>
</head>
<body>

  <table class="table">
  <thead>
    <tr>
      <th>ProductID</th>
      <th>ProductName</th>
      <th>SupplierID</th>
      <th>CategoryID</th>
      <th>QuantityPerUnit</th>
      <th>UnitPrice</th>
      <th>UnitsInStock</th>
    </tr> 
  </thead>
  <tbody> 
    <?php   
      if(isset($_GET["pagenum"])){
        $pagina = $_GET["pagenum"];
        $query = "SELECT * FROM products LIMIT $pagina, 10";
        $result = $con->query($query);
        if ($result->num_rows==0){
          echo "No s'han trobat dades";
        }else{        
          while($client = $result->FETCH_ASSOC()){          
            echo utf8_encode("<tr> <td> ".$client["ProductID"]."</td><td> ".$client["ProductName"]."</td><td> ".$client["SupplierID"]."</td><td> ".$client["CategoryID"]."</td><td> ".$client["QuantityPerUnit"]."</td><td> ".$client["UnitPrice"]."</td><td> ".$client["UnitsInStock"]."</td></tr>");
          }
        }
      }
      else{
        $pagina = 0;
        $query = "SELECT * FROM products WHERE UnitPrice >= '38' and UnitPrice <= 60";
        $result = $con->query($query);
        if ($result->num_rows==0){
          echo "No s'han trobat dades";
        }else{        
          while($client = $result->FETCH_ASSOC()){          
            echo utf8_encode("<tr> <td> ".$client["ProductID"]."</td><td> ".$client["ProductName"]."</td><td> ".$client["SupplierID"]."</td><td> ".$client["CategoryID"]."</td><td> ".$client["QuantityPerUnit"]."</td><td> ".$client["UnitPrice"]."</td><td> ".$client["UnitsInStock"]."</td></tr>");
          }
        }

      }
      
    ?>
  </tbody>
  </table>
  <div id="navbar">
    <nav aria-label="Paginació">
      <ul class="pagination">
        </li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/products.php?pagenum=0">1</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/products.php?pagenum=20">2</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/products.php?pagenum=40">3</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/products.php?pagenum=60">4</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/products.php?pagenum=80">5</a></li>
        </li>
      </ul>
    </nav>
</body>
</html>
<?php
  $con->close();
?>