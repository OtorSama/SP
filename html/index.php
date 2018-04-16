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
		<div id="output"></div>

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
				dataType: "html",
				success: function( returnData ){
					$("#output").html(returnData);
				}
			});
		}

	</script>
	 
</html>