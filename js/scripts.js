function SetHeight(){
    var w = $(window).width();
    if( w > 767 ){
            var h = $(window).height();
            $(".cont-img").height(h-100);
    } 
}

$(document).ready(SetHeight);
$(window).resize(SetHeight);