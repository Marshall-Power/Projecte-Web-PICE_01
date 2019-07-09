<?php include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <script src="../jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="../jquery-ui.structure.css">
  <link rel="stylesheet" type="text/css" href="../jquery-ui.theme.css">
  <title>Delete SQL</title>
  <script>
  $(document).ready(function(){
    $(document).on("click", ".btn-danger", function(){
      var suppid = $(this).attr("data-id");
      $.ajax({
        type:"POST",
        url:"mirarproductes.php",
        method="POST",
        data:{suppid},
        success: function(){
          
        }
      })
      $( "#dialog" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        autoOpen: false,
        show: {
          effect: "blind",
          duration: 1000
        },
        buttons: {
          "Eliminar": function() {
            $( this ).dialog( "close" );
            $.ajax({
              type: "POST",
              url:"eliminarsupp.php",
              method: "POST",
              data:{suppid},
              success: function(){
                $("#"+suppid).remove();
              }
            });
          },
          "Reubicar":function(){
            $( this ).dialog( "close" );
          },
          "Cancelar": function() {
            $( this ).dialog( "close" );
          }
        }
      });
      $( "#dialog" ).dialog( "open" );
    });
  });
  </script>
</head>
<body>
  <table class="table table-striped">
    <thead>
      <th>Empresa</th>
      <th>Contacte</th>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT SupplierID, CompanyName, ContactName from suppliers";
        $cerca = $con->query($sql);
        while($results = $cerca->FETCH_ASSOC()){
          echo "<tr id=".$results["SupplierID"]."><td>".utf8_encode($results["CompanyName"])."</td><td>".$results["ContactName"]."</td><td><button class='btn btn-danger' data-id=".$results["SupplierID"].">Eliminar</button></td></tr>";
        }
      ?>
    </tbody>
  </table>
  <div id="dialog" title="Vols eliminar aquest proveidor?" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Es borrarà de forma permanent el distribuidor, n'estás segur?</p>
  </div>
</body>
</html>
<?php
include 'close.php';
?>