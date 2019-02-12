$(document).ready(function ($) {
    $("#testPopup").click(popScore);
});

function popScore() {
    // ouverture-fermeture popup
    $(".popup").slideToggle();
}
