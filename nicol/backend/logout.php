<?php
session_start();

unset($_SESSION['user']);
unset($_SESSION['admin']);
unset($_SESSION['name']);
unset($_SESSION['idu']);

header('location:../index.php');      