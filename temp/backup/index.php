<html>
<title>Submit Form without Page Refresh - PHP/jQuery - TecAdmin.net</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap.min.css" media="screen">
<script src="js/submit.js"></script>
<script>

$(document).ready(function(){
$('#container2').hide();

$("#login").on('click',function(){
	$("#container2").hide(600);
	$("#container1").show(1000);
});
$("#register").on('click',function(){
	$("#container1").hide(600);
	$("#container2").show(1000);

});
});
</script>
</head>
<body>

<div class="row navbar navbar-expand-lg navbar-dark bg-primary rounded text-center mb-2">
<div class="col">
<button type="button" class="btn btn-secondary btn-lg rounded float-left" id="login">LOGIN</button>
</div>
<div class="col"><h1>HD</h1></div>
<div class="col">
<button type="button" class="btn btn-secondary btn-lg rounded float-right" id="register">REGISTER</button>
</div>
</div>

<div class="jumbotron bg-dark rounded">
<!--il contenitore LOGIN -->
<div class="container" id="container1">
<div class="card text-white text-center bg-light rounded text-dark mb-3" style="width: 100%;">
<div class="card-header"><h1>LOGIN</h1></div>
<div class="card-body">
	<form id="myForm1" method="post">
		   <input class="form-control mt-2 rounded-pill" name="uname" id="uname" type="text" placeholder="USERNAME">
	  	 <span id="err_uname" style="color:red"></span>
			 <input class="form-control mt-2 rounded-pill" name="pass" id="pass" type="password" placeholder="PASSWORD">
			 <span id="err_pass" style="color:red"></span>
		   <input class="form-control mt-2 btn-secondary rounded-pill" type="button" id="submitLogin" onclick="login();" value="Submit">
	 </form>
	 <p style="color:red;" id="results2"></p>
</div>
</div>
</div>

<!--il contenitore REGISTRATION -->
<div class="container" id="container2">
<div class="card text-white text-center bg-light rounded text-dark mb-3" style="width: 100%;">
<div class="card-header"><h1>REGISTRATION</h1></div>
<div class="card-body">
	<form id="myForm2" method="post">
	   <input class="form-control mt-2 rounded-pill" name="name" id="name" type="text" placeholder="NAME">
  	 <span id="err_name" style="color:red"></span>
		 <input class="form-control mt-2 rounded-pill" name="sirname" id="sirname" type="text" placeholder="SIRNAME">
		 <span id="err_sirname" style="color:red"></span>
		 <input class="form-control mt-2 rounded-pill" name="email" id="email" type="text" placeholder="E-MAIL">
		 <span id="err_email" style="color:red"></span><br>
		 DATE OF BIRTH: <input class="form-control rounded-pill" name="date" id="date" type="date">
		 <span id="err_date" style="color:red"></span><br>
		 GENDER: <input name="gender" type="radio" value="male" checked>Male
	 	 <input name="gender" type="radio" value="female">Female<br>
		 <input class="form-control mt-2 rounded-pill" name="password" id="password" type="password" placeholder="PASSWORD">
		 <input class="form-control mt-2 rounded-pill" name="rpassword" id="rpassword" type="password" placeholder="REPEAT PASSWORD">
		 <span id="err_pwd" style="color:red"></span>
		 <p id="results"></p>
	   <input class="form-control btn-secondary rounded-pill" type="button" id="submitFormData" onclick="submitdata();" value="Submit">
	 </form>
</div>
</div>
</div>
</div>
	 <br/>

</body>
</html>
