<?php

class Control{
    public function invoke(){

        if(isset($_REQUEST['req'])){
            $request = $_REQUEST['req'];
        }else{
            $request = "";
        }

        switch ($request) {
            case 'newPage':
                include("./view/newPage.php");
                break;
            case 'submit':
                echo "dal form ".$_REQUEST['test'];
                break;
            default:
                include("./view/main.html");
                break;
        } 
    }
}
