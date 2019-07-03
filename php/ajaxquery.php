<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Document</title>
  <script>
    $(document).ready(function(){
      $("#buscar").keypress(function(){
        var input = $(this).val();
        console.log(input);
      });
    })
  </script>
</head>
<body>
<form method="get" action="http://localhost/GitRepos/Projecte-Web-PICE_01/php/ajaquery.php">
    <input type="text" size="10" name="cerca" id="buscar">
    <input type="submit" value="Canviar"/>
</form>  
<div id="resultat"></div>
  
</body>
</html>