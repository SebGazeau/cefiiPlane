$(document).ready(function ($) {
    jQuery("#testPopup").click(popScore);
});

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
