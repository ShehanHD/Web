<?php
$fp=fopen("comment.txt","r");
 do {
fscanf($fp,"%s ",$comment);
echo $comment;     }
while(!feof($fp));
fclose($fp);

?>
