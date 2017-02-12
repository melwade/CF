// JavaScript Document
// THIS PARSES THE AJAX RESULTS
function GetAjaxResult(variable, results) {
	if((results.search(variable + ":{") !== -1) && (results.search("}:" + variable) !== -1)) {
		var variableResult = results;
		var variableJoin = "";
		variableResult = variableResult.split(variable + ":{");
		variableResult.shift();
		for (var i = 0; i < variableResult.length; i++) {
			variableJoin = variableJoin + variableResult[i].split("}:" + variable).shift().trim() + "~~~";
		}
		
		if(variableJoin.search("~~~") !== -1) {
			var variableString = variableJoin.trim();
			if(variableString.slice(-3) == "~~~") {
				variableString = variableString.slice(0,-3);
			}
			var variableString = variableString.split('~~~');
			return variableString;
		} else {
			return variableJoin;
		}
	} else {
		return "";
	}
}
// THIS IS FOR THE POP-UP IN THE CORNER
function alertCorner(text, type, expire) {
	 if(type == "check") {
		 var icon="checkmark.png";
	 } else if(type == "x") {
		 var icon="xmark.png";
	 } else if (type == "info") {
		 var icon="info.png";
	 }
	 dhtmlx.message({
		text:"<img src='images/" + icon + "' height='20px'> " + text,
		expire:expire
	});
 }
function testDiv2(text) {
	document.getElementById('testDiv2').innerHTML = document.getElementById('testDiv2').innerHTML + "<br />" + text;
}
 
// THIS IS FOR DISABLING AND RE-ENABLING FIELDS
function getAttributeTag(tag) {
	var inputArr = document.getElementsByTagName(tag);
	if(inputArr.length > 0) {
		//testDiv2("--- GETTING ---");
		for (var i = 0; i < inputArr.length; i++) {
			var input = inputArr[i];
			if(input.id !== "") {
				InputArrayID.push(input.id);
				//testDiv2("id: '" + input.id + "' = '" + getAttributeField(input) + "'");
				InputArrayState.push(getAttributeField(input));
			} else if(input.name !== "") {
				InputArrayID.push(input.name);
				//testDiv2("name: '" + input.name + "' = '" + getAttributeField(input) + "'");
				InputArrayState.push(getAttributeField(input));
			}
		}
		//testDiv2("<hr />");
	}
}
function getAttributeField(field) {
	if(field.getAttribute("readonly") == "" || field.getAttribute("readonly") == "readonly") {
		field.setAttribute("readonly","readonly");
		return "readonly";
	} else if(field.getAttribute("disabled") == "" || field.getAttribute("disabled") == "disabled") {
		field.setAttribute("disabled","disabled");
		return "disabled";
	} else {
		return "normal";
	} 
}
var InputArrayID = [];
var InputArrayState = [];
function DisableAllAttributes() {
	InputArrayID = [];
	InputArrayState = [];
	
	getAttributeTag("input");
	getAttributeTag("textarea");
	getAttributeTag("select");
	$('input[type=tel]').attr('disabled', true);
	$('input[type=email]').attr('disabled', true);
	$('input[type=text]').attr('disabled', true);
	$('input[type=checkbox]').attr('disabled', true);
	$('input[type=button]').attr('disabled', true);
	$('input[type=submit]').attr('disabled', true);
	$('input[type=radio]').attr('disabled', true);
	$('select').attr('disabled', true);
	$('textarea').attr('disabled', true);
}
function RestoreAllAttributes() {
	$('input[type=tel]').removeAttr('disabled');
	$('input[type=email]').removeAttr('disabled');
	$('input[type=text]').removeAttr('disabled');
	$('input[type=checkbox]').removeAttr('disabled');
	$('input[type=button]').removeAttr('disabled');
	$('input[type=submit]').removeAttr('disabled');
	$('input[type=radio]').removeAttr('disabled');
	$('select').removeAttr('disabled');
	$('textarea').removeAttr('disabled');
	//testDiv2("--- SETTING ---");
	for (var i=0; i<InputArrayID.length; i++) {
		var InputID = InputArrayID[i];
		var InputState = InputArrayState[i];		
		if(InputState !== "normal") {
			$("#" + InputID).attr(InputState, true);
			//testDiv2(InputID + " = " + InputState);
		}
	}
	//testDiv2("<hr />");
}