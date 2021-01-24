<?php
include ("./Model/Model.php");
include ("./Model/Table/Table.php");
class Control{
    public function revoke(){
        $table = new Table();
        $obj = new CRUD();
        if(isset($_REQUEST["req"])){
            $request = $_REQUEST["req"];
        }
        else{
            $request = "home";
        }
        
        switch ($request) {
            case 'home':
                include ("./View/home.php");
                break;
            case 'createTable':
                $table->addTable($_REQUEST['tableName']);
                break;
            case 'getList':
                $table->getList();
                break;
            case 'setColumn':
                $obj->setColumn($_REQUEST['table'], $_REQUEST['columns']);
                break;
            case 'callTable':
                $obj->getTable($_REQUEST['tableName']);
                break;
            case 'delTable':
                $obj->delTable($_REQUEST['tableName']);
                break;
            // case 'addColumn':
            //     $obj->addColumn(["ccc", "ddd"]);
            //     break;
            // case 'deleteColumn':
            //     $obj->deleteColumn("aaa");
            //     break;
            // case 'editColumn':
            //     $obj->editColumn("aaa", "abc");
            //     break;
            case 'addRow':
                $obj->addRow(["ggg", "rrr"]);
                break;
            default:
                include ("./View/error.php");
                break;
        }

    }
}
