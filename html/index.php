<?
	require("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Bread Classifier</title>
		<?php require('require.php'); ?>
		<style>
			.predicted:hover {
				background-color: blue;
			}
		</style>
	</head>
	<body>

		<?php require('navbar.php'); ?>
			
		<div class="container" style="padding: 2%">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-4 offset-md-1" style="border: 1px solid #e7e7e7; height: 300px">
					<div>
						<form action="upload.php" method="post" enctype="multipart/form-data">
							<input name="imageFile" type="file" id="imageFile">
							<input type="submit" value="Upload Image" name="submit">
						</form>
						<button id="predictButton" type="button">Predict</button>
					</div>
				</div>
				
				<div class="col-md-6" style="border: 1px solid #e7e7e7; height: 300px">
			
					<p><center>For predictions</center></p>

					<div id="p1" class="predicted"></div>
					<div id="p2" class="predicted"></div>
					<div id="p3" class="predicted"></div>
					<div id="p4" class="predicted"></div>
					<div id="p5" class="predicted"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10" style="border: 1px solid #e7e7e7; height: 150px">
					<p><center>For description</center></p>
					<div name="breedname"></div>
					<div name="description"></div>
				</div>
			</div>
		</div>

	</body>
	<!-- Scripts -->
	<script>
		$(document).ready(function() {

			$(document).on("click","#predictButton", doPrediction);
			$(document).on("click",".predicted",viewDescription);
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

					$("#p1").attr("data-id", ""+returnData[0]["breed_id"]);
					$("#p2").attr("data-id", ""+returnData[1]["breed_id"]);
					$("#p3").attr("data-id", ""+returnData[2]["breed_id"]);
					$("#p4").attr("data-id", ""+returnData[3]["breed_id"]);
					$("#p5").attr("data-id", ""+returnData[4]["breed_id"]);

					$("div[name=description]").html(returnData[0]["breed_description"]);
					$("div[name=breedname]").html(returnData[0]["breed_name"]);
				}
			});
		}
		function viewDescription(){
			var id = $(this).attr("data-id");
			$.ajax({
				url: "get_breed_data.php?id="+id,
				type: "get",
				dataType: "JSON",
				success: function(data) {

					$("div[name=description]").html(data["breed_description"]);
					$("div[name=breedname]").html(data["breed_name"]);
				}
			});
		}

	</script>
	 
</html>