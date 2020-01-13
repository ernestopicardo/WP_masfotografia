
function setHeight() {
    var h = $(window).height();
    var w = $(window).width();

    if( w > 767){
        $('.cont_imagen').height(h-100)
    }
}


$(document).ready(setHeight)
$(window).resize(setHeight)
