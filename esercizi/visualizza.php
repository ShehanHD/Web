<?php

if(isset($_REQUEST['submit']) ){

    if(!isset($_SESSION['test'])){
        $arr = new ArrayObject();
    }
    else{
        $arr = $_SESSION['test'];
    }   

    $uno = $_REQUEST['uno'];
    $due = $_REQUEST['due'];

    $arr->append(array('Nome' => $uno, 'Cognome' => $due));

    $_SESSION['test'] = $arr;
}

if(isset($_REQUEST['print']) ){
    if(!isset($_SESSION['test'])){
        echo "Ancora non c'è nessun valore";
    }
    else{
        print_r($_SESSION['test']);
    }   
}

?>