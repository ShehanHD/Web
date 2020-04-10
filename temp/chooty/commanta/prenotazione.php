<?php
  session_start();   //sesione parte
  $_SESSION["prenotazioni"][$_REQUEST["evento"]] += $_REQUEST["num"]; //agiunge altre prenotazione
  //Le variabili in $ _REQUEST vengono fornite allo script tramite i meccanismi di input GET, POST e COOKIE
?>
<html>
<head>
<title>Evento prenotato</title>
</head>
<body>
<?php
  echo "Inserito: ".$_REQUEST["evento"]." posti ".$_REQUEST["num"];  //il prende tutti i variabili prende da form metodo post e get
  echo " totale = ".$_SESSION["prenotazioni"][$_REQUEST["evento"]]."<br />";
?>
<a href="form1.html">Nuova prenotazione</a><br />  <!–– link per andare le pagine––>
<a href="listaprenotazioni.php">Lista prenotazioni</a>
</body>
</html>
