<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Lib/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="Lib/font.css" media="screen">

    <?php
    if ($_SESSION['user'] === 'admin@admin.admin') {
    ?>
    <script src="Lib/catalogo.js"></script>
    <script src="Lib/cronologia.js"></script>
    <script src="Lib/sessionOn.js"></script>
    <?php
    }
    else if (isset($_SESSION['user']) && $_SESSION['user'] != 'admin@admin.admin' && $_SESSION['user'] != 'user') {
    ?>
      <script src="Lib/sessionOn.js"></script>
      <script src="Lib/cronologia.js"></script>
      <script src="Lib/catalogo.js"></script>
    <?php
    }
    else{
    ?>
    <script src="Lib/catalogo.js"></script>
    <script src="Lib/cronologia.js"></script>
    <script src="Lib/sessionOff.js"></script>
    <script src="Lib/regis.js"></script>
    <?php
    }
    ?>
    <title>Biblioteca</title>
  </head>
  <body>
    <div class="menu navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="col-sm-3 mt-1 nav-item">
        <button class="btn btn-outline-primary rounded-pill" onclick="window.location.href='index.php'">Home</button>
      </div>

      <div class="col-sm-3 mt-1 nav-item">
        <button class="btn btn-outline-success rounded-pill" onclick="window.location.href='index.php?value=gestireLibri'" id="gLib" disabled>Gestire Libri</button>
      </div>

      <div class="col-sm-3 mt-1 nav-item">
        <button class="btn btn-outline-success rounded-pill" onclick="window.location.href='index.php?value=catalogo'" disabled>Catalogo</button>
      </div>

      <div class="col nav-item"></div>

      <div class="col-md-1 mt-1 nav-item">
        <button class="btn btn-outline-info rounded-pill" id="cronologia">Cronologia</button>
      </div>

    </div>
  </div>

    <header class="jumbotron mt-5 text-center">
      <h1 class="customfont display-2" style="font-size:8vw;">IL CATALOGO</h1>
    </header>

    <div id="loginRegis" class="row mb-4">
      <div class="col-sm-2">
        <button style="width:100%;" type="button" id="login" class="btn btn-info rounded-pill mt-1" onclick="openLogin()">LOGIN</button>
      </div>
      <div class="col-8"></div>
      <div class="col-sm-2">
        <button style="width:100%;" type="button" id="regi" class="btn btn-block btn-info rounded-pill mt-1" onclick="openRegis()">REGISTRAZIONE</button>
      </div>
    </div>

    <div class="row mr-2 nav text-light benvenuti mb-4" id="utente">
      <?php
      if(isset($_SESSION['user']) && $_SESSION['user'] != 'user'){echo "<p class='benvenuti mt-1 col-10'>Ciao ".$_SESSION['user']."!</p>";}
      ?>
      <button style="height:80%;" type="button" class="btn mt-1 btn-outline-light rounded-pill col-2" id="logout">LOGOUT</button>
    </div>

    <ol class="breadcrumb">
    <li class="breadcrumb-item btn-link pointer active" id="tutti">Tutti</li>
    <li class="breadcrumb-item btn-link pointer active" id="disponibili">Disponibili</li>
    <li class="breadcrumb-item btn-link pointer active" id="nonDisponibili">Non Disponibili</li>
    </ol>


<div id="divC" class="container text-center">
    <div class="" id="divCronologia">
      <ol class="breadcrumb">
      <li class="breadcrumb-item btn-link pointer active" id="prenotati">Prenotati</li>
      <li class="breadcrumb-item btn-link pointer active" id="nonConsgnati">Non Ritirati</li>
      </ol>
      <div class="">
      <div class="container border border-success" id="preno"></div>
      </div>
      <div class="">
      <div class="container border border-danger" id="scaduti"></div>
      </div>
    </div>

    <div class="row text-center" id="divCatalogo"></div>
    <div class="row text-center" id="disponibiliCatalogo"></div>
    <div class="row text-center" id="nonDisponibiliCatalogo"></div>
</div>

<div id="divLogin" class="overlay">
<span class="closebtn" onclick="closeLogin()">&times;</span>
<div class="container overlay-content">
<h1>LOGIN</h1>
<input type="text" class="form-control rounded-pill mt-5" id="username" placeholder="E-MAIL">
<span id="log1" class="text-danger"></span>
<input type="password" class="form-control rounded-pill mt-2" id="password" placeholder="PASSWORD">
<span id="log2" class="text-danger"></span>
<button type="button" class="form-control btn-lg bg-light rounded-pill mt-2" id="log">LOGIN</button>
</div>

<div id="divRegis" class="overlay">
<span class="closebtn" onclick="closeRegis()">&times;</span>
<div class="container overlay-content">
<h1>REGISTRAZIONE</h1>
<input type="text" class="form-control rounded-pill mt-1" id="regisNome" placeholder="NOME">
<span id="reg1" class="text-danger"></span>
<input type="text" class="form-control rounded-pill mt-1" id="regisSirNome" placeholder="COGNOME">
<span id="reg2" class="text-danger"></span>
<input type="email" class="form-control rounded-pill mt-1" id="regisEmail" placeholder="E-MAIL">
<span id="reg3" class="text-danger"></span>
<input type="password" class="form-control rounded-pill mt-1" id="pwd" placeholder="PASSWORD">
<span id="reg4" class="text-danger"></span>
<input type="password" class="form-control rounded-pill mt-1" id="ripetiPwd" placeholder="RIPETI PASSWORD">
<span id="reg5" class="text-danger"></span>
<button type="button" class="form-control btn-lg bg-light rounded-pill mt-1" id="submit">REGISTRA</button>
</div>
</div>
  </body>
</html>
