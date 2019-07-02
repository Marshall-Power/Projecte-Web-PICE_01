<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "proves";

  $con = new mysqli($server,$username,$password,$database);
  if($con->connect_error){
    die ("Error al connectarse".$con->connect_error);
  }

  $query = "SELECT * FROM customers WHERE Country = 'URSS'";
  $result = $con->query($query);
  if ($result->num_rows==0){
    echo "No s'han trobat dades";
  }else{
    echo $result->num_rows;
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
</head>
<body>
  
</body>
</html>
<?php
  $con->close();
?>