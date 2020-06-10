<?php
session_start();
include("Conf.php");

if(isset($_SESSION['idu'])){
    $id = $_REQUEST["id"];
    $idu = $_SESSION["idu"];

    $query = "Insert into ordini(KsIDO, KsIDU) values('$id', '$idu')";
    $result=mysqli_query($conn, $query);
    header('location:../index.php');
}
else{
    header('location:../index.php');
}
