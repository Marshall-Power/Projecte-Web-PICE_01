<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Plats a escollir</title>
  <script>
    $(document).ready(function({
      for(i=0;i<6;i++){
        $("#formulari").append("<input type='number' name=n"+i+");
      }
    });
  </script>
</head>
<body>
  <form method="GET" action="menjars.php" id="formulari">
    <input type="number" name="n1"> 
    <select name="selec1">
      <option value="" disabled="" selected="" style="display:none;">Tría un plat</option>
      <option value="0">Pizza</option>
      <option value="1">Kebab</option>
      <option value="2">Pasta</option>
      <option value="3">Arros</option>
      <option value="4">Sopa</option>
    </select>
    <br>
    <input type="number" name="n2">
    <select name="selec2">
      <option value="" disabled="" selected="" style="display:none;">Tría un plat</option>
      <option value="0">Pizza</option>
      <option value="1">Kebab</option>
      <option value="2">Pasta</option>
      <option value="3">Arros</option>
      <option value="4">Sopa</option>
    </select>
    <br>
    <input type="number" name="n3">
    <select name="selec3">
      <option value="" disabled="" selected="" style="display:none;">Tría un plat</option>
      <option value="0">Pizza</option>
      <option value="1">Kebab</option>
      <option value="2">Pasta</option>
      <option value="3">Arros</option>
      <option value="4">Sopa</option>
    </select>
    <br>
    <input type="number" name="n4">
    <select name="selec4">
      <option value="" disabled="" selected="" style="display:none;">Tría un plat</option>
      <option value="0">Pizza</option>
      <option value="1">Kebab</option>
      <option value="2">Pasta</option>
      <option value="3">Arros</option>
      <option value="4">Sopa</option>
    </select>
    <br>
    <input type="number" name="n5">
    <select name="selec5">
      <option value="" disabled="" selected="" style="display:none;">Tría un plat</option>
      <option value="0">Pizza</option>
      <option value="1">Kebab</option>
      <option value="2">Pasta</option>
      <option value="3">Arros</option>
      <option value="4">Sopa</option>
    </select>
    <br>
    <input type="submit">
  </form>
</body>
</html>