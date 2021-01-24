<?php
    require('./validator.php'); 

    if (isset($_POST['submit'])) {
        $val = new Validate($_POST);
        $errors = $val->validateForm();
    }

    function printTable(){
        $obj = json_decode($_COOKIE["data"]);

        foreach ($obj as $i) {
            echo "<tr class='my' onclick='del(".$i->id.")'>";
                echo "<td>".$i->name."</td>";
                echo "<td>".$i->surname."</td>";
                echo "<td>".$i->email."</td>";
                echo "<td>".$i->gender."</td>";
                echo "<td>".$i->country."</td>";
                echo "<td>".$i->pass."</td>";
                echo "<td>".$i->re_pass."</td>";
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
    <link rel="stylesheet" href="index.css">
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
            <input type="text" id="name" name="name" value="<?php echo isset($errors) ? htmlspecialchars($_POST['name']) : '';?>" class="validate">
            <div class="err"><?php echo $errors['name'] ?? '' ?></div>
            <label for="name">Nome</label>
            </div>
            <div class="input-field">
            <input type="text" id="surname" name="surname" value="<?php echo isset($errors) ? htmlspecialchars($_POST['surname']) : '' ?>" class="validate">
            <div class="err"><?php echo $errors['surname'] ?? '' ?></div>
            <label for="surname">Cognome</label>
            </div>
            <p>
                <label>
                    <input name="gender" type="radio" value="male" checked />
                    <span>Maschio</span>
                </label>
            </p>
            <p>
                <label>
                    <input name="gender" type="radio" value="female"/>
                    <span>Fammina</span>
                </label>
            </p>
            <div class="input-field">
                <input type="text" list="country" name="country" id="inCountry" value="<?php echo isset($errors) ? htmlspecialchars($_POST['email']) : '' ?>" class="validate">
                <div class="err"><?php echo $errors['country'] ?? '' ?></div>
                <label for="country" data-error="wrong" data-success="right">Paese</label>
                <datalist id="country">
                </datalist>
            </div>
            <div class="input-field">
                <input type="email" id="email" name="email" value="<?php echo isset($errors) ? htmlspecialchars($_POST['email']) : '' ?>" class="validate">
                <div class="err"><?php echo $errors['email'] ?? '' ?></div>
                <label for="email" data-error="wrong" data-success="right">Email</label>
            </div>
            <div class="input-field">
                <input type="text" id="pass" name="pass" value="<?php echo isset($errors) ? htmlspecialchars($_POST['pass']) : '' ?>" class="validate">
                <label for="pass">Password</label>
            </div>
            <div class="input-field">
                <input type="text" id="re_pass" name="re_pass" value="<?php echo isset($errors) ? htmlspecialchars($_POST['re_pass']) : '' ?>" class="validate">
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

        <h5 class="center-align red-text">Per eleminare clicchi sul elemento</h5>
        <table>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>E-mail</th>
                <th>Sesso</th>
                <th>Paese</th>
                <th>Password</th>
                <th>Re_Password</th>
            </tr>
            <?php
                if (isset($_POST['print'])) {
                    if(isset($_COOKIE["data"])){
                        printTable();
                    }
                    else{
                        echo "<th colspan=5 class='center-align'>Non c'è nessun dato</th>";
                    }
                }            
            ?>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="cookie.js"></script>
</body>
</html>