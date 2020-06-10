<?php
session_start();

print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/index.css">
    <title>TwentyOne</title>
</head>

<body>
    <header id="home">
        <div class="navbar-fixed">
            <nav class="black">
                <div class="nav-wrapper container">
                <a href="#home" class="brand-logo red waves-effect waves-light">TO</a>
                    <ul id="nav-mobile" class="right">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#Offerte">Offerte</a></li>
                        <li><a href="#Chisiamo">Chi siamo</a></li>

                        <?php 
                        if(isset($_SESSION['user'])){
                        ?>
                            <li><a href="./backend/logout.php" class="red">LOGOUT</a></li>
                        <?php
                        }
                        elseif(isset($_SESSION['admin'])){
                        ?>
                            <li><a class="modal-trigger green-text" href="#Add">Add</a></li>
                            <li><a class="modal-trigger blue-text" href="#Edit">Edit</a></li>
                            <li><a class="modal-trigger red-text" href="#Delete">Delete</a></li>
                            <li><a href="./backend/logout.php" class="red">LOGOUT</a></li>
                        <?php
                        }
                        else{
                        ?>
                            <li><a class="modal-trigger" href="#Accedi">Accedi</a></li>
                            <li><a class="modal-trigger" href="#Registrati">Registrati</a></li>
                        <?php
                        }
                        ?>
                        <li><a class="btn-floating red accent-3 modal-trigger" href="#Carrello"><i class="material-icons">shopping_cart</i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="modal center-align" id="Accedi">
        <h2>Accedi</h2>

        <div class="row container">
            <form action="./backend/Accedi.php" method="post">
                <div class="input-field s12">
                    <input id="Username" name="Username" type="text" class="validate">
                    <label class="active" for="Username">Username</label>
                </div>
                <div class="input-field s12">
                    <input id="Password" name="Password" type="password" class="validate">
                    <label class="active" for="Password">Password</label>
                </div>
                <div class="input-field center">
                    <button type="submit" style="width: 100%;" class="btn-small red waves-effect waves-light" id="submit-login">ACCEDI</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal center-align" id="contratto">
        <h1>Contratto</h1>
    </div>

    <div class="modal center-align" id="Registrati">
        <h2>Registrati</h2>

        <div class="row container">
            <form action="./backend/Registrati.php" method="post">
                <div class="input-field s12">
                    <input id="Nome" name="Nome" type="text" class="validate" required>
                    <label class="active" for="Nome">Nome</label>
                </div>
                <div class="input-field s12">
                    <input id="Cognome" name="Cognome" type="text" class="validate">
                    <label class="active" for="Cognome">Cognome</label>
                </div>
                <div class="input-field s12">
                    <input id="DatadiNascita" name="DatadiNascita" type="text" class="validate">
                    <label class="active" for="DatadiNascita">Data di Nascita</label>
                </div>
                <div class="input-field s12">
                    <input id="CodiceFiscale" name="CodiceFiscale" type="text" class="validate">
                    <label class="active" for="CodiceFiscale">Codice Fiscale</label>
                </div>
                <div class="input-field s12">
                    <input id="Indirizzo" name="Indirizzo" type="text" class="validate">
                    <label class="active" for="Indirizzo">Indirizzo</label>
                </div>
                <div class="input-field s12">
                    <input id="Cap" name="Cap" type="text" class="validate">
                    <label class="active" for="Cap">Cap</label>
                </div>
                <div class="input-field s12">
                    <input id="Città" name="Città" type="text" class="validate">
                    <label class="active" for="Città">Città</label>
                </div>
                <div class="input-field s12">
                    <input id="Paese" name="Paese" type="text" class="validate">
                    <label class="active" for="Paese">Paese</label>
                </div>
                <div class="input-field s12">
                    <input id="NumerodiTelefono" name="NumerodiTelefono" type="text" class="validate">
                    <label class="active" for="NumerodiTelefono">Numero di Telefono</label>
                </div>
                <div class="input-field s12">
                    <input id="Email" name="Email" type="email" class="validate" required>
                    <label class="active" for="Email">Email</label>
                </div>
                <div class="input-field s12">
                    <input id="Username" name="Username" type="text" class="validate">
                    <label class="active" for="Username">Username</label>
                </div>
                <div class="input-field s12">
                    <input id="Password" name="Password" type="Password" class="validate">
                    <label class="active" for="Password">Password</label>
                </div>
                <div class="input-field s12">
                    <input id="RepeatPassword" name="RepeatPassword" type="Password" class="validate">
                    <label class="active" for="RepeatPassword">Conferma Password</label>
                </div>
                <div class="input-field center">
                    <button type="submit" style="width: 100%;" class="btn-small red waves-effect waves-light" id="submit-login">REGISTRATI</button>
                </div>
            </form>
        </div>
    </div>

    <?php include_once("./frontend/stampaCarrello.php"); ?>

    <div class="center-align grey darken-3 white-text sticky">
        <h6><?php 
            if(isset($_SESSION['name'])){
            echo "Benvenuto ".$_SESSION['name']; 
            }
            else{
                echo "Benvenuto Guest".rand(0000, 9999);
            }
        ?></h6>
    </div>

    <?php include_once("./frontend/creditoResiduo.php"); ?>

    <article id="Offerte" style="padding: 2%;" class="container">
        <h4>Offerte</h4>
        <div class="row">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="./immagini/5.jpg">
                        <span class="card-title">TW a 5,99€</span>
                        <a class="btn-floating halfway-fab waves-effect waves-light red accent-3" href="./backend/carello.php?id=1"><i class="material-icons">add_shopping_cart</i></a>
                    </div>
                    <div class="card-content">
                        <p> - Offerta per i clienti Poste Mobile, Fastweb, Coopvoce, LycaMobile.</p>
                        <p> - 30 Giga, minuti illimitati e sms illimitati.</p> 
                        <p> - SIM e attivazione a soli 5,00€.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="./immagini/8.jpg">
                        <span class="card-title">TW a 4,99€</span>
                        <a class="btn-floating halfway-fab waves-effect waves-light red accent-3" href="./backend/carello.php?id=2"><i class="material-icons">add_shopping_cart</i></a>
                    </div>
                    <div class="card-content">
                        <p> - Offerta per i nuovi numeri.</p>
                        <p> - 30 Giga, minuti illimitati e sms illimitati.</p> 
                        <p> - SIM e attivazione a soli 5,00€.</p>
                    </div>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="./immagini/10.jpg">
                        <span class="card-title">TW a 10,99€</span>
                        <a class="btn-floating halfway-fab waves-effect waves-light red accent-3" href="./backend/carello.php?id=3"><i class="material-icons">add_shopping_cart</i></a>
                    </div>
                    <div class="card-content">
                        <p> - Offerta per i clienti Tim, Vodafone, Iliad, Wind, Kena Mobile, ho.</p>
                        <p> - 30 Giga, minuti illimitati e sms illimitati.</p>
                        <p> - SIM e attivazione a soli 5,00€.</p>
                    </div>
                </div>
            </div>
    </article>

    <article class="container" id="Chisiamo">
        <div style="padding: 2%;">
            <h3>Chi siamo</h3>

                <p><b> TwentyOne </b> è un brand di Wind Tre S.p.A quindi contiamo su una rete mobile di ultima generazione, infatti si appoggia alla rete mobile 4G di Wind che copre il 99% del territorio nazione italiano.</p>
                <p> Siamo un operatore mobile low-cost che nacque nel 2020, pensando a tutti coloro che sono alla ricerca di un piano tarrifario che offra il meglio a un prezzo accessibile per tutte le tasche degli italiani.
                Noi lavoriamo ogni giorno per offrirvi offerte <b>chiare, convenienti e uniche.</b> </p>
            </div>
    </article>

    <article class="container" id="Contattaci">
        <div style="padding: 2%;">
            <h3>Contattaci</h3>
            <p>- Telefono (Dal lunedì al venerdì dalle 8 alle 20, il sabato e la domenica e i festivi dalle 9 alle 19).</p>
            <p>- Assistenza telefonica <b>121.</b></p>
            <p>- Dalla tua linea mobile TW: incluso già nella tua oferta.</p>
            <p>- Da un altro numero: fai riferimento al piano tariffario del tuo operatore.</p>
        </div>
    </article>

    <!-- footer -->
    <footer class="page-footer black lighten-1 scrollspy">
        <div class="container">
            <div class="row">
                <div class="col s6">
                    <h5>I nostri social</h5>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-facebook-f"></i>
                </div>
                <div class="col s6">
                    <ul>
                        <li>
                            <h5>Per avere più informazioni:</h5>
                        </li>
                        <li>E-mail: <a href="mailto: tw21@gmail.com">tw21@gmail.com</a></li>
                        <li>Numero di Telefono: <a href="tel:+393424153454">+393424153454</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright grey darken-3">
            <div class="container center-align">&copy; 2020 TwentyOne</div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./JS/mate.js"></script>
</body>

</html>