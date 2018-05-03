<?
	require("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Bread Classifier</title>
		<?php require('require.php'); ?>
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
			
		<div class="row">
			<div class="container-fluid">
				<div id="panel1" class="panel panel-default col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-1 col-md-4 col-md-offset-1 col-lg-4 col-lg-offset-1">
					<div id="imagePanel" class="panel-body">
						<div id="imgHolder" style="display: block; overflow: hidden;">
							<img id="img" name="img" src="<?php echo $imgName ?>" />
						</div>
						<div id="upload-actions">
							<form id="imgForm" method="post" action="imgUpload.php" enctype="multipart/form-data">
								<input type="file" id="imgFile" name="imgFile" accept="image/*"/>
							</form>
						</div>
					</div>
				</div>
				<div id="panel2" class="panel panel-default col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<div id="predPanel" class="panel-body">
						<div id="predCont">
							<!-- <p><center>For predictions</center></p> -->
							<div id="p0" class="predicted predActive"></div>
							<div id="p1" class="predicted"></div>
							<div id="p2" class="predicted"></div>
							<div id="p3" class="predicted"></div>
							<div id="p4" class="predicted"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<button id="predictButton" class="btn btn-default" type="button" style="height: 100px;">Predict</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container-fluid">
				<div id="panel3" class="panel panel-default col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
					<div id="descPanel" class="panel-body">
						<span id="description" name="description"></span>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>