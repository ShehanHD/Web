<?php
session_start();
?>

<?php

    foreach($_SESSION["valutazioni"] as $game=>$valuto) {
    echo"". $game.$valuto."<br>";

    if($valuto>$maxvaluto) {

       $maxvaluto = $valuto;

       $gamemax = $game;
    }
    }
  echo "<br> nome del videogioco di valutazione massino: ".$gamemax." valutazione : ".$maxvaluto."<br>";
  ?>

<html>
<body>
<a href="http://rasphd.ddns.net/chooty/varifica/form.html"><button>inderisci di nuovo</button></a>
</body>
</html>
