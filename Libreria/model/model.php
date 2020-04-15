<?php

class gioco{
    private $connection;

    public function __construct() {
        $this->connection = new MySQLi("localhost" , "root", "", "libreria")  or die(mysqli_connect_error());
    }


}