<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Inserts</title>
</head>
<body>
  <h4>Afegir shipper </h4>
  <form method="POST" action="sqlinsertshipper.php">
    <label for="nom">Company Name:</label>
    <input type="text" name="cname" required>
    <br>
    <button type="submit" class="btn btn-info">Inserir</button>
  </form>

  <?php
    if (isset($_POST["cname"])){
      $companyname = $_POST["cname"];
      $query = "SELECT CompanyName FROM shippers WHERE CompanyName ='".$companyname."'";
      $cerca = $con->query($query);
      if ($cerca->num_rows==0){
        $insert = "INSERT INTO shippers (CompanyName) VALUES ('".$companyname."')";
        $insercio = $con->query($insert);
        echo "Inserit correctament";
      }else{ 
        echo "L'agencia de transports ja existeix!";
      }
    }
  ?>
  
</body>
</html>

<?php $con->close(); ?>