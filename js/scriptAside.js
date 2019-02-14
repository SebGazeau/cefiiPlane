$(document).ready(function($){
setInterval(consommation,1000);
});

var actu =100; /* 980L / 9.8 */
var time;

function consommation(){
    const ratio= 1000000;
    
   var vit = ($("#number").val())/3600;/* en km/sec */
    console.log(vit);
    
    var time2 = 1;  /* set intervall 1000 */
    console.log(vit*time2);
    
    var conso = vit/120*0.32; /* L/km */
    console.log(conso);
    var perte = vit*time2 /* 1 */*conso/9.8;
    console.log(perte);
    
    
    actu = actu - perte*ratio;
    console.log(actu);
    
    $("#fuel").css('width',actu+"%");
}


