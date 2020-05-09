<?php
include_once('./src/class1/class.php');
include_once('./src/class1/subClass1/class.php');
include_once('./src/main.php');

use class1\myMainClass as test;
use class1\subClass1\mySubClass as sub;
use main\myMainClass as myMain;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo "<h2>From the class folder</h2><p>".class1\myMainClass::MY_STRING."</p>";
echo "<p>".test::MY_STRING."</p>";
$obj = new test();
echo $obj->f1();

echo "<h2>From the sub class folder</h2><p>".class1\subClass1\mySubClass::MY_STRING."</p>";
echo "<p>".sub::MY_STRING."</p>";

$main = new myMain();
echo "<h2>From the main file</h2><p>".$main->call()."</p>";
?>
</body>
</html>