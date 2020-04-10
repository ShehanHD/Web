$(window).on('load',function(){
    var card = document.querySelector('.user');
    $(".toggle").on('click', function () {
        card.classList.toggle("card-flipped");
    });


    $("#register").click(function () { 
        let name = $("#name").val();
        let surname = $("#surname").val();
        let username = $("#username").val();
        let email = $("#email").val();
        let password = $("#password").val();
        let repeatPassword = $("#repeatPassword").val();
        
        if(!name || !surname || !username || !email || !password ||  !repeatPassword || !checkLength(username, 8) || !checkLength(password, 8) || !checkPassword(password, repeatPassword)){
            if(!name ){
                $('#errName').text('Fill your name');
                $('#name').addClass('inputs-err');
                $('#name').removeClass('inputs-suc');
            }
            else{
                $('#errName').text('');
                $('#name').removeClass('inputs-err');
                $('#name').addClass('inputs-suc');
            }
            if(!surname ){
                $('#errSurname').text('Fill your surname');
                $('#surname').addClass('inputs-err');
                $('#surname').removeClass('inputs-suc');
                }
            else{
                $('#errSurname').text('');
                $('#surname').removeClass('inputs-err');
                $('#surname').addClass('inputs-suc');
            }
            if(!username ){
                $('#errUsername').text('Fill your username');
                $('#username').addClass('inputs-err');
                $('#username').removeClass('inputs-suc');
                }
            else if(!checkLength(username, 5)){
                $('#errUsername').text('Too short, should be more than 5 characters');
                $('#username').addClass('inputs-err');
                $('#username').removeClass('inputs-suc');
            }
            else{
                $('#errUsername').text('');
                $('#username').removeClass('inputs-err');
                $('#username').addClass('inputs-suc');
            }
            if(!email ){
                $('#errEmail').text('Fill your email');
                $('#email').addClass('inputs-err');
                $('#email').removeClass('inputs-suc');
                }
            else if(!ValidateEmail(email)){
                $("#email").addClass('inputs-err');
                $("#errEmail").text("Your e-mail is not valid");
            }
            else{
                $('#errEmail').text('');
                $('#email').removeClass('inputs-err');
                $('#email').addClass('inputs-suc');
            }
            if(!password || !repeatPassword){
                $('#errPassword').text('Fill your both password');
                $('#password, #repeatPassword').addClass('inputs-err');
                $('#password, #repeatPassword').removeClass('inputs-suc');
                }
            else if(!checkLength(password, 8)){
                $('#errPassword').text('Too short, should be more than 8 characters');
                $("#password, #repeatPassword").addClass('inputs-err');
                $("#password, #repeatPassword").removeClass('inputs-suc');
            }
            else if(!checkPassword(password, repeatPassword)){
                $("#password, #repeatPassword").removeClass('inputs-suc');
                $("#password, #repeatPassword").addClass('inputs-err');
                $("#errPassword").text("passwords are dosen't match");
            }
            else{
                $('#errPassword').text('');
                $('#password, #repeatPassword').removeClass('inputs-err');
                $('#password, #repeatPassword').addClass('inputs-suc'); 
            }
        }  
        else{
            $("#formRegister")[0].reset();
            $.post("index.php", {
                value: "register",
                name:name, 
                surname:surname, 
                username:username, 
                email:email, 
                password :password              
            },function (data) {
                // console.log(data); 
                window.location.replace("index.php?value=home");    
            });
        }
    });

    $("#login").click(function () { 
        let username = $("#userLogin").val();
        let password = $("#passwordLogin").val();

        if(!password || !username){
            if(!username ){
                $('#errUserLogin').text('Fill your username or E-mail');
                $('#userLogin').addClass('inputs-err');
                $('#userLogin').removeClass('inputs-suc');
                }
            else{
                $('#errUserLogin').text('');
                $('#userLogin').removeClass('inputs-err');
                $('#userLogin').addClass('inputs-suc');
            }
            if(!password){
                $('#errPasswordLogin').text('Fill your password');
                $('#passwordLogin').addClass('inputs-err');
                $('#passwordLogin').removeClass('inputs-suc');
                }
            else{
                $('#errPasswordLogin').text('');
                $('#passwordLogin').removeClass('inputs-err');
                $('#passwordLogin').addClass('inputs-suc'); 
            }
        }
        else{
            $.post("index.php", {
                value: "login",
                username:username, 
                password :password              
            },function (data) {
                var status = JSON.parse(data);
                console.log(data);
                if (status.error == 1) {
                    $('#errUserLogin, #errPasswordLogin').text('');
                    $('#errPasswordLogin').text('Please try again with valid data');
                    $('#userLogin').addClass('inputs-err');
                    $('#passwordLogin').addClass('inputs-err');
                }
                else{
                    window.location.replace("index.php?value=home");
                }
            });
        }
    });

    $("#loginGuest").click(function (e) { 
        e.preventDefault();
        $.post("index.php", {
            value: "login",
            username:1, 
            password :1              
        },function (data) {
            var status = JSON.parse(data);
            if (status.error == 1) {
                alert("pleas try again");
            }
            else{
                window.location.replace("index.php?value=home");
            }
        });
    });
    
    function ValidateEmail(mail){
        return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) ? true : false;
    }

    function checkPassword(pass1 , pass2){
        return (pass1 == pass2) ? true : false;
    }

    function checkLength(str, min) { 
        return (str.length > min) ? true : false;
     }

});
