<?php

 ?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="bootstrap.min.css" media="screen">
    <title></title>
  </head>
  <body class="center">
    <nav class="container text-center mb-4 bg-dark text-light">
      <h1><a href="http://rasphd.ddns.net">WEcoding</a></h1>
    </nav>
    <h1> Tavola Pitagorica </h1>
<form class="row" action="index.php" method="post">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="Originale" value="Originale">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="pimarie" value="Diogonale pri.">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="secondarie" value="Diogonale sec.">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="righe" value="Righe pari">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="col" value="Colonne dispari">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="somDP" value="La somma Diogonale primaria">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="somRig" value="La somma delle righe">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="somCol" value="La somma delle colonne">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="invertiRig" value="Invertire valori ogni Riga">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="invertiCol" value="Invertire valori ogni Colonna">
  <input class="btn btn-primary mb-2 rounded-pill col" type="submit" name="invertiDiagonale" value="Invertire valori ogni Colonna">
</form>

<div class="container text-center">
<?php
  echo "<table class=\"table table-hover\" border=1 cellpadding=5>";
require 'funzioni.php';

$ob = new tabella;

if(isset($_REQUEST['Originale']))
    $ob -> crea();

if(isset($_REQUEST['pimarie']))
    $ob -> diagonale();

if(isset($_REQUEST['secondarie']))
    $ob -> diagonale2();

if(isset($_REQUEST['righe']))
    $ob -> modi();

if(isset($_REQUEST['col']))
    $ob -> modi2();

if(isset($_REQUEST['somRig']))
    $ob -> somRig();

if(isset($_REQUEST['somCol']))
    $ob -> somCol();

if(isset($_REQUEST['invertiRig']))
    $ob -> invertiRig();

if(isset($_REQUEST['invertiCol']))
    $ob -> invertiCol();

if(isset($_REQUEST['invertiDiagonale']))
    $ob -> invertiDiagonale();

        echo "</table>";
 ?>
</div>

<p>
<?php
$ob = new tabella;

if(isset($_REQUEST['somDP'])){
  $ob -> sommaDP();
}
?>
</p>
  </body>
</html>
