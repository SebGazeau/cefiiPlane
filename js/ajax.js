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
});
