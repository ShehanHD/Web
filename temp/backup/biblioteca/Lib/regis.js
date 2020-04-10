$(document).ready(function(){

$("#log").on("click",function() {
  var value = "login";
  var username = $("#username").val();
  var password = $("#password").val();

  if(username == ""){
    $('#username').addClass('is-invalid');
    $('#log1').text('Devi inserire il tuo USERNAME');
  }
  else if (validateEmail(username) == false) {
    $('#username').addClass('is-invalid');
    $('#log1').text('USERNAME non è valido');
  }
  else {
    $('#username').removeClass('is-invalid');
    $('#username').addClass('is-valid');
    $('#log1').text('');
  }
  if(password == ""){
    $('#password').addClass('is-invalid');
    $('#log2').text('Devi inserire il tuo PASSWORD');
  }
  else {
    $('#password').removeClass('is-invalid');
    $('#password').addClass('is-valid');
    $('#log2').text('');
  }

  if(username != ""  && validateEmail(username) &&  password != "" ){

    var value = "login";

    $.post("index.php",{
      value:value,
      username:username,
      password:password
    },function(data){
      console.log(data);
      if(data == 1){
        $('#username').addClass('is-invalid');
        $('#password').addClass('is-invalid');
        $('#log2').text('USERNAME o PASSWORD è sbgliato!');
      }
      else{
        alert("Benventi "+username+"!");
        window.location.reload();
      }
    });

  }

});

$("#submit").on("click",function() {
  var name = $("#regisNome").val();
  var sirName = $("#regisSirNome").val();
  var email = $("#regisEmail").val();
  var pwd = $("#pwd").val();
  var pwd2 = $("#ripetiPwd").val();

  if (name == "") {
    $('#regisNome').addClass('is-invalid');
    $('#reg1').text('Devi inserire il tuo Nome');
  }
  else {
    $('#regisNome').removeClass('is-invalid');
    $('#regisNome').addClass('is-valid');
    $('#reg1').text('');
  }
  if (sirName == "") {
    $('#regisSirNome').addClass('is-invalid');
    $('#reg2').text('Devi inserire il tuo Cognome');
  }
  else {
    $('#regisSirNome').removeClass('is-invalid');
    $('#regisSirNome').addClass('is-valid');
    $('#reg2').text('');
  }
  if(validateEmail(email)){
    $('#regisEmail').removeClass('is-invalid');
    $('#regisEmail').addClass('is-valid');
    $('#reg3').text('');
  }
  else {
    $('#regisEmail').addClass('is-invalid');
    $('#reg3').text('e-mail che hai inserito non è valido');
  }
  if(pwd.localeCompare(pwd2)==0 && pwd != "" && pwd2 != ""){
    $('#pwd, #ripetiPwd').removeClass('is-invalid');
    $('#pwd, #ripetiPwd').addClass('is-valid');
    $('#reg4, #reg5').text('');
  }
  else {
    $('#pwd, #ripetiPwd').addClass('is-invalid');
    $('#reg4, #reg5').text('Password che hai inserito non non sono uguali');
  }

  if(name != "" && sirName != "" && validateEmail(email) && pwd.localeCompare(pwd2)==0 && pwd != "" && pwd2 != "" ){

  var value="registrazione";

  $.post("index.php",{
  value:value,
  name:name,
  sirName:sirName,
  email:email,
  pwd:pwd
  },function (data) {
    console.log(JSON.parse(data));
    var arr = JSON.parse(data);

    if (data == 0) {
      $('#regisEmail').removeClass('is-valid');
      $('#regisEmail').addClass('is-invalid');
      $('#reg3').text('Il E-mail che hai inserito già esiste!');
    }
    else{
    $('#regisEmail').removeClass('is-invalid');
    $('#regisEmail').addClass('is-valid');
    $('#reg3').text('');

    document.getElementById("divRegis").style.width = "0%";
    setTimeout(function(){document.getElementById("divLogin").style.width = "70%";},900);
    $('#regisNome, #regisSirNome, #regisEmail, #pwd, #ripetiPwd').val('');
    alert("Benvenuti! Utente "+arr[1]+" "+arr[0]+" Stato Aggiunto!");
    }
  });
}
});

});

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function openLogin() {
  document.getElementById("divLogin").style.width = "70%";
  document.getElementById("login").disabled = true;
  document.getElementById("regi").disabled = true;
}

function openRegis() {
  document.getElementById("divRegis").style.width = "70%";
  document.getElementById("login").disabled = true;
  document.getElementById("regi").disabled = true;
}

function closeLogin() {
  document.getElementById("divLogin").style.width = "0%";
  document.getElementById("login").disabled = false;
  document.getElementById("regi").disabled = false;
}

function closeRegis() {
  document.getElementById("divRegis").style.width = "0%";
  document.getElementById("login").disabled = false;
  document.getElementById("regi").disabled = false;
}
