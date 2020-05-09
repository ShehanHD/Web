<?php
$host = 'localhost';
$user = "root";
$password = "";
$dbname = "libreria";


$dsn = 'mysql:host='.$host.';dbname='.$dbname;

$pdo = new PDO($dsn, $user, $password);

// $stmt = $pdo->query('SELECT * from libri');

// with setAttribute()
// while($x = $stmt->fetch()){
//     echo $x['titolo']."<br>";
// }

// without setAttribute()
// while($x = $stmt->fetch(PDO::FETCH_OBJ)){
//     echo $x['titolo']."<br>";
// }
//! set attribute
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

//! PREPARED STATEMENT

$a = 3;

// $sql = SELECT * from ?'; or derectly in prepare()
// $stmt = $pdo->prepare('SELECT * from libri WHERE ?');
// $stmt->execute([$a]);
$stmt = $pdo->prepare('SELECT * from libri WHERE id_libro =:id');
$stmt->execute([':id' => $a]);
$x = $stmt->fetch();
print_r($x);
