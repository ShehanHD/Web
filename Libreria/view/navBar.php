<header id="home">
        <div class="navbar-fixed">
            <nav class="nav-wrapper indigo">
                <div class="container">
                    <a href="#home" class="brand-logo">Book Shop</a>
                    
                    <a href="" class="sidenav-trigger" data-target="mobile-menu">
                        <i class="material-icons">menu</i>
                    </a>



                    <!-- Normal -->
                    <ul class="right hide-on-med-and-down">
                        <li><a href="#home" class="white-text">Home</a></li>
                        <li><a href="#catagories" class="white-text dropdown-trigger" data-target='dropdown1'>Catagories</a></li>
                        <li><a href="#login" class="white-text modal-trigger">Login</a></li>
                        <li><a href="#register" class="white-text modal-trigger">Register</a></li>
                        <li><a href="#feedback" class="btn-floating indigo">
                            <i href="#carello" class="material-icons white-text left modal-trigger">shopping_cart</i>
                        </a></li>
                    </ul>
                    <ul id='dropdown1' class='dropdown-content dropdown-my'>
                        <li><a href="" class="selectCat">Achitettura e urbanistica</a></li>
                        <li><a href="" class="selectCat">Arte</a></li>
                        <li><a href="" class="selectCat">Classici Greci e Latini</a></li>
                        <li><a href="" class="selectCat">Cucina e casa</a></li>
                        <li><a href="" class="selectCat">Diritto</a></li>
                        <li><a href="" class="selectCat">Economia e management</a></li>
                        <li><a href="" class="selectCat">Fantascienza e fantasy</a></li>
                        <li><a href="" class="selectCat">Filosofia</a></li>
                        <li><a href="" class="selectCat">Fumetti</a></li>
                    </ul>
                    <!-- ------- -->


                    <!-- mobile -->
                    <ul class="sidenav indigo darken-3" id="mobile-menu">
                        <li>
                            <div class="user-view">
                                <div class="background">
                                    <img src="https://images.unsplash.com/photo-1494548162494-384bba4ab999?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80">
                                </div>
                                <a href="#user"><img class="circle" src="https://image.shutterstock.com/image-vector/user-icon-trendy-flat-style-260nw-418179856.jpg"></a>
                                <a href="#name"><span class="white-text name">pippo</span></a>
                                <a href="#email"><span class="white-text email">blaba@gmail.com</span></a>
                            </div>
                        </li>
                        <li><a href="#home" class="white-text waves-effect">Home</a></li>
                        <li><a href="#catagories" class="white-text dropdown-trigger waves-effect" data-target='dropdown2'>Catagories</a></li>
                        <li><a href="#login" class="white-text waves-effect modal-trigger">Login</a></li>
                        <li><a href="#register" class="white-text waves-effect modal-trigger">Register</a></li>
                        <li><a href="#feedback" class="white-text waves-effect modal-trigger">
                            <i href="#carello" class="material-icons white-text left modal-trigger">shopping_cart</i>Shopping Cart
                        </a></li>
                    </ul>
                    <!-- ------- -->
                    <ul id='dropdown2' class='dropdown-content'>
                        <li><a href="" class="selectCat">Achitettura e urbanistica</a></li>
                        <li><a href="" class="selectCat">Arte</a></li>
                        <li><a href="" class="selectCat">Classici Greci e Latini</a></li>
                        <li><a href="" class="selectCat">Cucina e casa</a></li>
                        <li><a href="" class="selectCat">Diritto</a></li>
                        <li><a href="" class="selectCat">Economia e management</a></li>
                        <li><a href="" class="selectCat">Fantascienza e fantasy</a></li>
                        <li><a href="" class="selectCat">Filosofia</a></li>
                        <li><a href="" class="selectCat">Fumetti</a></li>
                    </ul>
                
                
                
                </div>
            </nav>
        </div>
    </header>

    <?php include_once("loginNRegis.php") ?>
    <?php include_once("carello.php") ?>