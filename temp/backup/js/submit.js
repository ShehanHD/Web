function submitdata() {
	var name = $("#name").val();
	var sirname = $("#sirname").val();
	var email = $("#email").val();
	var date = $("#date").val();
	var gender = $("input[type=radio]:checked").val();
	var password = $("#password").val();
	var rpassword = $("#rpassword").val();

$.post("submit.php", {
		name: name,
		sirname : sirname,
		email: email,
		date: date,
		gender: gender,
	 	password:password,
		rpassword: rpassword },
						function(data) {
		 						$('#results').html(data);
								//$('#myForm')[0].reset();

 });
}

function login(){
	var uname = $("#uname").val();
	var pass = $("#pass").val();

$.post("login.php",{
	uname: uname,
	pass: pass},
			function(data) {
				$('#results2').html(data);


});
}
