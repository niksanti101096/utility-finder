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
    <!-- <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>app-assets/images/ico/favicon.ico"> -->
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

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
<!-- BEGIN: Content-->
<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <!-- Login v1 -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <h4 class="card-title mb-1">Welcome to Fairers/Utility Finder! 👋</h4>
                                <?php if(isset($message)): ?>
                                    <p class="text-center text-danger"><i class="glyph-icon icon-warning"></i> <?php echo @$message; ?></p>
                                <?php endif; ?>
                                <p class="text-center notif-error text-danger"></p>
                                <p class="card-text mb-2">Please let us know what kind of user you are:</p>
                                <form id="register-form" class="auth-register-form mt-2" action="<?php echo base_url('register'); ?>" method="POST">
                                    <div class="form-group">
                                        <label class="form-label" for="register-firstname">First Name</label>
                                        <input class="form-control" id="register-firstname" type="text" name="register_firstname" placeholder="John" aria-describedby="register-firstname" autofocus="" tabindex="1" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-middlename">Middle Name</label>
                                        <input class="form-control" id="register-middlename" type="text" name="register_middlename" placeholder="John" aria-describedby="register-middlename" autofocus="" tabindex="1" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-lastname">Last Name</label>
                                        <input class="form-control" id="register-lastname" type="text" name="register_lastname" placeholder="Doe" aria-describedby="register-lastname" autofocus="" tabindex="1"/>
                                    </div>
                                    <div class="form-group company-input-section" style="display:none;">
                                        <label class="form-label" for="register-firmname">Firm Name</label>
                                        <input class="form-control" id="register-firmname" type="text" name="register_firmname" placeholder="" aria-describedby="register-firmname" autofocus="" tabindex="1"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-mobile-number">Mobile Number</label>
                                        <input class="form-control" id="register-mobile-number" type="text" name="register_mobile_number" placeholder="" aria-describedby="register-mobile-number" autofocus="" tabindex="1" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-email">Email</label>
                                        <input class="form-control" id="register-email" type="text" name="register_email" placeholder="john@example.com" aria-describedby="register-email" tabindex="2" required/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-password">Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="register-password" type="password" name="register_password" placeholder="············" aria-describedby="register-password" tabindex="3" required/>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="register-repassword">Confirm Password</label>
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input class="form-control form-control-merge" id="register-repassword" type="password" name="register_repassword" placeholder="············" aria-describedby="register-repassword" tabindex="3" required/>
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer">
                                                    <i data-feather="eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="register-privacy-policy" type="checkbox" tabindex="4" />
                                            <label class="custom-control-label" for="register-privacy-policy">I am not a robot</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6"><a href="<?php echo base_url('authentication'); ?>" type="button" class="btn btn-secondary btn-block" tabindex="5">Cancel</a></div>
                                        <div class="col-md-6"><button class="btn btn-primary btn-block" tabindex="5">Sign up</button></div>
                                    </div>
                                </form>
                                <p class="text-center mt-2"><span>Already have an account?</span><a href="<?php echo base_url('authentication'); ?>"><span>&nbsp;Sign in instead</span></a></p>
                            </div>
                        </div>
                        <!-- /Login v1 -->
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
        $(function(){
            $('#register-form').submit(function(event) {
                event.preventDefault();
                if(!$('#register-privacy-policy').is(':checked')){
                    $('.notif-error').html('Please tick I am not a robot to continue');
                }else if($('#register-form [name="register_password"]').val() != $('#register-form [name="register_repassword"]').val()){
                    $('#register-repassword').css('border', '1px solid red');
                    $('#register-repassword').parents('.form-group').find('.added-warning').remove();
                    $('#register-repassword').parents('.form-group').find('label').append(' <span class="text-danger added-warning">Re-type password did not match the password entered!</span>');
                }else{
                    $(this).unbind('submit').submit();
                }
            });
        })

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