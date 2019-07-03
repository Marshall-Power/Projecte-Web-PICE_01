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
    table{
      /*display:none;*/
    }
    
  </style>
  <script>
    
    
  </script>
</head>
<body>
<form method="get" action="http://localhost/GitRepos/Projecte-Web-PICE_01/php/sqltest.php">
    <input type="text" size="10" name="cerca" id="buscar">
    <input type="submit" value="Canviar"/>
</form>  
      <?php
        if(isset($_GET["cerca"])){
          $cerca = $_GET["cerca"];
          $query = "SELECT * FROM customers WHERE CompanyName LIKE '%$cerca%'";
          $result = $con->query($query);
          if ($result->num_rows==0){
            echo "No s'han trobat dades";
          }else{
            echo "<table class='table' id='taula'>
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
            <tbody> ";
            while($client = $result->FETCH_ASSOC()){          
              echo utf8_encode("<tr> <td> ".$client["CustomerID"]."</td><td> ".$client["CompanyName"]."</td><td> ".$client["ContactName"]."</td><td> ".$client["ContactTitle"]."</td><td> ".$client["Address"]."</td><td> ".$client["City"]."</td><td> ".$client["Country"]."</td></tr>");
            }
          }
        }
        else{
          
        }
        
      ?>
    </tbody>
  </table>
  
</body>
</html>
<?php
  $con->close();
?>