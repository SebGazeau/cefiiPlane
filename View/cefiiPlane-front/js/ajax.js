$(document).ready(function ($) {

    $('.typeForm').click(function () {
        var typeForm = $(this).text();
        $('form').attr('id', typeForm);
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
                    url: 'index.php?controller=Login&action=login',
                    type: 'POST',
                    data: param,
                    success: function (data, statut) {
                        console.log(data);
                        if (data = "bonjour") {
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

});

function popForm() {
    // ouverture-fermeture popup
    jQuery("#popupForm").slideToggle();
    jQuery("body").not($(this)).css("opacity", "0.2");
    jQuery("body").not($(this)).css("opacity", "1");
}
