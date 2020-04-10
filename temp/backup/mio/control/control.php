<?php
include_once("model/model.php");

class Control{
    function invoke(){
        if(isset($_REQUEST['value'])){
            $request = $_REQUEST['value'];
           }
           else{
               $request = "";
           }

        switch ($request) {
            case 'register':
                $obj = new user();
                $obj->registerUser($_REQUEST['name'], $_REQUEST['surname'], $_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'] );
                break;
            case 'login':
                $obj = new user();
                echo $obj->login($_REQUEST['username'], $_REQUEST['password']);
                break;
            case 'logout':
                $obj = new user();
                $obj->logout();
                break;
            case 'home':
                include('view/home.php');
                break;
            default:
                include("view/user.php");
                break;
        }
    }
}
