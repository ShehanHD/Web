<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>

<body>

    <nav class="indigo">
    <div class="nav-wrapper container">
        <a href="#" class="brand-logo left">LOGO</a>
        <ul class="right">
            <li><a href="#menu">Show Menu</a></li>
            <li><a class="modal-trigger" href="#addFood">Add Food</a></li>
            <li><a class="modal-trigger" href="#delFood" onclick="printMenu(menu, 'delMenu')">Delete Food</a></li>
            <li><a class="modal-trigger" href="#editFood">Edit Food</a></li>
            <li><a class="btn-floating indigo darken-2 modal-trigger" href="#cart"><i href="#carello" class="material-icons white-text left">shopping_cart</i></a></li>
        </ul>
    </div>
    </nav>

    <div id="cart" class="modal">
    <div class="modal-content">
        <h1>Cart</h1>
        <ul class="collection" id="ilCarello">
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
                <button type="submit" style="width: 100%;" class="btn-small indigo waves-effect waves-light" id="submit-addFood">Add</button>
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
                <button style="width: 100%;" type="submit" class="btn-small indigo waves-effect waves-light" id="submit-editFood">EDIT</button>
            </div>
        </form>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script src="./index.js"></script>

    <script>
        $(document).ready(function(){
            $('.modal').modal();
        });
    </script>
</body>

</html>