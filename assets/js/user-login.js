$(document).ready(function(){
  $("#username").keyup(function(){
    if($(this).val().length<=5){
      $("#username").css('boder-bottom-color','red');
      $("#username").css('color','red');
    }else{
      $("#username").css('boder-bottom-color','#222');
      $("#username").css('color','#222');
    }
  });

  $("#user-phone").keyup(function(){
    if($("#user-phone").val().length == 9){
      if ($.isNumeric($(this).val())==true) {
        if ($(this).val()[0] == '6') {
          $(this).css('boder-bottom-color','#222');
          $(this).css('color','#222');
        }else{
          $(this).css('boder-bottom-color','red');
          $(this).css('color','red');
        }
      }else{
        $(this).css('boder-bottom-color','red');
        $(this).css('color','red');
      }
    }else{
      $(this).css('boder-bottom-color','red');
      $(this).css('color','red');
    }
  });


 $("#user-password").on('keyup blur',function(){
  if($(this).val().length > 7){
    $(this).css('boder-bottom-color','#222');
    $(this).css('color','#222');
  }else{
    $(this).css('boder-bottom-color','red');
    $(this).css('color','red');
  }
 });

  $("button").click(function(){
    if($(this).attr('class') == 'register-button'){    
       if ($("#username").val()!="") {
          if ($("#bloodgroup").val()!="") {
            if ($("#user-phone").val().length > 8 && $.isNumeric($("#user-phone").val())==true && $("#user-phone").val()[0] == '6') {
              if ($("#user-password").val().length > 7) {
                $.ajax({
                  url:"php_code/traitement.php",
                  method : "POST",
                  data : "nameuser="+$("#username").val()+"&bloodgroup="+$("#bloodgroup").val()+"&phoneuser="+$("#user-phone").val()+"&password="+$("#user-pass").val(),
                  success : function(data){
                    alert('bien inscrit');
                  },
                  error : function(){
                  }
                });
              }else {
                $("#user-password").focus();
              }
            }else {
               $("#user-phone").focus();
              }
          }else {
            $("#bloodgroup").focus();
          }
        }else {
         $("#username").focus();
        }
    } else if($(this).attr('class') == 'login-button'){    
    
      if ($("#user-phone").val().length > 8 && $.isNumeric($("#user-phone").val())==true && $("#user-phone").val()[0] == '6') {
        if ($("#user-password").val().length > 7) {
          $("#login-form").submit();
        }else {
          $("#user-password").focus();
        }
      }else {
        $("#user-phone").focus();
      }
   }
   
  });

});
