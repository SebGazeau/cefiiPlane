
$(document).ready(function ($) {
    jQuery("#testPopup").click(popScore);
    jQuery("#submit").click(popForm);
});

function popScore(){
    // ouverture-fermeture popup
    jQuery("#contenuPopupFin").slideToggle();
}



function popForm() {
    // ouverture-fermeture popup
    jQuery("#popupForm").slideToggle();
    jQuery("body").not($(this)).css("opacity","0.2");
    jQuery("body").not($(this)).css("opacity","1");
}

