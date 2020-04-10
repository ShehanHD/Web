<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="funzioni.js"></script>
    <link rel="stylesheet" href="bootstrap.css" media="screen">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title></title>
  </head>
  <body>
    <nav class="container text-center mb-4 bg-dark text-light">
      <h1><a href="http://rasphd.ddns.net">WEcoding</a></h1>
    </nav>
    <div class="container text-center">
    <div class="row">
    <input class="col form-control rounded-pill" type="number" id="rigCol" placeholder="Inserisci Rig e Col" min="3">
    <button class="col form-control text-white bg-primary rounded-pill" type="button" id="value" value="genera" onclick="f1()">2 MATRICI</button>
    <button class="col form-control text-white bg-primary rounded-pill" type="button" id="terza">3° MATRICI</button>
    <button class="col form-control text-white bg-primary rounded-pill" type="button" id="dioPrim">Diogonale prim.</button>
    <button class="col form-control text-white bg-primary rounded-pill" type="button" id="dioSecon">Diogonale secon.</button>
  </div>
    <div>
    <div class="row container" id="demo"></div>
    <div class="row container" id="demo2"></div>
    <h3 class="text-center" id="demo3"></h3>
<div class="container text-left mt-4">

      <p><i>Il primo e scondo matrici</i> ha i numeri casuali 1 - 100</p>
      <p><i>La terza matrice</i> costruendo basato su questi regoli:</p>
          <ul>
            <li>Prende ogni valori dei ogni celle del matrice 1 e matrice 2; se sono compresi tra 20 e 50 Fa <b>la somma</b></li>
            <li>Non sono compresi tra 20 e 50 trova quale è il valore piu piccolo e Fa <b>la Sottrazione</b> dal altro(più grande)</li>
          </ul>

</div>
  </div>
  </body>
</html>
