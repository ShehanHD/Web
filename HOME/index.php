<?php
session_start();

if($_SESSION['user'] !== "user"){

 $_SESSION['user'] = "user";

 $utenti = 1;
 $ip = $_SERVER['REMOTE_ADDR'];
 $brow = $_SERVER['HTTP_USER_AGENT'];
 $date = date("Y m d H:m:s");
 

 $count = fopen("log/count.txt","r");
    if(!$count){
        $fp = fopen("log/count.txt","w");
        fclose($fp);
    }
    else{
        fscanf($count,"%d",$utenti);
    }
 fclose($count);

 $_SESSION['count'] = $utenti+1;

 $fp = fopen("log/log.csv","a");
 $count = fopen("log/count.txt","w");
 
    fprintf($count,"%d",($utenti+1));
    fputcsv($fp,array($ip, $brow, $date));

 fclose($count);
 fclose($fp);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=.7, minimum-scale=.5, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Lobster|Pacifico|Satisfy|Teko|Michroma&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <script src="lib/javaScript/bootstrap.js"></script>
    <link rel="stylesheet" href="lib/styles/bootstrap.css" media="screen">
    <link rel="stylesheet" href="lib/styles/custom.css" media="screen">
   
    <script>
    $(window).on('load',function(){
        $(".preloader").addClass("complete");
        $(".loader").addClass("complete");
        $(".loader2").addClass("complete");
    });
    </script>

    <script>
    var nua = navigator.userAgent;
    var is_android = ((nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1) && !(nua.indexOf('Chrome') > -1));
        
    if(is_android) {
            $('select.form-control').removeClass('form-control').css('width', '100%');

    }
    </script>
    
    <title>WECode</title>
</head>
<body class="container-fluid body">

<!-- preloader-->
<div class="preloader"></div>
<div class="loader"></div>
<div class="loader2"></div>
<!-- Picture Slide -->    
<div id="carouselExampleIndicators" style="height:30%" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/first.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
    <img class="d-block w-100" src="img/second.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/third.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- End of picture slide -->

<!-- nav bar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary mb-3">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link menu" id="menuHome" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-home">Home</i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link menu" id="menuMaterial" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">Materials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link menu" id="menuProjects" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">My Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link menu" id="menuTask" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">School Tasks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link menu bg-info" id="arduino" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-microchip"></i> Arduino</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control form-control-sm mr-sm-2 rounded-pill" type="text" placeholder="Search" disabled>
      <button class="btn btn-sm btn-secondary my-2 my-sm-0 rounded-pill" type="submit" disabled><i class="fas fa-search"> Search</i></button>
    </form>
  </div>
</nav>
<!-- end of nav bar -->


<div  id="first">
<!-- Materials we studies -->
    <h1 id="materials" class="mb-4" style="text-align: center;font-family: 'Teko', cursive; font-size:500%; color: aqua;">The Materials that we studied</h1>

    <!-- HTML -->
    <div class="row container d-flex p-2 m-auto">
        <div class="col-3">
        <img class="d-block w-100" src="img/html.jpg" style="border-radius: 40px;">
        </div>
        <div class="col border ml-2 description mb-2 overflow-auto" style="border-radius: 40px; height: 250px;">
        <h3 style="text-align: center; color: aqua;">HTML</h3>
        <p class="mt-3"><b>Hypertext Markup Language (HTML)</b> is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.</p>

        <p>Web browsers receive HTML documents from a web server or from local storage and render the documents into multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for the appearance of the document.</p>
        </div>
    </div>

    <!-- java script -->
    <div class="row container d-flex p-2 m-auto">
        <div class="col-3">
        <img class="d-block w-100" src="img/js.png" style="border-radius: 40px;">
        </div>
        <div class="col border ml-2 description mb-2 overflow-auto" style="border-radius: 40px; height: 250px;">
        <h3 style="text-align: center; color: aqua;">Java Script</h3>
        <p class="mt-1"><b>JavaScript</b>, often abbreviated as <b>JS</b>, is a high-level, interpreted programming language that conforms to the ECMAScript specification. JavaScript has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions. Alongside HTML and CSS, JavaScript is one of the core technologies of the World Wide Web. JavaScript enables interactive web pages and is an essential part of web applications. The vast majority of websites use it, and major web browsers have a dedicated JavaScript engine to execute it.</p>

        <p>As a multi-paradigm language, JavaScript supports event-driven, functional, and imperative (including object-oriented and prototype-based) programming styles. It has APIs for working with text, arrays, dates, regular expressions, and the DOM, but the language itself does not include any I/O, such as networking, storage, or graphics facilities.</p>
        </div>
    </div>

    <!-- CSS -->
    <div class="row container d-flex p-2 m-auto">
        <div class="col-3">
        <img class="d-block w-100" src="img/css.png" style="border-radius: 40px;">
        </div>
        <div class="col border ml-2 description mb-2 overflow-auto" style="border-radius: 40px; height: 250px;">
        <h3 style="text-align: center; color: aqua;">CSS</h3>
        <p class="mt-3"><b>Cascading Style Sheets (CSS)</b> is a style sheet language used for describing the presentation of a document written in a markup language like HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.</p>

        <p>CSS is designed to enable the separation of presentation and content, including layout, colors, and fonts. This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple web pages to share formatting by specifying the relevant CSS in a separate .css file, and reduce complexity and repetition in the structural content.</p>
        </div>
    </div>

    <!-- PHP -->
    <div class="row container d-flex p-2 m-auto">
        <div class="col-3">
        <img class="d-block w-100" src="img/php.png" style="border-radius: 40px;">
        </div>
        <div class="col border ml-2 description mb-2 overflow-auto" style="border-radius: 40px; height: 250px;">
        <h3 style="text-align: center; color: aqua;">PHP</h3>
        <p class="mt-3"><b>PHP: Hypertext Preprocessor (or simply PHP)</b> is a general-purpose programming language originally designed for web development.</p>
        <p>PHP code may be executed with a command line interface (CLI), embedded into HTML code, or it can be used in combination with various web template systems, web content management systems, and web frameworks. PHP code is usually processed by a PHP interpreter implemented as a module in a web server or as a Common Gateway Interface (CGI) executable. The web server combines the results of the interpreted and executed PHP code, which may be any type of data, including images, with the generated web page. PHP can be used for many programming tasks outside of the web context, such as standalone graphical applications and robotic drone control.</p>
        </div>
    </div>

       <!-- C -->
    <div class="row container d-flex p-2 m-auto">
        <div class="col-3">
        <img class="d-block w-100" src="img/c.png" style="border-radius: 40px;">
        </div>
        <div class="col border ml-2 description mb-2 overflow-auto" style="border-radius: 40px; height: 250px;">
        <h3 style="text-align: center; color: aqua;">C</h3>
        <p class="mt-3"><b>C</b> is a general-purpose, imperative computer programming language supporting structured programming, lexical variable scope, and recursion, while a static type system prevents unintended operations. By design, C provides constructs that map efficiently to typical machine instructions, and has found lasting use in applications previously coded in assembly language. Such applications include operating systems, as well as various application software for computers ranging from supercomputers to embedded systems.</p>
        <p>C is an imperative procedural language. It was designed to be compiled using a relatively straightforward compiler, to provide low-level access to memory, to provide language constructs that map efficiently to machine instructions, and to require minimal runtime support. Despite its low-level capabilities, the language was designed to encourage cross-platform programming. A standards-compliant C program that is written with portability in mind can be compiled for a wide variety of computer platforms and operating systems with few changes to its source code; the language has become available on various platforms, from embedded microcontrollers to supercomputers.</p>
        </div>
    </div>

       <!-- C++ -->
    <div class="row container d-flex p-2 m-auto">
        <div class="col-3">
        <img class="d-block w-100" src="img/cpp.png" style="border-radius: 40px;">
        </div>
        <div class="col border ml-2 description mb-2 overflow-auto" style="border-radius: 40px; height: 250px;">
        <h3 style="text-align: center; color: aqua;">C++</h3>
        <p class="mt-3"><b>C++</b> is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or "C with Classes". The language has expanded significantly over time, and modern C++ has object-oriented, generic, and functional features in addition to facilities for low-level memory manipulation. It is almost always implemented as a compiled language, and many vendors provide C++ compilers, including the Free Software Foundation, LLVM, Microsoft, Intel, and IBM, so it is available on many platforms.</p>
        <p></p>
        </div>
    </div>

    <div class="row container m-auto align-center">
    <div class="col-3"><img class="d-block w-50 m-auto" src="img/ard.jpg" style="border-radius: 40px;"></div>
    <div class="col-3"><img class="d-block w-50 m-auto" src="img/jq.jpg" style="border-radius: 40px;"></div>
    <div class="col-3"><img class="d-block w-50 m-auto" src="img/boot.jpg" style="border-radius: 40px; height: 90.5%"></div>
    <div class="col-3"><img class="d-block w-50 m-auto" src="img/mvc.jpg" style="border-radius: 40px; height: 90.5%"></div>
    </div>

<!-- projects -->
<div>

   <h1 id="projects" class="mb-4" style="text-align: center; font-family: 'Teko', cursive; font-size:500%; color: aqua;">My Projects</h1>

<div style=" border-radius: 20px;" class="bg-secondary p-2 m-auto">
    <!-- 1° project -->
    <div class="container card mb-3">
    <div class="card-header"><h5 id="body01" data-toggle="collapse" data-target="#body1" aria-expanded="false" aria-controls="collapseExample">RESERVED AREA<i class="fas fa-chevron-down float-right"></i></h5></div>
    <div class="card-body collapse row" id="body1">
        <h4 class="card-text">For this project i've used</h4>
        <div class="col">
        <ul>
            <li>HTML</li>
            <li>Java Script</li>
            <li>Jquery</li>
            <li>Bootstrap</li>
            <li>php</li>
        </ul>
        </div>

        <div class="col mt-5">
            <h5>To visit application <a href="http://rasphd.ddns.net/backup">click here</a></h5>
        </div>
    </div>
    </div>

    <!-- 2° project -->
    <div class="container card mb-3">
    <div class="card-header"><h5 id="body02" data-toggle="collapse" data-target="#body2" aria-expanded="false" aria-controls="collapseExample">LIBRARY WITH RESERVED AREA<i class="fas fa-chevron-down float-right" ></i></h5></div>
    <div class="card-body collapse row" id="body2">
        <h4 class="card-text">For this project i've used</h4>
        <div class="col">
        <ul>
            <li>HTML</li>
            <li>Java Script</li>
            <li>Jquery</li>
            <li>Bootstrap</li>
            <li>Ajax</li>
            <li>css</li>
            <li>php</li>
            <li>MVC</li>
        </ul>
        </div>

        <div class="col mt-5">
            <h5>To visit application <a href="http://rasphd.ddns.net/backup/biblioteca">click here</a></h5>
        </div>
    </div>
    </div>
    </div>
</div>


<!-- school tasks-->
<h1 id="task" class="mt-4 mb-4" style="text-align: center;font-family: 'Teko', cursive; font-size:500%; color: aqua;">School Tasks</h1>

<div style=" border-radius: 20px;" class="bg-secondary p-2 m-auto">

    <!-- 1° task -->
    <div class="container card mb-3">
    <div class="card-header"><h5 id="task01" data-toggle="collapse" data-target="#task1" aria-expanded="false" aria-controls="collapseExample">MATRICES WITH CONFRONTS<i class="fas fa-chevron-down float-right" ></i></h5></div>
    <div class="card-body collapse row" id="task1">
        <h4 class="card-text">For this project i've used</h4>
        <div class="col">
        <ul>
            <li>HTML</li>
            <li>Java Script</li>
            <li>Jquery</li>
            <li>Bootstrap</li>
            <li>Ajax</li>
            <li>css</li>
            <li>php</li>
        </ul>
        </div>

        <div class="col mt-5">
            <h5>To visit application <a href="http://rasphd.ddns.net/backup/verifica3_5_19">click here</a></h5>
        </div>
    </div>
    </div>

    <!-- TASK 2° -->
    <div class="container card mb-3">
    <div class="card-header"><h5 id="task02" data-toggle="collapse" data-target="#task2" aria-expanded="false" aria-controls="collapseExample">PYTHAGOREAN TABLE<i class="fas fa-chevron-down float-right"></i></h5></div>
    <div class="card-body collapse row" id="task2">
        <h4 class="card-text">For this project i've used</h4>
        <div class="col">
        <ul>
            <li>HTML</li>
            <li>Bootstrap</li>
            <li>php</li>
        </ul>
        </div>

        <div class="col mt-3">
            <h5>To visit application <a href="http://rasphd.ddns.net/backup/verifica3_5_19">click here</a></h5>
        </div>
    </div>
    </div>
        <!-- TASK 3° -->
        <div class="container card mb-3">
    <div class="card-header"><h5 id="task03" data-toggle="collapse" data-target="#task3" aria-expanded="false" aria-controls="collapseExample">STACK<i class="fas fa-chevron-down float-right"></i></h5></div>
    <div class="card-body collapse row" id="task3">
        <h4 class="card-text">For this project i've used</h4>
        <div class="col">
        <ul>
            <li>HTML</li>
            <li>Bootstrap</li>
            <li>Jquery</li>
            <li>css</li>
            <li>php</li>
        </ul>
        </div>

        <div class="col mt-5">
            <h5>To visit application <a href="http://rasphd.ddns.net/backup/stack">click here</a></h5>
        </div>
    </div>
    </div>

    <!-- TASK 4° -->
    <div class="container card mb-3">
    <div class="card-header"><h5 id="task04" data-toggle="collapse" data-target="#task4" aria-expanded="false" aria-controls="collapseExample">MIX TASKS<i class="fas fa-chevron-down float-right"></i></h5></div>
    <div class="card-body collapse row" id="task4">
        <h4 class="card-text">For this project i've used</h4>
        <div class="col">
        <ul>
            <li>HTML</li>
            <li>Bootstrap</li>
            <li>php</li>
        </ul>
        </div>

        <div class="col">
        <ul>
            <li>SCHOOL REPORT</li>
            <li>EQUATION OF SECOND DEGREE</li>
            <li>CASUAL NUMBERS</li>
        </ul>
            <h5>To visit application <a href="http://rasphd.ddns.net/backup/verifica">click here</a></h5>
        </div>
    </div>
    </div>

    <!-- TASK 5° -->
    <div class="container card mb-3">
    <div class="card-header" ><h5 id="task05" data-toggle="collapse" data-target="#task5" aria-expanded="false" aria-controls="collapseExample">PRODUCTS BETWEEN MATRICES<i class="fas fa-chevron-down float-right" ></i></h5></div>
    <div class="card-body collapse row" id="task5">
        <h4 class="card-text">For this project i've used</h4>
        <div class="col">
        <ul>
            <li>HTML</li>
            <li>Bootstrap</li>
            <li>php</li>
            <li>Jquery</li>
            <li>css</li>
        </ul>
        </div>

        <div class="col mt-3">
            <h5>To visit application <a href="http://rasphd.ddns.net/backup/prova">click here</a></h5>
        </div>
    </div>
    </div>
    </div>
    </div>
</div>


<div id="ard">
        <h1 style="text-align: center;font-family: 'Teko', cursive; font-size:500%; color: aqua;">ARDUINO PROJECTS</h1>
        <h3 style="text-align: center;font-family: 'Teko', cursive; font-size:300%; color: aqua;">2017/18</h3>
 
        <div class="container row m-auto" style="width:auto">
            <div class="col-sm-4 mb-4">
                    <iframe src="https://www.youtube.com/embed/zFYGPGdm0qM?list=PLRvhVF68eJpfYOp-F5rAa_wmpCzM3yu1r" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-sm-4 mb-4">
                    <iframe src="https://www.youtube.com/embed/DHCrhJQNOTw?list=PLRvhVF68eJpfYOp-F5rAa_wmpCzM3yu1r" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="col-sm-4 mb-4">
                    <iframe src="https://www.youtube.com/embed/p7rzG3Pz68s?list=PLRvhVF68eJpfYOp-F5rAa_wmpCzM3yu1r" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    
        <div class="container row m-auto" >
            <div class="col-sm mb-4 mr-4">
                    <iframe style="width:100%" src="https://www.youtube.com/embed/LjOdtXXGMvA?list=PLRvhVF68eJpfYOp-F5rAa_wmpCzM3yu1r" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
            
        <div class="container row m-auto" style="width:auto">
                <div class="col-sm-4 mb-4">
                        <iframe src="https://www.youtube.com/embed/VFKMoKnqaVk?list=PLRvhVF68eJpfYOp-F5rAa_wmpCzM3yu1r" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-sm-4 mb-4">
                        <iframe src="https://www.youtube.com/embed/MmQkpZlYpQs?list=PLRvhVF68eJpfYOp-F5rAa_wmpCzM3yu1r" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="col-sm-4 mb-4">
                        <iframe src="https://www.youtube.com/embed/dJhMvHPwpAI?list=PLRvhVF68eJpfYOp-F5rAa_wmpCzM3yu1r" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
        </div>
</div>

<footer>
    <p>shenanhd2018@gmail.com</p>
    <p id="users"><i class="far fa-user-circle"></i> <?php echo $_SESSION['count']; ?></p>
</footer>
</body>
</html>