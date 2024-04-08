<?php include_once('contact_form_submit.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Contact Form</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">


	<!-- HELPERS -->

	<link rel="stylesheet" type="text/css" href="../assets/helpers/animate.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/backgrounds.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/boilerplate.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/border-radius.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/grid.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/page-transitions.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/spacing.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/typography.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/utils.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/colors.css">

	<!-- ELEMENTS -->

	<link rel="stylesheet" type="text/css" href="../assets/elements/buttons.css">
	<link rel="stylesheet" type="text/css" href="../assets/elements/forms.css">
	<link rel="stylesheet" type="text/css" href="../assets/elements/images.css">
	<link rel="stylesheet" type="text/css" href="../assets/elements/tile-box.css">
	<link rel="stylesheet" type="text/css" href="../assets/elements/content-box.css">
	<link rel="stylesheet" type="text/css" href="../assets/elements/dashboard-box.css">
	<link rel="stylesheet" type="text/css" href="../assets/elements/panel-box.css">
	<link rel="stylesheet" type="text/css" href="../assets/elements/ribbon.css">

	<!-- WIDGETS -->

	<link rel="stylesheet" type="text/css" href="../assets/widgets/datatable/datatable.css">
	<link rel="stylesheet" type="text/css" href="../assets/widgets/progressbar/progressbar.css">

	<!-- SNIPPETS -->

	<link rel="stylesheet" type="text/css" href="../assets/snippets/login-box.css">


	<!-- Admin theme -->

	<link rel="stylesheet" type="text/css" href="../assets/themes/admin/layout.css">
	<link rel="stylesheet" type="text/css" href="../assets/themes/admin/color-schemes/default.css">

	<!-- Components theme -->

	<link rel="stylesheet" type="text/css" href="../assets/themes/components/default.css">
	<link rel="stylesheet" type="text/css" href="../assets/themes/components/border-radius.css">

	<!-- Admin responsive -->

	<link rel="stylesheet" type="text/css" href="../assets/helpers/responsive-elements.css">
	<link rel="stylesheet" type="text/css" href="../assets/helpers/admin-responsive.css">

	<!-- JS Core -->

	<script type="text/javascript" src="../assets/js-core/jquery-core.js"></script>
	<script type="text/javascript" src="../assets/js-core/jquery-ui-core.js"></script>
	<script type="text/javascript" src="../assets/js-core/jquery-ui-widget.js"></script>
	<script type="text/javascript" src="../assets/js-core/jquery-ui-mouse.js"></script>
	<script type="text/javascript" src="../assets/js-core/jquery-ui-position.js"></script>
	<!--<script type="text/javascript" src="../assets/js-core/transition.js"></script>-->
	<script type="text/javascript" src="../assets/js-core/modernizr.js"></script>
	<script type="text/javascript" src="../assets/js-core/jquery-cookie.js"></script>

	<!-- Bootstrap Wizard -->

	<script type="text/javascript" src="../assets/widgets/wizard/wizard.js"></script>
	<script type="text/javascript" src="../assets/widgets/wizard/wizard-demo.js"></script>

	<!-- Boostrap Tabs -->

	<script type="text/javascript" src="../assets/widgets/tabs/tabs.js"></script>

	<script type="text/javascript" src="contact_form.js"></script>

	<style>
		.error {
			color: #FF0000;
		}

		.required_field {
			color: #FF0000;
		}

		.btn-uf {
			color: #fff;
			border-color: #45b1e8;
			background-color: #45b1e8;
		}

		.bg-electricity {
			color: #ffffff;
			border-color: #f3c530;
			background-color: #f3c530;
		}

		.border-electricity {
			border-color: #f3c530;
		}

		.bg-gas {
			color: #ffffff;
			border-color: #ef4627;
			background-color: #ef4627;
		}

		.border-gas {
			border-color: #ef4627;
		}

		.bg-energy {
			color: #ffffff;
			border-color: #77c046;
			background-color: #77c046;
		}

		.border-energy {
			border-color: #77c046;
		}

		.bg-water {
			color: #ffffff;
			border-color: #45b1e8;
			background-color: #45b1e8;
		}

		.border-water {
			border-color: #45b1e8;
		}

		.accent-bg {
			color: #fff;
			background-color: #043487;
		}

		.accent-gen {
			color: #fff;
			background-color: #45b1e8;
		}

		.logo-box {
			background-color: #ffffff;
			color: #000000;
			min-height: 150px;
			max-height: 150px;
			margin: auto;
		}

		.border-selected {
			border-width: 5px;
			border-style: solid;
			border-color: #cad3e3;
			background-color: #cad3e3;
		}

		.btn-quote-for {
			min-height: 200px;
			min-height: 200px;
			color: #000000;
		}

		.field-wrapper {
			min-height: 200px;
		}

		/* Center the loader */
		#loader {
			position: absolute;
			left: 50%;
			top: 50%;
			z-index: 1;
			width: 120px;
			height: 120px;
			margin: -76px 0 0 -76px;
			border: 16px solid #f3f3f3;
			border-radius: 50%;
			border-top: 16px solid #36B3FB;
			-webkit-animation: spin 1s linear infinite;
			animation: spin 1s linear infinite;
		}

		@-webkit-keyframes spin {
			0% {
				-webkit-transform: rotate(0deg);
			}

			100% {
				-webkit-transform: rotate(360deg);
			}
		}

		@keyframes spin {
			0% {
				transform: rotate(0deg);
			}

			100% {
				transform: rotate(360deg);
			}
		}

		/* Add animation to "page content" */
		.animate-bottom {
			position: relative;
			-webkit-animation-name: animatebottom;
			-webkit-animation-duration: 1s;
			animation-name: animatebottom;
			animation-duration: 0.5s
		}

		@-webkit-keyframes animatebottom {
			from {
				bottom: -100px;
				opacity: 0
			}

			to {
				bottom: 0px;
				opacity: 1
			}
		}

		@keyframes animatebottom {
			from {
				bottom: -100px;
				opacity: 0
			}

			to {
				bottom: 0;
				opacity: 1
			}
		}

		#myDiv {
			display: none;
			text-align: center;
		}
	</style>

