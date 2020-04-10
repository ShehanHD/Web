$(window).on('load',function(){
    $("#articleIntro").show("1");
    $("#intro").addClass("selected");
    $("#intro").click(function () { 
        $("#intro").addClass("selected");
        $("#materials, #projects, #feedback, #contacts").removeClass("selected");
        $("#articleIntro").slideDown("1");
        $("#welcome, #articleMaterials, #articleProjects, #articleFeedback, #articleContacts").hide("1");
    });
    $("#materials").click(function () { 
        $("#materials").addClass("selected");
        $("#intro, #projects, #feedback, #contacts").removeClass("selected");
        $("#articleMaterials").slideDown("1");
        $("#welcome, #articleIntro, #articleProjects, #articleFeedback, #articleContacts").hide("1");
    });
    $("#projects").click(function () { 
        $("#projects").addClass("selected");
        $("#intro, #materials, #feedback, #contacts").removeClass("selected");
        $("#articleProjects").slideDown("1");
        $("#welcome, #articleIntro, #articleMaterials, #articleFeedback, #articleContacts").hide("1");
    });
    $("#feedback").click(function () { 
        $("#feedback").addClass("selected");
        $("#intro, #materials, #projects, #contacts").removeClass("selected");
        $("#articleFeedback").slideDown("1");
        $("#welcome, #articleIntro, #articleMaterials, #articleProjects, #articleContacts").hide("6s");
    });
    $("#contacts").click(function () { 
        $("#contacts").addClass("selected");
        $("#intro, #materials, #projects, #feedback").removeClass("selected");
        $("#articleContacts").slideDown("1");
        $("#welcome, #articleIntro, #articleMaterials, #articleProjects, #articleFeedback").hide("1");
    });

    $("#feedbackdisable, #contactsdisable").click(function () { 
        alert("you need to register to have this service")
    });


    $("#logout").click(function () { 
        $.post("index.php", {
            value: "logout"           
        },function (data) {
            console.log(data);
            window.location.replace("index.php");           
        });
    });
});

