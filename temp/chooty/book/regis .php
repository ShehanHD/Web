  <html>
<body>
         <style>
body{background-color:powderblue;
  background-image: url("c.gif");
  }

button{
 margin: 12px 52px;
    color: silver;
}
p{
 color: silver;
}

</style>
 <?php
  $autore = $_POST["autore"];
  $nome= $_POST["nome"];
  $genere = $_POST["genere"];
  $id= $_POST["id"];
   $presso= $_POST["presso"];
    
    
    
  $fp=fopen($autore,"a" );
 fprintf($fp ,"%s %s %s %s %s\r\n",$autore,$nome,$genere, $id ,$presso);
 fclose($fp);

   
   $f=fopen("tutto","a" );
   fprintf($f ,"%s %s %s %s %s\r\n",$autore,$nome,$genere, $id ,$presso);

  fclose($f);
  
  ?>
   <center>

 <p> NOME DEL LIBRO PER CERCARE</p><br>
<p> puo cercare base al nome di autore o tutto il libri e salvato </p>
<a href="http://rasphd.ddns.net/chooty/book/read.html"><button>LEGGE IL LIBRO</button></a><br>
<a href="http://rasphd.ddns.net/chooty/book/inserisci.html"><button>INSERISCI IL LIBRO</button></a>
</center>
</body>
</html>

