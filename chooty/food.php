<?php
session_start();
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

    case 'login':
        $obj = new Food();
        $obj->login($_REQUEST);
        break;

    case 'regis':
        $obj = new Food();
        $obj->regis($_REQUEST);
        break;

    case 'cart':
        $obj = new Food();
        $obj->getCart();
        break;

    case 'addCart':
        $obj = new Food();
        $obj->addCart($_REQUEST['cart']);
        break;

    case 'delCart':
        $obj = new Food();
        $obj->delCart($_REQUEST['id']);
        break;

    case 'logout':
        $obj = new Food();
        $obj->logout();
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
            telefono int not null,
            mail varchar(60) not null,
            PASSWORD varchar(50) not null
            );";
            if (!mysqli_query($this->connect, $table1)) {
                echo " Error creating table regis";
            }
            $table2 = "create table if not exists ordini(
                idordini INT PRIMARY KEY AUTO_INCREMENT,
               
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
        if (!mysqli_query($sql, $add)) {
            echo 1;
        } else {
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
        $ris = mysqli_query($sql, $str);

        $row = mysqli_fetch_all($ris);

        echo json_encode($row);
    }

    public function delFood($id)
    {
        $sql = new MySQLi("localhost", "root", "", "pizzaria");
        $del = "DELETE FROM `foods` WHERE idfood=$id";
        if (!mysqli_query($sql, $del)) {
            echo 1;
        } else {
            echo 0;
        }
        mysqli_close($sql);
    }

    public function login($user)
    {
        $mail = $user['mail'];
        $PASSWORD = $user['PASSWORD'];

        $sql = new Mysqli("localhost", "root", "", "pizzaria");
        $str = "select mail,PASSWORD,idregis from regis where mail='$mail' and PASSWORD='$PASSWORD' ";
        $ris = mysqli_query($sql, $str);
        $row = mysqli_fetch_all($ris);

        if ($row) {
            if ($row[0][0] == 'shehani@gmail.com') {
                $_SESSION["admin"] = $mail;
                $_SESSION["id"] = $row[0][2];
                echo 1;
            } else {
                $_SESSION["mail"] = $mail;
                $_SESSION["id"] = $row[0][2];
                echo 1;
            }
        } else {
            echo 0;
        }
    }

    public function regis($user)
    {
        $nome = $user['nome'];
        $cognome = $user['cognome'];
        $indirizzo = $user['indirizzo'];
        $citta = $user['citta'];
        $cappa = $user['cappa'];
        $telefono = $user['telefono'];
        $mail = $user['mail'];
        $PASSWORD = $user['PASSWORD'];


        $sql = new MySQLi("localhost", "root", "", "pizzaria");
        $add = "INSERT INTO `regis`(`nome`, `cognome`, `indirizzo`, `citta`, `cappa`, `telefono`, `mail`, `PASSWORD`) VALUES ('$nome', '$cognome', '$indirizzo', '$citta', '$cappa', '$telefono', '$mail', '$PASSWORD');";

        if (!mysqli_query($sql, $add)) {
            echo 1;
        } else {
            echo 0;
        }
        mysqli_close($sql);
    }

    public function addCart($cart)
    {


        $tipo = (json_encode($cart[0][1]));
        $ingre = (json_encode($cart[0][2]));
        $prezzo = (json_encode($cart[0][3]));
        $ksregis = $_SESSION['id'];
        $ksfood = (json_encode($cart[0][0]));
        print_r($ksfood);

        $sql = new Mysqli("localhost", "root", "", "pizzaria");
        $sql->query("INSERT INTO `ordini`(  `ksfood`, `ksregis`) VALUES  
        ($ksfood,$ksregis);");


        mysqli_close($sql);
    }

    public function delCart($id){
        $sql = new Mysqli("localhost", "root", "", "pizzaria");
        $sql->query("DELETE FROM `ordini` WHERE ksfood = $id;");
        mysqli_close($sql);
    }

    public function getCart(){
        $sql = new Mysqli("localhost", "root", "", "pizzaria");
        $x = $sql->query("SELECT `ksfood`, `tipo`, `ingre`, `prezzo` FROM `ordini`,foods WHERE ordini.ksfood=foods.idfood");
        
        mysqli_close($sql);
        print_r(json_encode(mysqli_fetch_all($x)));
    }
    public function logout()
    {
        unset($_SESSION['mail']);
        unset($_SESSION['admin']);
        unset($_SESSION['id']);

        if ($_SESSION) {
            echo 0;
        } else {
            echo 1;
        }
    }
}
