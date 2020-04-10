$(document).ready(function(){
  $("#disponibiliCatalogo").hide();
  $("#nonDisponibiliCatalogo").hide();


  $("#tutti").on('click',function(){
      $("#divCatalogo").show(1000);
      $("#nonDisponibiliCatalogo").hide(1000);
      $("#disponibiliCatalogo").hide(1000);
  });


  $("#disponibili").on('click',function(){
      $("#disponibiliCatalogo").show(1000);
      $("#nonDisponibiliCatalogo").hide(1000);
      $("#divCatalogo").hide(1000);
  });

  $("#nonDisponibili").on('click',function(){
      $("#nonDisponibiliCatalogo").show(1000);
      $("#divCatalogo").hide(1000);
      $("#disponibiliCatalogo").hide(1000);

  });

  var value="mostraCatalogo";

  $.post("index.php",{
    value:value
  },function (data) {
    console.log(JSON.parse(data));

if(data != 0){
    if((JSON.parse(data)).length!=0){
      var arr = JSON.parse(data);
      var now = new Date().getTime();
      var color="";
      var str = disponi = nonDisponi = "";

      //console.log(arr);
      //str="<table class='table text-center'><tr><td>Titolo</td><td>Autore</td><td>ID</td></tr>";
    for(i=(arr.length-1); i>=0; i--){
       ///////////////////Per vedere Nuovi Libri uscite////////////////////////
      var text=(((now-arr[i][3])/(1000*3600*24))<2) ? "nuovi" : "";
       ///////////////////////////////////////////////////////////////////////
      var val=(arr[i][4]=="0") ? "disabled" : "";

       if(arr[i][4]=="1"||arr[i][4]=="0"){
         str += "<div style='font-family: \"Courier New\", Courier, monospace; border-radius: 20px; background-color: #f1f1f1' class='col-sm-3 mt-2 ml-4 "+text+"'><br><img class='rounded mt-1' src='https://static1.squarespace.com/static/53268c36e4b016a25f0a15d4/53467468e4b0ed2cdb640a85/539fb081e4b091554a610fca/1402974431818/POTEHI-BOOK+%2822%29.jpg?format=1000w' width='150' height='175'><p><b>"+arr[i][0]+"</b><br><b>"+arr[i][1]+"</b><br>"+arr[i][2]+"<br><button style='width:100%; font-family: \"Courier New\", Courier, monospace;' id='cat"+arr[i][2]+"' class='btn btn-block bg-success rounded-pill' onclick=\"prenota('"+arr[i][0]+"','"+arr[i][2]+"','1') ; window.location.reload();\""+val+">prenota</button></p></div>";
      }
      if(arr[i][4]=="1"){
        disponi += "<div style='font-family: \"Courier New\", Courier, monospace; border-radius: 20px; background-color: #f1f1f1' class='col-sm-3 mt-2 ml-4 bg-light"+text+"'><br><img class='rounded mt-1' src='https://static1.squarespace.com/static/53268c36e4b016a25f0a15d4/53467468e4b0ed2cdb640a85/539fb081e4b091554a610fca/1402974431818/POTEHI-BOOK+%2822%29.jpg?format=1000w' width='150' height='175'><p><b>"+arr[i][0]+"</b><br><b>"+arr[i][1]+"</b><br>"+arr[i][2]+"<br><button style='width:100%; font-family: \"Courier New\", Courier, monospace;' id='cat"+arr[i][2]+"' class='btn btn-block bg-success rounded-pill' onclick=\"prenota('"+arr[i][0]+"','"+arr[i][2]+"','1') ; window.location.reload();\" "+val+">prenota</button></p></div>";
     }
     if(arr[i][4]=="0"){
       nonDisponi += "<div style='font-family: \"Courier New\", Courier, monospace; border-radius: 20px; background-color: #f1f1f1' class='col-sm-3 mt-2 ml-4 bg-light"+text+"'><br><img class='rounded mt-1' src='https://static1.squarespace.com/static/53268c36e4b016a25f0a15d4/53467468e4b0ed2cdb640a85/539fb081e4b091554a610fca/1402974431818/POTEHI-BOOK+%2822%29.jpg?format=1000w' width='150' height='175'><p><b>"+arr[i][0]+"</b><br><b>"+arr[i][1]+"</b><br>"+arr[i][2]+"<br><button style='width:100%; font-family: \"Courier New\", Courier, monospace;' id='cat"+arr[i][2]+"' class='btn btn-block bg-success rounded-pill' onclick=\"prenota('"+arr[i][0]+"','"+arr[i][2]+"','1')\" "+val+">prenota</button></p></div>";
    }
    }
      document.getElementById("divCatalogo").innerHTML=str;
      document.getElementById("disponibiliCatalogo").innerHTML=disponi;
      document.getElementById("nonDisponibiliCatalogo").innerHTML=nonDisponi;
    }
    else {
      document.getElementById("divCatalogo").innerHTML="<h4>Non esiste nessun dato sul data base</h4>";
      document.getElementById("disponibiliCatalogo").innerHTML="<h4>Non esiste nessun dato sul data base</h4>";
      document.getElementById("nonDisponibiliCatalogo").innerHTML="<h4>Non esiste nessun dato sul data base</h4>";
    }
}
else{
  alert("Devi registrare per fare i Prenotazioni!");
  document.location.reload();
}
});



});
