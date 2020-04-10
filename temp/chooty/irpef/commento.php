 <?php
 $Text1=$_POST['Text1'];
 $fp=fopen("commento.txt","a");
 fprintf($fp,"%s",$Text1);
fclose($fp);
echo "commento salvato";
?>


     <html>
     <body>
     <br>
    <a href="http://rasphd.ddns.net/chooty/irpef/menu.html"><button>menu principale</button></a>     <br>
     </body>
     </html>

