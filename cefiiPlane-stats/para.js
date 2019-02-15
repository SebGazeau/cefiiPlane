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
    displayGraph();
});

function bestScore() {
    $.ajax({
        url: "../index.php?controller=score&action=bestPersonalScore",
        success: function (data) {
            $("#bestScore").text(data);
        }
    })
}

function displayGraph() {
    var ctx = document.getElementById('chart').getContext('2d');
    var column = "take_off";
    var param = {
        // numéro de vol
        "id_flight": 3,
        // colonne à afficher (on_off, speed, take_off, altitude, fuel_level, crash)
        "column": column
    }
    
    $.ajax({
            url: "../index.php?controller=blackBox&action=displayGraph",
            type: "POST",
            data: param,
            dataType: "json",
            success: function(response) {
                chart(response, column);
            }
        });
}

function chart(response, column) {
    console.log(response);
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
