$(document).ready(function(){
	var currentPage = "";
	
	try {
		currentPage = window.location.ancestorOrigins[0]; //window.location.origin;
		if(currentPage){ currentPage = document.referrer; }
	}
	catch(errAncestor) { 
		try { 
			currentPage = document.referrer; 
		}
		catch (errReferrer) { 
			//currentPage=errReferrer.message; 
		}		
	}
	
	$("input[name=taken_from]").val(currentPage);
});

$(document).on('click', '#prev-1', function(event){
	$("#tab2").hide();
	$("#tab1").removeClass("hidden");
	$("#tab1").show();
}); 

$(document).on('click', '#prev-2', function(event){
	$("#tab3").hide();
	$("#tab2").show();
}); 

$(document).on('click', '#prev-3', function(event){
	$("#tab4").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#prev-4', function(event){
	$("#tab5").hide();
	$("#tab5").addClass("hidden");
	$("#tab4").show();
}); 

$(document).on('click', '#next-5', function(event){
	if(document.getElementById("business_name").value){
		if(document.getElementById("postcode").value){
			$("#tab4").hide();
			$("#tab-loading").show();		
			var myVar = setTimeout(showLoading, 2000);
		} else { alert('Please enter postcode'); }
	} else { alert('Please enter business name'); }
}); 

function showLoading(){
	$("#tab-loading").hide();		
	$("#tab5").removeClass("hidden");
	$("#tab5").show();		
}

$(document).on('click', '#btn_electricity', function(event){
	event.preventDefault();
	document.getElementById("electricity").checked = true;
	document.getElementById("gas").checked = false;
	document.getElementById("both").checked = false;
	document.getElementById("water").checked = false;
	
	$("#btn_electricity").addClass("border-selected"); 
	$("#btn_gas").removeClass("border-selected"); 
	$("#btn_energy").removeClass("border-selected"); 
	$("#btn_water").removeClass("border-selected"); 
	
	$("#eg_supplier_row").removeClass("hidden"); 
	$("#energy_suppliers").removeClass("hidden"); 
	$("#w_supplier_row").addClass("hidden"); 
	$("#water_suppliers").addClass("hidden"); 
	$("#tab1").hide();
	$("#tab2").show();
}); 

$(document).on('click', '#btn_gas', function(event){
	event.preventDefault();
	document.getElementById("electricity").checked = false;
	document.getElementById("gas").checked = true;
	document.getElementById("both").checked = false;
	document.getElementById("water").checked = false;
	
	$("#btn_electricity").removeClass("border-selected"); 
	$("#btn_gas").addClass("border-selected"); 
	$("#btn_energy").removeClass("border-selected"); 
	$("#btn_water").removeClass("border-selected"); 
	
	$("#eg_supplier_row").removeClass("hidden"); 
	$("#energy_suppliers").removeClass("hidden"); 
	$("#w_supplier_row").addClass("hidden"); 
	$("#water_suppliers").addClass("hidden"); 
	$("#tab1").hide();
	$("#tab2").show();
}); 

$(document).on('click', '#btn_energy', function(event){
	event.preventDefault();
	document.getElementById("electricity").checked = false;
	document.getElementById("gas").checked = false;
	document.getElementById("both").checked = true;
	document.getElementById("water").checked = false;
	
	$("#btn_electricity").removeClass("border-selected"); 
	$("#btn_gas").removeClass("border-selected"); 
	$("#btn_energy").addClass("border-selected"); 
	$("#btn_water").removeClass("border-selected"); 
	
	$("#eg_supplier_row").removeClass("hidden"); 
	$("#energy_suppliers").removeClass("hidden"); 
	$("#w_supplier_row").addClass("hidden"); 
	$("#water_suppliers").addClass("hidden"); 
	$("#tab1").hide();
	$("#tab2").show();
}); 

