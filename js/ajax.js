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
                    url: urlLogin,
                    type: 'POST',
                    data: param,
                    success: function (data, statut) {
                        console.log("voici le message"+data);
                        console.log("voici l'email"+email);
                        
                        if (data == "Your email is incorrect please try!") {
                           
                           alert ("mail inconnu");
                        }
                        if (data=="Connected"){
                            alert("vous êtes connecté");
                            popForm();
                        }
                    },
                    error: function (r, s, e) {
                        console.log("r=>" + r + "s=>" + s + "e=>" + e)
                    },
                    complete: function(r, s){
                        console.log("je suis là");
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
});

function popForm() {
    // ouverture-fermeture popup
    $('aside').slideDown();
    jQuery("#popupForm").slideToggle();
    jQuery("body").not($(this)).css("opacity", "0.2");
    jQuery("body").not($(this)).css("opacity", "1");
}
