$(document).ready(function(){
  $("#modi").hide();
  $("#elimina").hide();

  $("#aggiungereLibri").on('click',function(){
      $("#agg").show(1000);
      $("#modi").hide(1000);
      $("#elimina").hide(1000);
  });


  $("#modificaLibri").on('click',function(){
      $("#modi").show(1000);
      $("#agg").hide(1000);
      $("#elimina").hide(1000);
  });

  $("#eliminaLibri").on('click',function(){
      $("#elimina").show(1000);
      $("#modi").hide(1000);
      $("#agg").hide(1000);
  });

  var value="mostraCatalogo";

  $.post("index.php",{
    value:value
  },function (data) {
    console.log(JSON.parse(data));

    var arr = JSON.parse(data);

    var modi = elimi = "<table class='table text-center'><tr><th>DATA</th><th>TITOLO</th><th>AUTORE</th><th>ID</th><th></th></tr>";

      for (var i = 0; i < arr.length; i++) {
        modi += "<tr><td><input class='form-control rounded-pill' value='"+arr[i][5]+"' disabled></td><td><input class='form-control rounded-pill' id='titolo"+i+"' value='"+arr[i][0]+"' disabled></td><td><input class='form-control rounded-pill' value='"+arr[i][1]+"' id='autore"+i+"' disabled></td><td><input class='form-control rounded-pill' id='id"+i+"' value='"+arr[i][2]+"' disabled></td><td><button id='modifica"+i+"' class='btn rounded-pill btn-outline-primary mr-1' onclick=\"edit('"+i+"')\">Modifica</button><button id='fatto"+i+"'  class='btn rounded-pill btn-outline-primary' onclick=\"fatto('"+i+"')\" disabled>Fatto</button></td></tr>";

        elimi += "<tr id='riga"+i+"'><td><input class='form-control rounded-pill' value='"+arr[i][5]+"' disabled></td><td><input class='form-control rounded-pill' id='titolo"+i+"' value='"+arr[i][0]+"' disabled></td><td><input class='form-control rounded-pill' value='"+arr[i][1]+"' id='autore"+i+"' disabled></td><td><input class='form-control rounded-pill' id='id"+i+"' value='"+arr[i][2]+"' disabled></td><td><button class='btn rounded-pill btn-outline-danger' onclick=\"elimina('"+i+"')\">Elimina</button></td></tr>";
      }

    modi += "</table>"
    elimi += "</table>"

    document.getElementById("modi").innerHTML=modi;
    document.getElementById("elimina").innerHTML=elimi;
  });

});

function addLibri() {
  var value = $("#add").val();
  var titolo = $("#titolo").val();
  var autore = $("#autore").val();
  var id = $("#id").val();
  var date = new Date().getTime();

  if(titolo==""){
    document.getElementById("err1").innerHTML= "Attenzione! Il campo di <b>Titolo del Libro</b> è vuoto!";
    $('#titolo').removeClass('is-valid');
    $('#titolo').addClass('is-invalid');
  }
  else {
    document.getElementById("err1").innerHTML= " ";
    $('#titolo').removeClass('is-invalid');
    $('#titolo').addClass('is-valid');
  }
  if(autore==""){
    document.getElementById("err2").innerHTML= "Attenzione! Il campo di <b>Autore</b> è vuoto!";
    $('#autore').removeClass('is-valid');
    $('#autore').addClass('is-invalid');
  }
  else {
    document.getElementById("err2").innerHTML= " ";
    $('#autore').removeClass('is-invalid');
    $('#autore').addClass('is-valid');
  }
  if(id==""){
    document.getElementById("err3").innerHTML= "Attenzione! Il campo di <b>ID del Libro</b> è vuoto!";
    $('#id').removeClass('is-valid');
    $('#id').addClass('is-invalid');
  }
  else {
    document.getElementById("err3").innerHTML= " ";
    $('#id').removeClass('is-invalid');
    $('#id').addClass('is-valid');
  }

  if(titolo!="" && autore!="" && id!=""){
          $('#form')[0].reset();
          $('#data_prod, #data_id').addClass('is-valid');
        $.post("index.php", {
          value:value,
          titolo:titolo,
          autore:autore,
          id:id,
          date:date
        },
                function(data){
                  console.log(data);
                  if(data==2){
                    $('#titolo').addClass('is-invalid');
                    $('#autore').addClass('is-invalid');
                    $('#id').addClass('is-invalid');
                    alert("Esiste");
                  }
                  else{
                    alert("Stato aggounto");
                    window.location.reload();
                  }
        });
  }
}

function edit(posizione) {
  $("#fatto"+posizione+"").attr("disabled",false);
  $("#modifica"+posizione+"").attr("disabled",true);
  $("#titolo"+posizione+"").attr("disabled",false);
  $("#autore"+posizione+"").attr("disabled",false);
  $("#id"+posizione+"").attr("disabled",false);
}

function fatto(posizione){
  $("#fatto"+posizione+"").attr("disabled",true);
  $("#modifica"+posizione+"").attr("disabled",false);
  $("#titolo"+posizione+"").attr("disabled",true);
  $("#autore"+posizione+"").attr("disabled",true);
  $("#id"+posizione+"").attr("disabled",true);

  var value = "modificaDB";
  var newTitolo = $("#titolo"+posizione+"").val();
  var newAutore = $("#autore"+posizione+"").val();
  var newId = $("#id"+posizione+"").val();

$.post("index.php",{
  value:value,
  newTitolo: newTitolo,
  newAutore: newAutore,
  newId: newId,
  posizione:posizione
},function(data){
  console.log(data);
  if(data == 2){
    alert("Il Titolo("+newTitolo+") e id("+newId+") già esiste!");
    window.location.reload();
  }
  else if(data == 3){
    alert("Il Titolo("+newTitolo+") già esiste!");
    window.location.reload();
  }
  else if(data == 4){
    alert("Il id("+newId+") già esiste!");
    window.location.reload();
  }
  else{
    alert("stato modificato!");
  }
});

}


function elimina(remPosizione) {
  $("#riga"+remPosizione+"").hide(1000);
  //console.log(titolo+" "+autore+" "+id+" "+posizione);

  var value = "removeDB";
  var remTitolo = $("#titolo"+remPosizione+"").val();
  var remAutore = $("#autore"+remPosizione+"").val();
  var remId = $("#id"+remPosizione+"").val();

  $.post("index.php",{
    value:value,
    remTitolo:remTitolo,
    remAutore:remAutore,
    remId:remId,
    remPosizione:remPosizione
  },function(data){
      console.log(data);
  });
}
