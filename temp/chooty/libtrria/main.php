<?php
class main{
 public $usren ,$passw,$user,$pass,$nome,$autore,$presso,$id;
 
 public function registra(){
   $user = $_POST["user"];
    $pass= $_POST["pass"];
  $fp=fopen("registra.txt","a" );
  fprintf($fp ,"%s %s \r\n",$user,$pass);
  fclose($fp);
  }
 public function login(){


     	$fp=fopen("registra.txt","r");

        $usern = $_POST["usern"];
    $passw= $_POST["passw"];

  while(!feof($fp)){
        	fscanf($fp,"%s %s ",$user,$pass);
        	  if(!feof($f)){
if ( $user==$usern && $pass==$passw)
    {
     echo "buon fie";
    }
    else
    {
    echo "non andata buon file";
    }
        }
        }
        fclose($fp);
    }
 }
 $o= new main();
 $o-> registra();
 $o->login();


