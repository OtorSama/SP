<?
	require("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Bread Classifier</title>
		<?php require('require.php'); ?>

		<!-- remove this style later -->
		<style>
			.predicted:hover {
				color: white;
				background-color: gray;
				cursor: help;
			}
			img {
				height: 10%;
				width: 10%;
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
						<img id="img" name="img" src="<?php echo $imgName ?>" />
					</div>
					<div id="croppie-sample">
						<div id="upload-actions">
							<form id="imgForm" method="post" action="imgUpload.php" enctype="multipart/form-data">
								<input type="file" id="imgFile" name="imgFile" accept="image/*"/>
							</form>
							<!-- <input type="file" id="imgFile" name="imgFile" accept="image/*"/> -->
							
						</div>
					</div>
				</div>

				<div id="predPanel" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<!-- <p><center>For predictions</center></p> -->
					<div id="p0" class="predicted"></div>
					<div id="p1" class="predicted"></div>
					<div id="p2" class="predicted"></div>
					<div id="p3" class="predicted"></div>
					<div id="p4" class="predicted"></div>

					<div>
						<!-- <button id="predictButton" type="button" style="">Predict</button> -->
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<button id="predictButton" class="btn btn-default" type="button" style="height: 100px;">Predict</button>
				</div>
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
</html>