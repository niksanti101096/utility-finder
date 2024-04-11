<?php

use SebastianBergmann\Environment\Console;

$base_url = url();
$taken_from_page = $utility_type = $quote_for = $current_supplier  = $eg_current_supplier = $w_current_supplier = $contract_end = "";
$business_name = $postcode = $your_name = $email_address = $phone_number = "";
$business_nameErr = $postcodeErr = $your_nameErr = $email_addressErr = $phone_numberErr = "";
$lead_type = $post_code = $contact_name = $current_contract_ends = "";

if (!empty($_GET)) {
	if ($_GET['type'] == "energy") {
		$utility_type = "energy";
	} else if ($_GET['type'] == "water") {
		$utility_type = "water";
	}
}

if (!empty($_POST)) {
	$taken_from_page = test_input($_POST['taken_from']);
	$utility_type = test_input($_POST['utility_type']);
	if (!empty($_POST['quote_for'])) $quote_for = test_input($_POST['quote_for']);

	if (!empty($_POST['eg_current_supplier'])) $eg_current_supplier = test_input($_POST['eg_current_supplier']);
	if (!empty($_POST['water_current_supplier'])) $w_current_supplier = test_input($_POST['water_current_supplier']);
	if (!empty($_POST['contract_end'])) $contract_end = test_input($_POST['contract_end']);
	if ($quote_for == 'Water') {
		$current_supplier = $w_current_supplier;
	} else {
		$current_supplier = $eg_current_supplier;
	}

	if (!empty($quote_for) && empty($_POST['business_name'])) {
		$business_nameErr = "Required";
	} else {
		$business_name = test_input($_POST['business_name']);
		$business_nameErr = "";
	}
	if (!empty($quote_for) && empty($_POST['postcode'])) {
		$postcodeErr = "Required";
	} else {
		$postcode = test_input($_POST['postcode']);
		$postcodeErr = "";
	}
	if (!empty($quote_for) && empty($_POST['your_name'])) {
		$your_nameErr = "Required";
	} else {
		$your_name = test_input($_POST['your_name']);
		$your_nameErr = "";
	}
	if (!empty($quote_for) && empty($_POST['email_address'])) {
		$email_addressErr = "Required";
	} else if (!empty($quote_for) && !filter_var($_POST['email_address'], FILTER_VALIDATE_EMAIL)) {
		$email_addressErr = "Invalid email format";
		$email_address = test_input($_POST['email_address']);
	} else {
		$email_address = test_input($_POST['email_address']);
		$email_addressErr = "";
	}
	if (!empty($quote_for) && empty($_POST['phone_number'])) {
		$phone_numberErr = "Required";
	} else if (!empty($quote_for) && !preg_match('/^[0-9]+$/', $_POST['phone_number'])) {
		$phone_numberErr = "Invalid phone number format";
		$phone_number = test_input($_POST['phone_number']);
	} else {
		$phone_number = test_input($_POST['phone_number']);
		$phone_numberErr = "";
	}

	$errors = "$business_nameErr$postcodeErr$your_nameErr$email_addressErr$phone_numberErr";
	//print_r($errors);

	if (empty($errors)) {
		if ($quote_for == "Water") {
			$lead_type = "5";
		} else if ($quote_for == "Electricity") {
			$lead_type = "4";
		} else if ($quote_for == "Gas") {
			$lead_type = "3";
		} else if ($quote_for == "Both") {
			$lead_type = "2";
		}
		$current_contract_ends = "";
		if ($contract_end == "1") {
			$current_contract_ends = "January";
		} else if ($contract_end == "2") {
			$current_contract_ends = "February";
		} else if ($contract_end == "3") {
			$current_contract_ends = "March";
		} else if ($contract_end == "4") {
			$current_contract_ends = "April";
		} else if ($contract_end == "5") {
			$current_contract_ends = "May";
		} else if ($contract_end == "6") {
			$current_contract_ends = "June";
		} else if ($contract_end == "7") {
			$current_contract_ends = "July";
		} else if ($contract_end == "8") {
			$current_contract_ends = "August";
		} else if ($contract_end == "9") {
			$current_contract_ends = "September";
		} else if ($contract_end == "10") {
			$current_contract_ends = "October";
		} else if ($contract_end == "11") {
			$current_contract_ends = "November";
		} else if ($contract_end == "12") {
			$current_contract_ends = "December";
		} else if ($contract_end == "Out of Contract") {
			$current_contract_ends = "Out of Contract";
		}

		$post_code = $postcode;
		$contact_name = $your_name;
		// echo '<script type="text/javascript">alert("taken from: '.$taken_from_page.',quote for: '.$quote_for.', current supplier: '.$current_supplier.', contract end: '.$current_contract_ends.', business name: '.$business_name.', postcode: '.$postcode.', your name: '.$your_name.', email: '.$email_address.', phone_number: '.$phone_number.'");</script>';

		$to_send_data = [
			'taken_from_page' => $taken_from_page,
			'quote_for' => $quote_for,
			'current_supplier' => $current_supplier,
			'current_contract_ends' => $current_contract_ends,
			'business_name' => $business_name,
			'post_code' => $postcode,
			'contact_name' => $your_name,
			'phone_number' => $phone_number,
			'email_address' => $email_address,
		];

		$data_string = json_encode($to_send_data);
		$ch = curl_init($base_url . '/api/contact_form');
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		$result_formatted = json_decode($result, true);
		curl_close($ch);

		header('Location: thankyou.php');
		exit;
	}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function url(){
	if(isset($_SERVER['HTTPS'])){
		$protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
	}
	else{
		$protocol = 'http';
	}
	return $protocol . "://" . $_SERVER['SERVER_NAME'];
}