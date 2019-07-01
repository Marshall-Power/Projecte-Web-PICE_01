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
  <table>
  <?php

    $imatges = array("<img class='img-fluid' src='pizza.png'>","<img class='img-fluid' src='kebab.jpg'>","<img class='img-fluid' src='pasta.jpg'>","<img class='img-fluid' src='arros.jpg'>","<img class='img-fluid' src='soup.jpg'>");

    if($_GET["n1"]>0 && $_GET["n1"] <= 5){
      $index1 = $_GET["selec1"];
      for($i=0;$i<$_GET["n1"];$i++){ 
        echo $imatges[$index1];
      }
    }
    if($_GET["n2"]>0 && $_GET["n2"] <= 5){
      $index2 = $_GET["selec2"];
      for($i=0;$i<$_GET["n2"];$i++){ 
        echo $imatges[$index2];
      }
    }
    if($_GET["n3"]>0 && $_GET["n3"] <= 5){
      $index3 = $_GET["selec3"];
      for($i=0;$i<$_GET["n3"];$i++){ 
        echo $imatges[$index3];
      }
    }
    if($_GET["n4"]>0 && $_GET["n4"] <= 5){
      $index4 = $_GET["selec4"];
      for($i=0;$i<$_GET["n4"];$i++){ 
        echo $imatges[$index4];
      }
    }
    if($_GET["n5"]>0 && $_GET["n5"] <= 5){
      $index5 = $_GET["selec5"];
      for($i=0;$i<$_GET["n5"];$i++){ 
        echo $imatges[$index5];
      }
    }
  ?>
  </table>
  
</body>
</html>