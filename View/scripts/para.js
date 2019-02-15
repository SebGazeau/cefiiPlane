$(document).ready(function () {
    $('#content1').css({
        "display": "none"
    });
    $('#content2').css({
        "display": "none"
    })
    
    $('#board').on("click", function () {
        $("#content1").css({
            "display": "block"
        });
        $("#content2").css({
            "display": "none"
        });
    })
    $('#chart').on("click", function () {
        $("#content1").css({
            "display": "none"
        });
        $("#content2").css({
            "display": "block"
        });
    });
    
    bestScore();
    optionsIdFlight();
    displayStats();
    $("#column, #id_flight").change(displayGraph);
});

function bestScore() {
    $.ajax({
        url: "index.php?controller=score&action=bestPersonalScore",
        success: function (data) {
            $("#bestScore").text(data);
        }
    })
}

function displayGraph() {
    var ctx = document.getElementById('scatterChart').getContext('2d');
    var column = $("#column").val();
    var id_flight = $("#id_flight").val();
    var param = {
        // numéro de vol
        "id_flight": id_flight,
        // colonne à afficher (on_off, speed, take_off, altitude, fuel_level, crash)
        "column": column
    }
    
    $.ajax({
            url: "index.php?controller=blackBox&action=displayGraph",
            type: "POST",
            data: param,
            dataType: "json",
            success: function(response) {
                chart(response, column, ctx);
            }
        });
}

function chart(response, column, ctx) {
    var scatterChart = new Chart(ctx, {
        type: 'scatter',
        data: {
            datasets: [{
                aspectRatio: 1,
                label: column,
                responsive: false,
                showLine: true,
                lineTension: 0,
                borderColor: "#5008D1",
                data: response
            }]
        },
        options: {
            aspectRatio: 3,
            scales: {
                xAxes: [{
                    type: 'linear',
                    position: 'bottom',
                    scaleLabel: {
                        display: true,
                        labelString: 'time'
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: column
                    }
                }],
            }
        }
    });
}

function optionsIdFlight() {
    $.ajax({
        url: "index.php?controller=flight&action=ajaxFlight",
        success: function (data) {
            $("#id_flight").html(data);
            displayGraph();
        }
    })
}

function displayStats() {
    $.ajax({
        url: "index.php?controller=blackBox&action=displayFlight",
        success: function (data) {
            console.log(data);
            $("#content1 tbody").html(data);
        }
    })
}
