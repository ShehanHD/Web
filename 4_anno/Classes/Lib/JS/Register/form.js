$(document).ready(function(){
    $('.datepicker').datepicker();

const verify = new ControlForm("index.php");

let name;
let surname;
let gender;
let userCountry;
let email;
let password;

let country;
$.ajax({
    method: "GET",
    url: "./paesi.json",
})
    .done(function( data ) {
        country = data;   
});
document.getElementById("re_password").disabled = true;


document.getElementById('submit').addEventListener('click', function (e){
    e.preventDefault();
    gender = setGender();
    userCountry = setUserCountry();

    verify.send("POST", {name, surname})
    
})

document.getElementById('first_name').addEventListener('input', function (e){
    // name = setName(e);
    console.log(e);
    
})


document.getElementById('last_name').addEventListener('input', function (e){
    surname = setSurname(e);
})

document.getElementById('email').addEventListener('input', function (e){
    setEmail(e);
})

document.getElementById('password').addEventListener('input', function (e){
    setPassword(e);
})

document.getElementById('re_password').addEventListener('input', function (e){
    compPassword(password, e);
})

document.getElementById("inCountry").addEventListener('input', function(e){
    setCountries(e);
})



const setName = (e) =>{
    if(verify.verifyValue(e, /^[a-zA-Z\ ]{2,}$/)){  
        e.target.className='valid'; 
        document.getElementById("errName").innerHTML = "";
        return e.target.value;  
    }
    else{
        document.getElementById("errName").innerHTML = "Must contain more than 2 alphabetical letters";
        e.target.className='invalid';
    }
}

const setSurname = (e) =>{
    if(verify.verifyValue(e, /^[a-zA-Z\ ]{2,}$/)){  
        e.target.className='valid'; 
        document.getElementById("errLastName").innerHTML = "";
        return e.target.value;  
    }
    else{
        document.getElementById("errLastName").innerHTML = "Must contain more than 2 alphabetical letters";
        e.target.className='invalid';
    }
}

const setEmail = (e) =>{
    if(verify.verifyValue(e, /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)){
        document.getElementById("errEmail").innerHTML = "";
        email = e.target.value;  
    }
    else{
        document.getElementById("errEmail").innerHTML = "Add a valid e-mail!";
    }
}

const setPassword = (e) =>{
    if(verify.verifyValue(e, /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)){
        password = e.target.value;  
        e.target.className='valid';
        document.getElementById("errPass").innerHTML = "";
        document.getElementById("re_password").disabled = false;
    }
    else{
        document.getElementById("errPass").innerHTML = "should contain at least one digit, one lower case, one upper case and more than 8 characters";
        e.target.className='invalid'; 
        document.getElementById("re_password").disabled = true;
    }
}

const compPassword = (password, e) =>{
    if(verify.comparePass(password, e)){
        e.target.className='valid';
        document.getElementById("errMatch").innerHTML = "";
    }
    else{
        e.target.className='invalid';
        document.getElementById("errMatch").innerHTML = "Password doesn't match";
    }
}

const setGender = () =>{
    const gen = document.querySelectorAll('input[name="gender"]');
    let value;
    gen.forEach(element => {
        if (element.checked) {
            value = element.value;
        }
    });
    return value;
};

const setCountries = (e) =>{
    const searchString = e.target.value;
    
    const test = country.filter(item => {
        return (
            item.name.includes(searchString)
        )
    });

    
    let dataList = document.getElementById("country");
    dataList.innerHTML="";
    console.log(test);
    
    test.forEach(element => {
        let node = document.createElement("option");
        let text = document.createTextNode(element.name);

        node.appendChild(text);
        dataList.appendChild(node);
    });
}

const setUserCountry = () =>{
    return document.getElementById("country").value;
}

})
