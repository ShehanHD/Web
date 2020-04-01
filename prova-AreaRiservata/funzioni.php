<?php

function prod(){

$nome= $_POST['ad'];
$fp = fopen("prodotti.txt","a");
fprintf($fp,"%s\n",$nome);
fclose($fp);
}

function inserire_dati(){
if(isset($_POST['SUBMIT_INS'])){
	$prod = $_POST['Ins_select'];
	$date = $_POST['date_Ins'];
	$file = $_COOKIE['file'];
	$file .= ".csv";



	if($date==NULL){
		echo "Inserire la data";
	}
	else{
		$fp = fopen( "fileProdotti/".$file ,"a");

		$dati = array('Prodotto' => $prod,
	 								'data' => $date,
									'dataIns' => date("Y-m-d"));

		fputcsv($fp,$dati);

		fclose($fp);


$secondi=(strtotime($date)-strtotime(date("y-m-d")));
echo "Manca <b>".round($secondi/(3600*24))."</b> Giorni per la scadenza!";
	}
}
}

function visualizza_dati(){

if(isset($_POST['SUBMIT_VIS'])){

	$scelta = $_POST['scelta'];
	$prodotto = $_POST['Vis_prod'];



		if($scelta=="scaduti"){
			scadi($prodotto);
		}

		if($scelta=="nonScaduti"){
			non_scadi($prodotto);
		}

		if($scelta=="tutti"){
			tutto($prodotto);
		}


}
}

function legge_dati(){
	$file = $_COOKIE['file'];
	$file .= ".csv";
	$i=0;

	$fp = fopen("fileProdotti/".$file, "r");

	if(!$fp){
		return 0;
	}
	else{
	while (($data = fgetcsv($fp)) !== FALSE) {
		$prelevi[$i] = $data;
		$i++;
	}

	fclose($fp);

	return $prelevi;
	}
}

function controlla_data($d){
	$secondi=(strtotime($d)-strtotime(date("y-m-d")));
	$ris = round($secondi/(3600*24));

if($ris<=0){
	return FALSE;
}
else{
	return true;
}

}

function scadi($prodotto){
if(isset($_POST['SUBMIT_VIS'])){
	$periodo = $_POST['Vis_periodo'];
	$color = "class=\"row table-danger\"";
	$dati = legge_dati();

	if($dati==0){
		echo "Il file contiene nessun dato!";
	}
	//print_r($dati);
	else{
	echo "<h2>Prodotti Scaduti</h2><table class=\"table table-hover text-center\" id=\"tb\"><tr  class='row'><th class='col'>PRODOTTO</th><th class='col'>DATA SCADENZA</th><th class='col'>DATA INSERIMENTO</th><th class='col'>STATO</th><th class='col'></th><th class='col'></th></tr>";
	for($i=0; $i<sizeof($dati); $i++){
		$secondi=(strtotime($dati[$i][1])-strtotime(date("y-m-d")));
		$giorni=(round($secondi/(3600*24))*-1);

if($giorni<$periodo){

if($prodotto==$dati[$i][0]){
		if(controlla_data($dati[$i][1])==FALSE){
		echo "<tr ".$color."  id='$secondi'><td class='col'><b>".$dati[$i][0]."</b></td><td class='col'>".$dati[$i][2]."</td><td class='col'>".$dati[$i][1]."</td><td class='col'>è scaduto</td><td class='col' class='col'>".$giorni." giorni fa</td><td class='col col-sm'><input type='checkbox' id='$secondi'></td></tr>";
		}
	}
if($prodotto=="tutto"){
	if(controlla_data($dati[$i][1])==FALSE){
	echo "<tr ".$color."  id='$secondi'><td class='col'><b>".$dati[$i][0]."</b></td><td class='col'>".$dati[$i][2]."</td><td class='col'>".$dati[$i][1]."</td><td class='col'>è scaduto</td><td class='col'>".$giorni." giorni fa</td><td class='col col-sm'><input type='checkbox' id='$secondi'></td></tr>";
	}
}
}}
	echo "</table><br>";
}
}
}

function non_scadi($prodotto){
if(isset($_POST['SUBMIT_VIS'])){
		$periodo = $_POST['Vis_periodo'];
		$dati = legge_dati();

		//print_r($dati);
		if($dati==0){
			echo "Il file contiene nessun dato!";
		}

		else{
			echo "<h2>Prodotti non Scaduti</h2><table class=\"table table-hover text-center\" id=\"tb\"><tr  class='row'><th class='col'>PRODOTTO</th><th class='col'>DATA SCADENZA</th><th class='col'>DATA INSERIMENTO</th><th class='col'>STATO</th><th class='col'></th><th class='col'></th></tr>";
		for($i=0; $i<sizeof($dati); $i++){
		$secondi=(strtotime($dati[$i][1])-strtotime(date("y-m-d")));

		$giorni=(round($secondi/(3600*24)));

		if($giorni<5){
			$color = "class=\"row table-danger\"";
		}
		else if ($giorni>=5&&$giorni<15) {
			$color = "class=\"row table-warning\"";
		}
		else{
			$color = "class=\"row table-success\"";
		}
if($giorni<$periodo){

		if($prodotto==$dati[$i][0]){
				if(controlla_data($dati[$i][1])==true){
				echo "<tr  ".$color."  id=".$secondi."><td class='col'><b>".$dati[$i][0]."</b></td><td class='col'>".$dati[$i][2]."</td><td class='col'>".$dati[$i][1]."</td><td class='col'>non è scaduto</td><td>Manca ".$giorni." giorni</td><td class='col'><input type='checkbox' id=".$secondi."></td></tr>";
		}}

		if($prodotto=="tutto"){
			 if(controlla_data($dati[$i][1])==true){
			 echo "<tr ".$color." id=".$secondi."><td class='col'><b>".$dati[$i][0]."</b></td><td class='col'>".$dati[$i][2]."</td><td class='col'>".$dati[$i][1]."</td><td class='col'>non è scaduto</td><td class='col'>Manca ".$giorni." giorni</td><td class='col'><input type='checkbox' id=".$secondi."></td></tr>";
	 }}
}
}
echo "</table>";

}
}
}

function tutto($prodotto){
if(isset($_POST['SUBMIT_VIS'])){
		$periodo = $_POST['Vis_periodo'];

scadi($prodotto);
echo "<br>";
non_scadi($prodotto);
}
}
?>
