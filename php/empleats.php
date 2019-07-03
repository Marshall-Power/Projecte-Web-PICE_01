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
  <title>Empleats SQL Test</title>
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
      <th>Títol</th>
    </tr> 
  </thead>
  <tbody> 
    <?php
        $query = "SELECT Title, COUNT(Title) AS Quantitat FROM employees GROUP BY Title";
        $result = $con->query($query);
        if ($result->num_rows==0){
          echo "No s'han trobat dades";
        }else{        
          while($client = $result->FETCH_ASSOC()){   
            echo utf8_encode($client["Title"]." ");       
            echo utf8_encode($client["Quantitat"]."</br>");
          }
        }

      
      
    ?>
  
</body>
</html>
<?php
  $con->close();
?>