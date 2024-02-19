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
		border-color: #36B3FB;
		background-color: #36B3FB;
	} 
	.btn-uf-nav {
		color: #000;
		border-color: #5DFECA;
		background-color: #5DFECA;
	} 
	.bg-wrapper{		
		background-image: url('../assets/images/bg-2.jpg');
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
<body class="bg-wrapper">

	<?php
		include_once('contact_form_submit.php');
	?>

	<style type="text/css">
		html,body {
			height: 100%;
			background: #fff;
		}
	</style>

	<div class="center-vertical col-sm-12">
		<div class="center-content row">
			<div class="panel" style="min-height:200px; color: #fff; border-color: #45b1e8; background-color: #45b1e8;">
				<div class="panel-body">
						<div class="meta-box">
							<h3>Thank you!</h3>
							<h1>Your information has been submitted successfully.</h1>
							<h2>You will shortly be contacted by email or phone to receive your quote.</h2>
						</div>
				</div>
				
			</div>
		</div>
	</div>

		<!-- WIDGETS -->

	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.js"></script>
<!-- Widgets init for demo -->

<script type="text/javascript" src="../assets/js-init/widgets-init.js"></script>

	</body>
</html>