$(document).ready(function () {
    fond();
});
function fond() {
    $("#imgfond").animate({
        backgroundPosition: "-=5000px"
    }, 40000, "linear",fond);
}

$(document).keypress(function(e){
            var touche=e.which;
            switch(touche){
                case 39 : //droite
                    var accel = parseFloat($('#imgfond').css('right'));                   
                    if (accel >= 20){
                           $('#imgfond').css('right', "-=20px");
                    }
                    break;
                case 40 : //bas
                    var accel = parseFloat($('#imgfond').css('right'));
                    if (accel < 292){
                           $('#imgfond').css('right',"+=20px");
                    }
                    break;   
            }
      });