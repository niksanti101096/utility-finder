<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        
        <div class="content-header">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">User Profile</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        User Profile
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <section class="vertical-wizard mb-0">
                                <div class="bs-stepper vertical vertical-wizard-example">
                                    <div class="bs-stepper-header">
                                        <div class="step" data-target="#user-information-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box"><i data-feather='settings'></i></span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">User Information</span>
                                                    <span class="bs-stepper-subtitle">Setup user Information</span>
                                                </span>
                                            </button>
                                        </div>
                                        <div class="step" data-target="#change-password-vertical">
                                            <button type="button" class="step-trigger">
                                                <span class="bs-stepper-box"><i data-feather='lock'></i></span>
                                                <span class="bs-stepper-label">
                                                    <span class="bs-stepper-title">Change Password</span>
                                                    <span class="bs-stepper-subtitle">Change Password</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="bs-stepper-content">
                                        <div id="user-information-vertical" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">User Information</h5>
                                                <small class="text-muted">Enter User Information</small>
                                            </div>
                                            <form class="form" id="user-profile-form">
                                                <div class="row">
                                                    <div class="form-group col-md-2">
                                                        <label class="form-label" for="salutation">Salutation</label>
                                                        <select class="select2 form-control form-control-lg col-12 editable" id="salutation" name="salutation" data-placeholder="" disabled>
                                                            <option value=""></option>
                                                            <option value="Mr">Mr</option>
                                                            <option value="Ms">Ms</option>
                                                            <option value="Mrs">Mrs</option>
                                                            <option value="Doctor">Doctor</option>
                                                            <option value="Prof">Prof</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label" for="firstname">First Name</label>
                                                        <input type="text" id="firstname" class="form-control editable" name="firstname" placeholder="" disabled/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label" for="middlename">Middle Name</label>
                                                        <input type="text" id="middlename" class="form-control editable" name="middlename" placeholder="" disabled/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="form-label" for="lastname">Last Name</label>
                                                        <input type="text" id="lastname" class="form-control editable" name="lastname" placeholder="" disabled/>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label class="form-label" for="extention">Extention</label>
                                                        <input type="text" id="extention" class="form-control editable" name="extention" placeholder="" disabled/>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="user-type">User Type</label>
                                                        <input type="text" id="user-type" class="form-control" name="user_type" placeholder="" disabled/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="department">Department</label>
                                                        <input type="text" id="department" class="form-control" name="department" placeholder="" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input type="email" id="email" class="form-control editable" name="email" placeholder="" disabled/>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label" for="phone">Mobile Number</label>
                                                        <input type="number" id="phone" class="form-control editable" name="phone" placeholder="" disabled/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-6 d-flex align-items-center">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input editable" id="received_email" checked disabled/>
                                                            <label class="custom-control-label" for="received_email">Receive an EMAIL everytime a Lead is created.</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-6 ">
                                                        <button type="submit" class="btn btn-primary btn-sm float-right ml-1" id="btn-save-profile" hidden>
                                                            <i data-feather='save'></i>
                                                            Save
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm float-right" id="btn-cancel-profile" hidden>
                                                            <i data-feather='save'></i>
                                                            Cancel
                                                        </button>
                                                        <button type="button" class="btn btn-success btn-sm float-right" id="btn-edit-profile">
                                                            <i data-feather='edit'></i>
                                                            Edit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div id="change-password-vertical" class="content">
                                            <div class="content-header">
                                                <h5 class="mb-0">Change Password</h5>
                                                <small class="text-muted">Enter Password Details</small>
                                            </div>
                                            <form id="change-password-form" name="change_password_form">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label" for="old-password">Old Password</label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" id="old-password" name="old_password" class="form-control" placeholder="Enter Old Password" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label" for="new-password">New Password</label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" id="new-password"name="new_password" class="form-control" placeholder="Enter New Password" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-label" for="new-repassword">Re-enter New Password</label>
                                                        <div class="input-group input-group-merge form-password-toggle">
                                                            <input type="password" id="new-repassword" name="re_password" class="form-control" placeholder="Re-enter New Password" />
                                                            <div class="input-group-append">
                                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-12 ">
                                                        <button type="submit" class="btn btn-success btn-sm float-right">
                                                            <i data-feather='save'></i>
                                                            Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/profile.js"></script>
