<?php
session_start();

if(isset($_POST['logout'])){
  $uname=$_SESSION['user'];
  $userip = $_SERVER['REMOTE_ADDR'];
  $date = date("Y-m-d H:i:s");

  $dati = array('usc' => "Uscito", 'ip' => $userip, 'name' => $uname ,'date' => $date );

  $fp = fopen("fileIndex/log.csv","a");
  fputcsv($fp,$dati);
  fclose($fp);

unset($_SESSION['user']);
session_destroy();
/*
if(isset($_COOKIE['username']))
{ $username = $_COOKIE['username'];
  setcookie('username',$username,time()-1);}
*/
echo "You've LOGEDOUT<a href= \"index.php\">login</a>";
}

else{header("location: index.php");}
 ?>
