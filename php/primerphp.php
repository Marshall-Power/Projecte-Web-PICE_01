<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>PHP Table</title>
  <style>
  td{
    padding:5px;
    border: 1px solid grey;
  }
  </style>

</head>
<body>
  <label for="taula">Taula de multiplicar del <?php echo $num = $_POST["num"];?>  </label>
  <table id="taula">
    <tbody>
      <?php for($i=1; $i<=10;$i++){ ?>
        <tr> 
          <td><?php echo $num;?></td>
          <td><?php echo $i; ?></td>
          <td><?php echo $num*$i; ?> </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

</body>
</html>