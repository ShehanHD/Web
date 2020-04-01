<?php
//include_once("arrDataBase.php");

class modello{
// protected $externClass;
  public function __construct(){
    $i = 0;
  //$this->externClass = new dataBase();

    $fp = fopen('Model/add.csv','r');
          if(!$fp){
            $fp2 = fopen('Model/add.csv','w');
            fclose($fp2);
          }
          else{
            while (($data = fgetcsv($fp)) !== FALSE) {
              $prelevi[$i] = $data;
              $i++;
            }
              fclose($fp);
          }
      return $prelevi;
  }


//assegna i valori al variabili publici
  public function assegna_variabili($prod, $idProd, $exp, $quan, $prez)
  {
    $prodotto = $prod;
    $id = $idProd;
    $data_scadenza = $exp;
    $quantita = $quan;
    $prezzo = $prez;

    $arr = array( date('Y-m-d'),$prodotto,$id,$data_scadenza,$quantita,$prezzo);

    $this->addToFile($arr);

    return json_encode($arr);
  }

//scriver il data-base di nomi prodotti e id
  public function addToFile($arr){
    $fp = fopen("Model/add.csv","a");

    fputcsv($fp,$arr);

    fclose($fp);
  }

  public function dataBase($prod,$id){
    $fp2 = fopen("Model/prodotti.txt","a");
    $fp = fopen("Model/prodotti.txt","r");

    while(!feof($fp)){
      fscanf($fp,"%s %s",$prodfile,$idfile);

      if($prod == $prodfile || $id == $idfile){
        fclose($fp);
        return 0;
      }
      else{
          fprintf($fp2,"%s %s\n",$prod,$id);
          fclose($fp2);
          return 1;
      }
    }
  }
//funziona che genera un array di nome e id e trasforma in codice json
  public function vediDati()
  {
    $arr = array();

    $fp2 = fopen("Model/prodotti.txt","r");

    if(!$fp2){
      $fp = fopen("Model/prodotti.txt","w");
      fclose($fp);
      return json_encode(null);
    }

    else{
      while(!feof($fp2)){
        fscanf($fp2,"%s %s",$prod,$id);

        if(!feof($fp2))
            $arr[] = array($prod,$id);
      }

      fclose($fp2);
      return json_encode($arr);
    }
  }

  public function removeProd($prod, $id){
      $vet = self::data($prod, $id);
      $fp = fopen('Model/prodotti.txt','w');

      for($i=0; $i<sizeof($vet);$i++){
        fprintf($fp,"%s %s\n",$vet[$i][0],$vet[$i][1]);
      }
      fclose($fp);

      return json_encode($vet);
  }


  public function data($prod, $id){
    $i = 0;
    $vet = array(); // se non entra nel controllo sara valre null -> quindi dobbiamo dichierare questo array prima, cosi array vuota sostituisce una array vuota

    $fp = fopen('Model/prodotti.txt','r');
          if(!$fp){
            $fp2 = fopen('Model/prodotti.txt','w');
            fclose($fp2);
          }
          else{
            while (!feof($fp)) {
              fscanf($fp,"%s %s", $fprod, $fid);

              if($fprod!=$prod && $fid != $id){
                if(!feof($fp)){
                $vet[$i]= array($fprod, $fid);
                $i++;
              }
              }

            }
              fclose($fp);
          }
    return $vet;
  }
}

 ?>
