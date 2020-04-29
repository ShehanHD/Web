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