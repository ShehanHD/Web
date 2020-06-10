<?php
session_start();

include("Conf.php");
//if(isset($_POST['Username']) && isset($_POST['Password']))
$Username=$_POST['Username'];
$Password=$_POST['Password'];

$query= "select * from Utenti where Username= '$Username' and Password= '$Password'";
$result=mysqli_query($conn, $query);
$num=mysqli_num_rows($result);

$session = mysqli_fetch_assoc($result);

if($num==1){
   if($Username=='admin' and $Password=='admin'){ 
      $_SESSION['admin'] = $session["IDU"];
      $_SESSION['name'] = $session["Nome"];
      header('location:../index.php');
   }
   else{
      $_SESSION['user'] = $session["NumerodiTelefono"];
      $_SESSION['name'] = $session["Nome"];
      $_SESSION['idu'] = $session["IDU"];
      header('location:../index.php');
   }
} else {
echo "Username o password errati";
}

?>