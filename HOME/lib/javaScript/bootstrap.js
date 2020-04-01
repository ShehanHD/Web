$(document).ready(function(){
  
$("#ard").hide();

$('.carousel').carousel({
    interval: 2000
});
$("#menuHome, #menuMaterial, #menuProjects, #menuTask").on("click", function(){
              
            $("#menuHome").on("click",function(){
              document.querySelector('#carouselExampleIndicators').scrollIntoView({ 
                behavior: 'smooth' 
            });
            });

            $("#menuMaterial").on("click",function(){
              document.querySelector('#materials').scrollIntoView({ 
                behavior: 'smooth' 
              });
            });

            $("#menuProjects").on("click",function(){
              document.querySelector('#projects').scrollIntoView({ 
                behavior: 'smooth' 
              });
            });

            $("#menuTask").on("click",function(){
              document.querySelector('#task').scrollIntoView({ 
                behavior: 'smooth' 
              });
            });

  $("#ard").hide();
  $("#first").show();
});

$("#arduino").on("click", function(){
  $("#first").hide();
  $("#ard").show();
});


$("#body01").on("click", function(){
  $("#body1").toggle("slow");
});
$("#body02").on("click", function(){
  $("#body2").toggle("slow");
});

$("#task01").on("click", function(){
  $("#task1").toggle("slow");
});
$("#task02").on("click", function(){
  $("#task2").toggle("slow");
});
$("#task03").on("click", function(){
  $("#task3").toggle("slow");
});
$("#task04").on("click", function(){
  $("#task4").toggle("slow");
});
$("#task05").on("click", function(){
  $("#task5").toggle("slow");
});

});