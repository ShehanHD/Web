<?php
    require('./validator.php');

    if (isset($_POST['submit'])) {
        $val = new Validate($_POST);

        $errors = $val->validateForm();
    }

    function printTable(){
        $obj = json_decode($_COOKIE["data"]);

        foreach ($obj as $i) {
            echo "<tr>";
            foreach ((array)$i as $x){
                echo "<td>".$x."</td>";
            }
            echo "</tr>";
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
    <title>PHP_FORM</title>
    <style>
        .err{
            color: red;
            font-size: 80%;
            text-align: center
        }
    </style>
</head>
<body>
    <div style="padding: 5%" class="container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="input-field">
            <input type="text" id="name" name="name" value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';?>" class="validate">
            <div class="err"><?php echo $errors['name'] ?? '' ?></div>
            <label for="name">Nome</label>
            </div>
            <div class="input-field">
            <input type="text" id="surname" name="surname" value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : '' ?>" class="validate">
            <div class="err"><?php echo $errors['surname'] ?? '' ?></div>
            <label for="surname">Cognome</label>
            </div>
            <div class="input-field">
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" class="validate">
            <div class="err"><?php echo $errors['email'] ?? '' ?></div>
            <label for="email" data-error="wrong" data-success="right">Email</label>
            </div>
            <div class="input-field">
            <input type="text" id="pass" name="pass" value="<?php echo isset($_POST['pass']) ? htmlspecialchars($_POST['pass']) : '' ?>" class="validate">
            <label for="pass">Password</label>
            </div>
            <div class="input-field">
            <input type="text" id="re_pass" name="re_pass" value="<?php echo isset($_POST['re_pass']) ? htmlspecialchars($_POST['re_pass']) : '' ?>" class="validate">
            <div class="err"><?php echo $errors['pass'] ?? '' ?></div>
            <label for="re_pass">Repeti Password</label>
            </div>
            <button style="width: 100%" class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
        </form>
    </div>

    <div style="padding: 5%" class="container">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <button style="width: 100%" class="btn indigo waves-effect waves-light" type="submit" name="print">Print</button>
        </form>

        <table>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Re_Password</th>
            </tr>
            <?php
                if (isset($_POST['print'])) {
                if(isset($_COOKIE["data"])){
                    printTable();
                }
            }            
            ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</body>
</html>