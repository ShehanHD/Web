$(document).ready(function(){
    $('.sidenav').sidenav({
        draggable:true
    });
    $('.modal').modal({
        dismissible:false,
        startingTop: '80%',
        endingTop: '15%'
    });
    // $('.tabs').tabs();
    // $('.tooltipped').tooltip({
    //     position: 'left'
    // });
    $('.dropdown-trigger').dropdown({
        constrainWidth: true,
        coverTrigger: false
    });
});