<?php
if (!isset($_SESSION['username'])) {
  header("location: index.php");
}

if (isset($_SESSION['username']) == -1) {
  $disable = "disable";
} else {
  $disable = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Lobster|PT+Serif&display=swap" rel="stylesheet">
  <script src="lib/js/home.js"></script>
  <link rel="stylesheet" href="lib/css/home.css">
  <title>Document</title>
</head>

<body>
  <aside class="side">
    <nav class="menu" id="intro">Home</nav>
    <nav class="menu" id="materials">Materials</nav>
    <nav class="menu" id="projects">Projects</nav>
    <nav class="menu <?php echo $disable; ?>" id="feedback<?php echo $disable; ?>">Feedback</nav>
    <nav class="menu <?php echo $disable; ?>" id="contacts<?php echo $disable; ?>">Contacts</nav>
    <nav class="menu logout" id="logout">Logout</nav>
  </aside>

  <div class="main">
    <article id="articleIntro" class="article">
      <h1 class="welcome">Welcome</h1>
      <h3 class="name"><?php echo $_SESSION['username'] ?></h3>
      <h4>to</h4>
      <h1 class="wecode">WeCode</h1>
    </article>

    <article id="articleMaterials" class="article">
      <div class="web">
        <h3 class="tittles">Web Development</h3>
        <img src="img/html.jpg" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/css.png" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/js.png" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/php.png" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/jq.jpg" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/ajax.png" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/boot.jpg" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/django.png" style="width:20%; border-radius: 40px; margin: 2%">
      </div>
      <div class="software">
        <h3 class="tittles">Software Development</h3>
        <img src="img/c.png" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/cpp.png" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/py.png" style="width:20%; border-radius: 40px; margin: 2%">
      </div>
      <div class="structure">
        <h3 class="tittles">Programing Structures</h3>
        <img src="img/mvc.jpg" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/oop.jpg" style="width:20%; border-radius: 40px; margin: 2%">
      </div>
      <div class="other">
        <h3 class="tittles">other</h3>
        <img src="img/ard.jpg" style="width:20%; border-radius: 40px; margin: 2%">
        <img src="img/rasp.jpg" style="width:20%; border-radius: 40px; margin: 2%">
      </div>
    </article>

    <article id="articleProjects" class="article">
      a
    </article>

    <article id="articleFeedback" class="article">
      a
    </article>

    <article id="articleContacts" class="article">
      a
    </article>
  </div>
</body>

</html>