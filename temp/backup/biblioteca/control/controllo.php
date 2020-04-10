<?php
/**
 *
 */

session_start();

include_once("model/model.php");

class control{

  function invoke(){
    $obj = new bibliotecca();

    $request = $_REQUEST['value'];

    switch ($request) {
      case 'gestireLibri':
        include('view/gestireLibri.php');
        break;

      case 'catalogo':
        include('view/catalogo.php');
        break;

      case 'addLibri':
        $verifica = $obj -> verifica($_REQUEST['titolo'],$_REQUEST['id'],NULL);

        if($verifica==1){
        $obj -> addLibri($_REQUEST['titolo'],$_REQUEST['autore'],$_REQUEST['id'],$_REQUEST['date']);
        echo 1;
        }
        else {
          echo $verifica;
        }
        break;

      case 'mostraCatalogo':
        echo $obj -> mostraCatalogo();
        break;

      case 'prenota':
        echo $obj -> prenota($_REQUEST['titoloPrenota'], $_REQUEST['idPrenota'], $_REQUEST['date']);
        break;

      case 'cronologia':
        echo $obj -> cronologia();
        break;

      case 'removeCronologia':
        echo $obj -> anulla($_REQUEST['titoloRemove'],$_REQUEST['idRemove']);
        break;

      case 'modificaDB':
        //echo $obj -> modificaDB($_REQUEST['newTitolo'],$_REQUEST['newAutore'],$_REQUEST['newId'],$_REQUEST['posizione']);
        $verifica = $obj -> verifica($_REQUEST['newTitolo'],$_REQUEST['newId'],$_REQUEST['posizione']);

        if($verifica==1){
        echo $obj -> modificaDB($_REQUEST['newTitolo'],$_REQUEST['newAutore'],$_REQUEST['newId'],$_REQUEST['posizione']);
        }
        else {
          echo $verifica;
        }
        break;

      case 'removeDB':
        echo $obj -> removeDB($_REQUEST['remTitolo'],$_REQUEST['remAutore'],$_REQUEST['remId'],$_REQUEST['remPosizione']);
        break;

      case 'registrazione':
        $controllo = $obj -> controllaRegis($_REQUEST['email'],NULL);

        if($controllo == 0){
          echo $controllo;
        }
        else {
          echo $obj -> registrazione($_REQUEST['name'],$_REQUEST['sirName'],$_REQUEST['email'],$_REQUEST['pwd']);
        }
        break;

      case 'login':
        $controllo = $obj -> controllaRegis($_REQUEST['username'],$_REQUEST['password']);

        if($controllo==0){
          echo $obj -> login($_REQUEST['username'],$_REQUEST['password']);
        }
        else {
          echo $controllo;
        }
        break;

      case 'logout':
        echo  $obj -> logout();
        break;

      default:
        include('view/paginaPrincipale.php');
        break;
    }
  }
}


 ?>
