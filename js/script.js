
$(document).ready(function ($) {
    jQuery("#testPopup").click(popScore);
<<<<<<< HEAD
    jQuery("#submit").click(popForm);
=======
>>>>>>> c34e57b9567cf8d55fe1b13426f26023c979916f
});

function popScore(){
    // ouverture-fermeture popup
    jQuery("#contenuPopupFin").slideToggle();
<<<<<<< HEAD
}



function popForm() {
    // ouverture-fermeture popup
    jQuery("#popupForm").slideToggle();
}
=======
    jQuery("body").not($(this)).css("opacity","0.2");
    jQuery("body").not($(this)).css("opacity","1");
}
>>>>>>> c34e57b9567cf8d55fe1b13426f26023c979916f
