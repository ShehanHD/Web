<?php
include("Conf.php");

$Username=$_POST['Username'];
$Password=$_POST['Password'];

$query= "select * from utenti where Username='$Username'";


    $result=mysqli_query($conn, $query);
    $num=mysqli_num_rows($result);
    if($num == 1){
    echo "Nome utente già esistente";
    } else {
    $reg= "insert into utenti(Nome, Cognome, DatadiNascita, CodiceFiscale, Indirizzo, Cap, Città, Paese, NumerodiTelefono, Email, Username, Password) values('$Nome', '$Cognome', '$DatadiNascita', '$CodiceFiscale', '$Indirizzo', '$Cap', '$Città', '$Paese', '$NumerodiTelefono', '$Email', '$Username', '$Password')";
    mysqli_query($conn, $reg);
    echo "Registrazione avvenuta con successo";

}
