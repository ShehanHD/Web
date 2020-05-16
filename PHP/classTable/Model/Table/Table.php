<?php

class Table{
    protected $files;

    public function __construct() {
        $this->files = array_slice(scandir("./tables"), 2);
    }

    public function addTable($tableName){
        $x = $tableName.".json";

        $file = array_filter($this->files, function($item) use ($x){
            return $item != $x ? "" : $item;
        });

        if(sizeof($file) == 0){
            $path = "./tables/".$x;
            file_put_contents($path, json_encode(array('column'=>array(), 'row'=>array())));
            echo json_encode(array('err'=>0));
        }
        else{
            echo json_encode(array('err'=>1));
        }
    }

    public function getList(){
        echo json_encode($this->files);
    }
}


class CRUD extends Table{
    private $colonne;
    private $row;

    public function __construct() {
        parent::__construct();
    }

    public function getTable($tableName){
        $file = $tableName;
        $path = "./tables/".$file;
        $data = file_get_contents($path);
        
        $arr_data = json_decode($data, true);

        if($arr_data['column']){
            echo json_encode(array('err'=>0, 'data'=>$arr_data));
        }
        else{
            echo json_encode(array('err'=>1));
        }
    }

    public function setColumn($tableName, $col){
        $path = "./tables/".$tableName;
        file_put_contents($path, json_encode(array('column'=>$col, 'row'=>array())));
    }

    public function delTable($tableName){
        $path = "./tables/".$tableName;
        if(unlink($path)){
            echo json_encode(array('err'=>0));
        }
        else{
            echo json_encode(array('err'=>1));
        }
    }
    
    public function addRow($row){
        $this->row = [...$this->row , $row];

        print_r($this->row);
    }
    
    // public function addColumn($newCol){
    //     $this->colonne = [...$this->colonne , ...$newCol];

    //     print_r($this->colonne);
    // }

    // public function deleteColumn($str){
    //     $this->colonne = array_filter($this->colonne, function($item) use ($str){
    //         return ($item != $str);
    //     });

    //     print_r($this->colonne);
    // }

    // public function editColumn($strOld, $str){
    //     $this->colonne = array_map(function($item) use ($strOld, $str){
    //         return $item == $strOld ? $strOld=$str : $item;
    //     }, $this->colonne);

    //     print_r($this->colonne);
    // }

}