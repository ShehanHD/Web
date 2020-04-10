<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="bootstrap.css" media="screen">
    <title></title>
  </head>
  <body>
    <nav class="container text-center mb-4 bg-dark text-light">
      <h1><a href="http://rasphd.ddns.net">WEcoding</a></h1>
    </nav>
    <h1>Pagella</h1>
<div class="row">
    <div class="col">
      <form class="card text-white text-center bg-light rounded text-dark mt-3" action="index.php" method="post">
        <table>
        <tr><th>NOMINATIVO:</th><th><input  class="form-control mt-2 rounded-pill" type="text" name="nome"></th></tr>
        <tr><th>GENERE:</th><th class="text-left"><input type="radio" name="GENERE" value="M" checked>M</th></tr>
        <tr><th></th><th class="text-left"><input type="radio" name="GENERE" value="F">F</th></tr>
        <tr><th>DEBITI:</th>
          <th>
          <input type="checkbox" name="ITA" value="ITA">ITA
          <input type="checkbox" name="MAT" value="MAT">MAT
          <input type="checkbox" name="TEL" value="TEL">TEL
          <input type="checkbox" name="INF" value="INF">INF
          </th></tr>
          <tr>
            <td></td>
            <td><input  class="form-control mt-2 rounded-pill" type="submit" name="submit1" value="SUBMIT"></td>
          </tr>
        </table>
      </form>
    </div>

    <div class="col col-4 card text-center bg-dark text-light mt-3">
      <?php
if(isset($_REQUEST['submit1'])){

      $nome = $_REQUEST['nome'];
      $genere = $_REQUEST['GENERE'];
      $ita = $_REQUEST['ITA'];
      $mat = $_REQUEST['MAT'];
      $tel = $_REQUEST['TEL'];
      $inf = $_REQUEST['INF'];
      $count_empty = 0;

      $arr = array ($ita,$mat,$tel,$inf);


      if($genere == "M"){
        $pass = " è stato ammesso";
        $fail = " è stato non ammesso";
      }
      if($genere == "F"){
        $pass = " è stata ammessa";
        $fail = " è stata non ammessa";
      }


      for ($i=0; $i < sizeof($arr); $i++) {
        if (empty($arr[$i] )) {
          $count_empty++;
      }}

      if($count_empty == 4){
        echo "<b>".$nome."</b>".$pass;
      }

      if($count_empty <= 1){
        echo "<b>".$nome."</b>".$fail;
      }

      if($count_empty>=2 && $count_empty != 4){
      echo "<b>".$nome."</b>".$pass." con debiti in :";

      for ($i=0; $i < sizeof($arr); $i++) {
      if($count_empty>=2 && !empty($arr[$i] )){
          echo "<ul>".$arr[$i]."</ul>";
        }}
      }
}
       ?>
    </div>
</div>
<h1>Equazione secondo grado</h1>
<div class="row">

  <div class="col card bg-light mt-3 rounded text-dark">
    <form class="text-center mt-3 mb-3" action="index.php" method="post">
      <input class="rounded-pill" style="text-align:right; width:15%" type="number" name="a" value="1">X<sup>2</sup>
      <input class="rounded-pill" style="text-align:right; width:15%" type="number" name="b" value="0">X
      <input class="rounded-pill" style="text-align:right; width:15%" type="number" name="c" value="0"> = 0

      <input type="submit" name="submit2" value="SUBMIT">
    </form>
  </div>

  <div class="col col-4 card bg-dark text-light text-center mt-3">
    <?php
    if(isset($_REQUEST['submit2'])){
      $a = $_REQUEST['a'];
      $b = $_REQUEST['b'];
      $c = $_REQUEST['c'];

      echo "I valori che hai inserito => a=".$a." b=".$b." c=".$c."<br><br>";

    $delta = (($b*$b)-(4*$a*$c));

    if($delta<0){
        echo "Non sono ammesse soluzioni reali";
    }

    if($delta==0){
      echo "I risultati sono:<br>X1 = X2 = ".((-$b)/($a*2));
    }

    if($delta>0){
      echo "I risultati sono:<br>X1 = ".((-$b)+sqrt($delta))/(2*$a)."<br>X2 = ".(((-$b)-sqrt($delta)))/(2*$a);
    }

    }
     ?>
  </div>
</div>
<h1>Numeri casuali</h1>
<div class="row">
  <div class="col card bg-light mt-3 rounded text-dark">

      <form class="ml-4 row text-center mt-3 mb-3" action="index.php" method="post">

  A : <input class="col col-2 rounded-pill" type="number" name="a" value="0">
  B : <input class="col col-2 rounded-pill" type="number" name="b" value="0">
  C : <input class="col col-2 rounded-pill" type="number" name="c" value="0">
  D : <input class="col col-2 rounded-pill" type="number" name="d" value="0">
  E : <input class="col col-2 rounded-pill" type="number" name="e" value="0">
  <input class="rounded-pill" type="submit" name="submit3" value="SUBMIT">
    </form>
  </div>

  <div class="col col-4 card bg-dark text-light text-center mt-3">
    <?php
    if(isset($_REQUEST['submit3'])){
      $a = $_REQUEST['a'];
      $b = $_REQUEST['b'];
      $c = $_REQUEST['c'];
      $d = $_REQUEST['d'];
      $e = $_REQUEST['e'];
      $min = 100000000000;
      $num = array($a, $b, $c, $d, $e );


      echo "I numeri che hai inserito: ";
      for ($i=0; $i<sizeof($num) ; $i++) {
        echo $num[$i]." , ";
          if($min > $num[$i]){
            $min = $num[$i];
          }
      }

      echo "<br><br>Valore minore è ".$min."<br>";

      if(($a<$b && $a>$c) || ($a>$b && $a<$c)){
        echo "<br><p><i>Il primo intervallo B e C:</i><br>il Numero <b>".$a."</b> compreso tra Numero <b>".$b."</b> e <b>".$c."</b></p>";
      }

      if(($a<$d && $a>$e) || ($a>$d && $a<$e)){
        echo "<p><i>Il scondo inter vallo D e E:</i> <br>il Numero <b>".$a."</b> compreso tra Numero <b>".$d."</b> e <b>".$e."</b></p>";
      }

      if(!(($a<$b && $a>$c) || ($a>$b && $a<$c)) && !(($a<$d && $a>$e) || ($a>$d && $a<$e))){
        echo "<br><p>Il NUmero ".$a." viene compreso tra nessun intervallo</p>";
      }
    }
     ?>
  </div>
</div>
  </body>
</html>
