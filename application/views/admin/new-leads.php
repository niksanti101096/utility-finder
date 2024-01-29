<!-- BEGIN: Content-->
<style>
    .new-leads-gap{
        gap: 1.5rem !important;
    }
</style>

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            <h1>New Leads</h1>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Date Filters</h4>
                    </div>
                    <div class="card-body">
                        <form id="new-leads-form">
                            <div class="row">
                                <div class="col-12 form-group d-flex align-items-center new-leads-gap">
                                    
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="new-leads-all" name="new-leads" class="custom-control-input" value="4" checked>
                                        <label for="new-leads-all" class="custom-control-label">All</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="new-leads-today" name="new-leads" class="custom-control-input" value="2">
                                        <label for="new-leads-today" class="custom-control-label">Today</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="new-leads-range-date" name="new-leads" class="custom-control-input" value="3">
                                        <label for="new-leads-range-date" class="custom-control-label">From</label>
                                    </div>
                                    <div>
                                        <input type="date" class="form-control" id="new-leads-from" name="new_leads_list_from" disabled>
                                    </div>
                                    <div>
                                        <p class="col-form-label">to</p>
                                    </div>
                                    <div>
                                        <input type="date" class="form-control" id="new-leads-to" name="new_leads_list_to" disabled>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-primary" type="button" id="new-leads-btn-submit" style="display:none;">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row"><div class="col-md-12"><hr></div></div>
                        <form id="new-leads-list-form">
                            <h4>Fields to Display</h4>
                            <div class="row">
                                <div class="form-group col-12">
                                    <select class="form_control select2" name="new_leads_filter_display[]" id="new-leads-filter-display" multiple="true" onchange="loadLeads()">
                                        <option value="1">Lead ID</option>
                                        <option value="2">Business Name</option>
                                        <option value="3">Phone</option>
                                        <option value="4">Email</option>
                                        <option value="5">Date</option>
                                        <option value="6">Source</option>
                                        <option value="7">Status</option>
                                        <option value="8">Action</option>
                                    </select>
                                </div>
                            </div>
                        </form>
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
                                                            <th>Date</th>
                                                            <th>Source</th>
                                                            <th>Status</th>
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
                    <div class="card-footer">
                        <button class="btn btn-primary">Bulk Allocate</button>
                        <button class="btn btn-warning">Bulk Import</button>
                        <button class="btn btn-danger">Bulk Archive</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/new-leads.js"></script>
<!-- END: Content-->