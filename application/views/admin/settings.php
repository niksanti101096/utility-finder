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
                            <h2 class="content-header-title float-left mb-0">Settings</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?php echo base_url('admin'); ?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" id="breadcrumb-dashboard">
                                        Settings
                                    </li>
                                    <li class="breadcrumb-item active breadcrumb-dashboard">
                                        User Settings
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
                <div class="col-md-12" id="setting-navigation">
                    <ul class="nav nav-tabs justify-content-end mb-0" role="tablist">
                        <li class="nav-item">
                            <a href="#user-setting" role="tab" data-toggle="tab" class="nav-link active" id="nav-user-setting">User Setting</a>
                        </li>
                        <li class="nav-item">
                            <a href="#system-setting" role="tab" data-toggle="tab" class="nav-link" id="nav-system-setting">System Setting</a>
                        </li>
                        <li class="nav-item">
                            <a href="#third-parties-setting" role="tab" data-toggle="tab" class="nav-link" id="nav-third-parties-setting">Third Party Setting</a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-body tab-content">
                            <div class="tab-pane active" role="tabpanel" id="user-setting">
                                <div class="table-responsive">
                                    <table class="table" id="user-records-table">
                                        <thead>
                                            <tr>
                                                <!-- <th scope="col">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" value="" id="check-all-user">
                                                        <label for="check-all-user" class="custom-control-label"></label>
                                                    </div>
                                                </th> -->
                                                <th scope="col">ID</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">User Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="system-setting">
                                <div class="row" id="system-setting-list">
                                    <div class="col-md-4">
                                        <div class="card bg-gradient-primary text-center">
                                            <a id="link-energy-supplier">
                                                <div class="card-body">
                                                    <h2>Energy Supplier List</h2>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-gradient-primary text-center">
                                            <a id="link-water-supplier">
                                                <div class="card-body">
                                                    <h2>Water Supplier List</h2>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card bg-gradient-primary text-center">
                                            <a id="link-lead-source">
                                                <div class="card-body">
                                                    <h2>Lead Source</h2>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="utility-supplier-list">
                                    <div class="col-md-12" id="energy-supplier-list" hidden>
                                        <h4>Energy Supplier List</h4>
                                        <div class="table-responsive">
                                            <table class="table" id="energy-supplier-records-table">
                                                <thead>
                                                    <tr>
                                                        <th>Supplier</th>
                                                        <th>Logo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="water-supplier-list" hidden>
                                        <h4>Water Supplier List</h4>
                                        <div class="table-responsive">
                                            <table class="table" id="water-supplier-records-table">
                                                <thead>
                                                    <tr>
                                                        <th>Supplier</th>
                                                        <th>Logo</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="lead-source-list" hidden>
                                        <h4 class="mb-1">Lead Sources</h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card bg-gradient-primary text-center">
                                                    <a id="">
                                                        <div class="card-body">
                                                            <h2>Webform API</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card bg-gradient-primary text-center">
                                                    <a id="">
                                                        <div class="card-body">
                                                            <h2>PPC API</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="card bg-gradient-primary text-center">
                                                    <a id="">
                                                        <div class="card-body">
                                                            <h2>Email Campaign</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="third-parties-setting">
                                <div class="table-responsive" id="third-party-records">
                                    <table class="table" id="third-parties-records-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">API Key</th>
                                                <th scope="col">API Access</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>

                                <div class="card m-0 p-0" id="third-party-detail" hidden>
                                    <div class="card-body p-0">
                                        <section class="vertical-wizard mb-0">
                                            <div class="bs-stepper vertical vertical-wizard-example">
                                                <div class="bs-stepper-header">
                                                    <div class="step" data-target="#partner-information-vertical">
                                                        <button type="button" class="step-trigger">
                                                            <span class="bs-stepper-box"><i data-feather='settings'></i></span>
                                                            <span class="bs-stepper-label">
                                                                <span class="bs-stepper-title">Partner Information</span>
                                                                <span class="bs-stepper-subtitle">Setup Partner Information</span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bs-stepper-content">
                                                    <div id="partner-information-vertical" class="content">
                                                        <div class="content-header">
                                                            <h5 class="mb-0">Partner Information</h5>
                                                            <small class="text-muted">Enter Partner Information</small>
                                                        </div>
                                                        <form class="form" id="third-party-profile-form">
                                                            <input type="hidden" name="partner_id" id="partner-id">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label class="form-label" for="partner-name">Partner Name</label>
                                                                    <input type="text" id="partner-name" class="form-control editable" name="partner_name" placeholder="" disabled />
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="form-label" for="tp-info-email">Email Address</label>
                                                                    <input type="email" id="tp-info-email" class="form-control editable" name="email" placeholder="" disabled />
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-12">
                                                                    <label class="form-label" for="api-key">API Key</label>
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="text" id="api-key" class="form-control form-control-merge" name="api_key" placeholder="" disabled />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text cursor-pointer" data-toggle="tooltip" data-placement="bottom" title="Copy to clipboard" id="copy-tooltip" onclick="copyToClipboard('#api-key')"><i data-feather='clipboard'></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label class="form-label" for="partner-status">Status</label>
                                                                    <input type="text" id="partner-status" class="form-control" name="partner_status" placeholder="" disabled />
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-4 d-flex align-items-center">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input editable" id="received-email" name="received_email" checked disabled />
                                                                        <label class="custom-control-label" for="received-email">Received Email.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-4 d-flex align-items-center">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input editable" id="api-access" name="api_access" checked disabled />
                                                                        <label class="custom-control-label" for="api-access">API Access.</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-4 ">
                                                                    <button type="submit" class="btn btn-primary btn-sm float-right ml-1" id="btn-update-tp-profile" hidden>
                                                                        <i data-feather='save'></i>
                                                                        Update
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-sm float-right" id="btn-cancel-tp-profile" hidden>
                                                                        <i data-feather='x'></i>
                                                                        Cancel
                                                                    </button>
                                                                    <button type="button" class="btn btn-success btn-sm float-right" id="btn-edit-tp-profile">
                                                                        <i data-feather='edit'></i>
                                                                        Edit
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

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" id="add-user-btn">
                            <i data-feather="plus"></i>
                            <span>Add user</span>
                        </button>
                        <button type="button" class="btn btn-primary" id="add-energy-btn" hidden>
                            <i data-feather="plus"></i>
                            <span>Add energy supplier</span>
                        </button>
                        <button type="button" class="btn btn-primary" id="add-water-btn" hidden>
                            <i data-feather="plus"></i>
                            <span>Add water supplier</span>
                        </button>
                        <button type="button" class="btn btn-primary" id="add-lead-source-btn" hidden>
                            <i data-feather="plus"></i>
                            <span>Add lead source</span>
                        </button>
                        <button type="button" class="btn btn-primary" id="add-third-party-btn" hidden>
                            <i data-feather="plus"></i>
                            <span>Add Third Party</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/settings.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/user-profile.js"></script>

<!-- Modal -->
<?php include_once('assets/modals/user-modal.php'); ?>
<?php include_once('assets/modals/supplier-modal.php'); ?>
<?php include_once('assets/modals/third-party-modal.php'); ?>