<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Inserts</title>
</head>
<body>
  <h4>Afegir categoría </h4>
  <form method="POST" action="insertcategory.php">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" required>
    <br>
    <label for="descripcio">Descripció:</label>
    <input type="text" id="description" name="descripcio" required>
    <br>
    <button type="submit" class="btn btn-info">Inserir</button>
  </form>
  
</body>
</html>