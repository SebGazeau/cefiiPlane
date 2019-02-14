/* variable globale */
var temps = 1100;
var interval;
var actu = 100; /* 980L / 9.8 */
var time;

/* document ready*/
$(document).ready(function () {
    /* ouverture de la popup score */
    jQuery("#testPopup").click(popScore);
    /* gestion de l'accélération */
    var km = parseFloat($("#kilometers").val());
    $(document).keydown(function acceleration(e) {
            var touche = e.which;
            switch (touche) {
                case 39: //droite
                    console.log(touche);
                    if (temps > 400) {
                        temps -= 100;
                        km += 1;
                        km = km + 29;
                        $("#kilometers").val(km);
                    }
                    break;
                case 37: //gauche
                    console.log(touche);
                    if (temps < 1100) {
                        temps += 100;
                        km -= 1;
                        km = km - 29;
                        $("#kilometers").val(km);
                    }
                    break;
            }

        });
    /* démarrage de l'avion */
    $("#start").click(function () {
        $('#conteneurElis').addClass('rotationEli');
        fond();
        dpcmtOiseau();
        dpcmtOiseau2()
    });
    var test = 1;
    
});

/* gestion altitude de l'avion */
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

/* défilement du paysage */
function fond() {


    console.log(temps);
    $("#imgfond").animate({
        backgroundPosition: "-=500px"
    }, temps, "linear", fond);
}

/* deplacement des oiseaux */
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

function dpcmtOiseau2(){
            $("#oiseau2").animate({left:"-200px"},2000,"linear",function(){
                $(this).css("left","1400px");
                var posY = Math.random()*200;
                posY = Math.floor(posY);
                $(this).css("top",posY+"px");
                test=1;
            });
            setTimeout("dpcmtOiseau2()",1000);
        }
/* gestion d'apparition de la popup score */
function popScore() {
    // ouverture-fermeture popup
    var transp = $("#popupForm,img").css("opacity");
    var pop = $("#contenuPopupFin").attr("pop");
    var slide = $("#popupFin").attr('class');
    //    console.log (slide);

    if (transp == "1") {
        $("#popupForm,img").css('opacity', '0.65');
    } else {
        $("#popupForm,img").css('opacity', '1');
    }
    if (pop == "pop") {
        $("#contenuPopupFin").removeClass("pop");
    } else {
        $("#contenuPopupFin").addClass("pop");
    }
    if (slide == "arcade slide") {
        $("#popupFin").removeClass("slide");
    } else {
        $("#popupFin").addClass("slide");
    }

    jQuery("#contenuPopupFin").fadeToggle(100);
}

/* Plug In Compteur vitesse*/
jQuery(document).ready(function ($) {
    TweenLite.to(needle, 2, {
        rotation: -31,
        transformOrigin: "bottom right"
    });

    // select current content in input boxes on click
    $("input[type='text']").on("click", function () {
        $(this).select();
    });

    //clear kilometers value when miles is selected
    $("#miles").focus(function () {
        $("#kilometers").val('');
    });

    //clear miles value when kilometers is selected
    $("#kilometers").focus(function () {
        $("#miles").val('');
    });

    // convert miles to kilometers
    $('#miles').keyup(function () {
        var mi = $(this).val();
        var miNum = parseInt(mi) * 1.6093;
        //make sure kmNum is a number then output
        if ((mi <= 75) && !isNaN(miNum)) {
            var speedMi = miNum * 2 - 31;
            $('#numbers').css('text-align', 'center');
            $('#kilometers').val(miNum.toFixed(2));
            $('#numbers').html(miNum.toFixed(0));
            $('#mi-km').html('Kilometers');
        } else if (!isNaN(miNum)) {
            var speedMi = 215;
            $('#numbers').css('text-align', 'right');
            $('#kilometers').val(miNum.toFixed(2));
            $('#numbers').html(miNum.toFixed(0));
            $('#mi-km').html('Kilometers');
        } else {
            $('#miles').val('');
            $('#kilometers').val('');
            $('#numbers').html('');
            $("#errmsg").html("Numbers Only").show().fadeOut(1600);
        }

        var needle = $("#needle");
        TweenLite.to(needle, 2, {
            rotation: speedMi,
            transformOrigin: "bottom right"
        });
    });

    // convert kilometers to miles
    $('#kilometers').keyup(function () {
        var km = $(this).val();
        var kmNum = parseInt(km) * 0.62137;
        //make sure kmNum is a number then output
        if ((km <= 195) && !isNaN(kmNum)) {
            var speedKm = kmNum * 2 - 31;
            $('#numbers').css('text-align', 'center');
            $('#miles').val(kmNum.toFixed(2));
            $('#numbers').html(kmNum.toFixed(0));
            $('#mi-km').html('Miles');
        } else if (!isNaN(kmNum)) {
            var speedKm = 215;
            $('#numbers').css('text-align', 'right');
            $('#miles').val(kmNum.toFixed(2));
            $('#numbers').html(kmNum.toFixed(0));
            $('#mi-km').html('Miles');
        } else {
            $('#miles').val('');
            $('#kilometers').val('');
            $('#numbers').html('');
            $("#errmsg").html("Numbers Only").show().fadeOut(1600);
        }

        var needle = $("#needle");
        TweenLite.to(needle, 2, {
            rotation: speedKm,
            transformOrigin: "bottom right"
        });
    });

});

/* timeur */
jQuery(document).ready(function ($) {

    function timer() {
        var maDate = new Date($.now());
        var second = maDate.getSeconds();
        var second = parseInt(second);
        var minute = maDate.getMinutes();
        var minute = parseInt(minute);
       /* console.log("minutes");
        console.log(minute);
        console.log("secondes");
        console.log(second); */
        $('#sec').html(second);
        $('#min').html(minute);
        setTimeout(timer, 1000);
    }
    timer();

});


$(document).ready(function ($) {
    interval = setInterval(consommation, 1000);
    $("#plein").click(plein);
    $("#demarrage").click(demarrage);
});



function consommation() {
    const ratio = 1000000;

    var vit = ($("#number").val()) / 3600; /* en km/sec */
    console.log("vit");
    console.log(vit);

    var time2 = 1; /* set intervall 1000 */
    //    console.log(vit*time2);

    var conso = vit / 120 * 0.32 / 9.8; /* L/km */
    console.log("conso");
    console.log(conso);
    var perte = vit * time2 /* 1 */ * conso;
    console.log("perte");
    console.log(perte);


    actu = actu - perte * ratio;
    console.log("actu");
    console.log(actu);

    $("#fuel").css('width', actu + "%");

    var fuel = $("#fuel").css('width');
    console.log(fuel);
    if (fuel=="0px"){
        clearInterval(interval);
    }
}

function plein() {
    clearInterval(interval);                            /* arrete l'interval continue du calcul de consommation */
    actu = 100;
        $("#fuel").animate({
            "width": "100%"
        }, 1000, "linear", function () {
            consommation;
            interval=setInterval(consommation,1000);    /* relance le calcul continue de la consommation */
            alert("plein fait!!");
        });
}

function demarrage(){
    var fuel = $("#fuel").css('width');
    console.log('fuel='+fuel);
    var reservoir = $("#reservoir").css('width');
    console.log('reservoir='+reservoir);
    
    if (fuel==reservoir){
        alert("le moteur peut démarrer");              /* le reservoir est plein, on peut lancer le moteur  */
    }else{
        console.log('vide');
        var fail = new Audio('../js/son/fail.mp3');
        fail.play();
    }
}
