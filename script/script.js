window.onload = function(){}

function browseImg(){
	var inputElement = document.getElementById("imgFile");
	inputElement.click();

	inputElement.onchange = function(){
	var file = inputElement.files[0];
	//filepath = inputElement.value;
	filepath = inputElement.value.split("\\");
	filename = filepath[filepath.length-1];
	
	var form = document.getElementById("imgForm");
	form.submit();
	}							
}

$(document).ready(function() {

	$(document).on("click","#predictButton", doPrediction);
	$(document).on("click",".predicted",viewDescription);
});

function doPrediction(){
	console.log("test");
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

				$("#p"+i+"").html("<image src='"+image+ "'>" + name);
				$("#p"+i+"").attr("data-id", ""+returnData[i]["breed_id"]);
			}

			$("div[name=description]").html(returnData[0]["breed_description"]);
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

			$("div[name=description]").html(data["breed_description"]);
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
