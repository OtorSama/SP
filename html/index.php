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
				color: white;
				background-color: gray;
				cursor: help;
			}
		</style>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

		<?php require('navbar.php'); ?>
		<?php
			if(isset($_POST['imgName'])){
				$imgName = $_POST['imgName'];
			}
			else
				$imgName = "../images/temp/placeholder.png";
			?>
			
		<div  id="mCont" class="container-fluid" style="">
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
				<div id="imagePanel" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<!--
					<div>
						<form action="upload.php" method="post" enctype="multipart/form-data">
							<input name="imageFile" type="file" id="imageFile">
							<input type="submit" value="Upload Image" name="submit">
						</form>
						<button id="predictButton" type="button">Predict</button>
					</div>
					-->
					<div id="imgHolder" style="display: block; overflow: hidden;">
						<img id="img" name="img" src="<?php echo $imgName ?>" onclick="browseImg()" />
					</div>
					<div id="croppie-sample">
						<div id="upload-actions">
							<form id="imgForm" method="post" action="tmpUpload.php" enctype="multipart/form-data">
								<!-- <button type="button" class="btn btn-default" onclick="browseImg();">Choose Image</button> -->
								<input type="file" id="imgFile" name="imgFile" accept="image/*"/>
							</form>
							
						</div>
					</div>
				</div>
				
				<div id="predPanel" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<!-- <p><center>For predictions</center></p> -->
					<div id="p1" class="predicted"></div>
					<div id="p2" class="predicted"></div>
					<div id="p3" class="predicted"></div>
					<div id="p4" class="predicted"></div>
					<div id="p5" class="predicted"></div>

					<div>
						<button id="predictButton" type="button" style="">Predict</button>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			</div>
			<div class="row">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
				<div id="descPanel" class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
					<!-- <p><center>For description</center></p> -->
					<div name="breedname" style="font-weight: bold;"></div>
					<div name="description"></div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
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
				},
				error: function(){
					alert("Failed");
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