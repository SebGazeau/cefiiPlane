var temps = 1100;
$(document).ready(function () {
    $(document).keydown(function acceleration(e) {
            var touche = e.which;
            switch (touche) {
                case 39: //droite
                    console.log(touche);
                    if (temps > 400) {
                        temps -= 100;
                    }
                    break;
                case 37: //gauche
                    console.log(touche);
                    if (temps < 1100) {
                        temps += 100;
                    }
                    break;
            }

        });
    $("#start").click(function () {
        $('#conteneurElis').addClass('rotationEli');
        fond();
        dpcmtOiseau();
    });


    var test = 1;
    //            setInterval(collision, 20);

    

    /*helice animation*/

});

function dpcmtAvion() {
    $("#avion").animate({
        left: "-200px"
    }, 2000, "linear", function () {
        $(this).css("left", "400px");
        var posY = Math.random() * 400;
        posY = Math.floor(posY);
        $(this).css("top", posY + "px");
        test = 1;
    });
    setTimeout("dpcmtAvion()", 1000);
}
$(document).keydown(function (e) {
    var touche = e.which;
    switch (touche) {
        case 38: //haut

            var avionY = parseFloat($('#avionComplete').css('top'));
            if (avionY >= 15) {
                $('#avionComplete').css('top', "-=20px");
            }
            break;
        case 40: //bas

            var avionY = parseFloat($('#avionComplete').css('top'));
            if (avionY < 370) {
                $('#avionComplete').css('top', "+=20px");
            }
            break;
    }
});




function fond() {


    console.log(temps);
    $("#imgfond").animate({
        backgroundPosition: "-=500px"
    }, temps, "linear", fond);
}


function dpcmtOiseau() {
    $("#oiseau").animate({
        left: "-100px"
    }, 5000, "linear", function () {
        $(this).css("left", "1400px");
        var posY = Math.random() * 200;
        posY = Math.floor(posY);
        $(this).css("top", posY + "px");
        test = 1;
    });
    setTimeout("dpcmtOiseau()", 1000);
}
