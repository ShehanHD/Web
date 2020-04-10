<!DOCTYPE html>
<html>
<head>
<style>
body{ background-color: #AED6F1;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

</head>
<body>

<h2>irpef</h2>


<table style="width:100%">
  <tr>
    <th>redito anuale</th>
    <th>aliquota</th>

  </tr>
  <tr>
    <td>fino 15000</td>
    <td>23%</td>

  </tr>
  <tr>
    <td>15000-28000</td>
    <td>27%</td>

  </tr>
    <tr>
    <td>28000-55000</td>
    <td>38%</td>

  </tr>
    <tr>
    <td>55000-75000</td>
    <td>41%</td>

  </tr>
    <tr>
    <td>maggiore di 75000</td>
    <td>43%</td>

  </tr>
</table>




<?php
$nome=$_POST['nome'];
$cog=$_POST['cog'];
$isse=$_POST['isse'];


 if($isse<15000){
      $risul=(($isse*23)/100);
      echo "Nome; ",$nome,"<br>","cognome ",$cog,"<br>";
      echo "irpef ; " ,$risul;
 }
 if($isse>15000&&$isse<28000){
      $risul =(($isse*27)/100);
      echo "Nome; ",$nome,"<br>","cognome ",$cog,"<br>";
      echo "irpef ; " ,$risul;
 }
 if($isse>28000&&$isse<55000){
      $risul=(($isse*38)/100);
      echo "Nome; ",$nome,"<br>","cognome ",$cog,"<br>";
      echo "irpef ; " ,$risul;
 }
 
  if($isse>55000&&$isse<75000){
      $risul=(($isse*41)/100);
      echo "Nome; ",$nome,"<br>","cognome ",$cog,"<br>";
      echo "irpef ; " ,$risul;
 }
  if($isse>75000){
      $risul=(($isse*43)/100);
      echo "Nome; ",$nome,"<br>","cognome ",$cog,"<br>";
      echo "irpef ; " ,$risul;
 }

     $fp=fopen($nome,"a");
     fprintf($fp,"%s %s %s",$nome,$cog,$risul);

     fclose($fp);

 ?>
      <br>  <a href="http://rasphd.ddns.net/chooty/irpef/menu.html"><button>munu principale</button></a>
</body>
</html>
