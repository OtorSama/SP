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