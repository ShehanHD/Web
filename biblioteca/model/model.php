<?php
/**
 *
 *
 */
class bibliotecca{
  private $catalogo = array();
  private $nonDisponibili= array();

  public function __construct(){
    $i=0;
    $fp = fopen("model/admin/catalogo.csv","r");

    $prelevi = array();

      if(!$fp){
        $fp2 = fopen('model/admin/catalogo.csv','w');
        fclose($fp2);
      }
      else{
        while (($data = fgetcsv($fp)) !== FALSE) {
          $prelevi[$i] = $data;
          $i++;
        }
          fclose($fp);
      }

//////////////user dati////////////////////
if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
    $nonDisponibili = fopen("model/user/".$user.".csv","r");
    $non = array();
    $i = 0;

  if(!$nonDisponibili){
    $fp2 = fopen("model/user/".$user.".csv","w");
    fclose($fp2);
  }
  else{
      while (($data = fgetcsv($nonDisponibili)) !== FALSE) {
          $non[$i]=$data;
          $i++;
      }

      fclose($nonDisponibili);
  }
      $this -> nonDisponibili = $non;
}
//////////////////////////////////////////////////////

    $this -> catalogo = $prelevi;
  }

  public function verifica($titolo,$id,$posi){
    $catalogo = $this -> catalogo;

    for ($i=0; $i<sizeof($catalogo) ; $i++) {
      if($posi != $i){
        if($titolo==$catalogo[$i][0] && $id==$catalogo[$i][2]){
          return 2; //quando nome e id tutti due esiste
        }
        if($titolo==$catalogo[$i][0] && $id!=$catalogo[$i][2]){
          return 3; //quando nome esiste
        }
        if($titolo!=$catalogo[$i][0] && $id==$catalogo[$i][2]){
          return 4; //quando id esiste
        }
      }
    }
    return 1;
  }

  public function addLibri($titolo, $autore, $id, $date){

    $vet = array($titolo, $autore, $id, $date, 1, date("Y-m-d"));

    $fp = fopen("model/admin/catalogo.csv","a");
      fputcsv($fp,$vet);
    fclose($fp);

    #$vet2 = array($this->catalogo);
  }

  public function mostraCatalogo(){
    return json_encode($this->catalogo);
  }

  public function prenota($titolo, $id, $date){

  if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    $catalogo = $this -> catalogo;

    $nonDisponibili = fopen("model/user/".$user.".csv","a");
    $fCat = fopen('model/admin/catalogo.csv','w');

    $nonModi = $catalogo;

    for ($i=0; $i<sizeof($catalogo) ; $i++) {
      if($catalogo[$i][0]==$titolo && $catalogo[$i][2]==$id){
        $catalogo[$i][3]=$date;
        $catalogo[$i][4]=0;
        $nonModi[$i][4]=0;
        $arr=$catalogo[$i];
        fputcsv($nonDisponibili,$catalogo[$i]);
      }
      fputcsv($fCat,$nonModi[$i]);
    }
    fclose($fCat);
    fclose($nonDisponibili);

    return json_encode($arr);
  }
else{
    return 0;
}
  }

  public function cronologia(){
    return json_encode($this -> nonDisponibili);
  }

////////////////da fare///////////////////////////
    public function anulla($titolo,$id){

      $user = $_SESSION['user'];
      $catalogo = $this -> catalogo;
      $nDis = $this -> nonDisponibili;
      $arr = array();

      $nonDisponibili = fopen("model/user/".$user.".csv","w");
      $fCat = fopen('model/admin/catalogo.csv','w');

      $decoy = $catalogo;

      for ($i=0; $i<sizeof($decoy) ; $i++) {
        if($decoy[$i][0]==$titolo && $decoy[$i][2]==$id){
          $decoy[$i][4]=1;
          $arr=$decoy[$i];
        }
        fputcsv($fCat,$decoy[$i]);
      }
      #fputcsv($nonDisponibili,$catalogo);

      for ($i=0; $i<sizeof($nDis) ; $i++) {
        if($nDis[$i][0]==$titolo && $nDis[$i][2]==$id){
          $nDis[$i][4]=1;
          $arr=$nDis[$i];
        }
        fputcsv($nonDisponibili,$nDis[$i]);
      }

      fclose($fCat);
      fclose($nonDisponibili);

      return json_encode($arr);
    }

  public function modificaDB($titolo,$autore,$id,$posizione){
    $decoy = $this -> catalogo;
    $nDis = $this -> nonDisponibili;

    $fCat = fopen('model/admin/catalogo.csv','w');

    for ($i=0; $i<sizeof($decoy) ; $i++) {
      if($i==$posizione){
        $decoy[$i][0]=$titolo;
        $decoy[$i][1]=$autore;
        $decoy[$i][2]=$id;
      }
      fputcsv($fCat,$decoy[$i]);
    }
    fclose($fCat);
    return 1;
  }

  public function removeDB($titolo,$autore,$id,$posizione){
    $decoy = $this -> catalogo;
    $nDis = $this -> nonDisponibili;

    $fCat = fopen('model/admin/catalogo.csv','w');

    for ($i=0; $i<sizeof($decoy) ; $i++) {
      if($i!=$posizione){
        fputcsv($fCat,$decoy[$i]);
      }
    }
    fclose($fCat);
    return json_encode($decoy);
  }

  public function controllaRegis($email, $pwd){
    $reg = fopen("model/admin/registrati.csv","r");
    $regis = array();
    $i = 0;

//LOGIN
  if(isset($pwd)){
    if(!$reg){
      $fp2 = fopen('model/admin/registrati.csv','w');
      fclose($fp2);
    }
    else{
      while (($data = fgetcsv($reg)) !== FALSE) {
        $regis[$i] = $data;
        if($email == $regis[$i][2] && $pwd == $regis[$i][3]) {
            return 0;
        }
        $i++;
      }
        fclose($reg);
    }
  }
//REGISTRA
  else{
      if(!$reg){
        $fp2 = fopen('model/admin/registrati.csv','w');
        fclose($fp2);
      }
      else{
        while (($data = fgetcsv($reg)) !== FALSE) {
          $regis[$i] = $data;
          if($email == $regis[$i][2]) {
              return 0;
          }
          $i++;
        }
          fclose($reg);
      }
  }

return 1;
}

  public function registrazione($name,$sirName,$email,$pwd){

  $regis = array($name,$sirName,$email,$pwd,date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']);

  $registrati = fopen('model/admin/registrati.csv','a');
  fputcsv($registrati,$regis);
  return json_encode($regis);

}

public function login($username, $pwd){
  $userip = $_SERVER['REMOTE_ADDR'];
  $agent = $_SERVER['HTTP_USER_AGENT'];
  $date = date("Y-m-d H:i:s");

        $dati = array("Entrato", $username, $userip ,$agent, $date );

        $fp = fopen("model/admin/log.csv","a");
        fputcsv($fp,$dati);
        fclose($fp);

        session_start();
        $_SESSION['user'] = $username;

  return 2;
}

public function logout(){
  unset($_SESSION['user']);
  session_destroy();

  return 1;
}

}

 ?>
