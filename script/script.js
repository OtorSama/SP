// window.onload = function(){}
$(document).ready(function() {
	$(document).on("click", "#img", browseImg);
	$(document).on("click","#predictButton", doPrediction);
	$(document).on("click",".predicted",viewDescription);
	$(document).on("click", ".predicted", selectBreed);

	// $(document).on("click", "#predictButton", drawDiv);
});

function browseImg(){
	var inputElement = document.getElementById("imgFile");
	inputElement.click();

	inputElement.onchange = function(){
		var file = inputElement.files[0];
		var fileType = file["type"];
		var	filepath = inputElement.value.split("\\");
		var	filename = filepath[filepath.length-1];

		var validTypes = ["image/jpeg", "image/png"];
		if($.inArray(fileType, validTypes) < 0){
			alert("Invalid file type. Please try again.");
		}else{
		var fd = new FormData();
		fd.append('imgFile', file);

		$('#imgForm').submit(function(event){
			event.preventDefault();

			 $.ajax({
				url: "imgUpload.php",
				type: "POST",
				processData: false,
				contentType: false,
				data: fd,
				dataType: "text",
				success: function(data) {
					// alert(data);
					path = ("" + data);
					$('#img').attr('src', path);
					fd = new FormData();
				}
			});
		});
		
		$('#imgForm').submit();	
		}
	}		
}

function selectBreed(){
	$(".predActive").removeClass("predActive");
	$(this).toggleClass("prediction predActive");
}

function drawDiv(){
	$("#panel2").removeClass("activePanel1");
	$("#panel2").toggleClass("activePanel2");
	// $("#predPanel").toggleClass("activePanel");
}

function adjustWidth(){
	var bodyWidth = $('body').width();
	// var bodyWidth = $(window).width();
	oneVW = (0.003)*(bodyWidth);
	
	var tmp = $("#descPanel").width();
	// alert(tmp);
	tmp = tmp + oneVW;
	alert(tmp);
	$("#descPanel").width(tmp);
}

function doPrediction(){
	var imageSource = $("#img").attr("src");
	console.log(imageSource);
	var image_file = "dogImage.jpg";
	$.ajax({
		url: "prediction.php?image_file="+image_file,
		type: "get",
		dataType: "JSON",
		success: function( returnData ){
			var imagePath = "../images/dog_breeds/";

			for(var i = 0; i < 5; i++) {
				var image = imagePath + returnData[i]["breed_image"];
				var name = returnData[i]["breed_name"];

				// $("#p"+i+"").html("<image src='"+image+ "'>" + name);
				$("#p"+i+"").html("<img id='imgbreed' src='"+image+ "' />" + "<span id='predName'>" + name + "</span>");
				if(i == 0){
					$(".predActive").removeClass("predActive");
					$("#p"+i+"").addClass("predActive");
				}
				$("#p"+i+"").attr("data-id", ""+returnData[i]["breed_id"]);
			}

			// $("div[name=description]").html(returnData[0]["breed_description"]);
			$("span[name=description]").html(returnData[0]["breed_description"]);
			$("div[name=breedname]").html(returnData[0]["breed_name"]);
		},
		error: function(){
			alert("Please Try Again.");
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

			// $("div[name=description]").html(data["breed_description"]);
			$("span[name=description]").html(data["breed_description"]);
			$("div[name=breedname]").html(data["breed_name"]);
		}
	});
}

var instruction = "Instructions:<br/>";
instruction += "1. Sed ut perspiciatis unde omnis iste natus error sit<br/>"; 
instruction += "2. voluptatem accusantium doloremque laudantium<br/>";
instruction += "3. Nullam dictum felis eu pede mollis pretium.<br/>"; 
instruction += "4. Integer tincidunt. Cras dapibus. Vivamus elementum<br/>"; 
instruction += "5. semper nisi. Aenean vulputate eleifend tellus";
