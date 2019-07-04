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
    
  </style>
  <script>
    $(document).ready(function(){
      $('#selpais').on('change', function(){
        $("#triarpais").remove();  
        var pais = this.value;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("container").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","empleatspais.php?pais="+pais,true);
        xmlhttp.send();
      });
    });
    
    function triarciutat(country){
        $('#selectciutat').on('change', function(){
        var ciutat = this.value;
        var pais = country;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("container").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","empleatspais.php?pais="+pais+"&ciutat="+ciutat,true);
        xmlhttp.send();
         
        });
      }
    
  </script>
</head>
<body> 
  <div id="selectors">
    <select class="select" id="selpais">
      <option id="triarpais"> Tria un país </option>
      <?php
        $query = "SELECT DISTINCT(Country) FROM customers";
        $result = $con->query($query);
        if ($result->num_rows==0){
          echo "No s'han trobat dades";
        }else{      
          while($client = $result->FETCH_ASSOC()){ 
            echo "<option value=".$client["Country"].">".$client["Country"]."</option>";
          }
        }
      ?>
    </select>    
  </div>
  
  <div id="container">
    <table class="table">
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
              echo utf8_encode("<tr><td>".$client["ContactName"]."</td><td>".$client["ContactTitle"]."</td><td>".$client["City"]."</td><td>".$client["Country"]."</td></tr>");  
            }
          }
      ?>
    </tbody>
    <table>
  </div>
</body>
</html>
<?php
  $con->close();
?>