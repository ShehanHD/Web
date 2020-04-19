<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form style="width:30%; margin: auto;" action="index.php" method="get">
        <input style="width:100%" type="text" name="uno">
        <input style="width:100%" type="text" name="due">
        <input style="width:100%" type="submit" name="submit" value="Submit">
        <input style="width:100%" type="submit" name="print" value="Print">
    </form>


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
</body>
</html>