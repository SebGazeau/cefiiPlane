		$(document).ready(function () {
            $('#content1').css({
		                    "display": "none"
		                });
              $('#content2').css({
		                    "display": "none"
		                });

		            $('#tab').on("click", function () {
		                $("#content1").css({
		                    "display": "block"
		                });
		                $("#content2").css({
		                    "display": "none"
		                });
		            });

		            $('#graph').on("click", function () {
		                $("#content1").css({
		                    "display": "none"
                        });
                            $("#content2").css({
		                    "display": "block"
		                });
		            });
        });