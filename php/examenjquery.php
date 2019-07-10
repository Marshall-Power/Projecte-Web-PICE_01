<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <title>Examen Jquery</title>
  <script>
    $(document).ready(function(){
      var d = new Date();
      if (d.getDay() == 1){
        var money = $("#currency").val();
      }else{
        var money = $("#currency").val();
        var counter = 0;
        while(counter < 4){
          var numactual = d.getDay();
          numactual = numactual - 1;
          d.setDate(d.getDate()-(numactual));
          var year = d.getFullYear();
          var month = d.getMonth();
          month++;
          var dia = d.getDate();
          $.ajax({
          type:"GET",
          url: "https://api.ratesapi.io/api/"+year+"-"+month+"-"+dia+"?symbols="+money,
          method:"GET",
          success:function(result){
            console.log(result.rates);
            document.getElementById("container").innerHTML += "<h4>"+"Dilluns "+result.date+"</h4>";
            document.getElementById("container").innerHTML += "<div class='progress'> <div class='progress-bar' role='progressbar' style='width: 30%' aria-valuenow='"+3+"' aria-valuemin='0' aria-valuemax='5'></div></div>"
              
            }
            
          });
          d.setDate(d.getDate()-7);
          counter++;
        }
      }
    });
      $(document).on("click", "#currency", function(){
        var d = new Date();
        if (d.getDay() == 1){
        var money = $("#currency").val();
        }else{
          var money = $("#currency").val();
          var counter = 0;
          while(counter < 4){
            var numactual = d.getDay();
            numactual = numactual - 1;
            d.setDate(d.getDate()-(numactual));
            var year = d.getFullYear();
            var month = d.getMonth();
            month++;
            var dia = d.getDate();
            $.ajax({
              type:"GET",
              url: "https://api.ratesapi.io/api/"+year+"-"+month+"-"+dia+"?symbols="+money,
              method:"GET",
              success:function(result){
                console.log(result);
                document.GetElementById("container").innerHTML += "<h4>"+result.date+"</h4>"
                document.GetElementById("container").innerHTML += "<div class='progress'> <div class='progress-bar' role='progressbar' aria-valuenow='"+result.rates[0]+"' aria-valuemin='0' aria-valuemax='5'></div></div>"
              }
            });
          d.setDate(d.getDate()-7);
          counter++;
        }
      }
    });

      
      
  </script>
</head>
<body>
  <select class="form-control" id="currency">
        <option value="USD">Dollar</option>
        <option value="JPY">Yen</option>
        <option value="GBP">Lliures</option>
        <option value="MXN">Pesos MX</option>
  </select>
  <div id="container">
    
  </div>

</body>
</html>