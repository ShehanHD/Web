 <?php
         $li = $_POST["li"];

   $f=fopen($li,"r" );

  while(!feof($f)){
fscanf($f ,"%s %s %s %s %s",$autore,$nome,$genere, $id ,$presso);
  if(!feof($f)){
  echo "<br> " ,$autore,"<br> ",$nome,"<br> ",$genere,"<br> ", $id,"<br> " ,$presso ,"<br> " ;
  }
  }
  fclose($f);

  ?>
  
  
