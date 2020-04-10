<?php
/**
 *
 */
class matrici{
  private $matrice1 = array();
  private $matrice2 = array();
  private $matrice3 = array();
  private $sommaPrima1 = 0;
  private $sommaPrima2 = 0;
  private $sommaVal1 = 0;
  private $sommaVal2 = 0;
  private $sommaDio1 = 0;
  private $sommaDio2 = 0;
  private $Secon1 = 0;
  private $Secon2 = 0;


  function __construct($dim)
  {
  $som1 = $som2 = $somD1 = $somD2 = 0;

    for ($i=0; $i<$dim; $i++) {
      for ($j=0; $j<$dim; $j++) {
        $vet1[$i][$j] = rand(1, 100);
        $vet2[$i][$j] = rand(1, 100);

/////////////////////////////diogonale principale////////////////////////////////////////////
        if ($i==$j) {
          $som1 += $vet1[$i][$j];
          $som2 += $vet2[$i][$j];
        }
//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////diogonale secondarie////////////////////////////////////////////
        if ($i==($dim-($j+1))) {
          $somD1 += $vet1[$i][$j];
          $somD2 += $vet2[$i][$j];
        }
//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////terza matrice////////////////////////////////////////////
        if((($vet1[$i][$j]>20) && ($vet1[$i][$j]<50)) && (($vet2[$i][$j]>20) && ($vet2[$i][$j]<50))){
              $vet3[$i][$j] = $vet1[$i][$j] + $vet2[$i][$j];
        }

        else{
          if ($vet1[$i][$j]>$vet2[$i][$j]) {
            $vet3[$i][$j] = $vet1[$i][$j] - $vet2[$i][$j];
          }

          else{
            $vet3[$i][$j] = $vet2[$i][$j] - $vet1[$i][$j];
        }}}
//////////////////////////////////////////////////////////////////////////////////////////////
}

/////////////////////////////diogonale principale controllo///////////////////////////////////
if($som1%2==1 && $som2%2==1){
  $this -> sommaPrima1 = 1;
  $this -> sommaPrima2 = 1;
}

else{
    if ($som1 > $som2) {
        if($som1%2==0){
          $this -> sommaPrima1 = 2;
        }
        else{
          $this -> sommaPrima1 = 1;
        }
    }
    else {
        if($som2%2==0){
          $this -> sommaPrima2 = 2;
        }
        else{
          $this -> sommaPrima2 = 1;
        }
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////somma diogonale controlli////////////////////////////////////
if($somD1<$somD2){
  $this -> Secon1 = 1;
}
else if($somD2<$somD1){
  $this -> Secon2 = 1;
}
else{
  $this -> Secon1 = 0;
  $this -> Secon2 = 0;
}
//////////////////////////////////////////////////////////////////////////////////////////////
  $this -> matrice1 = $vet1;
  $this -> matrice2 = $vet2;
  $this -> matrice3 = $vet3;
  $this -> sommaVal1 = $som1;
  $this -> sommaVal2 = $som2;
  $this -> sommaDio1 = $somD1;
  $this -> sommaDio2 = $somD2;
  }

  public function genera(){
    $vet = array($this->matrice1, $this->matrice2, $this->matrice3, $this->sommaPrima1, $this->sommaPrima2,$this->sommaVal1,$this->sommaVal2, $this->Secon1, $this->Secon2, $this->sommaDio1, $this->sommaDio2);
    return json_encode($vet);
  }

}
 ?>
