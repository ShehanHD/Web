<?php

if(isset($_REQUEST['value']) == "newData"){
    $name = $_REQUEST['name'];
    $surname = $_REQUEST['surname'];
    $email = $_REQUEST['email'];
    $sex = $_REQUEST['sex'];
    $education = $_REQUEST['education'];
    $password = $_REQUEST['password'];

    if( $name && $surname && $email && $sex && $education && $password){
    $data = array($name, $surname, $email, $sex, $education, $password);
    
    $file = fopen("newData.txt", "a");

    fprintf($file, "%s %s %s %s %s %s\n", $name, $surname, $email, $sex, $education, $password);

    fclose($file);

        echo "ok";
    }
    else{
        echo "no";
    }

}