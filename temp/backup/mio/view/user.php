<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="lib/js/user.js"></script>
    <link rel="stylesheet" href="lib/css/user.css">
</head>
<body>
    <div class="user">
        <div class="face login-card">
            <h1>Login</h1>
            <form class="form" style="margin-top: 10%;">
                <input class="inputs" type="text" name="userLog" id="userLogin" placeholder="Username or E-mail">
                <span class="err" id="errUserLogin"></span>
                <input class="inputs" type="password" name="passwordLog" id="passwordLogin" placeholder="Password">
                <span class="err" id="errPasswordLogin"></span>
                <input class="button" type="button" id="login" value="Login">
                <input class="button" type="button" id="loginGuest" value="Login as Guest">
            </form>
            <p class="toggle">to Register click here!</p>
        </div>
        
        <div class="face register-card">
            <h1>Register</h1>
            <form id="formRegister" class="form">
                <input class="inputs" type="text" name="name" id="name" placeholder="Name">
                <span class="err" id="errName"></span>
                <input class="inputs" type="text" name="surname" id="surname" placeholder="Surname">
                <span class="err" id="errSurname"></span>
                <input class="inputs" type="text" name="username" id="username" placeholder="Username">
                <span class="err" id="errUsername"></span>
                <input class="inputs" type="email" name="email" id="email" placeholder="Email">
                <span class="err" id="errEmail"></span>
                <input class="inputs" type="password" name="password" id="password" placeholder="Password">
                <input class="inputs" type="password" name="repeatPassword" id="repeatPassword" placeholder="Repeat Password">
                <span class="err" id="errPassword"></span>
                <input class="button" type="button" id="register" value="Register">
            </form>
            <p class="toggle">to Login click here!</p>
        </div>
    </div>
</body>
</html>