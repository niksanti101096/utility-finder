<?php include_once('contact_form_submit.php');?>
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

	<!-- WIDGETS -->

	<link rel="stylesheet" type="text/css" href="../assets/widgets/datatable/datatable.css">

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
	.error {color: #FF0000;}
	.required_field {color: #FF0000;}
	.btn-uf {
		color: #fff;
		border-color: #043487;
		background-color: #043487;
	} 
	.bg-electricity{
		color: #000;
		border-color: #f3c530;
		background-color: #f3c530;
	}
	.border-electricity{
		border-color: #f3c530;
	}
	.bg-gas{
		color: #000;
		border-color: #ef4627;
		background-color: #ef4627;
	}
	.border-gas{
		border-color: #ef4627;
	}
	.bg-energy{
		color: #000;
		border-color: #77c046;
		background-color: #77c046;
	}
	.border-energy{
		border-color: #77c046;
	}
	.bg-water{
		color: #000;
		border-color: #45b1e8;
		background-color: #45b1e8;
	}
	.border-water{
		border-color: #45b1e8;
	}
	.accent-bg{
		background-color: #043487;
	}
	.accent-gen{
		background-color: #45b1e8;
	}
	
	.field-wrapper{		
		min-height: 100px;
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
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
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
	  from { bottom:-100px; opacity:0 } 
	  to { bottom:0px; opacity:1 }
	}

	@keyframes animatebottom { 
	  from{ bottom:-100px; opacity:0 } 
	  to{ bottom:0; opacity:1 }
	}

	#myDiv {
	  display: none;
	  text-align: center;
	}
    </style>

</head>
<body>
	
	<style type="text/css">
		html,body {
			height: 100%;
			background: #fff;
		}
	</style>

	<div class="center-vertical">
		<div class="center-content row">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="contact_form" class="col-md-12 center-margin form-horizontal" method="post">         
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
									<div class="tab-pane <?php if (!empty($_POST)) echo "hidden";?>" id="tab1">
										<div class="content-box">
											<h3 class="content-box-header title-hero">
												What would you like a quote for?
											</h3>
											<div class="content-box-wrapper">
												<div class="form-group">
													<div class="input-group">
														<div class="col-sm-3">		
															<input type="hidden" class="form-control" name="taken_from" id="taken_from" value="<?php echo $taken_from_page;?>">
														</div>
														<div class="col-sm-3">		
															<input type="hidden" class="form-control" name="utility_type" value="<?php echo $utility_type;?>">
														</div>
													</div>
												</div>							
												<div class="row <?php if ((!empty($_GET) && $_GET['type']=="water") || $utility_type=="water") echo "hidden";?>">
													<div class="col-sm-1"></div>
													<div class="center-content col-sm-10">
														<div class="col-md-4">
															<div class="tile-box tile-box-alt bg-white content-box bg-electricity">
																<div class="tile-content-wrapper">
																	<div class="tile-content row center-vertical">
																		<div class="thumbnail-box col-md-4" style="margin-bottom:0px;">
																			<img src="../assets/images/plug-solid.png" id="img_electricity" alt="Logo">
																		</div>
																		<span class="col-md-7 center-margin">Electricity</span>
																		<input type="checkbox" id="electricity" name="quote_for" value="Electricity" <?php if (isset($quote_for) && $quote_for=="Electricity") echo "checked";?> class="center-content">
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="tile-box tile-box-alt bg-white content-box bg-gas">
																<div class="tile-content-wrapper">
																	<div class="tile-content row center-vertical">
																		<div class="thumbnail-box col-md-4" style="margin-bottom:0px;">
																			<img src="../assets/images/fire-flame-solid.png" id="img_gas" alt="Logo">
																		</div>
																		<span class="col-md-7 center-margin">Gas</span>
																		<input type="checkbox" id="gas" name="quote_for" value="Gas" <?php if (isset($quote_for) && $quote_for=="Gas") echo "checked";?> class="center-content">
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="tile-box tile-box-alt bg-white content-box bg-energy">
																<div class="tile-content-wrapper">
																	<div class="tile-content row center-vertical">
																		<div class="thumbnail-box col-md-4" style="margin-bottom:0px;">
																			<img src="../assets/images/lightbulb-cfl-solid.png" id="img_both" alt="Logo">
																		</div>
																		<span class="col-md-7 center-margin">Both</span>
																		<input type="checkbox" id="both" name="quote_for" value="Both" <?php if (isset($quote_for) && $quote_for=="Both") echo "checked";?> class="center-content">
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="col-sm-1"></div>
												</div>
												<div class="row <?php if ((!empty($_GET) && $_GET['type']=="energy") || $utility_type=="energy") echo "hidden";?>">
													<div class="col-sm-1"></div>
													<div class="center-content col-sm-10">
														<div class="col-sm-4"></div>
														<div class="col-md-4">
															<div class="tile-box tile-box-alt bg-white content-box bg-water">
																<div class="tile-content-wrapper">
																	<div class="tile-content row center-vertical">
																		<div class="thumbnail-box col-md-4" style="margin-bottom:0px;">
																			<img src="../assets/images/droplet-solid.png" id="img_water" alt="Logo">
																		</div>
																		<span class="col-md-7 center-margin">Water</span>
																		<input type="checkbox" id="water" name="quote_for" value="Water" <?php if (isset($quote_for) && $quote_for=="Water") echo "checked";?> class="center-content">
																	</div>
																</div>
															</div>
														</div>
														<div class="col-sm-4"></div>
													</div>
													<div class="col-sm-1"></div>
												</div>
												<div class="row">
													<div class="float-right">													
														<a href="#" class="btn btn-default btn-lg btn-uf ra-100" id="next-2">NEXT</a>
													</div>										
												</div>										
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab2">
										<div class="content-box">
											<h3 class="content-box-header title-hero">
											</h3>
											<div class="content-box-wrapper">
												<div class="form-group <?php if (!isset($quote_for) || $quote_for=="Water") echo "hidden";?>" id="eg_supplier_row">
													<div class="input-group field-wrapper">
														<div class="row">
															<label class="col-sm-5 control-label">Who is your current supplier?</label>
															<div class="col-sm-3">
																<select class="form-control" name="eg_current_supplier" id="eg_current_supplier" onchange="GetSupplierLogo_eg(this)">
																	<option value="">Please select...</option>
																	<option value="British Gas" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="British Gas") echo "selected";?>>British Gas</option>
																	<option value="EDF" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="EDF") echo "selected";?>>EDF</option>
																	<option value="Scottish Power" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Scottish Power") echo "selected";?>>Scottish Power</option>
																	<option value="Opus Energy" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Opus Energy") echo "selected";?>>Opus Energy</option>
																	<option value="Eon" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Eon") echo "selected";?>>Eon</option>
																	<option value="Smartest Energy" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Smartest Energy") echo "selected";?>>Smartest Energy</option>
																	<option value="SSE" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="SSE") echo "selected";?>>SSE</option>
																	<option value="CNG" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="CNG") echo "selected";?>>CNG</option>
																	<option value="Crown Gas and Power" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Crown Gas and Power") echo "selected";?>>Crown Gas and Power</option>
																	<option value="Total" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Total") echo "selected";?>>Total</option>
																	<option value="Gazprom" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Gazprom") echo "selected";?>>Gazprom</option>
																	<option value="BG Lite" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="BG Lite") echo "selected";?>>BG Lite</option>
																	<option value="Bulb" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Bulb") echo "selected";?>>Bulb</option>
																	<option value="Other Company" <?php if (isset($eg_current_supplier) && $eg_current_supplier=="Other Company") echo "selected";?>>Other Company</option>
																</select>
															</div>
															<div class="col-sm-4"></div>
														</div>
														<div class="row" style="padding-top:10px;">
															<div class="col-sm-5"></div>
															<div class="thumbnail-box col-sm-2">
																<img src="../assets/images/logos/Other Company.png" class="hidden" id="img_logo" alt="Logo">
															</div>
															<div class="col-sm-5"></div>
														</div>
													</div>
												</div>					
												<div class="form-group <?php if (!isset($quote_for) || $quote_for!="Water") echo "hidden";?>" id="w_supplier_row">
													<div class="input-group field-wrapper">
														<div class="row">
															<label class="col-sm-5 control-label">Who is your current supplier?</label>
															<div class="col-sm-3">
																<select class="form-control" name="water_current_supplier" id="water_current_supplier" onchange="GetSupplierLogo_water(this)">
																	<option value="">Please select...</option>
																	<option value="Castle Water" <?php if (isset($w_current_supplier) && $w_current_supplier=="Castle Water") echo "selected";?>>Castle Water</option>
																	<option value="Clear Business" <?php if (isset($w_current_supplier) && $w_current_supplier=="Clear Business") echo "selected";?>>Clear Business</option>
																	<option value="Everflow Water" <?php if (isset($w_current_supplier) && $w_current_supplier=="Everflow Water") echo "selected";?>>Everflow Water</option>
																	<option value="Smarta Water" <?php if (isset($w_current_supplier) && $w_current_supplier=="Smarta Water") echo "selected";?>>Smarta Water</option>
																	<option value="Olympos Water" <?php if (isset($w_current_supplier) && $w_current_supplier=="Olympos Water") echo "selected";?>>Olympos Water</option>
																	<option value="Source 4 Business" <?php if (isset($w_current_supplier) && $w_current_supplier=="Source 4 Business") echo "selected";?>>Source 4 Business</option>
																	<option value="Veolia" <?php if (isset($w_current_supplier) && $w_current_supplier=="Veolia") echo "selected";?>>Veolia</option>
																	<option value="Water2Business" <?php if (isset($w_current_supplier) && $w_current_supplier=="Water2Business") echo "selected";?>>Water2Business</option>
																	<option value="WaterPlus" <?php if (isset($w_current_supplier) && $w_current_supplier=="WaterPlus") echo "selected";?>>WaterPlus</option>
																	<option value="Waterscan" <?php if (isset($w_current_supplier) && $w_current_supplier=="Waterscan") echo "selected";?>>Waterscan</option>
																	<option value="Wave" <?php if (isset($w_current_supplier) && $w_current_supplier=="Wave") echo "selected";?>>Wave</option>
																	<option value="Yu Water" <?php if (isset($w_current_supplier) && $w_current_supplier=="Yu Water") echo "selected";?>>Yu Water</option>
																	<option value="Other" <?php if (isset($w_current_supplier) && $w_current_supplier=="Other") echo "selected";?>>Other</option>
																</select>
															</div>
														</div>
														<div class="row" style="padding-top:10px;">
															<div class="col-sm-5"></div>
															<div class="col-sm-2">
																<div class="thumbnail-box">
																	<img src="../assets/images/logos/Other Company.png" class="hidden" id="water_img_logo" alt="Logo">
																</div>
															</div>
															<div class="col-sm-5"></div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="float-left">													
														<a href="#" class="btn btn-default btn-lg ra-100" id="prev-1">PREV</a>
													</div>								
													<div class="float-right">													
														<a href="#" class="btn btn-default btn-lg btn-uf ra-100" id="next-3">NEXT</a>
													</div>										
												</div>		
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab3">
										<div class="content-box">
											<h3 class="content-box-header title-hero">
											</h3>
											<div class="content-box-wrapper">
												<div class="form-group">
													<div class="input-group field-wrapper">
														<label class="col-sm-5 control-label">When does your current contract end?</label>
														<div class="col-sm-3">
															<select class="form-control" name="contract_end" id="contract_end">
																<option value="">Please select...</option>
																<option value="1" <?php if (isset($contract_end) && $contract_end=="1") echo "selected";?>>January</option>
																<option value="2" <?php if (isset($contract_end) && $contract_end=="2") echo "selected";?>>February</option>
																<option value="3" <?php if (isset($contract_end) && $contract_end=="3") echo "selected";?>>March</option>
																<option value="4" <?php if (isset($contract_end) && $contract_end=="4") echo "selected";?>>April</option>
																<option value="5" <?php if (isset($contract_end) && $contract_end=="5") echo "selected";?>>May</option>
																<option value="6" <?php if (isset($contract_end) && $contract_end=="6") echo "selected";?>>June</option>
																<option value="7" <?php if (isset($contract_end) && $contract_end=="7") echo "selected";?>>July</option>
																<option value="8" <?php if (isset($contract_end) && $contract_end=="8") echo "selected";?>>August</option>
																<option value="9" <?php if (isset($contract_end) && $contract_end=="9") echo "selected";?>>September</option>
																<option value="10" <?php if (isset($contract_end) && $contract_end=="10") echo "selected";?>>October</option>
																<option value="11" <?php if (isset($contract_end) && $contract_end=="11") echo "selected";?>>November</option>
																<option value="12" <?php if (isset($contract_end) && $contract_end=="12") echo "selected";?>>December</option>
																<option value="Out of Contract" <?php if (isset($contract_end) && $contract_end=="Out of Contract") echo "selected";?>>Out of Contract</option>
															</select>
														</div>
													</div>
												</div>	
												<div class="row">
													<div class="float-left">													
														<a href="#" class="btn btn-default btn-lg ra-100" id="prev-2">PREV</a>
													</div>								
													<div class="float-right">													
														<a href="#" class="btn btn-default btn-lg btn-uf ra-100" id="next-4">NEXT</a>
													</div>										
												</div>	
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab4">
										<div class="content-box">
											<h3 class="content-box-header title-hero">
												Let us know about your business?
											</h3>
											<div class="content-box-wrapper">
												<div class="form-group">
													<div class="input-group">
														<label class="col-sm-5 control-label">Business Name <!--<span class="required_field">*</span>--></label>
														<div class="col-sm-3">		
															<input type="text" class="form-control" name="business_name" id="business_name" placeholder="Business Name" value="<?php echo $business_name;?>">
															<span class="error"><?php echo $business_nameErr;?></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="col-sm-3"></div>
														<label class="col-sm-2 control-label">Postcode <!--<span class="required_field">*</span>--></label>
														<div class="col-sm-3">		
															<input type="text" class="form-control col-sm-2" name="postcode" id="postcode" placeholder="Postcode" value="<?php echo $postcode;?>">
															<span class="error"><?php echo $postcodeErr;?></span>
														</div>
														<div class="col-sm-3"></div>
													</div>
												</div>
												<div class="row">
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
									<div class="tab-pane" id="loader"></div>
									<div class="tab-pane <?php if (!empty($_POST)) echo "show";?>" id="tab5">
										<div class="content-box">
											<h3 class="content-box-header title-hero">
												Offers Matched, where should we send your quotes now?
											</h3>
											<div class="content-box-wrapper">
												<div class="form-group">
													<div class="input-group">													
														<div class="col-sm-3"></div>
														<label class="col-sm-2 control-label">Your Name <!--<span class="required_field">*</span>--></label>
														<div class="col-sm-3">		
															<input type="text" class="form-control" name="your_name" placeholder="Your Name" value="<?php echo $your_name;?>">
															<span class="error" id="name-err"><?php echo $your_nameErr;?></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="col-sm-3"></div>
														<label class="col-sm-2 control-label">Email Address <!--<span class="required_field">*</span>--></label>
														<div class="col-sm-3">		
															<input type="text" class="form-control" name="email_address" data-parsley-type="email" placeholder="Email address" value="<?php echo $email_address;?>">
															<span class="error" id="email-err"><?php echo $email_addressErr;?></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="col-sm-3"></div>
														<label class="col-sm-2 control-label">Phone Number <!--<span class="required_field">*</span>--></label>
														<div class="col-sm-3">		
															<input type="text" class="form-control" name="phone_number" placeholder="Phone Number" minlength="11" value="<?php echo $phone_number;?>">
															<span class="error" id="phone-err"><?php echo $phone_numberErr;?></span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<div class="col-sm-3 float-left">
															<a href="#" class="btn btn-default btn-lg ra-100" id="prev-4">PREV</a>
														</div>
														<div class="col-sm-6">
															<button type="submit" id="submit_form" class="btn btn-block btn-uf btn-lg ra-100">SUBMIT</button>
														</div>
														<div class="col-sm-3"></div>
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
<!-- Widgets init for demo -->

<script type="text/javascript" src="../assets/js-init/widgets-init.js"></script>

	</body>
</html>