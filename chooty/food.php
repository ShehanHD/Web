<?php

if (isset($_REQUEST['req'])) {
    $request = $_REQUEST['req'];
} else {
    $request = "";
}

switch ($request) {
    case 'show':
        $obj = new Food();
        $obj->read();
        break;
    case 'add':
        $obj = new Food();
        $obj->addFood($_REQUEST);
        break;

    case 'edit':
        $obj = new Food();
        $obj->editFood($_REQUEST);
        break;

    case 'del':
        $obj = new Food();
        $obj->delFood($_REQUEST['id']);
        break;
    default:
        include("./index.php");
        break;
}


class Food
{
    private $connect;

    public function __construct()
    {
        $this->connect = new MySQLi("localhost", "root", "")  or die(mysqli_connect_error());

        if (!mysqli_select_db($this->connect, 'pizzaria')) {
            $sql = "CREATE DATABASE IF NOT EXISTS pizzaria";
            if (!mysqli_query($this->connect, $sql)) {
                echo "Error creating database: " . mysqli_error($this->connect);
            }
        } else {
            $table = "CREATE TABLE IF NOT EXISTS foods(
                idfood INT PRIMARY KEY AUTO_INCREMENT,
                tipo varchar(50) not null,
                ingre varchar(50) not null,
                prezzo float not null
            );";
            if (!mysqli_query($this->connect, $table)) {
                echo " Error creating table foods";
            }
            $table1 = "create table if not exists regis(
            idregis int primary key auto_increment,
            nome varchar(50) not null,
            cognome varchar(50) not null,
            indirizzo varchar(60) not null,
            citta varchar(50) not null,
            cappa int not null,
            telefono int not null
            );";
            if (!mysqli_query($this->connect, $table1)) {
                echo " Error creating table regis";
            }
            $table2 = "create table if not exists ordini(
                idordini INT PRIMARY KEY AUTO_INCREMENT,
                tipo varchar(50) not null,
                ingre varchar(50) not null,
                prezzo float not null,
                stato varchar(50),
                ksfood int ,
                ksregis int,
                FOREIGN KEY (ksfood) REFERENCES foods(idfood),
                FOREIGN KEY (ksregis) REFERENCES regis(idregis)
            );";
            if (!mysqli_query($this->connect, $table2)) {
                echo " Error creating table ordini";
            }
        }
        mysqli_close($this->connect);
    }

    public function addFood($foods)
    {
        $tipo = $foods['tipo'];
        $ingre = $foods['ingre'];
        $prezzo = $foods['prezzo'];
        $sql = new MySQLi("localhost", "root", "", "pizzaria");
        $add = "INSERT INTO `foods`( `tipo`, `ingre`, `prezzo`) VALUES ('$tipo','$ingre',$prezzo);";
        if (!mysqli_query($sql,$add)){
            echo 1;
        }
        else{
            echo 0;
        }
        mysqli_close($sql);
    }

    public function editFood($foods)
    {

        $tipo = $foods['tipo'];
        $ingre = $foods['ingre'];
        $prezzo = $foods['prezzo'];

        $sql = new MySQLi("localhost", "root", "", "pizzaria");
        $sql->query("UPDATE `foods` SET `tipo`='$tipo',`ingre`='$ingre',`prezzo`='$prezzo' WHERE `idfood`='2';");

        mysqli_close($sql);
    }

    public function read()
    {
        $sql = new Mysqli("localhost", "root", "", "pizzaria");
        $str = "select * from foods";
        $ris=mysqli_query($sql, $str);

        $row = mysqli_fetch_all($ris);

        echo json_encode($row); 
    }
    public function delFood($id){
        $sql = new MySQLi("localhost", "root", "", "pizzaria");
        $del="DELETE FROM `foods` WHERE idfood=$id";
        if (!mysqli_query($sql,$del)){
            echo 1;
        }
        else{
            echo 0;
        }
        mysqli_close($sql);
    }
}
