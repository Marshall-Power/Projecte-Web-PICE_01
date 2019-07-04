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

<?php
  if(isset($_GET["ciutat"])){
    $ciutat = $_GET["ciutat"];
    $pais = $_GET["pais"];
    $query = "SELECT * FROM customers WHERE Country ='$pais' AND City ='$ciutat'";
    $result2 = $con->query($query);
    if ($result2->num_rows==0){
      echo "No s'han trobat dades";
    }else{ 
      echo utf8_encode("<select class='select' id='selectciutat' onClick=triarciutat('$pais');>");
      $query = "SELECT DISTINCT(City) FROM customers WHERE Country ='$pais'";
      $resultcity = $con->query($query);
      if ($resultcity->num_rows==0){
        echo "No s'han trobat dades";
      }else{      
        while($client = $resultcity->FETCH_ASSOC()){ 
          if($ciutat == $client["City"]){
            echo utf8_encode("<option value=".$client["City"]." selected>".$client["City"]."</option>");
          }else{
          echo utf8_encode("<option value=".$client["City"].">".$client["City"]."</option>");}
        }
      echo utf8_encode("</select>");
      echo utf8_encode("<table class='table'>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Titol</th>
          <th>Ciutat</th>
          <th>Pais</th>
        </tr> 
      </thead>
      <tbody>");      
      while($client = $result2->FETCH_ASSOC()){ 
        echo utf8_encode("<tr><td>".$client["ContactName"]."</td><td>".$client["ContactTitle"]."</td><td>".$client["City"]."</td><td>".$client["Country"]."</td></tr>");
      }
      echo "</tbody></table>";
      }
    }
    
  }else{
    $pais = $_GET["pais"];
    $query = "SELECT * FROM customers WHERE Country = '$pais'";
    $result = $con->query($query);
    if ($result->num_rows==0){
      echo "No s'han trobat dades";
    }else{       
      echo utf8_encode("<select class='select' id='selectciutat' onClick=triarciutat('$pais');>
      <option id='tciutat'> Tria un ciutat </option>");
      $query = "SELECT DISTINCT(City) FROM customers WHERE Country ='$pais'";
      $resultcity = $con->query($query);
      if ($resultcity->num_rows==0){
        echo "No s'han trobat dades";
      }else{      
        while($client = $resultcity->FETCH_ASSOC()){ 
          echo utf8_encode("<option value=".$client["City"].">".$client["City"]."</option>");
        }
      echo utf8_encode("</select>");
      echo utf8_encode("<table class='table'>
      <thead>
        <tr>
          <th>Nom</th>
          <th>Titol</th>
          <th>Ciutat</th>
          <th>Pais</th>
        </tr> 
      </thead>
      <tbody>");      
      while($client = $result->FETCH_ASSOC()){ 
        echo utf8_encode("<tr><td>".$client["ContactName"]."</td><td>".$client["ContactTitle"]."</td><td>".$client["City"]."</td><td>".$client["Country"]."</td></tr>");
      }
      echo "</tbody></table>";
      }
    }

  }
    
  
  $con->close();
?>