$(document).on('click', '#btn_water', function(event){
	event.preventDefault();
	document.getElementById("gas").checked = false;
	document.getElementById("both").checked = false;
	document.getElementById("electricity").checked = false;
	document.getElementById("water").checked = true;
	
	$("#btn_electricity").removeClass("border-selected"); 
	$("#btn_gas").removeClass("border-selected"); 
	$("#btn_energy").removeClass("border-selected"); 
	$("#btn_water").addClass("border-selected"); 
	
	$("#eg_supplier_row").addClass("hidden"); 
	$("#energy_suppliers").addClass("hidden"); 
	$("#w_supplier_row").removeClass("hidden"); 
	$("#water_suppliers").removeClass("hidden"); 
	$("#tab1").hide();
	$("#tab2").show();
}); 

$(document).on('click', '#btn_BritishGas', function(event){
	event.preventDefault();
	var selected_supplier = "British Gas";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").addClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_EDF', function(event){
	event.preventDefault();
	var selected_supplier = "EDF";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").addClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_ScottishPower', function(event){
	event.preventDefault();
	var selected_supplier = "Scottish Power";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").addClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_OpusEnergy', function(event){
	event.preventDefault();
	var selected_supplier = "Opus Energy";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").addClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Eon', function(event){
	event.preventDefault();
	var selected_supplier = "Eon";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").addClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_SmartestEnergy', function(event){
	event.preventDefault();
	var selected_supplier = "Smartest Energy";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").addClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_SSE', function(event){
	event.preventDefault();
	var selected_supplier = "SSE";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").addClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_CNG', function(event){
	event.preventDefault();
	var selected_supplier = "CNG";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").addClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_CrownGasandPower', function(event){
	event.preventDefault();
	var selected_supplier = "Crown Gas and Power";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").addClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Total', function(event){
	event.preventDefault();
	var selected_supplier = "Total";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").addClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_BGLite', function(event){
	event.preventDefault();
	var selected_supplier = "BG Lite";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").addClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Gazprom', function(event){
	event.preventDefault();
	var selected_supplier = "Gazprom";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").addClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Bulb', function(event){
	event.preventDefault();
	var selected_supplier = "Bulb";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").addClass("border-selected"); 
	$("#btn_OtherCompany").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_OtherCompany', function(event){
	event.preventDefault();
	var selected_supplier = "Other Company";
	$("select[name=eg_current_supplier]").val(selected_supplier);
	
	$("#btn_BritishGas").removeClass("border-selected"); 
	$("#btn_EDF").removeClass("border-selected"); 
	$("#btn_ScottishPower").removeClass("border-selected"); 
	$("#btn_OpusEnergy").removeClass("border-selected"); 
	$("#btn_Eon").removeClass("border-selected"); 
	$("#btn_SmartestEnergy").removeClass("border-selected"); 
	$("#btn_SSE").removeClass("border-selected"); 
	$("#btn_CNG").removeClass("border-selected"); 
	$("#btn_CrownGasandPower").removeClass("border-selected"); 
	$("#btn_Total").removeClass("border-selected"); 
	$("#btn_BGLite").removeClass("border-selected"); 
	$("#btn_Gazprom").removeClass("border-selected"); 
	$("#btn_Bulb").removeClass("border-selected"); 
	$("#btn_OtherCompany").addClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_CastleWater', function(event){
	event.preventDefault();
	var selected_supplier = "Castle Water";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").addClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_ClearBusiness', function(event){
	event.preventDefault();
	var selected_supplier = "Clear Business";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").addClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_EverflowWater', function(event){
	event.preventDefault();
	var selected_supplier = "Everflow Water";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").addClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_SmartaWater', function(event){
	event.preventDefault();
	var selected_supplier = "Smarta Water";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").addClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_OlymposWater', function(event){
	event.preventDefault();
	var selected_supplier = "Olympos Water";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").addClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Source4Business', function(event){
	event.preventDefault();
	var selected_supplier = "Source 4 Business";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").addClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Veolia', function(event){
	event.preventDefault();
	var selected_supplier = "Veolia";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").addClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Water2Business', function(event){
	event.preventDefault();
	var selected_supplier = "Water2Business";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").addClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_WaterPlus', function(event){
	event.preventDefault();
	var selected_supplier = "WaterPlus";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").addClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Waterscan', function(event){
	event.preventDefault();
	var selected_supplier = "Waterscan";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").addClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Wave', function(event){
	event.preventDefault();
	var selected_supplier = "Wave";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").addClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_YuWater', function(event){
	event.preventDefault();
	var selected_supplier = "Yu Water";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").addClass("border-selected"); 
	$("#btn_Other").removeClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Other', function(event){
	event.preventDefault();
	var selected_supplier = "Other";
	$("select[name=water_current_supplier]").val(selected_supplier);
	
	$("#btn_CastleWater").removeClass("border-selected"); 
	$("#btn_ClearBusiness").removeClass("border-selected"); 
	$("#btn_EverflowWater").removeClass("border-selected"); 
	$("#btn_SmartaWater").removeClass("border-selected"); 
	$("#btn_OlymposWater").removeClass("border-selected"); 
	$("#btn_Source4Business").removeClass("border-selected"); 
	$("#btn_Veolia").removeClass("border-selected"); 
	$("#btn_Water2Business").removeClass("border-selected"); 
	$("#btn_WaterPlus").removeClass("border-selected"); 
	$("#btn_Waterscan").removeClass("border-selected"); 
	$("#btn_Wave").removeClass("border-selected"); 
	$("#btn_YuWater").removeClass("border-selected"); 
	$("#btn_Other").addClass("border-selected"); 
	
	$("#tab2").hide();
	$("#tab3").show();
}); 

