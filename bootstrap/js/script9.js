
var ids = ["prodCode", "reprodCode", "prodName", "manuCode"];
		var displays = ["prodCode_disp", "reprodCode_disp", "prodName_disp", "manuCode_disp"];
		var acclsn = [	"Product code is valid!",
						"Product codes match!",
						"Product name is valid!",
						"Manufacturer code is valid!"];
		var errorlsn = ["Product code is invalid!",
						"Product codes mismatch!",
						"Product name is invalid!",
						"Manufacturer code is invalid!"];
		var errormsg = ["Required Field (E.g. CS126 or CS 126)",
						"Required Field. You must retype the product code.",
						"Required Field. (E.g. Cheese Bread)",
						"Required Field (E.g. A1B12 or A1 B12)"];

window.onload = function()
	{
		document.getElementById("vForm").onsubmit = validate;
		document.getElementById("desc").onkeyup = charCount;
		document.getElementById("desc").onkeydown = charCount;
	}

function inputListen(element_id)
	{
		var pattern = [	/(^[A-Z]{2})[\ ]?[0-9]{3}/,
						/ /,
						/^([A-Z][a-z]*)([ ][A-Z][a-z]*)*/];
						

		var i;
		switch(element_id)
			{
				case "prodCode":
					i = 0;
					break;
				case "prodName":
					i = 2;
					break;
				case "manuCode":
					i = 3;
					break;
				default:
					break;
			}

		var display = document.getElementById(displays[i]);
		// display.innerHTML = ("<span style='color: red'>" + errorlsn[i] + "</span>");
		var input = document.forms["vForm"][ids[i]].value;
		display.innerHTML = input + " | " + pattern[i].test(String(input));
		// 	{ display.innerHTML = input + " | true"; }
		// else
		// 	{ display.innerHTML = input + " | false"; }
	}

function inputVal(element_id)
	{
		var i;
		switch(element_id)
			{
				case "prodCode":
					i = 0;
					break;
				case "reprodCode":
					i = 1;
					break;
				case "prodName":
					i = 2;
					break;
				case "manuCode":
					i = 3;
					break;
				default:
					break;
			}

		var display = document.getElementById(displays[i]);
		display.innerHTML = ("<span style='color: green'>" + acclsn[i] + "</span>");
	}

function charCount()
	{
		$("#charLeft").val(300 - $(this).val().length);
	}

function validate()
	{
		for(var i = 0; i < ids.length; i++)
			{
				var val = document.forms["vForm"][ids[i]].value;
				var display = document.getElementById(displays[i]);

				if(val == "")
					{
						var err = errormsg[i];
						display.innerHTML = err;
					}
				else
					{ display.innerHTML = ""; }
			}

		return false;
	}