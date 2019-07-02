<?php 
  $idioma = $_GET["idioma"];
  setcookie("select", $idioma, time()+60*60);
  $_COOKIE["select"]=$idioma
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <?php
    if($_COOKIE["select"]=="es"){
      echo "Bienvenidos!";
    }elseif($_COOKIE["select"]=="cat"){
      echo "Benvinguts!";
    }elseif($_COOKIE["select"]=="uk"){
      echo "Welcome!";
    }
  ?>
</body>
</html>