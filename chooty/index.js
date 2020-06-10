let tipo;
let ingre;
let prezzo;
let mail;
let PASSWORD;


var menu;
var cart = [];

function setList(user=false) {
    $.ajax({
        method: "GET",
        url: "food.php",
        data: {
            req: "show",
        },
    }).done(function (data) {
        data = JSON.parse(data);
        saveData(data);
        printMenu(data, "ilMenu", user);
    });
}

function saveData(data) {
    menu = data;
}

function printMenu(data, dove, user=false) {
    if (dove == "ilMenu" && user == false) {
        var ul = document.getElementById("ilMenu"); 
        ul.innerHTML = "";
    }else if (dove == "ilMenu" && user == true) {
        var ul = document.getElementById("ilMenu"); 
        ul.innerHTML = "";
    }else if (dove == "delMenu") {
        var ul = document.getElementById("delMenu");
        ul.innerHTML = "";
    } else if (dove == "cart") {
        var ul = document.getElementById("ilCarello");
        document.getElementById("badge").innerHTML=data.length;
        if(data.length != 0){
            document.getElementById("submit-order").classList.remove("disabled");
        }
        else{
            document.getElementById("submit-order").classList.add("disabled");
        }
        ul.innerHTML = "";
    } else {
        alert("error");
    }

    for (let i = 0; i < data.length; i++) {
        var li = document.createElement("li");
        var img = document.createElement("img");
        var span = document.createElement("span");
        var p = document.createElement("p");
        var p2 = document.createElement("p");
        var I = document.createElement("i");

        if (dove == "ilMenu" && user == false) {
            var a = document.createElement("a");
            var iText = document.createTextNode("shopping_cart");
            a.addEventListener('click', function (e) {
                addCart(data[i][0]);
            })
            a.classList.add("secondary-content","btn-floating" , "right", "disabled");
            I.classList.add("material-icons");
        }
        if (dove == "ilMenu" && user == true) {
            var a = document.createElement("a");
            var iText = document.createTextNode("shopping_cart");
            a.addEventListener('click', function (e) {
                addCart(data[i][0]);
            })
            a.classList.add("secondary-content","btn-floating" , "right");
            I.classList.add("material-icons");
        } else if (dove == "delMenu") {
            var a = document.createElement("a");
            var iText = document.createTextNode("delete");
            a.addEventListener('click', function (e) {
                delFood(data[i][0]);
            })
            a.classList.add("secondary-content", "red-text", "right");
            I.classList.add("material-icons");
        } else if (dove == "cart") {
            var a = document.createElement("a");
            var iText = document.createTextNode("remove_shopping_cart");
            a.addEventListener('click', function (e) {
                removeFood(data[i][0]);
            })
            a.classList.add("secondary-content", "red-text", "right");
            I.classList.add("material-icons");
        }


        li.classList.add("collection-item", "avatar");
        img.classList.add("circle");
        span.classList.add("title", "left");

        img.setAttribute("src", "https://www.tavolartegusto.it/wp/wp-content/uploads/2019/02/pizza-a-forma-di-cuore-Ricetta-Pizza-a-cuore.jpg");

        var spanText = document.createTextNode(data[i][1]);
        var pText = document.createTextNode(data[i][2]);
        var pText2 = document.createTextNode(data[i][3]);

        span.appendChild(spanText);
        p.appendChild(pText);
        p2.appendChild(pText2);
        I.appendChild(iText);
        a.appendChild(I);

        li.appendChild(img);
        li.appendChild(span);
        li.appendChild(p);
        li.appendChild(p2);
        li.appendChild(a);

        ul.appendChild(li);
    }
}

function addCart(id){
    var select = menu.filter((element) => {
        return element[0] == id
    });

    cart = [...cart, ...select];

    CartToDB(select);
    printMenu(cart, "cart");
}

function delFood(id){
    $.ajax({
        method: "GET",
        url: "food.php",
        data: {
            req: "del",
            id
        },
    }).done(function (data) {
        if(data == 0){
            location.reload();
        }
        else{
            alert("Error");
        }
    });
}

function removeFood(id) {
    console.log(cart);
    cart = cart.filter((element) => {
        return element[0] != id
    });
    console.log(cart);
    
    RemFromDB(id);
    printMenu(cart, "cart");
}

function CartToDB(cart){
    $.ajax({
        method: "GET",
        url: "food.php",
        data: {
            req: "addCart",
            cart
        },
    }).done(function (data) {
        data = JSON.parse(data);
        console.log(data);
    });
}

function RemFromDB(id){
    $.ajax({
        method: "GET",
        url: "food.php",
        data: {
            req: "delCart",
            id
        },
    }).done(function (data) {
        console.log(data);
    });
}

document.getElementById("tipo").addEventListener('input', function (e) {
    tipo = e.target.value;
})
document.getElementById("ingre").addEventListener('input', function (e) {
    ingre = e.target.value;
})
document.getElementById("prezzo").addEventListener('input', function (e) {
    prezzo = e.target.value;
})

document.getElementById("tipo-edit").addEventListener('input', function (e) {
    tipo = e.target.value;
})
document.getElementById("ingre-edit").addEventListener('input', function (e) {
    ingre = e.target.value;
})
document.getElementById("prezzo-edit").addEventListener('input', function (e) {
    prezzo = e.target.value;
})

document.getElementById("submit-addFood").addEventListener('click', function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "food.php",
        data: {
            req: "add",
            tipo,
            ingre,
            prezzo
        },
        success: function (data) {
            if(data == 0){
                location.reload();
            }
            else{
                alert("Error");
            }
      
        }
    });
})

document.getElementById("submit-editFood").addEventListener('click', function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "food.php",
        data: {
            req: "edit",
            tipo,
            ingre,
            prezzo

        },
        success: function (data) {
            if(data == 0){
                location.reload();
            }
            else{
                alert("Error");
            }
        }
    });
})

document.getElementById("submit-order").addEventListener('click', function (e) {
    e.preventDefault();
    alert("Grazie aver confermato suoi ordini.Consegna tre 20 minuti.")
})

document.getElementById("submit-regis").addEventListener('click', function(e){
    e.preventDefault();
    let nome= document.getElementById("regis-nome").value;
    let cognome=document.getElementById("regis-cognome").value;
    let indirizzo=document.getElementById("regis-indirizzo").value;
    let citta=document.getElementById("regis-citta").value;
    let cappa=document.getElementById("regis-cappa").value;
    let telefono=document.getElementById("regis-telefono").value;
    let mail=document.getElementById("regis-mail").value;
    let PASSWORD=document.getElementById("regis-PASSWORD").value;
    $.ajax({
        type:"POST",
        url:"food.php",
        data: {
            req:"regis",
            nome,
            cognome,
            indirizzo,
            citta,
            cappa,
            telefono,
            mail,
            PASSWORD,
        },
        success:function(data){
            console.log(data);
        }
    })
    
})

document.getElementById("submit-login").addEventListener('click', function (e) {
    e.preventDefault();
    var mail = document.getElementById("mail").value;
    var PASSWORD = document.getElementById("PASSWORD").value;
    $.ajax({
        type: "POST",
        url: "food.php",
        data: {
            req: "login",
            mail,
            PASSWORD,
        },
        }).done(function (data) {
            if(data==1){
                location.reload();
            } 
            else{
                alert("Cresenziali non sono giusti");
            }
        });
})

document.getElementById("logout").addEventListener('click', function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "food.php",
        data: {
            req: "logout"
        },
        success: function (data) {
            if(data==1){
                location.reload();
            } 
            else{
                alert("Cresenziali non sono giusti");
            }
        }
    });

})
