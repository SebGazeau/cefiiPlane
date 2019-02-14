$(document).ready(function () {
    $('#content1').css({
        "display": "none"
    });
    $('#content2').css({
        "display": "none"
    })
    
    $('#tab').on("click", function () {
        $("#content1").css({
            "display": "block"
        });
        $("#content2").css({
            "display": "none"
        });
    })
    $('#graph').on("click", function () {
        $("#content1").css({
            "display": "none"
        });
        $("#content2").css({
            "display": "block"
        });
    });
    
    bestScore();
});

function bestScore() {
    $.ajax({
        url: "../index.php?controller=score&action=bestPersonalScore",
        success: function (data) {
            $("#bestScore").text(data);
        }
    })
}
