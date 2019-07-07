<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Document</title>
</head>
<body>
  <?php 
    $query = "SELECT * FROM shippers WHERE ShipperID = '".$_GET ['shipperid']."'";
    $result = $con->query($query);
    $dades = $result->FETCH_ASSOC();
  ?>

  <form method="POST" action="shippersmod.php"> 
    <label for="id">Nom de la companyia:</label> <br>
    <input type="hidden" name="shipid" value=<?php echo $dades['ShipperID'] ?>>
    <input type="text" id="id" name="nomcomp" value=<?php echo $dades['CompanyName'] ?>><br>
    <label for="nomcategoria">Telefon</label> <br>
    <input type="text" id="nomcategoria" name="telf" value=<?php echo $dades['Phone'] ?>><br>
    <button type="submit" class="btn btn-info">Modificar</button>
</body>
</html>
<?php include 'close.php'; ?>