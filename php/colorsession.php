<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body 
  <?php 
    if(isset($_SESSION["color"])){
      echo "style=background-color:".$_SESSION["color"];}?>  >
  
  <a href="color.php?color=red">Vermell</a>
  <a href="color.php?color=blue">Blau</a>
  <a href="color.php?color=yellow">Groc</a>
  
</body>
</html>