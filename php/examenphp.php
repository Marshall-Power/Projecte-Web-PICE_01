<?php
  include 'connect.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <title>Examen PHP</title>
  <style>
    
  </style>
  <script>
    $(document).ready(function(){
      $("#client, #empleat").keyup(function(){
        var client = $("#client").val();
        var empleat = $("#empleat").val();
        $.ajax({
          type:"POST",
          url:"examenphpquery.php",
          method:"POST",
          data: {client, empleat},
          success: function(result){
            $("#tbody").html(result);
          }
        });
      });
    });
  </script>
</head>
<body>
  <h3>Commandes </h3>
  <label for="client">Client: </label>
  <input type="text" id="client">
  <label for="empleat">Empleat: </label>
  <input type="text" id="empleat">
  <button class="btn btn-info" id="afegir">Afegir Comanda</button>
  <table class="table table-striped">
    <thead>
      <th>Nom Client</th>
      <th>Nom Empleat</th>
      <th>Data Compra </th>
      <th>Adreça</th>
      <th>Ciutat</th>
      <th>País</th>
    </thead>
    <tbody id="tbody">
      <?php
        $sql = "SELECT customers.ContactName, employees.FirstName, employees.LastName, orders.OrderDate, orders.ShipAddress, orders.ShipCity, orders.ShipCountry
                FROM orders
                LEFT JOIN customers
                ON orders.CustomerID = customers.CustomerID
                LEFT JOIN employees
                ON orders.EmployeeID = employees.EmployeeID
                ";
        
        $dosql = $con->query($sql);
        
        while($resultat = $dosql->FETCH_ASSOC()){
          echo "<tr><td>".utf8_encode($resultat["ContactName"])."</td>
                    <td>".$resultat["FirstName"]." ".$resultat["LastName"]."</td>
                    <td>".$resultat["OrderDate"]."</td>
                    <td>".utf8_encode($resultat["ShipAddress"])."</td>
                    <td>".utf8_encode($resultat["ShipCity"])."</td>
                    <td>".$resultat["ShipCountry"]."</td></tr>";
        }
       
      ?>
    </tbody>
  </table>
  <nav aria-label="Page navigation">
    <ul class="pagination" id="pages">
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
    </ul>
  </nav>
</body>
</html>
<?php
  include 'close.php'
?>