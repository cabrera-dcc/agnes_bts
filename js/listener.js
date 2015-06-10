/**
* jQuery listeners for Agnes, the bug tracking system
*
* listener.js from https://github.com/cabrera-dcc/agnes_bts
*
* @author cabrera-dcc (http://cabrera-dcc.github.io)
* @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
* @version Beta-1 (rev. 20150405)
*/

$("#new").on("click",newTicket);
$("#cancel").on("click",cancel);
$(document).ready(function() {
	editInfo();
});

function newTicket(){
	restartInputValues();
	enableInputs();
	$("#new").attr("disabled",true);
	$("#create").removeAttr("disabled");
	$("#cancel").removeAttr("disabled");
};

function editInfo(){
	var option = $.get("option");

	if(option && option == "edit"){
		enableInputs();
		$("#new").attr("disabled",true);
		$("#create").attr("disabled",true);
		$("#cancel").removeAttr("disabled");
		$("#save").removeAttr("disabled");
	}
};

function cancel(){
	disableInputs();
	restartInputValues();
	$("#new").removeAttr("disabled");
	$("#create").removeAttr("disabled");
	$("#cancel").attr("disabled",true);
	$("#save").attr("disabled",true);
};

function enableInputs(){
	$("#inputTitle").removeAttr("disabled");
	$("#inputPriority").removeAttr("disabled");
	$("#inputDesignate").removeAttr("disabled");
	$("#inputSupervisor").removeAttr("disabled");
	$("#areaDescription").removeAttr("disabled");
	$("#areaObservations").removeAttr("disabled");
};

function disableInputs(){
	$("#inputTitle").attr("disabled", true);
	$("#inputPriority").attr("disabled", true);
	$("#inputDesignate").attr("disabled", true);
	$("#inputSupervisor").attr("disabled", true);
	$("#areaDescription").attr("disabled", true);
	$("#areaObservations").attr("disabled", true);
};

function restartInputValues(){
	$("#inputRef").val("#");
	$("#inputTitle").val("");
	$("#inputPriority").val("Normal");
	$("#inputDesignate").val("");
	$("#inputSupervisor").val("");
	$("#areaDescription").val("");
	$("#areaObservations").val("");
};