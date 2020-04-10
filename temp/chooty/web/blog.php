<html>
<head>
<title>HDSH</title>
    <meta charset="utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<style>

*{
margin:0;
padding:0;
font-family:Century Gothic;
}

ul li a {
background-image:url(a.gif);
}
ul{
float:right;
list-style:none;
margin-top: 25px
}
ul li{
display: inline-block;
}

ul li a{
text-decoration:none;
color:#aaccff ;
padding:5px 20px;
border:2px solid #aaccdd;
}
ul li a{
background-color:#fff;
clor:pink;
}
p {
 text-align: center;
  text-transform: inherit;
  color: #4CAF50;

   font-size: 45px;
}
h1{

  text-transform: inherit;
  color: black;

   font-size: 25px;
}
a{

  text-transform: inherit;
  color: #4CAF50;

   font-size: 20px;
}
div {

  display: inline-block;

    height: 240px;
    margin: 8px;
  border: 3px solid purple;
  padding: 3px;
  width:30%;
  text-align: center;
}
</style>
</head><body>
       <header>

         <ul>
         <li><a href="http://rasphd.ddns.net/chooty/web/cssstile.html">home</a></li>
          <li><a href="http://rasphd.ddns.net/chooty/web/abaut.php">abaut me</a></li>
         </ul>

        </header>
</body>



<p>
HDSH  </p>
<center>
  <div2 class="rounded-pill">
  <h1>play list(link) </h1>      <br>
  <a href="https://www.youtube.com/playlist?list=PLxaBuvTys0pVzzCbyxvQ0J8WZ6IUkqE67">ARDUINO</a><br>
  <a href="https://www.youtube.com/playlist?list=PLxaBuvTys0pVJph3sS4kBL8IGqXbgBqR_">COMANDI DI SCHELL</a>  <br>
  <a href="https://www.youtube.com/playlist?list=PLxaBuvTys0pU7GeLbvMsuDRUs8WVNf_qm">LINUX</a>  <br>
  <a href="https://www.youtube.com/playlist?list=PLxaBuvTys0pW-Z49pWXF6brslQmFjjGCK">c++&c</a> 
  </div2>
<br>

       <div1 class="rounded-pill">
       <br>
       <h1> compiti(link) </h1>      <br>
       <a href="http://rasphd.ddns.net/chooty/irpef/irpef.html">CALCOLO IRPER</a><br>
       <a href="http://rasphd.ddns.net/chooty/varifica/form.html">VIDEO GIOCHI</a>  <br>
       <a href="http://rasphd.ddns.net/chooty/book/inserisci.html">LIBRERIA</a>  <br> <br>
       </div1>
</center>
    
    <form action="blog.php" method="post">
    COMMENT:  <textarea rows="4" cols="50"  name="comment" >  </textarea>
    <input type="submit" value="Submit">
    


</form>
</html>





<?php
          $comment = $_POST["comment"];
$fp=fopen("comment.txt","a");

fprintf($fp,"%s",$comment);

fclose($fp);

?>
