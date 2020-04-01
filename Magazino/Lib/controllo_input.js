//assegna i valori ai 2 campi input(dal bottone nel tabella)
function add(prod,id){
  $("#prodotto").val(prod);
  $("#idProd").val(id);
  $("#prodottoVen").val(prod);
  $("#idProdVen").val(id);
 //console.log(id);
}

function addProduct() {

//prende i valori dal input e dal bottone
var value = $("#add").val();
var prodotto = $("#prodotto").val();
var idProd = $("#idProd").val();
var dataExp = $("#dataExp").val();
var quan = $("#quan").val();
var prez = $("#prez").val();


//un serie di comandi si restituicse il messagio se qualcosa non va
      if(prodotto==""){
        document.getElementById("err1").innerHTML= "Attenzione! Il campo di PRODUCT vuoto!";
        $('#prodotto').removeClass('is-valid');
        $('#prodotto').addClass('is-invalid');
      }
      else {
        document.getElementById("err1").innerHTML= " ";
        $('#prodotto').removeClass('is-invalid');
        $('#prodotto').addClass('is-valid');
      }
      if(idProd==""){
        document.getElementById("err2").innerHTML= "Attenzione! Il campo di ID DEL PRODOTTO vuoto!";
        $('#idProd').removeClass('is-valid');
        $('#idProd').addClass('is-invalid');
      }
      else {
        document.getElementById("err2").innerHTML= " ";
        $('#idProd').removeClass('is-invalid');
        $('#idProd').addClass('is-valid');
      }
      if(dataExp==""){
        document.getElementById("err3").innerHTML= "Attenzione! Il campo di EXPIERATION DATE vuoto!";
        $('#dataExp').removeClass('is-valid');
        $('#dataExp').addClass('is-invalid');
      }
      else {
        document.getElementById("err3").innerHTML= " ";
        $('#dataExp').removeClass('is-invalid');
        $('#dataExp').addClass('is-valid');
      }
      if(quan==""){
        document.getElementById("err4").innerHTML= "Attenzione! Il campo di QUANTITY vuoto!";
        $('#quan').removeClass('is-valid');
        $('#quan').addClass('is-invalid');
      }
      else {
        document.getElementById("err4").innerHTML= " ";
        $('#quan').removeClass('is-invalid');
        $('#quan').addClass('is-valid');
      }
      if(prez==""){
        document.getElementById("err5").innerHTML= "Attenzione! Il campo di PREZZO vuoto!";
        $('#prez').removeClass('is-valid');
        $('#prez').addClass('is-invalid');
      }
      else {
        document.getElementById("err5").innerHTML= " ";
        $('#prez').removeClass('is-invalid');
        $('#prez').addClass('is-valid');
      }

//controlla se tutti campi sono compilati mandi i dati al server
if(prodotto!="" && idProd!="" && dataExp!="" && quan!="" && prez!=""){
  $('#form')[0].reset();
  $('#name, #email, #password, #rpassword, #date').addClass('is-valid');
$.post("index.php", {
  value:value, // valore dei bottone serve per fare i controlli dentro controllo.php
  prodotto: prodotto,
  idProd : idProd,
  dataExp:	dataExp,
  quan: quan,
  prez: prez },
          function(data) {
              f1(data);//preleva dati json e manda alla una funziona
              console.log(data);
              //$('#myForm')[0].reset();

});}
}


//messaggio che conferma aggiungi dati andata al buon fine
function f1(data){
  var arr = JSON.parse(data);
  document.getElementById("results").innerHTML= "<div class=\"alert alert-dismissible rounded-pill alert-success text-center\">prodotto: "+arr[0]+"è stato aggiunto.</div>";
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
                  str += "<tr class='table-active'><td>"+arr[i][0]+"</td><td>   id: "+arr[i][1]+"</td><td><button style='width:100%' onclick=\"add('"+arr[i][0]+"','"+arr[i][1]+"')\">add</button></tr>";
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

function sellProduct(){
  var prod = $("#prodottoVen").val();
  var id = $("#idProdVen").val();
  var value = $("#sell").val();

  if(prod==""){
    document.getElementById("err6").innerHTML= "Attenzione! Il campo di PRODUCT vuoto!";
    $('#prodottoVen').removeClass('is-valid');
    $('#prodottoVen').addClass('is-invalid');
  }
  else {
    document.getElementById("err6").innerHTML= " ";
    $('#prodottoVen').removeClass('is-invalid');
    $('#prodottoVen').addClass('is-valid');
  }
  if(id==""){
    document.getElementById("err7").innerHTML= "Attenzione! Il campo di ID DEL PRODOTTO vuoto!";
    $('#idProdVen').removeClass('is-valid');
    $('#idProdVen').addClass('is-invalid');
  }
  else {
    document.getElementById("err7").innerHTML= " ";
    $('#idProdVen').removeClass('is-invalid');
    $('#idProdVen').addClass('is-valid');
  }

  if(prod != "" && id != ""){
    $('#form2')[0].reset();
    $('#prodottoVen, #idProdVen').addClass('is-valid');
    //console.log(prod);
    $.post("index.php",{
      value:value,
      prod:prod,
      id:id
    },function(data) {
      console.log(data);
    });
  }
}
