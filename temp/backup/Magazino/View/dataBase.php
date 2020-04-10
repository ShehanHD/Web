<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="Lib/bootstrap.min.css" media="screen">
    <title>Magazino</title>
    <script src="Lib\controlloDataBase.js"></script>
  </head>
  <body>
    <nav class="container text-center mb-4 bg-dark text-light">
      <h1><a href="http://rasphd.ddns.net">WEcoding</a></h1>
    </nav>
    <a href="index.php?value=input">vai al Aquisto Prodotti</a><br>
    <a href="index.php">Home</a><br>
    <div class="container card mb-3 text-center">
      <div class="card-header rounded-pill mt-1 mb-2"><h4>Aggiungere Prodotti al Data Base</h4></div>
      <div class="card-body">
      <form class="container text-center" id="form2" action="index.php" method="post">
        <input class="form-control mt-2 rounded-pill mb-2" type="text" id="data_prod" placeholder="Inserisci il nome del prodotto">
        <span id="err6"></span>
        <input class="form-control mt-2 rounded-pill mb-2" type="text" id="data_id" placeholder="Inserisci il ID del prodotto">
        <span id="err7"></span>
        <span id="msg_data"></span>
        <button type="button" class="form-control mt-2 rounded-pill text-light mb-2 bg-primary" id="dataBase" value="data_base" onclick="aggDati()">Add to data base</button>
      </form>
    </div>
    </div>

    <div class="container card text-center">
      <div class="card-header rounded-pill mt-1 mb-2"><h4>Removere Prodotti dal Data Base</h4></div>
      <div class="card-body">
          <button class="form-control mt-2 rounded-pill text-light mb-2 bg-primary" type="button" id="add2" value="addProd2" onclick="vedi()">Prodotti già esistente</button>
          <div class="card-body text-center" id="demo"></div>
      </div>
    </div>
  </body>
</html>
