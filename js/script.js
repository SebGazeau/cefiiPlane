
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
    
}