$(document).on('click', '#btn_Jan', function(event){
	event.preventDefault();
	var selected_option = "1";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").addClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Feb', function(event){
	event.preventDefault();
	var selected_option = "2";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").addClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Mar', function(event){
	event.preventDefault();
	var selected_option = "3";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").addClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Apr', function(event){
	event.preventDefault();
	var selected_option = "4";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").addClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_May', function(event){
	event.preventDefault();
	var selected_option = "5";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").addClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Jun', function(event){
	event.preventDefault();
	var selected_option = "6";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").addClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Jul', function(event){
	event.preventDefault();
	var selected_option = "7";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").addClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Aug', function(event){
	event.preventDefault();
	var selected_option = "8";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").addClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Sep', function(event){
	event.preventDefault();
	var selected_option = "9";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").addClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Oct', function(event){
	event.preventDefault();
	var selected_option = "10";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").addClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Nov', function(event){
	event.preventDefault();
	var selected_option = "11";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").addClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Dec', function(event){
	event.preventDefault();
	var selected_option = "12";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").addClass("border-selected"); 
	$("#btn_Out").removeClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 

$(document).on('click', '#btn_Out', function(event){
	event.preventDefault();
	var selected_option = "Out of Contract";
	$("select[name=contract_end]").val(selected_option);
	
	$("#btn_Jan").removeClass("border-selected"); 
	$("#btn_Feb").removeClass("border-selected"); 
	$("#btn_Mar").removeClass("border-selected"); 
	$("#btn_Apr").removeClass("border-selected"); 
	$("#btn_May").removeClass("border-selected"); 
	$("#btn_Jun").removeClass("border-selected"); 
	$("#btn_Jul").removeClass("border-selected"); 
	$("#btn_Aug").removeClass("border-selected"); 
	$("#btn_Sep").removeClass("border-selected"); 
	$("#btn_Oct").removeClass("border-selected"); 
	$("#btn_Nov").removeClass("border-selected"); 
	$("#btn_Dec").removeClass("border-selected"); 
	$("#btn_Out").addClass("border-selected"); 
	
	$("#tab3").hide();
	$("#tab4").show();
}); 