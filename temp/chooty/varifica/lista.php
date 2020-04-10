 <?php
  session_start();
  $_SESSION["valutazioni"][$_POST["game"]] += $_POST["valuto"];
     ?>



<?php
  echo "nome del video gioco: ".$_POST["game"];
  echo " valuto ".$_POST["valuto"];
  echo " totale = ".$_SESSION["valutazioni"][$_POST["game"]]."<br >";
?>



<html>
<body>
<a href="http://rasphd.ddns.net/chooty/varifica/calcolo.php"><button>lista</button></a>
<a href="http://rasphd.ddns.net/chooty/varifica/form.html"><button>inderisci di nuovo</button></a>
                 </body>
                 </html>
