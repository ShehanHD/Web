<?php

class login{
private $uname;
private $pass;

public function __construct(){
  $i = 0;

  $fp = fopen('fileIndex/registrati.csv','r');
        if(!$fp){
          $fp2 = fopen('registrati.csv','w');
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

    public function setVariable(){
    $this -> uname =$_POST['uname'];
    $this -> pass = $_POST['pass'];
    }

    public function con_login(){
    $uname = $this -> uname;
    $pass = $this -> pass;
    $controllo = $this -> __construct();
    $userip = $_SERVER['REMOTE_ADDR'];
    $date = date("Y-m-d H:i:s");

    for($i=0; $i<sizeof($controllo); $i++){
        if($controllo[$i][2]==$uname && $controllo[$i][3]==$pass)
          {$userip = $_SERVER['REMOTE_ADDR'];
          $date = date("Y-m-d H:i:s");

          $dati = array('ent' => "Entrato", 'ip' => $userip, 'name' => $uname ,'date' => $date );

          $fp = fopen("fileIndex/log.csv","a");
          fputcsv($fp,$dati);
          fclose($fp);

          session_start();
      		setcookie('file',$controllo[$i][0],time()+3600);
          setcookie('file',$controllo[$i][3],time()+3600);
          $_SESSION['user'] = $uname;

          return 1;
        }
    }
}

}
$obj = new login;
$obj -> setVariable();

$login = $obj -> con_login();

if($login == 1){
    $fpR = fopen("count.txt","r");

  if(!$fpR){
    $fp = fopen("count.txt","w");
    fprintf($fp,"%d",1);
    fclose($fp);
  }
  if($fpR){
    while(!feof($fpR)){
    fscanf($fpR,"%d",$cont);
    }
    $fp2 = fopen("count.txt","w");
    fprintf($fp2,"%d",$cont+1);
    fclose($fp2);

  $x=1;
  }
}
else{
  $x=0;
}
?>

<script>
var err = "<?php echo $x; ?>";
 if(err==1){
   $('#uname, #pass').removeClass('is-invalid');
   $('#uname, #pass').addClass('is-valid');
   	location.href="menu.php";
  }
 if(err == 0){
   $('#uname, #pass').removeClass('is-valid');
   $('#uname, #pass').addClass('is-invalid');
   $('#results2').text("Username or Password is not valid!");
 }
</script>
