<?php
/**
 *
 */
class matrici{

  public function rettangolo($rig, $col,$rig2, $col2)
  {
    $matrice1 = array();
    $matrice2 = array();
    $matrice3 = array();
    $ris=0;

/////////////////////////matrice1////////////////////////
    for ($i=0; $i < $rig ; $i++) {
      for ($j=0; $j < $col ; $j++) {
        $matrice1[$i][$j]= rand(1, 5);
      }
    }

/////////////////////////matrice2////////////////////////
    for ($i=0; $i < $rig2 ; $i++) {
      for ($j=0; $j < $col2 ; $j++) {
        $matrice2[$i][$j]= rand(1, 5);
      }
    }

/////////////////////////matrice3////////////////////////
    for ($i=0; $i<$rig ; $i++) {
      for ($j=0; $j<$col2 ; $j++) {
        for ($k=0; $k<$rig2 ; $k++) {
          $ris += $matrice1[$i][$k]*$matrice2[$k][$j];
        }
        $matrice3[$i][$j]=$ris;
        $ris=0;
      }
    }

    $arr = array($matrice1, $matrice2, $matrice3);

    return json_encode($arr);
  }

  public function quadrato($rig,$col){
    $matrice = array();
    $ris = array();
    for ($i=0; $i < $rig ; $i++) {
      for ($j=0; $j < $col ; $j++) {
        $matrice[$i][$j]= rand(1, 5);
      }
    }

    for ($i=0; $i < $rig ; $i++) {
      for ($j=0; $j < $col ; $j++) {
        if($i==$j){
          $ris[$i][$j]=$matrice[$i][$j];
        }
        else{
          $ris[$i][$j] = $matrice[$j][$i];
        }
      }
    }

      $arr = array($matrice, $ris);

      return json_encode($arr);
  }

}

$obj = new matrici();

 $scelta = $_REQUEST['value'];

  if($scelta=="rettangolo"){
  echo $obj -> rettangolo($_REQUEST['rig'], $_REQUEST['col'],$_REQUEST['rig2'], $_REQUEST['col2']);
  }
  if($scelta=="quadrato"){
  echo $obj -> quadrato($_REQUEST['rig'], $_REQUEST['col']);
  }


 ?>
