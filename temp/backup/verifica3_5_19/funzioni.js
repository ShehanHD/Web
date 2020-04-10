function f1() {
  var value = $("#value").val();
  var rigCol = $("#rigCol").val();

  if(rigCol == ""){
    $('#rigCol').removeClass('is-valid');
    $('#rigCol').addClass('is-invalid');
    $("#rigCol").attr("placeholder","Inserire un valore");
  }
  else{
    $('#rigCol').addClass('is-valid');
    $('#rigCol').removeClass('is-invalid');

  $.post("controllo.php",{
    value:value,
    rigCol:rigCol
  },function(data) {

    var matrice = JSON.parse(data);
    console.log(matrice);
    console.log(matrice[0].length);


    var str="";

    $("#demo").fadeIn(1000);
    $("#demo2").fadeOut(100);
    $("#demo3").fadeOut(1000);
    $("#terza").attr("disabled",false);
    $("#dioPrim").attr("disabled",false);
    $("#dioSecon").attr("disabled",false);

    for(x = 0; x < 2; x++) {
      str += "<div class='col mt-3 text-center' id='div"+x+"'><h3>"+(x+1)+"° MATRICE</h3><table class='table text-center'>";
      for (var i = 0; i < matrice[0].length; i++) {
        str += "<tr>";
        for (var j = 0; j < matrice[1].length; j++) {
          str += "<td style='border:1px solid black'>"+matrice[x][i][j];+"</td>";
        }
        str += "<tr>";
      }
      str += "</table></div>";
    }
    document.getElementById('demo').innerHTML = str;


    $("#terza").on('click',function(){
      $("#demo2").fadeIn(1000);
      $("#div0, #div1").fadeOut(100);
      $("#terza").attr("disabled",true);

      for(var x = 2; x < 3; x++) {
        str += "<div class='col mt-3 text-center' id='div"+x+"'><h3>"+(x+1)+"° MATRICE</h3><table class='table text-center'>";
        for (var i = 0; i < matrice[0].length; i++) {
          str += "<tr>";
          for (var j = 0; j < matrice[1].length; j++) {
            str += "<td style='border:1px solid black'>"+matrice[x][i][j];+"</td>";
          }
          str += "<tr>";
        }
        str += "</table></div>";
      }
      document.getElementById('demo2').innerHTML = str;
    });

  $("#dioPrim").on('click',function(){
    $("#demo3").fadeOut(1000);
    $("#demo3").fadeIn(1000);
    $("#dioSecon").attr("disabled",false);
    $("#dioPrim").attr("disabled",true);
    if(matrice[3]==1 && matrice[4]==1){
        document.getElementById('demo3').innerHTML = "La somma del Diogonale primaria(1° Matrice) è: "+matrice[5]+"<br>La somma del Diogonale primaria(2° Matrice) è: " +matrice[6];
    }
    else{
      if(matrice[3]==2 && matrice[4]==0){
      document.getElementById('demo3').innerHTML = "Il valore Massimo Diogonale primaria e valore Pari troviamo in 2° Matrice è: " +matrice[5];
      }
      if(matrice[3]==0 && matrice[4]==2){
        document.getElementById('demo3').innerHTML = "Il valore Massimo Diogonale primaria e valore Pari troviamo in 1° Matrice è: " +matrice[6];
      }
    }
  });

  $("#dioSecon").on('click',function(){
    $("#demo3").fadeOut(1000);
    $("#demo3").fadeIn(1000);
    $("#dioPrim").attr("disabled",false);
    $("#dioSecon").attr("disabled",true);
    if(matrice[7]==1){
      var min1 = "<i style='color:red'><-- Il valore Minimo</i>";
    }
    else {
      var min1 = "";
    }
    if(matrice[8]==1){
      var min2 = "<i style='color:red'><-- Il valore Minimo</i>";
    }
    if(matrice[7]) {
      var min2 = "";
    }

    document.getElementById('demo3').innerHTML = "La somma del Diogonale Secondaria(1° Matrice) è: "+matrice[9]+min1+"<br>La somma del Diogonale Secondaria(2° Matrice) è: " +matrice[10]+min2;

  });
  });
  }
}
