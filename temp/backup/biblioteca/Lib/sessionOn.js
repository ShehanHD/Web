$(document).ready(function(){
  $("#gLib").attr("disabled",false);
  $("#utente").show();
  $("#loginRegis").hide();


  $("#logout").on("click",function() {

    var value="logout";

    $.post("index.php",{
      value:value
    },function(data) {
      console.log(data);

      if(data==1){
        window.location.href = 'index.php';
      }
    });
  });

});
