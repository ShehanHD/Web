//aggiungere dati al data-base
function aggDati(){
  var value = $("#dataBase").val();
  var prod = $("#data_prod").val();
  var id = $("#data_id").val();

  if(prod==""){
    document.getElementById("err6").innerHTML= "Attenzione! Il campo di PRODUCT vuoto!";
    $('#data_prod').removeClass('is-valid');
    $('#data_prod').addClass('is-invalid');
  }
  else {
    document.getElementById("err6").innerHTML= " ";
    $('#data_prod').removeClass('is-invalid');
    $('#data_prod').addClass('is-valid');
  }
  if(id==""){
    document.getElementById("err7").innerHTML= "Attenzione! Il campo di ID DEL PRODOTTO vuoto!";
    $('#data_id').removeClass('is-valid');
    $('#data_id').addClass('is-invalid');
  }
  else {
    document.getElementById("err7").innerHTML= " ";
    $('#data_id').removeClass('is-invalid');
    $('#data_id').addClass('is-valid');
  }

  if(prod!="" && id!=""){
    $('#form2')[0].reset();
    $('#data_prod, #data_id').addClass('is-valid');
  $.post("index.php", {
    value:value, //manda il valore della bottone al controllore
    prod:prod,
    id:id
   },
            function(data) {
              console.log(data);

              if(data == 0){
                $('#msg_data').removeClass('text-success');
                $('#msg_data').addClass('text-warning');
                document.getElementById("msg_data").innerHTML="Il nome del <b>Prodotto o ID</b> già esiste";
                $('#data_prod, #data_id').removeClass('is-valid');
                $('#data_prod, #data_id').addClass('is-invalid');
              }
              if(data == 1){
                $('#msg_data').removeClass('text-warning');
                $('#msg_data').addClass('text-success');
                document.getElementById("msg_data").innerHTML="IL prodotto <b>"+prod+"</b> stato aggiunto con successo!";
              }

              //document.getElementById("msg_data").innerHTML=data;
  });}
}

function remove(prod,id) {
  var value = $("#rem_dataBase").val();
  var prods = prod;
  var ids = id;

  $.post("index.php", {
    value:value, //manda il valore della bottone al controllore
    prod:prod,
    id:id
   },
            function(data) {
              console.log(data);
              if(((JSON.parse(data)).length>0) && ((JSON.parse(data)).length != "") ){
                var arr = JSON.parse(data);
                //console.log(arr);
                str="<table class='table text-center'>"
                for(i=0; i<arr.length; i++){
                  str += "<tr class='table-active'><td>"+arr[i][0]+"</td><td>   id: "+arr[i][1]+"</td><td><button id=\"rem_dataBase\" style='width:100%' value=\"rem_data_base\"  onclick=\"remove('"+arr[i][0]+"','"+arr[i][1]+"')\">Remove</button></tr>";
                  //console.log(arr[i]);
                }
                str += "</table>"
                document.getElementById("demo").innerHTML=str;
              }
              else {
                document.getElementById("demo").innerHTML="<h4>Non esiste nessun dato sul data base</h4>";
              }
            });
}


//prelevare dati dal data-base (prodotto e id)
function vedi(){
  var i;
  var str=""; //serve per creare la tabella che contiene i nomi dei prodotti e id dei predotti
  var value = $("#add2").val();
  $.post("index.php", {
    value:value //manda il valore della bottone al controllore
   },
            function(data) {
              //console.log((JSON.parse(data)).length);
              if((JSON.parse(data)).length!=0){
                var arr = JSON.parse(data);
                //console.log(arr);
                str="<table class='table text-center'>"
                for(i=0; i<arr.length; i++){
                  str += "<tr class='table-active'><td>"+arr[i][0]+"</td><td>   id: "+arr[i][1]+"</td><td><button id=\"rem_dataBase\" style='width:100%' value=\"rem_data_base\"  onclick=\"remove('"+arr[i][0]+"','"+arr[i][1]+"')\">Remove</button></tr>";
                  //console.log(arr[i]);
                }
                str += "</table>"
                document.getElementById("demo").innerHTML=str;
              }
              else {
                document.getElementById("demo").innerHTML="<h4>Non esiste nessun dato sul data base</h4>";
              }
            });
}
