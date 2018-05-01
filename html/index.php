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
				transition: 0.3s;
				color: white;
				background-color: #FFCCBC;
				cursor: help;
			}

			.predActive{
				/*background-color: #FF8C7C;*/
				background-color: #FF8C7C;
			}

			.predActive #predName{
				color: white;
				font-weight: bold;
			}
			
			#predPanel{
				/*display: block;*/
				/*padding: 0.5%;*/
			}

			#p0 > img, #p1 > img, #p2 > img, #p3 > img, #p4 > img {
				height: 5.8vw;
				width: 5.8vw;
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
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
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

				<div id="predPanel" class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div id="predCont">
						<!-- <p><center>For predictions</center></p> -->
						<div id="p0" class="predicted predActive"></div>
						<div id="p1" class="predicted"></div>
						<div id="p2" class="predicted"></div>
						<div id="p3" class="predicted"></div>
						<div id="p4" class="predicted"></div>
					</div>
					<div>
						<!-- <button id="predictButton" type="button" style="">Predict</button> -->
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<button id="predictButton" class="btn btn-default" type="button" style="height: 100px;">Predict</button>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				<div id="descPanel" class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="overflow-y: auto;">
					<!-- <p><center>For description</center></p> -->
					<!-- <div name="breedname" style="font-weight: bold;"></div> -->
					<!-- <div name="description" style="text-align: justify;"></div> -->
					<span id="description" name="description"></span>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
			</div>
		</div>
	</body>
</html>