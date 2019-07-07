<?php include 'connect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <script src="../jquery.js"></script>
  <title>Editar/Modificar proveidors</title>
  <style>
    #container1{
      width:50%;
      height:600px;
      overflow-y:scroll;
    }
    th{
      background-color:white;
      position: sticky;
      top:0;
    }
    .amagat{
      display:none;
    }
    #afegir,#comit{
      margin-top:10px;
    }
    
  </style>
  <script>
  $(document).ready(function(){
   
    $("#afegirform").click(function(){
      $("#capa2").removeClass("amagat");
      $("#capa3").addClass("amagat");
    });

    $(".btn-warning").on("click", function(){
      $("#capa2").addClass("amagat");
      $("#capa3").removeClass("amagat");
      var suppid = $(this).attr("data-id");
      $.ajax({
        type:"POST",
        url:"modsuppliers.php",
        method:"POST",
        data:{suppid},
        success: function(result){
          $("#modprov").html(result); 
        }
      })
    });

    $("#afegir").on("click", function(){      
      var nomcompanyia = $("#nomcomp").val();
      var nomcontacte = $("#nomcontacte").val();
      var adreca = $("#adress").val();
      var ciutat = $("#ciutat").val();
      var pais = $("#pais").val();
      if (nomcompanyia != ""){
        $.ajax({
        type:"POST",
        url:"suppliersmodajax.php",
        method:"POST",
        data:{nomcompanyia,nomcontacte, adreca, ciutat, pais},
        success: function(result){
            if (result==0){
              alert("Ja existeix la companyia!")
            }else{
              $("#taulabody").prepend(result);
            }
          }
        });

        $("#nomcomp").val("");
        $("#nomcontacte").val("");
        $("#adress").val("");
        $("#ciutat").val("");
        $("#pais").val("");
        $("#capa3").addClass("amagat");
      }else{
        alert("Emplena el camp del Nom de la Companyia!");
        $("#capa3").addClass("amagat");
      }
    });
    
    $("comit").on("click", function(){

    });
  });



  
  
  </script>
</head>
<body>
  <div class="row">
  <div class="col-md-6" id="container1">
    <table class="table table-stripped" id="taula">
      <thead>
        <tr>
          <th>Nom Companyia</th>
          <th>Nom Contacte</th>
          <th>Adreça</th>
          <th>Ciutat</th>
          <th>País</th>
          <th><button class="btn btn-info" id="afegirform">Afegir</button><th>
        </tr>
      </thead>
      <tbody id="taulabody">
      <?php
        $sql = "SELECT * FROM suppliers";
        $peticio = $con->query($sql);
        while ($suppliers = $peticio->FETCH_ASSOC()){
          echo "<tr> <td>".utf8_encode($suppliers["CompanyName"])." </td>
                      <td>".utf8_encode($suppliers["ContactName"])."</td>
                      <td>".utf8_encode($suppliers["Address"])."</td>
                      <td>".utf8_encode($suppliers["City"])."</td>
                      <td>".utf8_encode($suppliers["Country"])."</td>
                      <td> <button data-id=".utf8_encode($suppliers["SupplierID"])." class='btn btn-warning'> Modificar </button></td></tr>
              ";  
        }
      ?>
    </table>
    </div>
    
    <div class="col-md-4 amagat" id="capa2">
      <label for="afegprov"><h3><u>Introdueix el nou proveidor <u><h3></label>
      <div class="form-group" id="afegprov">
        <label for="nomcomp">Nom de la companyia: </label><br>
        <input type="text" id="nomcomp" default="" autofocus><br>
        <label for="nomcontacte">Nom del contacte: </label>
        <input type="text" id="nomcontacte" ><br>
        <label for="adress">Adreça: </label><br>
        <input type="text" id="adress" ><br>
        <label for="ciutat">Ciutat: </label><br>
        <input type="text" id="ciutat"><br>
        <label for="pais">Pais: </label><br>
        <input type="text" id="pais"><br>
        <button class="btn btn-warning" id="afegir">Afegir proveidor</button>
      </div>
    </div>
    <div class="col-md-4 amagat" id="capa3">
      <label for="modprov"><h3><u>Página de modificiació <u><h3></label>
      <div class="form-group" id="modprov">
        <button class="btn btn-warning" id="modificar">Modificar proveidor</button>
      </div>
  </div>
  
  
    
  
</body>
</html>
<?php include 'close.php'?>