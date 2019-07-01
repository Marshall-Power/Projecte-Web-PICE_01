<?php
  session_start();
  $_SESSION["color"] = $_GET["color"];
  echo "Color actualitzat!"
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body <?php if(isset($_SESSION["color"])){
      echo "style=background-color:".$_SESSION["color"];}?>>
  
</body>
</html>