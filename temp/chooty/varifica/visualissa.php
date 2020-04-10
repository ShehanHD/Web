<?php
include ("lista.php");
$fp($nome,"r");
fscanf($fp,"%s %s",$_POST["game"],$_POST["valuto"]);
echo $_POST["game"],$_POST["valuto"];
fclose($fp);
?>

