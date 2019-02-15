var urlLogin = "index.php?controller=login&action=login";

$(document).ready(function ($) {

    $('.typeForm').click(function () {
        var typeForm = $(this).text();
        $('form').attr('id', typeForm);
    });
    $("#connect").click(function () {
        $(this).toggleClass("background");
        $("#inscript").removeClass("background");
        $("#formul").html("FORMULAIRE DE CONNEXION");
        urlLogin = "index.php?controller=login&action=login";

    });
    $("#inscript").click(function () {
        $(this).toggleClass("background");
        $("#connect").removeClass("background");
        $("#formul").html("FORMULAIRE D'INSCRIPTION");
        urlLogin = "index.php?controller=register&action=addUser";

    });


    $("#submit").click(function () {
        var regExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var name = $('#name').val();
        var password = $('#password').val();
        var email = $('#email').val();
        var form = $('form').attr('id');
        console.log(form);
        if (name != '' && password != '' && email != '') {
            if (regExp.test(email)) {
                var param = "name=" + name + "&email=" + email + "&password=" + password;
                $.ajax({
                    url: 'js/' + form + '.php',
                    type: 'POST',
                    data: param,
                    success: function (data, statut) {
                        console.log(data);
                        if (data == "connexion" || data == "inscription") {
                            popForm();
                        } else {
                            alert("erreur");
                        }
                    },
                    error: function (r, s, e) {
                        console.log("r=>" + r + "s=>" + s + "e=>" + e)
                    }
                })
            } else {
                alert('mail incorrect !')
                $('#email').css({
                    'borderColor': 'red'
                });
            }
        } else {
            alert('veuillez remplir tous les champs');
        }
    });
    $('#testPopup').click(function () {
        var score = 45;
        var idJoueur = "joueur test";
        var info = 'idJoueur=' + idJoueur + '&score=' + score;
        $.ajax({
            url: 'js/resultat.php',
            type: 'POST',
            data: info,
            success: function (dataInfo) {
                $('#listeScore').append(dataInfo);
                console.log(dataInfo);
            }
        })

    });

});

function popForm() {
    // ouverture-fermeture popup
    $('aside').slideDown();
    jQuery("#popupForm").slideToggle();
    jQuery("body").not($(this)).css("opacity", "0.2");
    jQuery("body").not($(this)).css("opacity", "1");
}
