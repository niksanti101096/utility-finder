<?php
	$taken_from_page = $utility_type = $quote_for = $current_supplier  = $eg_current_supplier = $w_current_supplier = $contract_end = "";
	$business_name = $postcode = $your_name = $email_address = $phone_number ="";
	$business_nameErr = $postcodeErr = $your_nameErr = $email_addressErr = $phone_numberErr = "";
	$lead_type = $post_code = $contact_name = $current_contract_ends = "";

	if(!empty($_GET)){
		if($_GET['type']=="energy"){ $utility_type = "energy"; }
		else if($_GET['type']=="water"){ $utility_type = "water"; }
	}
	
	if(!empty($_POST)) {	
		$taken_from_page = test_input($_POST['taken_from']);
		$utility_type = test_input($_POST['utility_type']);
		if(!empty($_POST['quote_for']))$quote_for = test_input($_POST['quote_for']);
		
		if(!empty($_POST['eg_current_supplier'])) $eg_current_supplier = test_input($_POST['eg_current_supplier']); 
		if(!empty($_POST['water_current_supplier'])) $w_current_supplier = test_input($_POST['water_current_supplier']); 		
		if(!empty($_POST['contract_end'])) $contract_end = test_input($_POST['contract_end']);	
		if($quote_for=='Water') { $current_supplier= $w_current_supplier; }
		else { $current_supplier = $eg_current_supplier; }
				
		if(!empty($quote_for) && empty($_POST['business_name'])){
			$business_nameErr = "Required";
		} else { 
			$business_name = test_input($_POST['business_name']);
			$business_nameErr = "";
		}	
		if(!empty($quote_for) && empty($_POST['postcode'])){
			$postcodeErr = "Required";
		} else { 
			$postcode = test_input($_POST['postcode']); 
			$postcodeErr = ""; 
		}
		if(!empty($quote_for) && empty($_POST['your_name'])){
			$your_nameErr = "Required";
		} else { 
			$your_name = test_input($_POST['your_name']); 
			$your_nameErr = ""; 
		}
		if(!empty($quote_for) && empty($_POST['email_address'])){
			$email_addressErr = "Required";
		} else if (!empty($quote_for) && !filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)) {
			$email_addressErr = "Invalid email format";
			$email_address = test_input($_POST['email_address']); 		
		} else { 
			$email_address = test_input($_POST['email_address']); 		
			$email_addressErr = ""; 
		}
		if(!empty($quote_for) && empty($_POST['phone_number'])){
			$phone_numberErr = "Required";	
		} else if(!empty($quote_for) && !preg_match('/^[0-9]+$/', $_POST['phone_number'])){
			$phone_numberErr = "Invalid phone number format";
			$phone_number = test_input($_POST['phone_number']); 
		} else {
			$phone_number = test_input($_POST['phone_number']); 
			$phone_numberErr = ""; 
		}	
		
		$errors = "$business_nameErr$postcodeErr$your_nameErr$email_addressErr$phone_numberErr";
		//print_r($errors);
		
		if(empty($errors)){
			if($quote_for=="Water"){ $lead_type = "5"; }
			else if($quote_for=="Electricity"){ $lead_type = "4"; }
			else if($quote_for=="Gas"){ $lead_type = "3"; }
			else if($quote_for=="Both"){ $lead_type = "2"; }
			$post_code = $postcode;
			$contact_name = $your_name;
			// print_r('taken from: '.$taken_from_page);
			// print_r('</br>quote for: '.$quote_for);
			// print_r('</br>current_supplier: '.$current_supplier);
			// print_r('</br>contract_end: '.$contract_end);
			// print_r('</br>business_name: '.$business_name);
			// print_r('</br>postcode: '.$postcode);
			// print_r('</br>your name: '.$your_name);
			// print_r('</br>email: '.$email_address);
			// print_r('</br>phone_number: '.$phone_number);
		
		   header('Location: thankyou.php');
		   exit;
		}
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>