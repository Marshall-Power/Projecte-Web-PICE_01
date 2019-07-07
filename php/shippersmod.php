<?php include 'connect.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Shippers edition page</title>
</head>
<body>
  <?php
    if(isset($_POST["nomcomp"]) && isset($_POST["telf"])){
      $update = "UPDATE shippers 
                SET CompanyName='".$_POST["nomcomp"]."',
                    Phone='".$_POST["telf"]."'
                WHERE ShipperID='".$_POST["shipid"]."'";
      $comitupdate = $con->query($update);
    }
  ?>
  <table class="table table-stripped">
    <thead>
      <tr>
        <th>Nom de la companyia</th>
        <th>Telefon</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT ShipperID, CompanyName, Phone FROM shippers";
      $query = $con->query($sql);
      while($supplier = $query->FETCH_ASSOC()){
        echo "<tr>
                <td>".utf8_encode($supplier["CompanyName"])."</td>
                <td>".utf8_encode($supplier["Phone"])."</td>
                <td> <a href='sqledit.php?shipperid=".$supplier["ShipperID"]."'> <button type='submit' class='btn btn-info'>Modificar</button></a></td></tr>";
      }
      ?>
    </tbody>
  </table>
  
</body>
</html>
<?php include 'close.php' ?>