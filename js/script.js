$(document).ready(function ($) {
    jQuery("#testPopup").click(popScore);
});

function popScore(){
    // ouverture-fermeture popup
    jQuery("#contenuPopupFin").slideToggle();
    jQuery("body").not($(this)).css("opacity","0.2");
    jQuery("body").not($(this)).css("opacity","1");
}