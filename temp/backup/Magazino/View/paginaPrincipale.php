<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="Lib/bootstrap.min.css" media="screen">
<title>Magazino</title>
<script src="Lib\controllo_input.js"></script>
  </head>
  <body class="jumbotron">
    <nav class="container text-center mb-4 bg-dark text-light">
      <h1><a href="http://rasphd.ddns.net">WEcoding</a></h1>
    </nav>
<a href="index.php?value=dataB">Vai a aggiungere prodotti a Data Base</a><br>
<a href="index.php">Home</a><br>

<div class="row">
<div class="col card text-center bg-light rounded">
<div class="card-header rounded">Aggiungi Prodotti</div>
<div class="card-body">
  <form action="index.php" id="form" method="post">
      <input class="form-control mt-2 rounded-pill mb-2" type="text" disabled id="prodotto" placeholder="PRODUCT">
          <span style="color:red;" id="err1"></span><br>
      <input class="form-control mt-2 rounded-pill mb-2" type="text" disabled id="idProd" placeholder="ID DEL PRODOTTO">
          <span style="color:red;" id="err2"></span><br>
          <span class="text-dark"><h6>EXPIERATION DATE</h6></span>
      <input class="form-control mt-2 rounded-pill mb-2" type="date" id="dataExp">
          <span style="color:red;" id="err3"></span>
      <input class="form-control mt-2 rounded-pill mb-2" min="1.000" type="number" id="quan" placeholder="QUANTITY">
          <span style="color:red;" id="err4"></span>
      <input class="form-control mt-2 rounded-pill mb-2" min="0.00" type="number" id="prez" placeholder="PREZZO">
          <span style="color:red;" id="err5"></span>
          <p id="results"></p>
      <button class="form-control mt-2 rounded-pill text-light mb-2 bg-primary" id="add" value="addProd" type="button" onclick="addProduct()">ADD PRODUCT</button>
  </form>
</div>
</div>
<div class="col-4 card border-info text-center">
  <div class="card-header">
    <button class="rounded-pill mb-2"type="button" id="add2" value="addProd2" onclick="vedi()">Prodotti già esistente</button>
  </div>
<div class="card-body text-center" id="demo">
</div>
</div>
</div>

<div class="container">
  <div class="col card text-center bg-light rounded">
  <div class="card-header rounded">Vendere Prodotti</div>
  <div class="card-body">
  <form  action="index.php" id="form2" method="post">
    <input class="form-control mt-2 rounded-pill mb-2" type="text" disabled id="prodottoVen" placeholder="PRODUCT">
        <span style="color:red;" id="err6"></span><br>
    <input class="form-control mt-2 rounded-pill mb-2" type="text" disabled id="idProdVen" placeholder="ID DEL PRODOTTO">
        <span style="color:red;" id="err7"></span><br>
    <button class="form-control mt-2 rounded-pill text-light mb-2 bg-primary" id="sell" value="sellProd" type="button" onclick="sellProduct()">SELL PRODUCT</button>
  </form>
  </div>
  </div>
</div>
  </body>
</html>
