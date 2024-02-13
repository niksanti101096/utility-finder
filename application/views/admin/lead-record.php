<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header">
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="justify-content-start">
                        <h2 id="content-header-title"></h2>
                    </div>
                    <div class="ml-auto">
                        <button type="button" class="btn btn-primary btn-allocate-lead" hidden>Allocate</button>
                        <button type="button" class="btn btn-primary btn-reallocate-lead" hidden>Reallocate</button>
                        <button type="button" class="btn mx-1 btn-warning btn-edit-lead" hidden>Edit</button>
                        <button type="button" class="btn btn-danger btn-archive-lead" hidden>Archive</button>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="content-body mt-2">
            <div class="row">
                <div class="col-md-12" id="lead-record-navigation">
                    <ul class="nav nav-tabs justify-content-end mb-0" role="tablist">
                        <li class="nav-item">
                            <a href="#details" role="tab" data-toggle="tab" class="nav-link active" id="nav-lead-details">Details</a>
                        </li>
                        <li class="nav-item">
                            <a href="#audit-log" role="tab" data-toggle="tab" class="nav-link" id="nav-audit-log">Audit Log</a>
                        </li>
                    </ul>
                    <div class="card">
                        <div class="card-body tab-content">
                            <div class="tab-pane active" role="tabpanel" id="details">
                                <form id="lead-record-form">
                                    <div class="row" id="lead-details">
                                        <div class="col-12">
                                            <h4 class="text-decoration-underline">
                                                Details
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="lead-id">Lead ID</label>
                                                </div>
                                                <div class="col-sm-10 d-flex align-items-center">
                                                    <input type="text" id="lead-id" class="form-control" name="lead_id" placeholder="System Generated" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label"  for="date-created">Date Created</label>
                                                </div>
                                                <div class="col-sm-10 d-flex align-items-center">
                                                    <input type="date" id="date-created" class="form-control" name="date_created" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="lead-source">Source</label>
                                                </div>
                                                <div class="col-sm-10 d-flex align-items-center">
                                                    <input type="text" id="lead-source" class="form-control" name="lead_source" placeholder="..." disabled />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="text-decoration-underline">
                                                Details
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group row">
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="type-electricity-gas">Lead Type</label>
                                                </div>
                                                <div class="col-sm-10 d-flex flex-wrap align-items-center justify-content-start">
                                                    <div class="custom-control custom-radio flex-fill">
                                                        <input type="radio" id="type-electricity-gas" name="lead_type" class="custom-control-input" value="2" disabled onclick="newLeadTypeValues()">
                                                        <label for="type-electricity-gas" class="custom-control-label">Electricity & Gas</label>
                                                    </div>
                                                    <div class="custom-control custom-radio flex-fill">
                                                        <input type="radio" id="type-gas" name="lead_type" class="custom-control-input" value="3" disabled onclick="newLeadTypeValues()">
                                                        <label for="type-gas" class="custom-control-label">Gas</label>
                                                    </div>
                                                    <div class="custom-control custom-radio flex-fill">
                                                        <input type="radio" id="type-electricity" name="lead_type" class="custom-control-input" value="4" disabled onclick="newLeadTypeValues()">
                                                        <label for="type-electricity" class="custom-control-label">Electricity</label>
                                                    </div>
                                                    <div class="custom-control custom-radio flex-fill">
                                                        <input type="radio" id="type-water" name="lead_type" class="custom-control-input" value="5" disabled onclick="newLeadTypeValues()">
                                                        <label for="type-water" class="custom-control-label">Water</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <div class="form-group row flex-fill">
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="current-supplier">Supplier</label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <div class="col-12 p-0">
                                                        <select class="select2 form-control" name="current_supplier" id="current-supplier" disabled></select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="current-contract-ends">Contract End Date</label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center w-100">
                                                    <div class="col-12 p-0">
                                                        <select class="select2 form-control" name="current_contract_ends" id="current-contract-ends" disabled>
                                                            <option value=""></option>
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <div class="form-group row flex-fill">
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="business-name">Business Name</label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <input type="text" id="business-name" class="form-control" name="business_name" placeholder="..." disabled/>
                                                </div>
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="post-code">Post Code</label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <input type="text" id="post-code" class="form-control" name="post_code" placeholder="..." disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <div class="form-group row flex-fill">
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="contact-name">Contact Name</label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <input type="text" id="contact-name" class="form-control" name="contact_name" placeholder="..." disabled/>
                                                </div>
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="phone-number">Phone Number</label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <input type="number" id="phone-number" class="form-control" name="phone_number" placeholder="..." disabled/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <div class="form-group row flex-fill">
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label" for="email-address">Email</label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <input type="email" id="email-address" class="form-control" name="email_address" placeholder="..." disabled/>
                                                </div>
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label">Status : </label>
                                                    <label class="col-form-label ml-auto fw-bolder" id="status"></label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <button type="button" class="btn btn-primary btn-allocate-lead" hidden>Allocate</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <div class="form-group row flex-fill justify-content-end">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-2 d-flex align-items-center">
                                                    <label class="col-form-label re-allocate-label" hidden>Allocated to : </label>
                                                    <label class="col-form-label ml-auto fw-bolder re-allocate-label" id="allocated-to" hidden></label>
                                                </div>
                                                <div class="col-sm-4 d-flex align-items-center">
                                                    <button type="button" class="btn btn-primary btn-reallocate-lead" hidden>Reallocate</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <h4 class="text-decoration-underline">
                                                Notes
                                            </h4>
                                        </div>
                                        <div class="col-12">
                                            <textarea class="form-control" id="notes" name="notes" placeholder="Add Note..." disabled></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" role="tabpanel" id="audit-log">
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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/lead-record.js"></script>

<!-- Modals -->
<?php include_once('assets/modals/allocate-lead-modal.php'); ?>