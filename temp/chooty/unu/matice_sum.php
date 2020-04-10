<html>
<body bgcolor="silver">

</body>
</html>
<?php

class matrice{

public $limite=3;
private $somma=0;
private $sum=0;
private $i;
private $j ,$dif, $diagonale,$diagonale2,$min,$min2;
public $arr1;
public $arr2;

    public function mat1(){
    echo"<center>";
    echo "prima marice";
    echo "<table border=1>";
    for($i=1;$i<=3;$i++){
    echo "<tr>";
    for($j=1;$j<=3;$j++){
    $A[$i][$j]=rand(1,100);
    echo"<td>",$A[$i][$j],"</td>";
    }
   echo "</tr>";
   }
   $this -> arr1 = $A;
   echo "</table>";
   echo"</center>";
   }

 public function mat2(){
 echo"<center>";
 echo "seconda marice";
echo "<table border=1>";
for($i=1;$i<=3;$i++){
echo "<tr>";
 for($j=1;$j<=3;$j++){
$B[$i][$j]=rand(1,100);
echo"<td>",$B[$i][$j],"</td>";
}
echo "</tr>";
}
$this -> arr2 = $B;
echo "</table>";
echo"</center>";
}

  public function somma(){
  $A = $this -> arr1;
  $B = $this -> arr2;
  echo"<center>";
  echo "somma di due marice";
  echo "<table border=1>";
  for($i=1;$i<=3;$i++){
   echo "<tr>";
  for($j=1;$j<=3;$j++){
  $sum=0;
   if(20<$A[$i][$j]&&$A[$i][$j]>50&&20<$B[$i][$j]&&$B[$i][$j]>50){
   $sum+=($A[$i][$j]+$B[$i][$j]);

  }
  if($sum!=0){
  echo "<td>", $sum,"</td>";
  }
  else{
  echo "<td>", "","</td>";}
  }
  echo "</tr>";
  }
  echo "</table>";
  echo"</center>";
}
      public function dife(){
      $A = $this -> arr1;
      $B = $this -> arr2;
      echo"<center>";

      echo "<table border=1>";
      for($i=1;$i<=3;$i++){
      echo "<tr>";
      for($j=1;$j<=3;$j++){
      $dif=0;
       if(20!=$A[$i][$j]&&$A[$i][$j]!=50&&20!=$B[$i][$j]&&$B[$i][$j]!=50){
      $dif-=($B[$i][$j]-$A[$i][$j]);

    }
     if( $dif!=0){
     echo "<td>", $dif,"</td>";
    }
     else{
     echo "<td>", "","</td>";
     }
     }
     echo "</tr>";
     }
     echo "</table>";
     echo"</center>";
     }

                  public function di(){
                $A = $this -> arr1;
                $B = $this -> arr2;
                echo "<center>";

                for($i=1;$i<=3;$i++){
                for($j=1;$j<=3;$j++){

                if($i==$j){
                 $diagonale+=$A[$i][$j];
                $diagonale2+=$B[$i][$j];

                }

             }
                }

                   if( $diagonale<$diagonale2){
                        if($diagonale%2==0){
                       echo "diagonale pari",$diagonale,"\n";
                       }
                     else{
                       if($diagonale2%2==0){
              echo "diagonale secondario pari",$diagonale2,"\n";
              }

                       }

                     }
                     else{
                     echo "nessuna non e pari";}


              echo "</center>";
                }


            public function di2(){
                  $A = $this -> arr1;
                 $B = $this -> arr2;

                 for($i=1;$i<=3;$i++){

                 for($j=1;$j<=3;$j++){

                 if($j==(3-$i+1)){
                 $min+=$A[$i][$j];
                 $min2+=$B[$i][$j];

                   }
                   }
                   }
                    if($min<$min2){
                     echo"minimo diagonale1",$min;

                     }
                     else{ echo"minimo diagonale2 :",$min2;
                     }



              echo "</center>";
                }



}




?>


