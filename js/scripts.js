
/*BOTON IR ARRIBA*/
$(document).ready(function(){
    $('.ir-arriba').click(function(){
        $('body, html').animate({
            scrollTop: '0px'
        }, 300);
    });
    $(window).scroll(function(){
        if( $(this).scrollTop() > 150 ){
            $('.ir-arriba').slideDown(400);
        } else {
            $('.ir-arriba').slideUp(400);
        }
    });

});




