$(document).ready(function(){
  var x=0;
  $("#divCronologia").hide();

    $("#cronologia").on('click',function(){

      $("#nonConsgnati").on('click',function(){
          $("#scaduti").show(1000);
          $("#preno").hide(1000);
      });

      $("#prenotati").on('click',function(){
          $("#preno").show(1000);
          $("#scaduti").hide(1000);
      });

      if(x==0){
    	  $("#divCronologia").slideDown(700);
        x=1;
      }
      else{
        $("#divCronologia").slideUp(1000);
        x=0;
      }

      var value = "cronologia";
        $.post("index.php",{
          value:value
        },function(data) {
            console.log(JSON.parse(data));
            var arr = JSON.parse(data);
            var prenotati = scaduti = "";
            var now = new Date().getTime();
            var x=0;

            for (var i=0; i<arr.length; i++) {
              var giorni = (Math.round((arr[i][3]-now)/(1000*3600*24)))*-1;
              if(giorni<2){
              if(arr[i][4]==0){
                  giorni = "Manca "+(2-giorni)+" giorni a Ritirare";
                  prenotati += "<div id='"+arr[i][2]+"' class='row border-top text-center'><div class='col-sm-2 mt-1 mb-1'><img class='rounded' src='https://static1.squarespace.com/static/53268c36e4b016a25f0a15d4/53467468e4b0ed2cdb640a85/539fb081e4b091554a610fca/1402974431818/POTEHI-BOOK+%2822%29.jpg?format=1000w' width='75' height='90'></div><div class='col-sm-4 mt-3'><p>"+arr[i][0]+"</p><p>da "+arr[i][1]+"</p></div><div class='col-sm-2 mt-3'>"+arr[i][0]+"</div><div class='col-sm-2 mt-3'>"+giorni+"</div><div class='col-sm-2 mt-3'><button class='btn btn-warning rounded' onclick=\"remove('"+arr[i][0]+"','"+arr[i][2]+"',1)\">Anulla</button></div></div>";
                  x=1;
                }
              }
              else{
                remove(arr[i][0],arr[i][2],0);
                giorni = "scaduto";
                scaduti += "<div class='row border-top'><div class='col-sm-2'><img class='rounded mt-1' src='https://static1.squarespace.com/static/53268c36e4b016a25f0a15d4/53467468e4b0ed2cdb640a85/539fb081e4b091554a610fca/1402974431818/POTEHI-BOOK+%2822%29.jpg?format=1000w' width='75' height='90'></div><div class='col-sm-3'><p>"+arr[i][0]+"</p><p>da "+arr[i][1]+"</p></div><div class='col-sm-2'>"+arr[i][0]+"</div><div class='col-sm-2'>"+giorni+"</div></div>";
              }
            }

            if(prenotati==""){
                  document.getElementById("preno").innerHTML="<h3>Non hai Nessun prenotazioni</h3>";
            }
            else{
            document.getElementById("preno").innerHTML=prenotati;
            }
            document.getElementById("scaduti").innerHTML=scaduti;
        });

              $("#scaduti").hide();
    });
});

function prenota(titoloPrenota, idPrenota){
  var value = "prenota";
  var date = new Date().getTime();

  $.post("index.php",{
    value:value,
    titoloPrenota:titoloPrenota,
    idPrenota:idPrenota,
    date:date
          },function(data) {
            console.log(JSON.parse(data));
            var arr=JSON.parse(data);
          if(data != 0){
              alert("Abbimo fatto il Prenotazione per il "+arr[0]+"\n Lei deve ritirare tra 2 giorni se no la richiesta verrà annullata!");
          }
          else {
            alert("Devi registrare per fare i Prenotazioni!");
            document.location.reload();
          }
  });
}


function remove(titoloRemove, idRemove, controllo) {
  var value = "removeCronologia";

  $.post("index.php",{
    value:value,
    titoloRemove:titoloRemove,
    idRemove:idRemove
  },function(data) {
    console.log(JSON.parse(data));
    var arr=JSON.parse(data);
    console.log(idRemove);

    if(controllo==1){
      alert("Il prenotazione del Libro "+arr[0]+" stato anullato!");
      $("#"+idRemove+"").hide(1000);
      $("#cat"+idRemove+"").attr("disabled",false);
      setTimeout(function(){window.location.reload();},900);
    }
    else{
      //alert("Il prenotazione del Libro "+arr[0]+" stato scaduto!")
    }
  });

}
