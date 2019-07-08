<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Afegir Producte</title>
  <style>
    .amagat{
      display:none  ;
    }
    
  </style>
  <script>
    $(document).ready(function(){
      $(document).on("keyup", "#nom", function(){
         var nomcompanyia = $("#nom").val();
        $.ajax({
          type:"POST",
          url:"afegirproducteajax.php",
          method:"POST",
          data:{nomcompanyia},
          success: function(resultat){
            if(resultat == true){
              $("#duplicat").removeClass("amagat");
              $("#nom").css("background-color","red");
              $("#afegir").addClass("amagat");
            }else{
              $("#duplicat").addClass("amagat");
              $("#afegir").removeClass("amagat");
              $("#nom").css("background-color","white");

            }

          }
        });
      })
    });
  </script>
</head>
<body>
  <h3> Emplena els camps per afegir un producte </h3>
  <div class="form-group" id="capa2">
              <div id="duplicat" class="amagat"> El producte ja existeix!</div> <br>
              <label for="nom">Nom:</label><br>
              <input type="text" id="nom"> <br>
              <label for="proveidor">Proveidor:</label><br>
              <select class="custom-select" id="proveidor"><br>
              <?php
                $sql = "SELECT CompanyName from suppliers";
                $query = $con->query($sql);
                while($resultat = $query->FETCH_ASSOC()){
                  echo "<option value='".utf8_encode($resultat["CompanyName"])."'>".utf8_encode($resultat["CompanyName"])."</option>";
                };
              ?>
              </select>
  </div>
  <button class="btn btn-info" id="afegir">Afegir Producte</button>
  
</body>
</html>

<?php
include 'close.php';
?>