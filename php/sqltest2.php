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
  <form method="get" action="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest2.php">
    <label for="filesperpag">Files per página</label>
      <select id="filesperpag" class="form-control" name="mida">
        <option> 10 </option>
        <option> 20 </option>
        <option> 30 </option>
        <option> 40 </option>
      </select>
    <input type="submit" value="Canviar"/>
  </form>
  
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

      if(isset($_GET["page"])){
        $plana = $_GET["page"];
      }else{
        $plana = 1;
      }
      if(isset($_GET["mida"])){
        $mida = $_GET["mida"];
      }else{
        $mida = 10;
      }
      $result2 = $con->query("SELECT * FROM customers");
      $files = $result2->num_rows;
      $query = "SELECT * FROM customers LIMIT ".($plana-1)*$mida.",".$mida;
      $result = $con->query($query);
      
      if ($result->num_rows==0){
        echo "No s'han trobat dades";
      }else{   
        while($client = $result->FETCH_ASSOC()){          
          echo utf8_encode("<tr> <td> ".$client["CustomerID"]."</td><td> ".$client["CompanyName"]."</td><td> ".$client["ContactName"]."</td><td> ".$client["ContactTitle"]."</td><td> ".$client["Address"]."</td><td> ".$client["City"]."</td><td> ".$client["Country"]."</td></tr>");
        }
        
      }
    ?>
  </tbody>
  </table>
  <div id="navbar">
    <nav aria-label="Paginació">
      <ul class="pagination">
        </li>
          <?php
            $total = ceil($files/$mida);

            //$total = 5;
            for ($i=1;$i<=$total;$i++){
              echo "<li class='page-item'><a class='page-link' href=http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest2.php?page=".$i."&mida=".$mida.">".$i."</a></li>";              
            }
          ?>

          <!--<li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest2.php?page=1&mida=<?php echo $mida ?>">1</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest2.php?page=2&mida=<?php echo $mida ?>">2</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest2.php?page=3&mida=<?php echo $mida ?>">3</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest2.php?page=4&mida=<?php echo $mida ?>">4</a></li>
          <li class="page-item"><a class="page-link" href="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest2.php?page=5&mida=<?php echo $mida ?>">5</a></li>
          -->
        </li>
      </ul>
    </nav>
  </div>
</body>
</html>
<?php
  $con->close();
?>