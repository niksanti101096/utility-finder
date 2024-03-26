<!-- BEGIN: Content-->
<style>
    .buttons-csv{
        padding: 0.5rem 1.5rem !important;
        border: none !important;
        border-radius: 0.5rem !important;
        font-weight: 500 !important;
        background: var(--primary);
        color: white;
    }
</style>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <div>
                <h1>Todays Metrics</h1>
            </div>

            <div class="row">
                <div class="col-xl-6 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Hits and Allocations</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" id="hits-allocation-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="hits-allocation-today" name="hits-allocation" class="custom-control-input" value="2" checked>
                                                    <label for="hits-allocation-today" class="custom-control-label">Today</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex align-items-center">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="hits-allocation-range-date" name="hits-allocation" class="custom-control-input" value="3">
                                                    <label for="hits-allocation-range-date" class="custom-control-label">From</label>
                                                </div>
                                                <div class="mx-1">
                                                    <input type="date" class="form-control" id="hits-allocation-from" name="hits_allocation_from" disabled>
                                                </div>
                                                <div>
                                                    <p class="col-form-label">to</p>
                                                </div>
                                                <div class="mx-1">
                                                    <input type="date" class="form-control" id="hits-allocation-to" name="hits_allocation_to" disabled>
                                                </div>
                                                <div>
                                                    <button class="btn btn-sm btn-primary" type="button" id="hits-allocation-btn-submit" style="display:none;" onclick="metricHits()">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row"><div class="col-md-12"><hr></div></div>
                            <div class="row" id="hits-allocation-table">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Hits</th>
                                                        <th>Not Yet Allocated</th>
                                                        <th>Allocated</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="metrics-hits"></td>
                                                        <td id="metrics-not-allocated"></td>
                                                        <td id="metrics-allocated"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 d-flex align-items-stretch">
                    <div class="card w-100">
                        <div class="card-header">
                            <h4>Leads by Lead Source</h4>
                        </div>

                        <div class="card-body">
                            <form class="form" id="leads-lead-source-form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="leads-lead-source-today" name="leads_lead_source" class="custom-control-input" value="2" checked>
                                                    <label for="leads-lead-source-today" class="custom-control-label">Today</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group row">
                                            <div class="col-12 d-flex align-items-center">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="leads-lead-source-range-date" name="leads_lead_source" class="custom-control-input" value="3">
                                                    <label for="leads-lead-source-range-date" class="custom-control-label">From</label>
                                                </div>
                                                <div class="mx-1">
                                                    <input type="date" class="form-control" id="leads-lead-source-from" name="leads_lead_source_from" disabled>
                                                </div>
                                                <div>
                                                    <p class="col-form-label">to</p>
                                                </div>
                                                <div class="mx-1">
                                                    <input type="date" class="form-control" id="leads-lead-source-to" name="leads_lead_source_to" disabled>
                                                </div>
                                                <div>
                                                    <button class="btn btn-sm btn-primary" type="button" id="leads-lead-source-btn-submit" style="display:none;" onclick="leadsByLeadSource()">Filter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row"><div class="col-md-12"><hr></div></div>
                            <div class="row">
                                <canvas id="bar-chart-leads-lead-source" class="chartjs"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <section id="basic-table">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="table" id="list-leads-table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Business Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Contract End</th>
                                                <!-- <th>Lead Type</th> -->
                                                <th>Lead Source</th>
                                                <th>Status</th>
                                                <th>Allocated to</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/dashboard.js"></script>
<!-- END: Content-->

<!-- Modals -->
<?php include_once('assets/modals/allocate-lead-modal.php'); ?>