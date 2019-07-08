<?php include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Delete SQL</title>
</head>
<body>
  <table class="table table-striped">
    <thead>
      <th>Empresa</th>
      <th>Contacte</th>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT CompanyName, ContactName from suppliers";
        $cerca = $con->query($sql);
        while($results = $cerca->FETCH_ASSOC()){
          echo "<tr><td>".utf8_encode($results["CompanyName"])."</td><td>".$results["ContactName"]."</td></tr>";
        }
      ?>
    </tbody>
  </table>
  
</body>
</html>
<?php
include 'close.php';
?>