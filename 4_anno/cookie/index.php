<?php
    if(isset($_POST['submit'])){
        $name = "Name";
        $val = isset($_COOKIE[$name]) ? $_COOKIE[$name].",".$_POST['name'] : $_POST['name'];

        setcookie($name, $val , time() + (3600), "/");    
    }

    function printCookie(){
        $names = isset($_COOKIE["Name"]) ? explode(",",$_COOKIE["Name"]) : [];

        foreach ($names as $i) {
            echo "<p>$i</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="input-field">
            <input type="text" id="name" name="name" class="validate" required>
            <label for="name">Nome</label>
            </div>
            <button style="width: 100%" class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
        </form>
    </div>

    <div class="container">
        <?php
            printCookie();
        ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

</body>
</html>