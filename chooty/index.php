<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Metal+Mania&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="navbar-fixed">
            <nav class="grey darken-4">
                <div class="nav-wrapper container">
                    <a href="#" class="brand-logo left Metal">Pizza Delivery</a>
                    <ul class="right">
                        <li><a href="#menu">Show Menu</a></li>
                        <?php
                        if (isset($_SESSION['admin'])) {
                        ?>
                            <li><a class="modal-trigger" href="#addFood">Add Food</a></li>
                            <li><a class="modal-trigger" href="#delFood" onclick="printMenu(menu, 'delMenu')">Delete Food</a></li>
                            <li><a class="modal-trigger" href="#editFood">Edit Food</a></li>
                            <li class="red darken-4"><a id="logout">Logout</a></li>
                        <?php
                        } elseif (isset($_SESSION['mail'])) {
                        ?>
                            <li class="red darken-4"><a id="logout">Logout</a></li>
                        <?php
                        } else { ?>
                            <li><a class="modal-trigger" href="#login">Login</a></li>
                            <li><a class="modal-trigger" href="#regis">registration</a></li>
                        <?php
                        }
                        ?>
                        <li><a id="cart1" class="btn-floating grey darken-2 modal-trigger" href="#cart"><i href="#carello" class="material-icons white-text left">shopping_cart</i></a><span class="new badge red newCus" id="badge">0</span></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div id="cart" class="modal">
        <div class="modal-content">
            <h1>Cart</h1>
            <h5 id="cost"></h5>
            <ul class="collection" id="ilCarello"></ul>
            <div class="input-field center">
                <button type="submit" style="width: 100%;" class="btn-small disabled indigo waves-effect waves-light" id="submit-order">Order</button>
            </div>
        </div>
    </div>

    <div class="container center-align" id="menu">
        <h1>IL MENU</h1>

        <ul class="collection" id="ilMenu">

        </ul>
    </div>

    <div class="modal" id="addFood">
        <div class="modal-content container">
            <h1>Add Food</h1>
            <form>
                <div class="input-field col s12 l6">
                    <input type="text" id="tipo" class="validate">
                    <label for="tipo">Tipo</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="ingre" class="materialize-textarea"></textarea>
                    <label for="ingre">Ingredienti</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="number" id="prezzo" class="validate">
                    <label for="prezzo">Prezzo</label>
                </div>
                <div class="input-field center">
                    <button type="submit" style="width: 100%;" class="btn-small red darken-4 waves-effect waves-light" id="submit-addFood">Add</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="delFood">
        <div class="modal-content container">
            <h1>Delete Food</h1>

            <ul class="collection" id="delMenu">
        </div>
    </div>

    <div class="modal" id="editFood">
        <div class="modal-content container">
            <h1>Edit Food</h1>
            <form>
                <div class="input-field col s12 l6">
                    <input type="text" id="tipo-edit" class="validate">
                    <label for="tipo-edit">Tipo</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="ingre-edit" class="materialize-textarea"></textarea>
                    <label for="ingre-edit">Ingredienti</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="number" id="prezzo-edit" class="validate">
                    <label for="prezzo-edit">Prezzo</label>
                </div>
                <div class="input-field center">
                    <button style="width: 100%;" type="submit" class="btn-small red darken-4 waves-effect waves-light" id="submit-editFood">EDIT</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal" id="login">
        <div class="modal-content container">
            <h1>LOGIN</h1>
            <form>
                <div class="input-field col s12 l6">
                    <input type="email" id="mail" class="validate">
                    <label for="mail">Mail</label>
                </div>
                <div class="input-field col s12">
                    <input type="password" id="PASSWORD" class="validate">
                    <label for="PASSWORD">Password</label>
                </div>
                <div class="input-field center">
                    <button style="width: 100%;" type="submit" class="btn-small red darken-4 waves-effect waves-light" id="submit-login">Login</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" id="regis">
        <div class="modal-content container">
            <h1>Registration</h1>
            <form>
                <div class="input-field col s12 l6">
                    <input type="text" id="regis-nome" class="validate">
                    <label for="regis-nome">Name</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="text" id="regis-cognome" class="validate">
                    <label for="regis-cognome">Surname</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="text" id="regis-indirizzo" class="validate">
                    <label for="regis-indirizzo">Address</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="text" id="regis-citta" class="validate">
                    <label for="regis-citta">City</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="text" id="regis-cappa" class="validate">
                    <label for="regis-cappa">CAP</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="text" id="regis-telefono" class="validate">
                    <label for="regis-telefono">Telefono</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="email" id="regis-mail" class="validate">
                    <label for="regis-mail">Mail</label>
                </div>
                <div class="input-field col s12 l6">
                    <input type="password" id="regis-PASSWORD" class="validate">
                    <label for="regis-PASSWORD">Password</label>
                </div>
                <div class="input-field center">
                    <button style="width: 100%;" type="submit" class="btn-small red darken-4 waves-effect waves-light" id="submit-regis">Registration</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="./index.js"></script>

    <script>
        $(document).ready(function() {
            $('.modal').modal();
        });
    </script>

    <?php
    if (isset($_SESSION['admin'])) {
    ?>
        <script>
            setList(false);
            printFromDB();
        </script>
    <?php
    }
    if (isset($_SESSION['mail'])) {
    ?>
        <script>
            setList(true);
            printFromDB();
        </script>
    <?php
    } else {
    ?>
        <script>
            setList(false);
        </script>
    <?php
    }
    ?>

</body>

</html>