

$(document).ready(function(){
    // $('.one').hide(1000);   // hide "one" class

    $('.one #btn1').click(function(){
        $(this).hide(1000);
        $('.one2 p').hide(1000);
        $('.one p').show(1000);
        $('.one2 #btn2').show(1000);
    }); 

    $('.one2 #btn2').click(function(){
        $(this).hide(1000);
        $('.one p').hide(1000);
        $('.one2 p').show(1000);
        $('.one #btn1').show(1000);
    });
});