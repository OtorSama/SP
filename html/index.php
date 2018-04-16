<?
	require("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Bread Classifier</title>
		<script type="text/javascript" src="script/jquery.min.js"></script>
	</head>
	<body>
		<p>This is a sample body</p>
		<div>
			<input name="imageFle" type="file" placeholder="Upload an image">
			<button id="predictButton" type="button">Predict</button>
		</div>
		<!--<div id="output"></div> -->
		<div id="p1"></div>
		<div id="p2"></div>
		<div id="p3"></div>
		<div id="p4"></div>
		<div id="p5"></div>

	</body>
	<!-- Scripts -->
	<script>
		$(document).ready(function() {

			$(document).on("click","#predictButton", doPrediction);
		});

		function doPrediction(){
			var image_file = "dogImage.jpg";
			$.ajax({
				url: "html/prediction.php?image_file="+image_file,
				type: "get",
				dataType: "JSON",
				success: function( returnData ){
					//$("#output").html(returnData);
					$("#p1").html(returnData[0]["breed_name"]);
					$("#p2").html(returnData[1]["breed_name"]);
					$("#p3").html(returnData[2]["breed_name"]);
					$("#p4").html(returnData[3]["breed_name"]);
					$("#p5").html(returnData[4]["breed_name"]);
				}
			});
		}

	</script>
	 
</html>