</head>

<body>

	<style type="text/css">
		html,
		body {
			height: 100%;
			background: #fff;
		}
	</style>

	<div class="center-vertical">
		<div class="center-content row">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="contact_form" class="col-md-12 center-margin form-horizontal" method="post">
				<!--<div class="panel">
					<div class="panel-body">-->
				<div class="example-box-wrapper">
					<div id="form-wizard-1">
						<ul class="hidden">
							<li><a href="#tab1" data-toggle="tab">First</a></li>
							<li><a href="#tab2" data-toggle="tab">Second</a></li>
							<li><a href="#tab3" data-toggle="tab">Third</a></li>
							<li><a href="#tab4" data-toggle="tab">Forth</a></li>
							<li><a href="#tab5" data-toggle="tab">Fifth</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane <?php if (!empty($_POST)) echo "hidden"; ?>" id="tab1">
								<div class="content-box accent-bg">
									<h3 class="content-box-header title-hero">
										What would you like a quote for?
									</h3>
									<div class="content-box-wrapper">
										<div class="form-group">
											<div class="input-group">
												<div class="col-sm-3">
													<input type="hidden" class="form-control" name="taken_from" id="taken_from" value="<?php echo $taken_from_page; ?>">
												</div>
												<div class="col-sm-3">
													<input type="hidden" class="form-control" name="utility_type" value="<?php echo $utility_type; ?>">
												</div>
											</div>
										</div>
										<div class="form-group hidden">
											<div class="input-group">
												<div class="col-md-3">
													<span class="col-md-7 center-margin">Electricity</span>
													<input type="checkbox" id="electricity" name="quote_for" value="Electricity" <?php if (isset($quote_for) && $quote_for == "Electricity") echo "checked"; ?> class="center-content">
												</div>
												<div class="col-md-3">
													<span class="col-md-7 center-margin">Gas</span>
													<input type="checkbox" id="gas" name="quote_for" value="Gas" <?php if (isset($quote_for) && $quote_for == "Gas") echo "checked"; ?> class="center-content">
												</div>
												<div class="col-md-3">
													<span class="col-md-7 center-margin">Energy</span>
													<input type="checkbox" id="both" name="quote_for" value="Both" <?php if (isset($quote_for) && $quote_for == "Both") echo "checked"; ?> class="center-content">
												</div>
												<div class="col-sm-3">
													<span class="col-md-7 center-margin">Water</span>
													<input type="checkbox" id="water" name="quote_for" value="Water" <?php if (isset($quote_for) && $quote_for == "Water") echo "checked"; ?> class="center-content">
												</div>
											</div>
										</div>
										<div class="row field-wrapper" style="margin-bottom:20px;">
											<div class="col-md-12">
												<div class="col-md-4"></div>
												<div class="col-md-1 <?php if ((!empty($_GET) && $_GET['type'] == "water") || $utility_type == "water") echo "hidden"; ?> pad0R">
													<div class="corner-ribbon corner-ribbon-tr">
														<div class="bg-energy"></div>
													</div>
													<button class="btn btn-block vertical-button btn-quote-for <?php if (isset($quote_for) && $quote_for == "Both") echo "border-selected"; ?>" id="btn_energy">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/lightbulb-cfl-solid.png" id="img_both" alt="Logo" style="max-width:50px;height:auto;" class="pad0T pad10B">
														</span>
														<h3>ENERGY</h3>
													</button>
												</div>
												<div class="col-md-1 <?php if ((!empty($_GET) && $_GET['type'] == "energy") || $utility_type == "energy") echo "hidden"; ?> pad0R">
													<div class="corner-ribbon corner-ribbon-tr">
														<div class="bg-water"></div>
													</div>
													<button class="btn btn-block vertical-button btn-quote-for <?php if (isset($quote_for) && $quote_for == "Water") echo "border-selected"; ?>" id="btn_water">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/droplet-solid.png" id="img_water" alt="Logo" style="max-width:50px;height:auto;" class="pad0T pad10B">
														</span>
														<h3>WATER</h3>
													</button>
												</div>
												<div class="col-md-1 <?php if ((!empty($_GET) && $_GET['type'] == "water") || $utility_type == "water") echo "hidden"; ?> pad0R">
													<div class="corner-ribbon corner-ribbon-tr">
														<div class="bg-gas"></div>
													</div>
													<button class="btn btn-block vertical-button btn-quote-for <?php if (isset($quote_for) && $quote_for == "Gas") echo "border-selected"; ?>" id="btn_gas">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/fire-flame-solid.png" id="img_gas" alt="Logo" style="max-width:50px;height:auto;" class="pad0T pad10B">
														</span>
														<h3>GAS</h3>
													</button>
												</div>
												<div class="col-md-1 <?php if ((!empty($_GET) && $_GET['type'] == "water") || $utility_type == "water") echo "hidden"; ?> pad0R">
													<div class="corner-ribbon corner-ribbon-tr">
														<div class="bg-electricity"></div>
													</div>
													<button class="btn btn-block vertical-button btn-quote-for <?php if (isset($quote_for) && $quote_for == "Electricity") echo "border-selected"; ?>" id="btn_electricity">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/plug-solid.png" id="img_electricity" alt="Logo" style="max-width:50px;height:auto;" class="pad0T pad10B">
														</span>
														<!--<span class="button-content">ELECTRICITY</span>-->
														<h3>ELECTRICITY</h3>
													</button>
												</div>
												<div class="col-md-4"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4"></div>
												<div class="col-md-4">
													<div class="progressbar" data-value="100" style="width:auto;">
														<div class="progressbar-value accent-gen" style="width: 50px;">
															<div class="progress-label">0%</div>
														</div>
													</div>
												</div>
												<div class="col-md-4"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab2">
								<div class="content-box accent-bg">
									<h3 class="content-box-header title-hero">
										Who is your current supplier?
									</h3>
									<div class="content-box-wrapper">
										<div class="form-group <?php if (!isset($quote_for) || $quote_for == "Water") echo "hidden"; ?>" id="eg_supplier_row">
											<div class="input-group hidden field-wrapper">
												<div class="col-sm-4">
													<select class="form-control" name="eg_current_supplier" id="eg_current_supplier">
														<option value="">Please select...</option>
														<option value="British Gas" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "British Gas") echo "selected"; ?>>British Gas</option>
														<option value="EDF" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "EDF") echo "selected"; ?>>EDF</option>
														<option value="Scottish Power" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Scottish Power") echo "selected"; ?>>Scottish Power</option>
														<option value="Opus Energy" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Opus Energy") echo "selected"; ?>>Opus Energy</option>
														<option value="Eon" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Eon") echo "selected"; ?>>Eon</option>
														<option value="Smartest Energy" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Smartest Energy") echo "selected"; ?>>Smartest Energy</option>
														<option value="SSE" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "SSE") echo "selected"; ?>>SSE</option>
														<option value="CNG" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "CNG") echo "selected"; ?>>CNG</option>
														<option value="Crown Gas and Power" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Crown Gas and Power") echo "selected"; ?>>Crown Gas and Power</option>
														<option value="Total" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Total") echo "selected"; ?>>Total</option>
														<option value="Gazprom" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Gazprom") echo "selected"; ?>>Gazprom</option>
														<option value="BG Lite" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "BG Lite") echo "selected"; ?>>BG Lite</option>
														<option value="Bulb" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Bulb") echo "selected"; ?>>Bulb</option>
														<option value="Other Company" <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Other Company") echo "selected"; ?>>Other Company</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row <?php if (!isset($quote_for) || $quote_for == "Water") echo "hidden"; ?>" id="energy_suppliers" style="margin-bottom:20px;">
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "British Gas") echo "border-selected"; ?> logo-box" id="btn_BritishGas">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/BritishGas.png" id="" alt="British Gas" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">British Gas</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "EDF") echo "border-selected"; ?> logo-box" id="btn_EDF">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/EDF.png" id="" alt="EDF" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">EDF</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Scottish Power") echo "border-selected"; ?> logo-box" id="btn_ScottishPower">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/ScottishPower.png" id="" alt="Scottish Power" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Scottish Power</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Opus Energy") echo "border-selected"; ?> logo-box" id="btn_OpusEnergy">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/OpusEnergy.png" id="" alt="Opus Energy" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Opus Energy</span>-->
													</button>
												</div>
												<div class="col-md-2"></div>
											</div>
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Eon") echo "border-selected"; ?> logo-box" id="btn_Eon">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Eon.png" id="" alt="Eon" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Eon</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Smartest Energy") echo "border-selected"; ?> logo-box" id="btn_SmartestEnergy">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/SmartestEnergy.png" id="" alt="Smartest Energy" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">Smartest Energy</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "SSE") echo "border-selected"; ?> logo-box" id="btn_SSE">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/SSE.png" id="" alt="SSE" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">SSE</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "CNG") echo "border-selected"; ?> logo-box" id="btn_CNG">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/CNG.png" id="" alt="CNG" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">CNG</span>-->
													</button>
												</div>
											</div>
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Crown Gas and Power") echo "border-selected"; ?> logo-box" id="btn_CrownGasandPower">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/CrownGasandPower.png" id="" alt="Crown Gas and Power" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">Crown Gas and Power</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Total") echo "border-selected"; ?> logo-box" id="btn_Total">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Total.png" id="" alt="Total" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">Total</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "BG Lite") echo "border-selected"; ?> logo-box" id="btn_BGLite">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/BGLite.png" id="" alt="BG Lite" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">BG Lite</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Gazprom") echo "border-selected"; ?> logo-box" id="btn_Gazprom">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Gazprom.png" id="" alt="Gazprom" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">Gazprom</span>-->
													</button>
												</div>
												<div class="col-md-2"></div>
											</div>
											<div class="col-md-12">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Bulb") echo "border-selected"; ?> logo-box" id="btn_Bulb">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Bulb.png" id="" alt="Bulb" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">Bulb</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($eg_current_supplier) && $eg_current_supplier == "Other Company") echo "border-selected"; ?> logo-box" id="btn_OtherCompany">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/OtherCompany.png" id="" alt="Other Company" style="max-width:100px;height:auto;">
														</span>
														<!--<span class="button-content">Other Company</span>-->
													</button>
												</div>
												<div class="col-md-2"></div>
												<div class="col-md-2"></div>
											</div>
										</div>
										<div class="form-group <?php if (!isset($quote_for) || $quote_for != "Water") echo "hidden"; ?>" id="w_supplier_row">
											<div class="input-group hidden field-wrapper">
												<div class="col-sm-4">
													<select class="form-control" name="water_current_supplier" id="water_current_supplier">
														<option value="">Please select...</option>
														<option value="Castle Water" <?php if (isset($w_current_supplier) && $w_current_supplier == "Castle Water") echo "selected"; ?>>Castle Water</option>
														<option value="Clear Business" <?php if (isset($w_current_supplier) && $w_current_supplier == "Clear Business") echo "selected"; ?>>Clear Business</option>
														<option value="Everflow Water" <?php if (isset($w_current_supplier) && $w_current_supplier == "Everflow Water") echo "selected"; ?>>Everflow Water</option>
														<option value="Smarta Water" <?php if (isset($w_current_supplier) && $w_current_supplier == "Smarta Water") echo "selected"; ?>>Smarta Water</option>
														<option value="Olympos Water" <?php if (isset($w_current_supplier) && $w_current_supplier == "Olympos Water") echo "selected"; ?>>Olympos Water</option>
														<option value="Source 4 Business" <?php if (isset($w_current_supplier) && $w_current_supplier == "Source 4 Business") echo "selected"; ?>>Source 4 Business</option>
														<option value="Veolia" <?php if (isset($w_current_supplier) && $w_current_supplier == "Veolia") echo "selected"; ?>>Veolia</option>
														<option value="Water2Business" <?php if (isset($w_current_supplier) && $w_current_supplier == "Water2Business") echo "selected"; ?>>Water2Business</option>
														<option value="WaterPlus" <?php if (isset($w_current_supplier) && $w_current_supplier == "WaterPlus") echo "selected"; ?>>WaterPlus</option>
														<option value="Waterscan" <?php if (isset($w_current_supplier) && $w_current_supplier == "Waterscan") echo "selected"; ?>>Waterscan</option>
														<option value="Wave" <?php if (isset($w_current_supplier) && $w_current_supplier == "Wave") echo "selected"; ?>>Wave</option>
														<option value="Yu Water" <?php if (isset($w_current_supplier) && $w_current_supplier == "Yu Water") echo "selected"; ?>>Yu Water</option>
														<option value="Other" <?php if (isset($w_current_supplier) && $w_current_supplier == "Other") echo "selected"; ?>>Other</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row <?php if (!isset($quote_for) || $quote_for != "Water") echo "hidden"; ?>" id="water_suppliers" style="margin-bottom:20px;">
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Castle Water") echo "border-selected"; ?> logo-box" id="btn_CastleWater">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/CastleWater.png" id="" alt="Castle Water" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Castle Water</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Clear Business") echo "border-selected"; ?> logo-box" id="btn_ClearBusiness">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/ClearBusiness.png" id="" alt="Clear Business" style="max-width:150px;height:auto;max-height:100px;">
														</span>
														<!--<span class="button-content">Clear Business</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Everflow Water") echo "border-selected"; ?> logo-box" id="btn_EverflowWater">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/EverflowWater.png" id="" alt="Everflow Water" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Everflow Water</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Smarta Water") echo "border-selected"; ?> logo-box" id="btn_SmartaWater">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/SmartaWater.png" id="" alt="Smarta Water" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Smarta Water</span>-->
													</button>
												</div>
												<div class="col-md-2"></div>
											</div>
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Olympos Water") echo "border-selected"; ?> logo-box" id="btn_OlymposWater">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/OlymposWater.png" id="" alt="Olympos Water" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Olympos Water</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Source 4 Business") echo "border-selected"; ?> logo-box" id="btn_Source4Business">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Source4Business.png" id="" alt="Source 4 Business" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Source 4 Business</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Veolia") echo "border-selected"; ?> logo-box" id="btn_Veolia">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Veolia.png" id="" alt="Veolia" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Veolia</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Water2Business") echo "border-selected"; ?> logo-box" id="btn_Water2Business">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Water2Business.png" id="" alt="Water2Business" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Water2Business</span>-->
													</button>
												</div>
												<div class="col-md-2"></div>
											</div>
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "WaterPlus") echo "border-selected"; ?> logo-box" id="btn_WaterPlus">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/WaterPlus.png" id="" alt="WaterPlus" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">WaterPlus</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Waterscan") echo "border-selected"; ?> logo-box" id="btn_Waterscan">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Waterscan.png" id="" alt="Waterscan" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Waterscan</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Wave") echo "border-selected"; ?> logo-box" id="btn_Wave">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Wave.png" id="" alt="Wave" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Wave</span>-->
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Yu Water") echo "border-selected"; ?> logo-box" id="btn_YuWater">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/YuWater.png" id="" alt="Yu Water" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Yu Water</span>-->
													</button>
												</div>
												<div class="col-md-2"></div>
											</div>
											<div class="col-md-12">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($w_current_supplier) && $w_current_supplier == "Other") echo "border-selected"; ?> logo-box" id="btn_Other">
														<span class="glyph-icon icon-separator-vertical">
															<img src="../assets/images/logos/Other.png" id="" alt="Other" style="max-width:150px;height:auto;">
														</span>
														<!--<span class="button-content">Other</span>-->
													</button>
												</div>
												<div class="col-md-2"></div>
												<div class="col-md-2"></div>
												<div class="col-md-2"></div>
												<div class="col-md-2"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4"></div>
												<div class="col-md-4">
													<div class="progressbar" data-value="100" style="width:auto;">
														<div class="progressbar-value accent-gen" style="width: 20%;">
															<div class="progress-label">20%</div>
														</div>
													</div>
												</div>
												<div class="col-md-4"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="float-left">
													<a href="#" class="btn btn-default btn-lg ra-100" id="prev-1">PREV</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab3">
								<div class="content-box accent-bg">
									<h3 class="content-box-header title-hero">
										When does your current contract end?
									</h3>
									<div class="content-box-wrapper">
										<div class="form-group">
											<div class="col-sm-4">
												<select class="form-control hidden" name="contract_end" id="contract_end">
													<option value="">Please select...</option>
													<option value="1" <?php if (isset($contract_end) && $contract_end == "1") echo "selected"; ?>>January</option>
													<option value="2" <?php if (isset($contract_end) && $contract_end == "2") echo "selected"; ?>>February</option>
													<option value="3" <?php if (isset($contract_end) && $contract_end == "3") echo "selected"; ?>>March</option>
													<option value="4" <?php if (isset($contract_end) && $contract_end == "4") echo "selected"; ?>>April</option>
													<option value="5" <?php if (isset($contract_end) && $contract_end == "5") echo "selected"; ?>>May</option>
													<option value="6" <?php if (isset($contract_end) && $contract_end == "6") echo "selected"; ?>>June</option>
													<option value="7" <?php if (isset($contract_end) && $contract_end == "7") echo "selected"; ?>>July</option>
													<option value="8" <?php if (isset($contract_end) && $contract_end == "8") echo "selected"; ?>>August</option>
													<option value="9" <?php if (isset($contract_end) && $contract_end == "9") echo "selected"; ?>>September</option>
													<option value="10" <?php if (isset($contract_end) && $contract_end == "10") echo "selected"; ?>>October</option>
													<option value="11" <?php if (isset($contract_end) && $contract_end == "11") echo "selected"; ?>>November</option>
													<option value="12" <?php if (isset($contract_end) && $contract_end == "12") echo "selected"; ?>>December</option>
													<option value="Out of Contract" <?php if (isset($contract_end) && $contract_end == "Out of Contract") echo "selected"; ?>>Out of Contract</option>
												</select>
											</div>
										</div>
										<div class="row" style="margin-bottom:20px;">
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "1") echo "border-selected"; ?> logo-box" id="btn_Jan">
														<h3>January</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "2") echo "border-selected"; ?> logo-box" id="btn_Feb">
														<h3>February</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "3") echo "border-selected"; ?> logo-box" id="btn_Mar">
														<h3>March</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "4") echo "border-selected"; ?> logo-box" id="btn_Apr">
														<h3>April</h3>
													</button>
												</div>
												<div class="col-md-2"></div>
											</div>
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "5") echo "border-selected"; ?> logo-box" id="btn_May">
														<h3>May</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "6") echo "border-selected"; ?> logo-box" id="btn_Jun">
														<h3>June</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "7") echo "border-selected"; ?> logo-box" id="btn_Jul">
														<h3>July</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "8") echo "border-selected"; ?> logo-box" id="btn_Aug">
														<h3>August</h3>
													</button>
												</div>
												<div class="col-md-2"></div>
											</div>
											<div class="col-md-12" style="margin-bottom:20px;">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "9") echo "border-selected"; ?> logo-box" id="btn_Sep">
														<h3>September</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "10") echo "border-selected"; ?> logo-box" id="btn_Oct">
														<h3>October</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "11") echo "border-selected"; ?> logo-box" id="btn_Nov">
														<h3>November</h3>
													</button>
												</div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "12") echo "border-selected"; ?> logo-box" id="btn_Dec">
														<h3>December</h3>
													</button>
												</div>
												<div class="col-md-2"></div>
											</div>
											<div class="col-md-12">
												<div class="col-md-2"></div>
												<div class="col-md-2">
													<button class="btn btn-block vertical-button <?php if (isset($contract_end) && $contract_end == "Out of Contract") echo "border-selected"; ?> logo-box" id="btn_Out">
														<h3>Out of Contract</h3>
													</button>
												</div>
												<div class="col-md-2"></div>
												<div class="col-md-2"></div>
												<div class="col-md-2"></div>
												<div class="col-md-2"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4"></div>
												<div class="col-md-4">
													<div class="progressbar" data-value="100" style="width:auto;">
														<div class="progressbar-value accent-gen" style="width: 40%;">
															<div class="progress-label">40%</div>
														</div>
													</div>
												</div>
												<div class="col-md-4"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="float-left">
													<a href="#" class="btn btn-default btn-lg ra-100" id="prev-2">PREV</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab4">
								<div class="content-box accent-bg">
									<h3 class="content-box-header title-hero">
										Let us know about your business?
									</h3>
									<div class="content-box-wrapper">
										<div class="form-group">
											<div class="input-group">
												<div class="row col-sm-12" style="margin:auto;">
													<div class="col-sm-3"></div>
													<div class="col-sm-2">
														<label class="control-label" style="color:#ffffff;">Business Name</label>
													</div>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="business_name" id="business_name" placeholder="Business Name" value="<?php echo $business_name; ?>">
														<span class="error"><?php echo $business_nameErr; ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group field-wrapper">
											<div class="input-group">
												<div class="row col-sm-12" style="margin:auto;">
													<div class="col-sm-3"></div>
													<div class="col-sm-2">
														<label class="control-label" style="color:#ffffff;">Postcode</label>
													</div>
													<div class="col-sm-4">
														<input type="text" class="form-control col-sm-2" name="postcode" id="postcode" placeholder="Postcode" value="<?php echo $postcode; ?>">
														<span class="error"><?php echo $postcodeErr; ?></span>
													</div>
													<div class="col-sm-3"></div>
												</div>
												<div class="row col-sm-12" style="margin:auto;margin-top:10px;">
													<div class="col-sm-3">
													</div>
													<div class="col-sm-6">
														<p class="">Your business postcode enables our pricing expert to provide the most accurate offer for your area. Feel free to insert your business name.</p>
													</div>
													<div class="col-sm-3"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4"></div>
												<div class="col-md-4">
													<div class="progressbar" data-value="100" style="width:auto;">
														<div class="progressbar-value accent-gen" style="width: 60%;">
															<div class="progress-label">60%</div>
														</div>
													</div>
												</div>
												<div class="col-md-4"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="float-left">
													<a href="#" class="btn btn-default btn-lg ra-100" id="prev-3">PREV</a>
												</div>
												<div class="float-right">
													<a href="#" class="btn btn-default btn-lg btn-uf ra-100" id="next-5">NEXT</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="tab-loading">
								<div class="content-box-wrapper">
									<div class="col-sm-12" style="min-height:120px;">
										<h3 class="title-hero" style="text-align:center;">
											SEARCHING FOR OFFERS . . . . .
										</h3>
									</div>
									<div class="col-sm-12">
										<div id="loader"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane <?php if (!empty($_POST)) echo "show"; ?>" id="tab5">
								<div class="content-box accent-bg">
									<h3 class="content-box-header title-hero">
										Good News! A selection of exclusive offers have been matched for your consideration. Where should we send your quotes now?
									</h3>
									<div class="content-box-wrapper">
										<div class="form-group">
											<div class="input-group">
												<div class="row col-sm-12" style="margin:auto;">
													<div class="col-sm-3"></div>
													<div class="col-sm-2">
														<label class="control-label" style="color:#ffffff;">Your Name </label>
													</div>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="your_name" placeholder="Your Name" value="<?php echo $your_name; ?>">
														<span class="error" id="name-err"><?php echo $your_nameErr; ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="row col-sm-12" style="margin:auto;">
													<div class="col-sm-3"></div>
													<div class="col-sm-2">
														<label class="control-label" style="color:#ffffff;">Email Address</label>
													</div>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="email_address" data-parsley-type="email" placeholder="Email address" value="<?php echo $email_address; ?>">
														<span class="error" id="email-err"><?php echo $email_addressErr; ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="row col-sm-12" style="margin:auto;">
													<div class="col-sm-3"></div>
													<div class="col-sm-2">
														<label class="control-label" style="color:#ffffff;">Phone Number</label>
													</div>
													<div class="col-sm-4">
														<input type="text" class="form-control" name="phone_number" placeholder="Phone Number" minlength="11" value="<?php echo $phone_number; ?>">
														<span class="error" id="phone-err"><?php echo $phone_numberErr; ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<div class="row col-sm-12" style="margin:auto;">
													<div class="col-sm-3"></div>
													<div class="col-sm-6">
														<label class="control-label" style="color:#ffffff;">Privacy Statement:</label>
														<p> Your privacy is important to us. By submitting this form, you consent to Utility Finder and their partners to contact you by email or phone with details of quotes and/or to confirm your requirements in order to receive your quotes. You may opt out of Utility Finder at any time.</p>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4"></div>
												<div class="col-md-4">
													<div class="progressbar" data-value="100" style="width:auto;">
														<div class="progressbar-value accent-gen" style="width: 80%;">
															<div class="progress-label">80%</div>
														</div>
													</div>
												</div>
												<div class="col-md-4"></div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="float-left">
													<a href="#" class="btn btn-default btn-lg ra-100" id="prev-4">PREV</a>
												</div>
												<div class="float-right">
													<button type="submit" id="submit_form" class="btn btn-lg btn-uf btn-lg ra-100">SUBMIT</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--</div>
				</div>-->

			</form>
		</div>
	</div>

	<!-- WIDGETS -->

	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/widgets/progressbar/progressbar.js"></script>
	<!-- Widgets init for demo -->

	<script type="text/javascript" src="../assets/js-init/widgets-init.js"></script>

</body>

</html>