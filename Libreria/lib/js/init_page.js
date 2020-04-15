$(document).ready(function(){
    $.getJSON('/Libreria/books.json', 
        function (data) {
        let str = "";
        let i,j;

            for(i=0; i<data.length; i++){
                str += "<div class='col s12 m6 l4 xl3'><div class='card' style='overflow: hidden;'><div class='card-image'>";
                str += "<span class='reparto'>"+data[i].pages+"</span>";
                str += "<img height=300 src='/Libreria/"+data[i].imageLink+"' alt=''>";
                str += "<span class='card-title black' style='padding: 3%; font-size:100%; width: 100%;font-family: Arial, Helvetica, sans-serif'>"+data[i].title+"</span>"
                str += "<a href='' class='btn-floating indigo halfway-fab' value='"+data[i].pages+"'><i class='material-icons'>add_shopping_cart</i></a></div>";
                str += "<div class='card-content center-align'><p style='font-size:80%'>"+data[i].author+"</p><p style='font-size:70%'>"+data[i].year+"</p><a target='_blank' style='font-size:65%' href='"+data[i].link+"'>more information</a></div>";             
                str += "<div class='card-action center'><span>PRICE: $30.00</span></div></div></div>";                            
            }
            document.getElementById("books").innerHTML = str;
        });
});