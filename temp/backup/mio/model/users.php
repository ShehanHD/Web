<?php

class user{
    private $searchKEY = "";

   public function __construct() {
       $mysql = new MySQLi("localhost" , "root", "1993")  or die(mysqli_connect_error());

       if (!mysqli_select_db($mysql,'users')) {
           $sql = "CREATE DATABASE IF NOT EXISTS users";
   
           if (!mysqli_query($mysql, $sql)) {
              echo "Error creating database: " . mysqli_error($mysql);
           }
       }
       if (mysqli_connect_errno()) {
           echo "Failed to connect to MySQL: " . mysqli_connect_error();
       }

       $sql = "CREATE TABLE IF NOT EXISTS users.registers(
           id int primary key AUTO_INCREMENT,
           name varchar(50) NOT NULL,
           surname varchar(50) not null,
           username varchar(50) not null,
           email varchar(50) not null,
           pass varchar(50) not null
           );";
       if (!mysqli_query($mysql, $sql)) {
           echo "Error creating table client: " . mysqli_error($mysql);
       }    
       
       mysqli_close($mysql);
   }

   public function registerUser($name, $surname, $username, $email, $password ){
    $sql = new MySQLi("localhost" , "root", "1993" , "users");

    $sql->query("INSERT INTO registers (name,surname,username,email,pass) VALUES('$name','$surname','$username','$email','$password');");
        if(!$sql)
        {
            include('view/error.htm');
        }
        else
        {
            include('view/home.htm');
        }
    mysqli_close($sql);
    }

    public function login($username, $pass){

    if($username != 1 && $pass != 1){
        $sql = new MySQLi("localhost" , "root", "1993" , "users");
        $result = $sql->query("SELECT `id`,`email`,`username`,`pass` FROM `registers` WHERE (`username` = '$username' OR email = '$username') AND pass='$pass';");
        
        if(!$sql)
            {
                die("Connection failed : " . mysqli_connect_error());
            }
            else
            {
            $a = $result->fetch_assoc();
                if($a){
                    $_SESSION['username'] = $a['username'];
                    $_SESSION['id'] = $a['id'];
                    return json_encode(array("error" => 0));
                }
                else{
                    return json_encode(array("error" => 1));
                }
            }
            mysqli_close($sql);
    }
    else{
        $_SESSION['id'] = -1;
        $_SESSION['username'] = "guest_".rand(1000, 10000);
        return json_encode(array("error" => 0));
    }
    }

    public function logout(){   
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        session_destroy();
    }
}
