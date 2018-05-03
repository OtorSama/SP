// window.onload = function(){}
$(document).ready(function() {
	$(document).on("click", "#img", browseImg);
	$(document).on("click", "#panel1", browseImg);
	$(document).on("click","#predictButton", doPrediction);
	$(document).on("click",".predicted",viewDescription);
	$(document).on("click", ".predicted", selectBreed);
	$(window).bind("resize", adjustWidth);
	adjustWidth();


	$(document).on("mouseover", "#panel1", function(){
		var tmp;
		for(var i=0; i < 5; i++){
			tmp = ("#p" + i + "");
			// $(tmp + " " + "#predName").fadeOut();
			// $(tmp + " " + "#predName").hide(300);
			$(tmp + " " + "#predName").css("font-size", "1vw");
			// $(tmp + " " + "#predName").css("text-align", "center");
			// $(tmp + " " + "#predName").css("border", "1px solid red");
			$(tmp + " " + "#predName").css("width", "74%");

		}
	});

	$(document).on("mouseout", "#panel1", function(){
		var tmp;
		for(var i=0; i < 5; i++){
			tmp = ("#p" + i + "");
			// $(tmp + " " + "#predName").css("transition", "display 1s ease");
			$(tmp + " " + "#predName").css("font-size", "1.3vw");
			$(tmp + " " + "#predName").css("width", "82%");

			// $(tmp + " " + "#predName").css("display", "inline");
			// $(tmp + " " + "#predName").show(300);
		}
	});
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
		retractPan3();
		}
	}		
}

function selectBreed(){
	$(".predActive").removeClass("predActive");
	$(this).toggleClass("prediction predActive");
}

function adjustWidth(){
	// var bodyWidth = $('body').width();
	// var bodyWidth = $(window).width();
	// oneVW = (0.003)*(bodyWidth);
	// total = (0.6432210445404053125)*(bodyWidth);
	// alert(total);
	
	// var tmp1 = $('#panel1').css('margin-right');
	// tmp1 = tmp1.slice(0, tmp1.length-2);
	// alert(tmp1);

	// var tmp = parseFloat(total) + parseFloat(tmp1);
	// // alert(tmp);
	// $("#panel3").width(tmp);

	var pan1 = $("#panel1").css('width');
	pan1 = pan1.slice(0, pan1.length-2);
	// alert(pan1);
	var pan2 = $("#panel2").css('width');
	pan2 = pan2.slice(0, pan2.length-2);
	// alert(pan2);
	var mar1 = $('#panel1').css('margin-right');
	mar1 = mar1.slice(0, mar1.length-2);
	// alert(mar1);

	var tmp = parseFloat(pan1) + parseFloat(pan2) + parseFloat(mar1);
	$("#panel3").width(tmp-30);
}

function expandPan3(){
	var wid = $(window).width();
	tmp = wid*0.13;

	$("#panel3").height(tmp);
}

function retractPan3(){
	$("#panel3").height(1);
}

function doPrediction(){
	var imageSource = $("#img").attr("src").split("/");
	var image_file = imageSource[imageSource.length-1];
	
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

			expandPan3();
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

// var instruction = "Instructions:<br/>";
// instruction += "1. Sed ut perspiciatis unde omnis iste natus error sit<br/>"; 
// instruction += "2. voluptatem accusantium doloremque laudantium<br/>";
// instruction += "3. Nullam dictum felis eu pede mollis pretium.<br/>"; 
// instruction += "4. Integer tincidunt. Cras dapibus. Vivamus elementum<br/>"; 
// instruction += "5. semper nisi. Aenean vulputate eleifend tellus";
