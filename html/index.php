<?
	require("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Bread Classifier</title>
		<?php require('require.php'); ?>
	</head>
	<body>
		<?php require('navbar.php'); ?>
		<p>This is a sample body</p>
		<div>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				Select image to predict.
				<input name="imageFile" type="file" id="imageFile">
				<input type="submit" value="Upload Image" name="submit">
			</form>
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
				url: "prediction.php?image_file="+image_file,
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