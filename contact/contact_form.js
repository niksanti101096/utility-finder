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

$(document).on('click', '#next-2', function(event){
	var check_elec = $('#electricity:checked').is(":checked");
	var check_gas = $('#gas:checked').is(":checked");
	var check_both = $('#both:checked').is(":checked");
	var check_water = $('#water:checked').is(":checked");
	
	if(check_elec||check_gas||check_both||check_water){
		//alert('true');
		$("#tab1").hide();
		$("#tab2").show();
	} else { 
		alert('Please select what you would like a quote for'); 				
	}
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

$(document).on('click', '#next-3', function(event){
	var check_elec = $('#electricity:checked').is(":checked");
	var check_gas = $('#gas:checked').is(":checked");
	var check_both = $('#both:checked').is(":checked");
	var check_water = $('#water:checked').is(":checked");
	
	if(check_water){
		if(document.getElementById("water_current_supplier").value){
			$("#tab2").hide();
			$("#tab3").show();
		} else { alert('Please select a supplier'); }
	} else {
		if(document.getElementById("eg_current_supplier").value){
			$("#tab2").hide();
			$("#tab3").show();
		} else { alert('Please select a supplier'); }
	}
}); 

$(document).on('click', '#next-4', function(event){
	if(document.getElementById("contract_end").value){
		$("#tab3").hide();
		$("#tab4").show();
	} else { alert('Please select a month'); }
}); 

$(document).on('click', '#next-5', function(event){
	if(document.getElementById("business_name").value){
		if(document.getElementById("postcode").value){
			$("#tab4").hide();
			$("#loader").show();		
			var myVar = setTimeout(showLoading, 1000);
		} else { alert('Please enter postcode'); }
	} else { alert('Please enter business name'); }
}); 

function showLoading(){
	$("#loader").hide();		
	$("#tab5").removeClass("hidden");
	$("#tab5").show();		
}

$(document).on('click', '#water', function(){
	var checkedValue = $('#water:checked').is(":checked")
	if(checkedValue){ 
		document.getElementById("electricity").checked = false;
		document.getElementById("gas").checked = false;
		document.getElementById("both").checked = false;
		$("#eg_supplier_row").addClass("hidden"); 
		$("#w_supplier_row").removeClass("hidden"); 
		//$("#panel_questions").removeClass("hidden"); 
	} //else { showHide_questions(); }
  }); 
$(document).on('click', '#electricity', function(){			
	var checkedValue = $('#electricity:checked').is(":checked")
	if(checkedValue){
		document.getElementById("gas").checked = false;
		document.getElementById("both").checked = false;
		document.getElementById("water").checked = false;
		$("#eg_supplier_row").removeClass("hidden"); 
		$("#w_supplier_row").addClass("hidden"); 
		//$("#panel_questions").removeClass("hidden"); 
	} //else { showHide_questions(); }
}); 
$(document).on('click', '#gas', function(){			
	var checkedValue = $('#gas:checked').is(":checked")
	if(checkedValue){
		document.getElementById("electricity").checked = false;
		document.getElementById("both").checked = false;
		document.getElementById("water").checked = false;
		$("#eg_supplier_row").removeClass("hidden"); 
		$("#w_supplier_row").addClass("hidden"); 
		//$("#panel_questions").removeClass("hidden"); 
	} //else { showHide_questions(); }
}); 
$(document).on('click', '#both', function(){			
	var checkedValue = $('#both:checked').is(":checked")
	if(checkedValue){
		document.getElementById("electricity").checked = false;
		document.getElementById("gas").checked = false;
		document.getElementById("water").checked = false;
		$("#eg_supplier_row").removeClass("hidden"); 
		$("#w_supplier_row").addClass("hidden"); 
		//$("#panel_questions").removeClass("hidden"); 
	} //else { showHide_questions(); }
}); 
  
function showHide_questions(){
	var checkedValue_e = $('#electricity:checked').is(":checked")
	var checkedValue_g = $('#gas:checked').is(":checked")
	var checkedValue_b = $('#both:checked').is(":checked")
	var checkedValue_w = $('#water:checked').is(":checked")
	
	if(!checkedValue_e && !checkedValue_g && !checkedValue_b && !checkedValue_w){ $("#panel_questions").addClass("hidden"); }
	else{ $("#panel_questions").removeClass("hidden"); }
}

function GetSupplierLogo_eg(eg_supplier){
	var selectedVal = eg_supplier.value;
	if(selectedVal == ''){ 
		$("#img_logo").addClass("hidden"); 
	} else { 
		$("#img_logo").addClass("hidden");
		var new_src = "../assets/images/logos/" + selectedVal + ".png";
		document.getElementById("img_logo").src = new_src; 
		$("#img_logo").removeClass("hidden");
	}
}

function GetSupplierLogo_water(supplier){
	var selectedVal = supplier.value;
	if(selectedVal == '' || selectedVal == 'Other'){ $("#water_img_logo").addClass("hidden"); }
	else { 
		$("#water_img_logo").addClass("hidden");
		var new_src = "../assets/images/logos/" + selectedVal + ".png";
		document.getElementById("water_img_logo").src = new_src; 
		$("#water_img_logo").removeClass("hidden");
	}
}