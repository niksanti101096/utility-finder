<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page</title>
    <!-- <link rel="apple-touch-icon" href="<?php echo base_url(); ?>app-assets/images/ico/apple-icon-120.png"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/Both.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/pages/page-auth.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static dark-layout" data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid bg-green" src="<?php echo base_url('assets/img/utility-finder-no-background-logo.png');?>" alt="Login V2" /></div>
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2>Please sign-in to your account!</h2>
                                <form class="auth-login-form mt-2" action="<?php echo base_url('authentication'); ?>" method="POST"> 
                                    <span class="text-danger"><?php echo isset($message) ? $message : ''; ?></span> <!-- this message will get return 'message' from backend if there is an error or wrong credentials -->
                                    <div class="form-group">
                                        <label for="login-username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="login-username" name="login-username" placeholder="Enter Username" aria-describedby="login-username" tabindex="1" autofocus />
                                    </div>
                                    <div class="form-group">
                                    <label for="login-password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control form-control-merge" id="login-password" name="login-password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="remember-me" tabindex="3" />
                                            <label class="custom-control-label" for="remember-me"> Remember Me </label>
                                        </div>
                                    </div> -->
                                    <button class="btn btn-primary btn-block" tabindex="4">Sign in</button> <!-- this is the submit button -->
                                </form>
                                <p class="text-center mt-2"><span>Forgot Password?</span><a href="<?php echo base_url('forgot-password'); ?>"><span>&nbsp;Reset Password</span></a></p>
                                <!-- <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>
                                <p class="text-center mt-2"><span>New User?</span><a href="<?php echo base_url('register'); ?>"><span>&nbsp;Register Here</span></a></p> -->
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url('app-assets/vendors/js/vendors.min.js');?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url('app-assets/vendors/js/forms/validation/jquery.validate.min.js');?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url('app-assets/js/core/app-menu.js');?>"></script>
    <script src="<?php echo base_url('app-assets/js/core/app.js');?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url('app-assets/js/scripts/pages/page-auth-login.js');?>"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>