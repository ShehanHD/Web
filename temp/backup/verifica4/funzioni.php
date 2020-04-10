<?php

/**
 *
 */
class tabella{

  public function __construct(){
    $somma = 0;

    for($riga=1; $riga <= 10; $riga++)
        {
                for($colonna=1;$colonna<=10;$colonna++)
                {

              $arr[$riga][$colonna] = ($riga * $colonna);

                }
          }
    return $arr;
  }

  public function crea(){
    $limite=10;
    $vet = $this -> __construct();


    for($riga=1; $riga <= $limite; $riga++)
        {
            echo '<tr>';

                for($colonna=1;$colonna<=$limite;$colonna++)
                {
                    $valore= $vet[$colonna][$riga];
                    echo '<td>'; echo $valore; echo '</td>';
                }
            echo '</tr>';
        }

  }

  public function diagonale()
  {
    $limite=10;
    $somma = 0;
    $vet = $this -> __construct();

    for($riga=1; $riga <= $limite; $riga++)
        {
            echo '<tr>';

                for($colonna=1;$colonna<=$limite;$colonna++)
                {
                    if($colonna==$riga){
                      $valore ="x";
                      echo "<td bgcolor=\"#ddd\">";
                      $somma += $vet[$colonna][$riga];
                    }
                    else{
                    $valore= $vet[$colonna][$riga];
                    echo '<td>';}

                    echo $valore; echo '</td>';
                }
            echo '</tr>';
          }
  }

  public function diagonale2()
  {
    $limite=10;
    $vet = $this -> __construct();

    for($riga=1; $riga <= $limite; $riga++)
        {
            echo '<tr>';

                for($colonna=1;$colonna<=$limite;$colonna++)
                {
                    if($colonna==$colonna && $riga==(($limite+1)-$colonna)){
                      $valore ="x";
                      echo "<td bgcolor=\"#ddd\">";
                    }
                    else{
                      $valore= $vet[$colonna][$riga];
                      echo '<td>';
                    }
                     echo $valore; echo '</td>';
                }
            echo '</tr>';
        }

  }

  public function modi(){
    $limite=10;
    $vet = $this -> __construct();


    for($riga=1; $riga <= $limite; $riga++)
        {
          if($riga%2 == 0){
            echo "<tr bgcolor=\"#ddd\">";
          }
          else
            echo '<tr>';

                for($colonna=1;$colonna<=$limite;$colonna++)
                {
                      if($riga%2 == 0){
                        $valore = $vet[$colonna][$riga]+5;
                      }


                    else{
                        $valore= $vet[$colonna][$riga];
                    }

                    echo '<td>'; echo $valore; echo '</td>';
                }
            echo '</tr>';
        }

  }

  public function modi2(){
    $limite=10;
    $vet = $this -> __construct();


    for($riga=1; $riga <= $limite; $riga++)
        {
          echo '<tr>';

                for($colonna=1;$colonna<=$limite;$colonna++)
                {
                    if($colonna%2 == 1){
                      $valore = $vet[$colonna][$riga]-7;
                    }

                    else{
                        $valore= $vet[$colonna][$riga];
                    }

                    if($colonna%2 == 1){
                      echo "<td bgcolor=\"#ddd\">";
                    }

                    else{
                    echo '<td>';
                    }

                    echo $valore; echo '</td>';
                }
            echo '</tr>';
        }

  }


  public function sommaDP(){
    $somma = 0;
    $vet = $this -> __construct();
    for($riga=1; $riga <= 10; $riga++)
        {
                for($colonna=1;$colonna<=10;$colonna++)
                {
                    if($colonna==$riga){
                      $somma += $vet[$colonna][$riga];
                    }
                  }}
  echo "La somma Diogonale primaria : ".$somma;
  }


  public function somRig(){
    $limite=10;
    $somma = 0;
    $vet = $this -> __construct();


    for($riga=1; $riga <= $limite; $riga++)
        {
            echo '<tr>';

                for($colonna=1;$colonna<=$limite+1;$colonna++)
                {
                    $valore= $riga * $colonna;

                    if($colonna!=$limite+1){
                      echo '<td>'; echo $vet[$colonna][$riga]; echo '</td>';
                      $somma += $vet[$colonna][$riga];
                    }
                    else{
                      echo '<td bgcolor=\'#ddd\'>'; echo $somma; echo '</td>';
                      $somma = 0;
                    }
                }
            echo '</tr>';
        }

  }

  public function somCol(){
    $limite=10;
    $somma = 0;
    $vet = $this -> __construct();


    for($riga=1; $riga <= $limite+1; $riga++)
        {
            echo '<tr>';

                for($colonna=1;$colonna<=$limite;$colonna++)
                {
                  if($riga!=$limite+1){
                      echo '<td>'; echo $vet[$riga][$colonna]; echo '</td>';
                      $somma += $vet[$colonna][$riga];
                      $cel[$riga]=$somma;
                  }
                  if($riga==$limite+1){
                      echo '<td bgcolor=\'#ddd\'>'; echo $cel[$colonna]; echo '</td>';
                  }
                }
                      $somma = 0;
            echo '</tr>';
        }

  }

  public function invertiRig(){
    $limite=10;
    $vet = $this -> __construct();


    for($riga=1; $riga <= $limite; $riga++)
        {
            echo '<tr>';

                for($colonna=1;$colonna<=$limite;$colonna++)
                {
                    $valore= $vet[$riga][($limite+1)-$colonna];
                    echo '<td>'; echo $valore; echo '</td>';
                }
            echo '</tr>';
        }

  }


    public function invertiCol(){
      $limite=10;
      $vet = $this -> __construct();

      for($riga=1; $riga <= $limite; $riga++)
          {
              echo '<tr>';

                  for($colonna=1;$colonna<=$limite;$colonna++)
                  {
                      $valore= $vet[($limite+1)-$riga][$colonna];
                      echo '<td>'; echo $valore; echo '</td>';
                  }
              echo '</tr>';
          }
    }

    public function invertiDiagonale()
    {
      $limite=10;
      $somma = 0;
      $vet = $this -> __construct();

      for($riga=1; $riga <= $limite; $riga++)
          {
              echo '<tr>';

                  for($colonna=1;$colonna<=$limite;$colonna++)
                  {
                      if($colonna==$riga){
                        $valore =   $vet[($limite+1)-$riga][($limite+1)-$colonna];
                        echo "<td bgcolor=\"#ddd\">";

                      }
                      else{
                      $valore= $vet[$colonna][$riga];
                      echo '<td>';}

                      echo $valore; echo '</td>';
                  }
              echo '</tr>';
          }

    }

}




?>
