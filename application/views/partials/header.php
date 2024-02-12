<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title><?php echo $title; ?></title>
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/vendors.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/charts/apexcharts.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/extensions/toastr.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/extensions/sweetalert2.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/forms/wizard/bs-stepper.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/forms/select/select2.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/css/plugins/forms/form-wizard.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/css/plugins/forms/form-validation.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/vendors/css/forms/select/select2.min.css');?>">
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/css/plugins/extensions/ext-component-toastr.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/css/plugins/extensions/ext-component-sweet-alerts.css');?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
    <!-- END: Custom CSS-->

    <!-- BEGIN: Online CSS  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- END: Online CSS  -->


    <script src="<?php echo base_url('app-assets/vendors/js/jquery/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('app-assets/vendors/js/charts/apexcharts.min.js');?>"></script>
    <script src="<?php echo base_url('app-assets/vendors/js/SPL_AJAX_Full.js'); ?>"></script>
    <script type="text/javascript">
        var url = "<?php echo base_url(); ?>";
        var url_extended = '';
        <?php if(strpos(strtoupper($session['role']), 'ADMIN') !== false): ?>
        url_extended = "<?php echo base_url().'admin/'; ?>";
        userTypeURL = "admin/";
        <?php endif; ?>
    </script>

    <style>
        .nav-right li {
            float: left;
            padding: 0 15px;
            font-size: 14px;
            border-right: 1px #909090 solid;
        }

        .nav-right li:last-child {
            border-right: none;
        }

        .navbar-header {
            height: auto !important;
        }

        span.user-name:first-letter {
            text-transform: uppercase;
        }

    </style>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern content-left-sidebar navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item my-auto">
                        <span class="user-name font-weight-bolder"><?php echo $session['firstname']. ' ' . $session['lastname']; ?></span>
                    </li>
                </ul>
            </div>
        
            <ul class="nav navbar-nav align-items-center ml-auto nav-right">

                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link nav-link-style">
                        <i class="ficon" data-feather="sun"></i>
                    </a>
                </li>
                
                <!-- Profile Section -->
                <li class="nav-item">
                    <a class="nav-link" id="navbar-profile" href="<?php echo base_url('profile'); ?>">
                        Profile
                    </a>
                </li>

                <!-- Search Section -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#search-lead-records-modal" id="search-lead-btn">
                        <!-- <i class="ficon" data-feather="search"></i> -->
                        Search
                    </a>
                </li>

                <!-- Notification Section  notifcation-modal-->
                <li class="nav-item dropdown dropdown-notification mr-25">
                    <a class="nav-link" data-toggle="modal" data-target="#notifcation-modal">
                        <!-- <i class="ficon" data-feather="bell"></i> -->
                        Notification
                        <span class="badge badge-pill badge-danger badge-up">2</span>
                    </a>
                </li>

                <!-- Logout Section -->
                <li class="nav-item">
                    <a class="nav-link" id="navbar-logout" href="<?php echo base_url('authentication/logout'); ?>">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item m-auto d-flex">
                    <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">
                        <h2 class="brand-text">Utility Finder</h2>
                    </a>
                </li>
                <!-- <li class="nav-item nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                        <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                        <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                    </a>
                </li> -->
            </ul>
                    
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main h-100 d-flex flex-column" id="main-menu-navigation" data-menu="menu-navigation">
                <?php if(strtoupper($session['role']) === 'ADMIN'): ?>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="<?php echo base_url('admin'); ?>" data-i18n="Dashboard">
                            <i data-feather="home"></i>
                            <span data-i18n="Dashboard">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="<?php echo base_url('admin/new-leads'); ?>" data-i18n="New Leads">
                            <i data-feather="user-plus"></i>
                            <span data-i18n="New Leads">New Leads</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="<?php echo base_url('admin/allocated-leads'); ?>" data-i18n="Allocated Leads">
                            <i data-feather="users"></i>
                            <span data-i18n="Allocated Leads">Allocated Leads</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="<?php echo base_url('admin'); ?>" data-i18n="Archived Leads">
                            <i data-feather="user-minus"></i>
                            <span data-i18n="Archived Leads">Archived Leads</span>
                        </a>
                    </li>
                    <li class="nav-item mb-auto">
                        <a class="nav-link d-flex align-items-center" href="<?php echo base_url('admin/settings'); ?>" data-i18n="Settings">
                            <i data-feather="settings"></i>
                            <span data-i18n="Settings">Settings</span>
                        </a>
                    </li>
                    <!-- <li class="navigation-header">
                        <span data-i18n="Sample &amp; Text">Sample &amp; Text</span>
                        <i data-feather="more-horizontal"></i>
                    </li> -->
                    <li class="nav-item d-flex justify-content-center mb-1">
                        <button type="button" class="btn btn-primary w-75 py-1" id="create-lead-btn" data-i18n="Create User Manually">
                            <i data-feather="plus"></i>
                            <span data-i18n="Create User Manually">Create</span>
                        </button>
                    </li>
                    <form action="<?php echo base_url('authentication/logout'); ?>">
                        <li class="nav-item d-flex justify-content-center">
                            <button type="submit" class="nav-link btn btn-primary w-75 py-1" href="<?php echo base_url('authentication/logout'); ?>" data-i18n="Logout">
                                <i data-feather="log-out"></i>
                                <span data-i18n="Logout">Logout</span>
                            </button>
                        </li>
                    </form>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <!-- Modals -->
    <?php include_once('assets/modals/search-lead-records-modal.php'); ?>
    <?php include_once('assets/modals/create-new-lead-modal.php'); ?>
    <?php include_once('assets/modals/notification-modal.php'); ?>
