<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div>
                <h1>Settings</h1>
            </div>

            <div class="row">
                <div class="col-md-12" id="setting-navigation">
                    <ul class="nav nav-tabs justify-content-end mb-0" role="tablist">
                        <li class="nav-item">
                            <a href="#user-setting" role="tab" data-toggle="tab" class="nav-link active" id="nav-user-setting">User Setting</a>
                        </li>
                        <li class="nav-item">
                            <a href="#system-setting" role="tab" data-toggle="tab" class="nav-link" id="nav-system-setting">System Setting</a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-body tab-content">
                            <div class="tab-pane active" role="tabpanel" id="user-setting">
                                <h4>User Records</h4>
                                <div class="table-responsive">
                                    <table class="table" id="user-records-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox" value="" id="check-all-user">
                                                        <label for="check-all-user" class="custom-control-label"></label>
                                                    </div>
                                                </th>
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
                                </div>

                                <div class="row" id="utility-supplier-list">
                                    <div class="col-md-10" id="energy-supplier-list" hidden>
                                        <h4>Energy Supplier List</h4>
                                        <div class="table-responsive">
                                            <table class="table" id="energy-supplier-records-table">
                                                <thead>
                                                    <tr>
                                                        <th>Supplier</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-10" id="water-supplier-list" hidden>
                                        <h4>Water Supplier List</h4>
                                        <div class="table-responsive">
                                            <table class="table" id="water-supplier-records-table">
                                                <thead>
                                                    <tr>
                                                        <th>Supplier</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/settings.js"></script>