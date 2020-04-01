<?php
include_once("Model/model.php");

class Control{

  function invoke(){

//asegna i valori al variabile $page


$richiesta = $_REQUEST['value'];

switch ($richiesta) {
  case 'addProd':
    $page = "aggiungiProdotti";
    break;

  case 'addProd2':
    $page = "vediProdotti";
    break;

  case 'data_base':
      $page = "dataBase";
    break;

  case 'input':
      $page = "pageInput";
    break;

  case 'dataB':
      $page = "pageDataBase";
    break;

  case 'rem_data_base':
    $page = 'rem_data_base';
    break;

  case 'vedi':
    $page = 'controllaDati';
    break;

  case 'sellProd':
    $page = 'sellProd';
    break;

  default:
      $page = "home";
    break;
}
    /*
    if($_REQUEST['value']=="addProd"){
      $page = "aggiungiProdotti";
    }
    if($_REQUEST['value']=="addProd2"){
      $page = "vediProdotti";
    }
    if($_REQUEST['value']=="data_base"){
      $page = "dataBase";
    }*/
/////////////////////////////////////////////////

//farele operzioni basata su valori del varibile $page
switch ($page) {
  case 'pageInput':
      include('View/paginaPrincipale.php');
    break;

  case 'pageDataBase':
      include('View/dataBase.php');
    break;

  case 'controllaDati':
      include('View/contolla_dati.php');
    break;

  case 'aggiungiProdotti':
    $add = new modello();
    echo $add -> assegna_variabili($_REQUEST['prodotto'],$_REQUEST['idProd'],$_REQUEST['dataExp'],$_REQUEST['quan'],$_REQUEST['prez']);
    break;

  case 'vediProdotti':
    $add = new modello();
    echo $add -> vedidati();
    break;

  case 'dataBase':
    $add = new modello();
    echo $add -> dataBase($_REQUEST['prod'],$_REQUEST['id']);
    break;

  case 'rem_data_base':
    $add = new modello();
    echo $add -> removeProd($_REQUEST['prod'],$_REQUEST['id']);
    break;

  case 'sellProd':
    echo "done";
    break;
    
  default:
    include('View/home.php');
    break;
}
///////////////////////////////////////////////////
/*
    if($page=="paginaPrincipale"){
      include('View/paginaPrincipale.php');
    }
    if($page=="aggiungiProdotti"){
      $add = new modello();
      echo $add -> assegna_variabili($_REQUEST['prodotto'],$_REQUEST['idProd'],$_REQUEST['dataExp'],$_REQUEST['quan'],$_REQUEST['prez']);
    }

    if($page=="vediProdotti"){
      $add = new modello();
      echo $add -> vedidati();
    }*/
  }
}

 ?>
