<?php
  session_start();/*
session_start () crea una sessione o riprende quello corrente in base a un identificativo
di sessione passato tramite una richiesta GET o POST.(" ha un id prechiso") ./*
?>
<html>
<head>
<title>Lista pprenotazioni</title><!–– nome del tab––>
</head>
<body>
<h3>Prenotazioni inserite</h3> <!–– titolo della pagina––>
<?php
/*foreach funziona solo su array e oggetti e genera un errore quando si
tenta di utilizzarlo su una variabile con un tipo di dati diverso o una variabile non inizializzata.*/
//un "for "  che permette utilizza re qualsiasi dati viene inseriti
  foreach($_SESSION["prenotazioni"] as $evento=>$num) {//prenotazioni::variabile
    echo $evento." posti ".$num."<br />"; //prende variabile evento e  num dal form usando metodo get  evisualissa
    $tot += $num;//conta quanti posti viene prenotato
    if($num>$maxnum) {       /*  usa un controllo per trovare quale e numero massimo*/
       $maxnum = $num;
       $eventomax = $evento;//evento conrisoponde numero massimo di prenotazione
    }
  }
  echo "<br /><b>Totale persone</br> ".$tot."<br />"; //dopo che calcolato pernotazione massimo stampa prenotazione totale
  echo "<br>Prenotazioni max:</br> ".$eventomax." posti ".$maxnum."<br />";   /*e dopo che trovato prenotazine massimo
   stampa prenotazzione massimo e evento conrisponde   */
?>
</body>
</html>

