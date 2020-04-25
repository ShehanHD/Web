<?php
    require('./validator.php');

    if (isset($_POST['submit'])) {
        $val = new Validate($_POST);

        $errors = $val->validateForm();
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
            <div class="input-field col s12 l6">
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($_POST['name']) ?>" class="validate">
            <div class="err"><?php echo $errors['name'] ?? '' ?></div>
            <label for="name">Name</label>
            </div>
            <div class="input-field col s12">
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?>" class="validate">
            <div class="err"><?php echo $errors['email'] ?? '' ?></div>
            <label for="email" data-error="wrong" data-success="right">Email</label>
            </div>
            <button style="width: 100%" class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</body>
</html>