$(document).ready(function ($) {
    jQuery("#testPopup").click(popScore);
})

function popScore() {
    // ouverture-fermeture popup
    jQuery("#contenuPopupFin").slideToggle();
}
