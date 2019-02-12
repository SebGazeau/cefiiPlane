<<<<<<< HEAD
$(document).ready(function($){
    $("#submit").click(function(){
        var name = $('#name').val();
        var password = $('#password').val();
        var email = $('#email').val();
        var param = "name="+name+"&email="+email+"&password="+password;
        console.log(param);
        $.ajax({
            url: 'js/test.php',
            type: 'POST',
            data: param,
            success: function(param, statut){
                console.log("envoie =>"+param);
                console.log("statut =>"+statut);
            },error:function(r,s,e){
                console.log("r"+r+"s"+s+"e"+e)
            }
        });
    });
=======
titre 
$(document).ready(function($){
  $("#submit").click(function(){
    var name = $('#name').val();
    var password = $('#password').val();
    var email = $('#email').val();
    var param = "name="+name+"&email="+email+"&password="+password;
    console.log(param);
    $.ajax({
      url: 'js/test.php',
      type: 'POST',
      data: param,
      success: function(param, statut){
        console.log("envoie =>"+param);
        console.log("statut =>"+statut);
      },error:function(r,s,e){
        console.log("r"+r+"s"+s+"e"+e)
      }
    })
  });
});

$(document).ready(function ($) {
   jQuery("#testPopup").click(popScore);
   jQuery("#submit").click(popForm);
});




function popScore() {
   jQuery("#contenuPopupFin").slideToggle();
}

function popForm() {
   // ouverture-fermeture popup
   jQuery("#popupForm").slideToggle();
   jQuery("body").not($(this)).css("opacity", "0.2");
   jQuery("body").not($(this)).css("opacity", "1");
}
document.getElementById("valid").addEventListener("click", function () {
if ($("#name") != true) {
   alert("Veuillez renseigner un pseudo.");
}
if ($("#password") != true) {
   alert("Veuillez choisir un mot de passe.");
}
var regExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var datum = document.getElementById("email").value;
var champs = document.createElement('p').innerHTML = "Champs obligatoire";

if (regExp.test(datum)) {
   alert("email confirmed");
} else {
   alert("Veuillez remplir les champs obligatoire")
   document.getElementById('email').style.borderColor = 'red';
   document.getElementById('email').style.textTransform = "uppercase";
   document.getElementById('email').parentNode.append(champs);
}
});
>>>>>>> 5d777a8bb776b1e29ebd11a79311e4f41d6e9a76
});
