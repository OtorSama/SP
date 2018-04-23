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

	// var img = document.createElement("img");
	// var source = ("../images/temp/").concat(filename);
	// img.src = source;
	// var div = document.getElementById("imageHolder");
	// div.append(img);
	}							
}

// function dispImg(filename){
// 	alert("entered");
// 	var img = document.createElement("img");
// 	var div = document.getElementById("imgHolder");
// 	img.src = filename;
// 	div.append(img);
// 	alert("yes");
// }