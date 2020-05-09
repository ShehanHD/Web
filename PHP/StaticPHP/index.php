<?php
include_once("./class.php");
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
    $obj = new Test();
    $obj2 = new Figlio();
    echo "<p>".$obj->print()."</p>";
    echo "<p>".$obj->innerStaticPrint()."</p>";
    echo "<p>".$obj2->printFiglio()."</p>";
    // echo "<p>"Test::printStatic()."</p>"; //adesso questo protetto quindi non posso accedere direttamente
?>
</body>
</html>