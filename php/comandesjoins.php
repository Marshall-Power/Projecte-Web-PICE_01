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
  <title>Comandes JOINS</title>
  <style>
    tbody>tr:hover{
      cursor: pointer;
      border: 2px blue solid;
    }
    th{
      position: sticky;
      top: 0;
      background-color:white;
    }
    #taulaclients{
      height:600px;
      overflow-y:scroll;
    }
    #container1{
     margin-left:10px;
     margin-right:10px;
    }
    
  </style>
  <script>
    $(document).on("click","tr",function(){
      var comandid = $(this).attr("data-id");
      $.ajax({
        type: "GET",
        url: "detallscomandes.php",
        method: "GET",
        data:{comandid},
        success: function(result){
          $("#container2").html(result);
        }
      })
    })
  </script>
</head>
<body>
  <div class="container" id="container1">
    <div class="row">
      <div class="col-md-7" id="taulaclients">
        <table class="table-lg table-striped">
        <caption> <u>Comandes <u></caption>
          <thead>
            <tr>
              <th>Client</th>
              <th>Empleat</th>
              <th>Data de compra</th>
              <th>Addreça</th>
              <th>Ciutat</th>
              <th>Country</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $query = "SELECT orders.OrderID, customers.ContactName, employees.FirstName, employees.LastName, orders.OrderDate, orders.ShipAddress, orders.ShipCity, orders.ShipCountry
            FROM orders
            LEFT JOIN customers 
            ON orders.CustomerID = customers.CustomerID
            LEFT JOIN employees
            ON orders.EmployeeID = employees.EmployeeID
            ";
            $result = $con->query($query);
            if ($result->num_rows==0){
              echo "No s'han trobat dades";
            }else{   
              while($client = $result->FETCH_ASSOC()){   
                echo utf8_encode("<tr data-id=".$client["OrderID"]."><td>".$client["ContactName"]."</td><td>".$client["FirstName"]." ".$client["LastName"]."</td><td>".$client["OrderDate"]."</td><td>".$client["ShipAddress"]."</td><td>".$client["ShipCity"]."</td><td>".$client["ShipCountry"]."</td></tr>");  
              }
            }
          ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-4" id="container2">
      

      
    </div>
  </div>
</body>
</html>

<?php
  $con->close();
?>