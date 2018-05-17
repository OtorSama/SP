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
				<div id="panel1" class="panel panel-default col-xs-4 col-xs-offset-2 col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2">
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
				<div id="panel2" class="panel panel-default col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div id="predPanel" class="panel-body">
						<div id="predCont">
							<!-- <p><center>For predictions</center></p> -->
							<div id="p0" class="predicted predActive"></div>
							<div id="p1" class="predicted"></div>
							<div id="p2" class="predicted"></div>
							<div id="p3" class="predicted"></div>
							<div id="p4" class="predicted"></div>
						</div>

						<div id="predCont-inst">
							<div id="logo">
								<div class="container-fluid">
									<img src="../images/doggo_tmp1.png">
								</div>
								<div id="inst-header">
									<span><strong>INSTRUCTIONS</strong></span>
								</div>
								<div id="inst-cont" style="text-align: center;">
									<span>To get started, upload an image <br /> of a dog by clicking on the left panel<br /> and wait for the results.<br /><br />
									To try again, just repeat the process.</span>
								</div>
								
							</div>
							<!-- <p><strong>Instructions</strong></p>
									<ol>
										<li>Click the empty photo in the left.</li>
										<li>Select a photo of a dog to predict.</li>
										<li>Click upload.</li>
										<li>Wait for the result.</li>
										<li>To predict another dog, just click again on the left photo.</li>
									</ol> -->
						</div>

						<div id="loadPanel">
							<div id="loader"></div>
						</div>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					<button id="predictButton" class="btn btn-default" type="button" style="height: 7vw;">Predict</button>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container-fluid">
				<div id="panel3" class="panel panel-default col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
					<div id="descPanel" class="panel-body">
						<span id="description" name="description"></span>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
