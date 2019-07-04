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
  <title>Exercici clients</title>
  <style>
    .table-striped>tbody>tr:nth-child(odd)>td, 
    .table-striped>tbody>tr:nth-child(odd)>th {
    background-color: #C0C0C0; // Choose your own color here
    }
    #taulaclients{
      height: 300px;
      overflow-y:scroll;
    }

    tbody>tr:hover{
      background-color: black;
      color: white;
      cursor: pointer;
    }
    .selected{
      border:2px solid red;
    }
    th{
      position: sticky;
      top: 0;
      background-color:white;
    }
    #container2{
      margin-top: 30px;
    }
    
  </style>
  <script>
    $(document).on("click", "tr",function(){
      var taula = $(this).attr("taula-id");
      if(taula==1){
        var clientid = $(this).attr("data-id");
        $(".selected").removeClass("selected");
        $(this).addClass("selected");
        $.ajax({
          type: "GET",
          url: "clientscomandes.php",
          method: "GET",
          data: {clientid},
          success: function(result){
          $("#container2").html(result);
        }
        });
      }else{ 
        
      }
    });
    
    
  </script>
</head>
<body>
<div class="container" id="container1">
  <div class="row">
    <div class="col-md-5" id="taulaclients">
      <table class="table table-striped">
      <caption> <u>Llista de clients <u></caption>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Títol</th>
            <th>Ciutat</th>
            <th>País</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $query = "SELECT * FROM customers";
          $result = $con->query($query);
          if ($result->num_rows==0){
            echo "No s'han trobat dades";
          }else{   
            while($client = $result->FETCH_ASSOC()){   
              echo utf8_encode("<tr taula-id='1' data-id=".$client["CustomerID"]."><td>".$client["ContactName"]."</td><td>".$client["ContactTitle"]."</td><td>".$client["City"]."</td><td>".$client["Country"]."</td></tr>");  
            }
          }
        ?>
        </tbody>
    </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6" id="container2">
    
    </div>
  <div>
  <div class="row">
    <div class="col-md-6" id="container3">
    
    </div>
  <div>
</div>
  
</body>
</html>
<?php
  $con->close();
?>