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
  <title>SQL Test</title>
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
      <th>CustomerID</th>
      <th>CompanyName</th>
      <th>ContactName</th>
      <th>ContactTitle</th>
      <th>Address</th>
      <th>City</th>
      <th>Country</th>
    </tr> 
  </thead>
  <tbody> 
    <?php   
      if(isset($_GET["pagenum"])){
        $pagina = $_GET["pagenum"];
        $query = "SELECT * FROM customers LIMIT $pagina, 20 ";
        $result = $con->query($query);
        if ($result->num_rows==0){
          echo "No s'han trobat dades";
        }else{        
          while($client = $result->FETCH_ASSOC()){          
            echo utf8_encode("<tr> <td> ".$client["CustomerID"]."</td><td> ".$client["CompanyName"]."</td><td> ".$client["ContactName"]."</td><td> ".$client["ContactTitle"]."</td><td> ".$client["Address"]."</td><td> ".$client["City"]."</td><td> ".$client["Country"]."</td></tr>");
          }
        }
      }
      else{
        $query = "SELECT * FROM customers LIMIT 0, 20 ";
        $result = $con->query($query);
        if ($result->num_rows==0){
          echo "No s'han trobat dades";
        }else{        
          while($client = $result->FETCH_ASSOC()){          
            echo utf8_encode("<tr> <td> ".$client["CustomerID"]."</td><td> ".$client["CompanyName"]."</td><td> ".$client["ContactName"]."</td><td> ".$client["ContactTitle"]."</td><td> ".$client["Address"]."</td><td> ".$client["City"]."</td><td> ".$client["Country"]."</td></tr>");
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
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest.php?pagenum=0">1</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest.php?pagenum=20">2</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest.php?pagenum=40">3</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest.php?pagenum=60">4</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest.php?pagenum=80">5</a></li>
        </li>
      </ul>
    </nav>
</body>
</html>
<?php
  $con->close();
?>