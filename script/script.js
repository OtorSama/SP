// window.onload = function(){}
$(document).ready(function() {
	$("#loadPanel").hide();
	// $(document).on("click", "#img", browseImg);
	$(document).on("click", "#panel1", browseImg);
	// $(document).on("click","#predictButton", doPrediction);
	$(document).on("click",".predicted",viewDescription);
	$(document).on("click", ".predicted", selectBreed);
	$("#panel1").bind("mouseover", slideRight);
	$("#panel1").bind("mouseout", slideLeft);
	$(window).bind("resize", adjustWidth);
	adjustWidth();


// 	$(document).on("mouseover", "#panel1", function(){
// 		var tmp;
// 		for(var i=0; i < 5; i++){
// 			tmp = ("#p" + i + "");
// 			$(tmp + " " + "#predName").css("font-size", "1vw");
// 			$(tmp + " " + "#predName").css("width", "74%");
// 		}
// 	});

// 	$(document).on("mouseout", "#panel1", function(){
// 		var tmp;
// 		for(var i=0; i < 5; i++){
// 			tmp = ("#p" + i + "");
// 			$(tmp + " " + "#predName").css("font-size", "1.3vw");
// 			$(tmp + " " + "#predName").css("width", "82%");
// 		}
// 	});
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
					$('#predCont').hide();
					$('#predCont-inst').hide();
					$('#loadPanel').show();
					doPrediction();	
				}
			});
		});
		
		$('#imgForm').submit();
		//alert("before predict");	
	//	doPrediction();
		retractPan3();
		}
	}		
}

function selectBreed(){
	$(".predActive").removeClass("predActive");
	$(this).toggleClass("prediction predActive");
}

function adjustWidth(){
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

function slideRight(){
	var tmp;
	for(var i=0; i < 5; i++){
		tmp = ("#p" + i + "");
		$(tmp + " " + "#predName").css("font-size", "1vw");
		$(tmp + " " + "#predName").css("width", "74%");
	}
}

function slideLeft(){
	var tmp;
	for(var i=0; i < 5; i++){
		tmp = ("#p" + i + "");
		$(tmp + " " + "#predName").css("font-size", "1.1vw");
		$(tmp + " " + "#predName").css("width", "82%");
	}
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
			$("#instructions").hide()	
			var imagePath = "../images/dog_breeds/";

			for(var i = 0; i < 5; i++) {
				var image = imagePath + returnData[i][0]["breed_image"];
				var name = returnData[i][0]["breed_name"];
				var score = (parseFloat(returnData[i][1])*100).toFixed(2);

				// $("#p"+i+"").html("<image src='"+image+ "'>" + name);
				$("#p"+i+"").html("<div><img id='imgbreed' src='"+image+ "' /></div>" + "<div id='labelDiv'><span id='predName'>" + name + "</span >"+"<span id='predScore'>"+score+"%</span></div>");
				if(i == 0){
					$(".predActive").removeClass("predActive");
					$("#p"+i+"").addClass("predActive");
				}
				$("#p"+i+"").attr("data-id", ""+returnData[i][0]["breed_id"]);

				console.log(returnData[i][1]);
			}

			// $("div[name=description]").html(returnData[0]["breed_description"]);
			$("span[name=description]").html(returnData[0][0]["breed_description"]);
			$("div[name=breedname]").html(returnData[0][0]["breed_name"]);
			$("#predCont").css("opacity", "1.0");
			$('#loadPanel').hide();
			$("#predCont").show();
			expandPan3();
		},
		error: function(){
		//	alert("Please Try Again.");
		//	$("#predCont").hide();
		/*	
			var tmp;
       			 for(var i=0; i < 5; i++){
                		tmp = ("#p" + i + "");
                		//$(tmp + " " + "#predName").css("font-size", "1.3vw");
                		//$(tmp + " " + "#predName").css("width", "82%");
        			$(tmp + " " + "#predName").css( 	
			
			}
		*/	
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
