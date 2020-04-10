<?php
include ('funzioni.php');

$req = $_REQUEST['value'];

switch ($req) {
  case 'genera':
    $obj = new matrici($_REQUEST['rigCol']);
    echo $obj -> genera();
    break;
}
 ?>
