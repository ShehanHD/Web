<?php
class registrazione{
 private $name;
 private $sirname;
 private $email;
 private $date;
 private $gender;
 private $password;
 private $rpassword;

    public function __construct(){
      $i = 0;

      $fp = fopen('registrati.csv','r');
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

    public function setVariable()
    {
      $this -> name = $_POST['name'];
      $this -> sirname = $_POST['sirname'];
      $this -> email =$_POST['email'];
      $this -> gender =$_POST['gender'];
      $this -> password = $_POST['password'];
      $this -> rpassword = $_POST['rpassword'];
      $this -> date = $_POST['date'];
    }

     public function controllo_name(){
       $name = $this -> name;

       if(!empty($name)){
           if (preg_match('/^[a-zA-Z ]+$/', $name)){
             return 1;
           }
           else{
             return 0;
           }
       }

       else{
         return 2;
       }

     }

     public function controllo_sirname(){
       $sirname = $this -> sirname;

       if(!empty($sirname)){
           if (preg_match('/^[a-zA-Z ]+$/', $sirname)){
             return 1;
           }
           else{
             return 0;
           }
       }

       else{
         return 2;
       }

     }

     public function controllo_mail(){
       $email = $this -> email;
       $controllo_email = $this -> __construct();
       $x=0;

       if(!empty($email)){
           if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
             for($i=0; $i<sizeof($controllo_email); $i++){
               if($controllo_email[$i][2]==$email)
                 {$x=1;}
             }
             if($x==1)
                {return 3;}
             else
                {return 1;}
           }
           else{
             return 0;
           }
      }

      else {
        return 2;
      }

     }

     public function controllo_pwd(){
       $password = $this -> password;
       $rpassword = $this -> rpassword;

       if(!empty($password) || !empty($rpassword)){
         if($password === $rpassword){
           return 1;
         }
         else{
           return 0;
         }
       }

       else{
         return 2;
       }
     }

     public function controllo_date(){
       $date = $this -> date;

       if(!empty($date)){
          if((strtotime($date)-strtotime(date("Y-m-d")))<0){
            return 1;
          }
          else{
            return 0;
          }
        }
        else{
          return 2;
        }
     }

    public function controllo(){
      $name = $this -> name;
      $sirname = $this -> sirname;
      $email = $this -> email;
      $password = $this -> password;
      $date = $this -> date;

      $con_name = $this -> controllo_name();
      $con_sirname = $this -> controllo_sirname();
      $con_email = $this -> controllo_mail();
      $con_password = $this -> controllo_pwd();
      $con_date = $this -> controllo_date();


      if($con_name == 1 && $con_sirname == 1 && $con_date == 1 && $con_email == 1 && $con_password == 1 ){
        $fp = fopen("registrati.csv","a");

        $dati = array('nome' => $name,
                      'cognome' => $sirname,
                      'email' => $email,
                      'data_nascita' => $date,
                      'password' => $password,
                      'dataOggi' => date("Y-m-d H:i:s"),
                      'ip' => $_SERVER['REMOTE_ADDR']);

        fputcsv($fp,$dati);
        fclose($fp);
        return 1;
      }
      else{
        return 0;
      }
     }

}

$obj = new registrazione;
$obj -> setVariable();

$con = $obj -> controllo();
$con_names = $obj  -> controllo_name();
$con_sirnames = $obj  -> controllo_sirname();
$con_mail = $obj  -> controllo_mail();
$con_password = $obj -> controllo_pwd();
$con_date = $obj -> controllo_date();

?>

<script>
var con = <?php echo $con; ?>;
var con_sirname = <?php echo $con_sirnames; ?>;
var con_names = <?php echo $con_names; ?>;
var con_mail = <?php echo $con_mail; ?>;
var con_password = <?php echo $con_password; ?>;
var con_date = <?php echo $con_date; ?>;

if(con==1){
  //$('#myForm2')[0].reset();
  $('#name, #sirname, #email, #password, #rpassword, #date').removeClass('is-invalid');
  $('#name, #email, #password, #rpassword, #date').addClass('is-valid');
  $('#err_name, #err_sirname, #err_email, #err_pwd, #err_date').text("");
  $('#results').text("Registration is succesful!");
}
else{
////////////////////////////////////////////////////////////////////////////////
  if(con_names==1){
    $('#name').removeClass('is-invalid');
    $('#name').addClass('is-valid');
    $('#err_name').text("");
  }
  if(con_names==0){
    $('#name').removeClass('is-valid');
    $('#name').addClass('is-invalid');
    $('#err_name').text("Name is not valid! (musn\'t contain special characters)");
  }
  if(con_names==2){
    $('#name').removeClass('is-valid');
    $('#name').addClass('is-invalid');
    $('#err_name').text("Insert your name!");
  }
////////////////////////////////////////////////////////////////////////////////
  if(con_sirname==1){
    $('#sirname').removeClass('is-invalid');
    $('#sirname').addClass('is-valid');
    $('#err_sirname').text("");
  }
  if(con_sirname==0){
    $('#sirname').removeClass('is-valid');
    $('#sirname').addClass('is-invalid');
    $('#err_sirname').text("Surname is not valid! (musn\'t contain special characters)");
  }
  if(con_sirname==2){
    $('#sirname').removeClass('is-valid');
    $('#sirname').addClass('is-invalid');
    $('#err_sirname').text("insert your Surname!");
  }
///////////////////////////////////////////////////////////////////////////////
  if(con_mail==1){
    $('#email').removeClass('is-invalid');
    $('#email').addClass('form-control is-valid');
    $('#err_email').text("");
  }
  if(con_mail==0){
    $('#email').removeClass('is-valid');
    $('#email').addClass('is-invalid');
    $('#err_email').text('The e-mail you inserted is not valid!');
  }
  if(con_mail==2){
    $('#email').removeClass('is-valid');
    $('#email').addClass('is-invalid');
    $('#err_email').text('Insert your valid e-mail!');
  }
  if(con_mail==3){
    $('#email').removeClass('is-valid');
    $('#email').addClass('is-invalid');
    $('#err_email').text('This e-mail already exists!');
  }
///////////////////////////////////////////////////////////////////////////////
  if(con_password==1){
    $('#password, #rpassword').removeClass('is-invalid');
    $('#password').addClass('is-valid');
    $('#rpassword').addClass('is-valid');
    $('#err_pwd').text("");
  }
  if(con_password==0){
    $('#password, #rpassword').removeClass('is-valid');
    $('#password').addClass('is-invalid');
    $('#rpassword').addClass('is-invalid');
    $('#err_pwd').text('Passwords does not match!');
  }
  if(con_password==2)
    $('#password, #rpassword').removeClass('is-valid');
    $('#password').addClass('is-invalid');
    $('#rpassword').addClass('is-invalid');
    $('#err_pwd').text('Insert a Password!');
  }
///////////////////////////////////////////////////////////////////////////////
  if(con_date==1){
    $('#date').removeClass('is-invalid');
    $('#date').addClass('is-valid');
    $('#err_date').text("");
  }
  if(con_date==0){
    $('#date').removeClass('is-valid');
    $('#date').addClass('is-invalid');
    $('#err_date').text("Insert correct birthday!");
    }
  if(con_date==2){
    $('#date').removeClass('is-valid');
      $('#date').addClass('is-invalid');
      $('#err_date').text("Insert birthday!");
    }



document.getElementById('results').style.color = "green";
</script>
