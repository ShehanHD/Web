<html>
    <head>
        

    </head>
    <style>
    
    </style>
<body>
    <form action="user.php" method="POST">
     <input type="text" name="nome" placeholder="Nome">
     <input type="text" name="cognome" placeholder="Cognome">
     <input type="text" name="indirizzo" placeholder="Indirizzo">
     <input type="text" name="citta" placeholder="Citta">
     <input type="text" name="cappa" placeholder="Cappa">
     <input type="text" name="telefono" placeholder="telefono">
    </form>
</body>
</html> 
<?php
$sql = new MySQLi("localhost", "root", "", "pizzaria");
$user= "INSERT INTO `regis`( `nome`, `cognome`, `indirizzo`, `citta`, `cappa`, `telefono`) VALUES"(

