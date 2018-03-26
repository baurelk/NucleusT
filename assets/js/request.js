$(function () {
    $(".request-button").click(function (e) { 
        e.preventDefault();
        if ($("#numberOfUnit").val()=="") {
            $(".msg").empty();
            $(".msg").append(" Nombre de Bouteille S'il vous plait");
        }else{
             hospital = $('#hospital').val();
             idUser = $('#idUser').val();
             numberOfUnit = $('#numberOfUnit').val();
            $.ajax({
                url:'php_code/traitRequest.php',                
                method:'POST',
                data:'idUser='+idUser+'&hospital='+hospital+'&numberOfUnit='+numberOfUnit,
                success(server_responce){
                    $(".msg").empty();
                    $(".msg").append(server_responce);
                },
                error(){
                    $(".msg").empty();                    
                    $(".msg").append("une erreur est survenu");
                }
                
            });
        }
     });
  });