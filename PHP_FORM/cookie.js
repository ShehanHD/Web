let country;

$.ajax({
    method: "GET",
    url: "./paesi.json",
})
    .done(function( data ) {
        country = data;   
});


document.getElementById("inCountry").addEventListener('input', function(e){
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
    
    
})

const del = (id) => {
    let allcookies  =  decodeURIComponent(document.cookie);
    let str="";

    for(i=5; i<allcookies.length; i++){
        str += allcookies[i];
    }

    let cookiearray = JSON.parse(str); 

    cookiearray = cookiearray.filter((element) => element['id'] != id );

    document.cookie = "data=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    document.cookie= "data=" + encodeURIComponent(JSON.stringify(cookiearray))+"; expires=3600 ; path=/;";

    location.reload();
}
