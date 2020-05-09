<?php

    if(isset($_REQUEST['delete'])){
        del();
        header("Location: ./esercizio.php");
        die();
    }

    function printData($x){
        echo "<tr><th>Date</th><th>Host</th><th>User Agent</th></tr>";
        foreach ($x as $i) {
            echo "<tr><td>".$i[0]."</td>";
            echo "<td>".$i[1]."</td>";
            echo "<td>".$i[2]."</td></tr>";
        }
    }

    function del(){
        unset($_COOKIE['visit']);
        setcookie('visit', "", time()-3600, "/");
    }

    if(!isset($_COOKIE['visit'])){
        $print = "Benvenuti";
        $x = Array(Array(date("d/m/Y H:i:s", $_SERVER['REQUEST_TIME']), $_SERVER['HTTP_HOST'], $_SERVER['HTTP_USER_AGENT']));
        setcookie('visit', json_encode($x) , time()+3600 , "/");
    }
    else{
        $print="Entranti";
        $x = Array(date("d/m/Y H:i:s", $_SERVER['REQUEST_TIME']) , $_SERVER['HTTP_HOST'], $_SERVER['HTTP_USER_AGENT']);
        $cookieData = json_decode($_COOKIE['visit']);
        $x = [...$cookieData, $x];
        setcookie('visit', json_encode($x) , time()+3600 , "/");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, th{
            margin: 5px;
            box-shadow: 0px 0px 1px 2px;
            width: 25%;
            text-align: center
        }
    </style>
</head>
<body>
    <h1><?php echo $print ?></h1>

    <?php if(isset($_COOKIE['visit'])){ ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
        <input type="submit" name="delete" value="Delete">
    </form>
    <?php } ?>


    <table>
    
    <?php
    if(isset($_COOKIE['visit'])){
        printData($x);
    }
    ?>
    </table>
</body>
</html>