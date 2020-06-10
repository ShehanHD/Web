<?php
include("Conf.php");

if(isset($_REQUEST['id'])){
    $IDO= $_REQUEST['id'];

    $query = "DELETE FROM `ordini` WHERE KsIDO=$IDO";
    mysqli_query($conn, $query);
    header('location:../index.php');
}
