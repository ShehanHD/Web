<html>
<body>
<style>
body{ background-color: #AED6F1;
}
</style>

<?php
$nome=$_POST['nome'];
$cog=$_POST['cog'];
$figlim=$_POST['figlim'];
$famiglia=$_POST['famiglia'];
$stependio=$_POST['stependio'];

$t=8;

$minorenne=($figlim*$t);
$f=3;
$tranne=($famiglia*$f);
$conto=$minorenne+$tranne;
$ise=(($stependio*$conto)/100);
$isse= $stependio-$ise;

echo "Nome; ",$nome,"<br>","cognome ",$cog,"<br>","minorenni ",$figlim,"<br>","altre in famiglia",$famiglia,"<br>","stependio" ,$stependio,"<br>";
echo "isse di ",$nome," " ,$isse;
$fp=fopen($nome,"a");


     fprintf($fp,"%s %s %s %s %s %s",$nome,$cog,$figlim,$famiglia,$stependio,$isse);

     fclose($fp);
?>

 <br>
<a href="http://rasphd.ddns.net/chooty/irpef/menu.html"><button>munu principale</button></a>
</body>
</html>
