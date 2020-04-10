function primo(){

  var x = setInterval(function(){

  var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("demo").innerHTML = this.responseText;
              }
          };

          xmlhttp.open("GET", "dati.txt" , true);
          xmlhttp.send();
    },1000);
}

function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";

}
