<?php
session_start();
include('funzioni.php');
?>


<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="prodotti.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" media="screen">

	</script>
</head>
<body>


	<nav class="container-fluid bg-primary mb-1">
	<div class="row">
	  <div class="mt-3 col"><h1>Controlla prodotti</h1></div>
	  <form class="col-4 mt-3" method="POST" action=logout.php>
	  <button type='submit' class="btn btn-secondary mt-1 btn-md float-right" name='logout'>LOGOUT</button>
	  </form>

	</div>
	</nav>

<nav class="navbar navbar-expand-sm bg-secondary mb-3">
  <?php
  if(isset($_SESSION['user'])){echo "<div class='float-left'> <h6 class='mt-2'>Ciao ".$_SESSION['user']."!</h6>";}
  else{header("location: index.php");}
  ?>
</div>
	<div class="float-right">
<a role="button" class="btn btn-primary btn-sm" href="menu.php">Menu</a>
</div>
</nav>

<div class="jumbotron text-center" id="div">


			<div id="div1" class="col text-center mt-5">

				<div class="row mb-5">
					<button class="col btn-primary btn-sm" id="ins"> Inserire Dati </button>
					<button class="col btn-primary btn-sm" id="vis"> Visualizza Dati </button>
				</div>

						<div id="Ins">
							<div class="card card-body">
						<p>AGGIUNGERE UN PRODOTTO: <input class="form-control" type="text" id="add" name="ad">
							<button  id="bot_agg" name="bot_ag" onclick ="agg()">add</button></p>

						<p>SCEGLIER IL PRODOTTO* :

						<select class="form-control" id="scegli" name="Ins_select" form="insprod">

						<option value="a">a</option>
						<option value="b">b</option>
						<option value="c">c</option>
						<option value="d">d</option>
						<?php prod(); ?>
						</select></p>

						<form method="POST" action=prodotti.php id="insprod">
						<p>INSERIRE DATA DI SCADENZA* :
					  <input class="form-control" type="date" name="date_Ins" id="date_Ins"></p>
						<button id="bot" type="submit" name="SUBMIT_INS" class="btn btn-info">SUBMIT</button>
						</form>
					</div>
						</div>

						<div id="Vis">
							<div class="card card-body">
							<p>Prodotto:
						<select class="form-control" id="scegli" name="Vis_prod" form="visprod">

						<option value="tutto">tutto</option>
						<option value="a">a</option>
						<option value="b">b</option>
						<option value="c">c</option>
						<option value="d">d</option>


						</select>
					</p>
						<p>Periodo:
						<select class="form-control" id="periodo" name="Vis_periodo" form="visprod">

						<option value="10000">tutti</option>
						<option value="7">7 giorni</option>
						<option value="30">1 mese</option>
						<option value="90">3 mesi</option>
						<option value="182">6 mesi</option>
						<option value="365">12 mesi</option>

						</select>
					</p>
						<br>
						<form method="POST" action=prodotti.php id="visprod">
						<p><input type="radio" value="scaduti" name="scelta" checked>SCADUTI</p>
						<p><input type="radio" value="nonScaduti" name="scelta">NON SCADUTI</p>
						<p><input type="radio" value="tutti" name="scelta">TUTTI(scaduti e non scaduti)</p>
						<p><button id="bot" type="submit" id="submit" name="SUBMIT_VIS" class="btn btn-info">SUBMIT</button></p>
						</form>

					</div>
						</div>

			</div>

	<div class="col" id="div2">
	<?php
			inserire_dati();
			Visualizza_dati();
	?>
	</div>
</div>


</body>
</html>
