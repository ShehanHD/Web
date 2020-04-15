<?php
include_once("model/model.php");

class control{
    public function invoke(){
        $obj = new gioco();

        if(isset($_REQUEST['req'])){
            $request = $_REQUEST['req'];
        }
        else{
            $request = "";
        }

        switch ($request) {
            default:
                include("view/main.php");
            break;
        }

    }
}