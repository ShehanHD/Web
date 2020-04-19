$(document).ready(function(){
    let book;
    let category;

    $.ajax({
        method: "GET",
        url: "index.php",
        data: { "request":"books"}
    })
        .done(function( data ) {
            data = JSON.parse(data);
            console.log(data);
            book = data;
            print("all");     
    });

    $.ajax({
        method: "GET",
        url: "index.php",
        data: { "request":"categories"}
    })
        .done(function( data ) {
            data = JSON.parse(data);
            category = data;
            // console.log(category[0].nome_reparto);
            
    });

    $(".selectCat").on('click', function(e){
        e.preventDefault();
        print(e.target.text);
    })

    const print = (req) =>{
        let str = "";
        let i;
        // console.log(category[0].nome_reparto);
        if(req == "all"){
            for(i=0; i<book.length; i++){
                str += "<div class='col s12 m6 l4 xl3'><div class='card' style='overflow: hidden;'><div class='card-image'>";
                //str += "<span class='reparto'>"+book[i].pagine+"</span>";
                str += "<img height=300 src='media/"+book[i].copertina+"' alt=''>";
                str += "<span class='card-title black' style='padding: 3%; font-size:100%; width: 100%;font-family: Arial, Helvetica, sans-serif'>"+book[i].titolo+"</span>"
                str += "<a href='' class='btn-floating indigo halfway-fab' value='"+book[i].pagine+"'><i class='material-icons'>add_shopping_cart</i></a></div>";
                str += "<div class='card-content center-align'><p style='font-size:80%'>"+book[i].autore+"</p><p style='font-size:70%'>"+book[i].anno+"</p></div>";             
                str += "<div class='card-action center'><span>"+book[i].prezzo+"</span></div></div></div>";                            
            }
        }
        else{
            for(i=0; i<book.length; i++){
                if(req == category[(book[i].id_reparto)-1].nome_reparto){
                    str += "<div class='col s12 m6 l4 xl3'><div class='card' style='overflow: hidden;'><div class='card-image'>";
                    //str += "<span class='reparto'>"+book[i].pagine+"</span>";
                    str += "<img height=300 src='media/"+book[i].copertina+"' alt=''>";
                    str += "<span class='card-title black' style='padding: 3%; font-size:100%; width: 100%;font-family: Arial, Helvetica, sans-serif'>"+book[i].titolo+"</span>"
                    str += "<a href='' class='btn-floating indigo halfway-fab' value='"+book[i].pagine+"'><i class='material-icons'>add_shopping_cart</i></a></div>";
                    str += "<div class='card-content center-align'><p style='font-size:80%'>"+book[i].autore+"</p><p style='font-size:70%'>"+book[i].anno+"</p></div>";             
                    str += "<div class='card-action center'><span>"+book[i].prezzo+"</span></div></div></div>";                                
                }  
            }
        }
        
        document.getElementById("books").innerHTML = str;
    }

});