<?php
session_start();
?>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/bootstrap.css" media="screen">
	<link rel="stylesheet" href="css/menu.css" media="screen">
	<script type="text/javascript" src="ArJson.js">	</script>
</head>
<body>

<nav class="container-fluid bg-primary text-center">
<div class="row">
  <h1 class="col-3 mt-3">MENU</h1>
  <div class="col-5 mt-3"></div>
  <form class="col mt-3" method="POST" action=logout.php>
  <button type='submit' class="btn btn-secondary mt-1 btn-md float-right" name='logout'>LOGOUT</button>
  </form>

</div>
</nav>

<nav class="navbar navbar-expand-sm bg-secondary">
  <?php
  if(isset($_SESSION['user'])){echo "<h6>Ciao ".$_SESSION['user']."!</h6>";}
  else{header("location: index.php");}
  ?>
</nav>
</div>



<div class="row">  <!-- row -->

<div class="col col-sm-3 mt-5 ml-3">
<nav class="card text-white bg-dark mb-3 mb-3">
	<div class="card-header">PROGETTI PHP</div>

	<div class="card-body">
		<ul class="nav nav-pills">
		<li class="nav-item"><a class="nav-link " href="prodotti.php"> Il mio primo progetto php  </a></li>
		</ul>

		<ul class="nav nav-pills">
		<li class="nav-item"><a class="nav-link disabled" href="menu.php"> ......  </a></li>
		</ul>
	</div>
</nav>

<nav class="card text-white bg-dark mb-3 mb-3">
	<div class="card-header">PROGETTI ARDUINO</div>

	<div class="card-body">
		<ul class="nav nav-pills">
		<li class="nav-item"><a class="nav-link" style="cursor: pointer; color: #2FA4E7;" onclick="primo()||openNav()">Temperatura</a></li>
		</ul>

		<ul class="nav nav-pills">
		<li class="nav-item"><a class="nav-link disabled" href="menu.php"> DISATTIVATI  </a></li>
		</ul>
	</div>
</nav>
</div>
<!-- ##################################################################################### -->

<div class="col col-lg float-right">

</div>

</div> <!-- row -->

<div id="myNav" class="overlay">
<a href=" " class="closebtn" onclick="closeNav()">&times;</a>
<div class="overlay-content">
	<h1>La Temperatura</h1>
	<h1 id="demo"></h1>
</div>
</div>

</body>
</html>
