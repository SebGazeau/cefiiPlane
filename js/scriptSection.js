<<<<<<< HEAD
     
        $(document).ready(function(){
            var test = 1;
            dpcmtOiseau();
            setInterval(collision, 20);
        });
    
   function dpcmtAvion(){
            $("#avion").animate({left:"-200px"},2000,"linear",function(){
                $(this).css("left","400px");
                var posY = Math.random()*400;
                posY = Math.floor(posY);
                $(this).css("top",posY+"px");
                test=1;
            });
            setTimeout("dpcmtAvion()",1000);
        }
        $(document).keydown(function(e){
            var touche=e.which;
            switch(touche){
                case 38 : //haut
                    var avionY = parseFloat($('#avion').css('top'));                   
                    if (avionY >= -280){
                           $('#avion').css('top', "-=20px");
                    }
                    break;
                case 40 : //bas
                    var avionY = parseFloat($('#avion').css('top'));
                    if (avionY < -15){
                           $('#avion').css('top',"+=20px");
                    }
                    break;   
            }
      });
    
=======
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
>>>>>>> 1a74a994d0bb4d30cc00f4eb2ca4e72927a28a8e
