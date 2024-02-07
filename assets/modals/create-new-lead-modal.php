<style>
    .text-decoration-underline {
        text-decoration: underline !important;
    }
</style>

<div class="modal fade text-left" id="create-new-lead-modal" tabindex="-1" role="dialog" aria-labelledby="create-new-lead-title" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="create-new-lead-title">Create New Lead</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create-new-lead-form">
                <div class="modal-body">
                    <div class="form form-horizontal">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-decoration-underline">
                                    Details
                                </h4>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label" for="new-lead-id">Lead ID</label>
                                    </div>
                                    <div class="col-sm-10 d-flex align-items-center">
                                        <input type="text" id="new-lead-id" class="form-control" name="new_lead_id" placeholder="System Generated" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label"  for="new-lead-date-created">Date Created</label>
                                    </div>
                                    <div class="col-sm-10 d-flex align-items-center">
                                        <input type="date" id="new-lead-date-created" class="form-control" name="new_lead_date_created" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label"  for="new-lead-source">Source</label>
                                    </div>
                                    <div class="col-sm-10 d-flex align-items-center">
                                        <input type="text" id="new-lead-source" class="form-control" name="new_lead_source" placeholder="..." />
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
                                        <label class="col-form-label" for="new-lead-type-electricity-gas">Lead Type</label>
                                    </div>
                                    <div class="col-sm-10 d-flex flex-wrap align-items-center justify-content-start">
                                        <div class="custom-control custom-radio flex-fill">
                                            <input type="radio" id="new-lead-type-electricity-gas" name="new_lead_type" class="custom-control-input" value="2" onclick="newLeadTypeClick()">
                                            <label for="new-lead-type-electricity-gas" class="custom-control-label">Electricity & Gas</label>
                                        </div>
                                        <div class="custom-control custom-radio flex-fill">
                                            <input type="radio" id="new-lead-type-gas" name="new_lead_type" class="custom-control-input" value="3" onclick="newLeadTypeClick()">
                                            <label for="new-lead-type-gas" class="custom-control-label">Gas</label>
                                        </div>
                                        <div class="custom-control custom-radio flex-fill">
                                            <input type="radio" id="new-lead-type-electricity" name="new_lead_type" class="custom-control-input" value="4" onclick="newLeadTypeClick()">
                                            <label for="new-lead-type-electricity" class="custom-control-label">Electricity</label>
                                        </div>
                                        <div class="custom-control custom-radio flex-fill">
                                            <input type="radio" id="new-lead-type-water" name="new_lead_type" class="custom-control-input" value="5" onclick="newLeadTypeClick()">
                                            <label for="new-lead-type-water" class="custom-control-label">Water</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <div class="form-group row flex-fill">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label" for="new-lead-supplier">Supplier</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-center">
                                        <div class="col-12 p-0">
                                            <select class="select2 form-control" name="new_lead_supplier" id="new-lead-supplier"></select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label" for="new-lead-contract-end-date">Contract End Date</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-center w-100">
                                        <div class="col-12 p-0">
                                            <select class="select2 form-control" name="new_lead_contract_end_date" id="new-lead-contract-end-date">
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
                                        <label class="col-form-label" for="new-lead-business-name">Business Name</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-center">
                                        <input type="text" id="new-lead-business-name" class="form-control" name="new_lead_business_name" placeholder="..." />
                                    </div>
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label" for="new-lead-post-code">Post Code</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-center">
                                        <input type="text" id="new-lead-post-code" class="form-control" name="new_lead_post_code" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <div class="form-group row flex-fill">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label" for="new-lead-contact-name">Contact Name</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-center">
                                        <input type="text" id="new-lead-contact-name" class="form-control" name="new_lead_contact_name" placeholder="..." />
                                    </div>
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label" for="new-lead-phone-number">Phone Number</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-center">
                                        <input type="number" id="new-lead-phone-number" class="form-control" name="new_lead_phone_number" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <div class="form-group row flex-fill">
                                    <div class="col-sm-2 d-flex align-items-center">
                                        <label class="col-form-label" for="new-lead-email">Email</label>
                                    </div>
                                    <div class="col-sm-4 d-flex align-items-center">
                                        <input type="email" id="new-lead-email" class="form-control" name="new_lead_email" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4 class="text-decoration-underline">
                                    Notes
                                </h4>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" id="new-lead-notes" name="new_lead_notes" placeholder="Add Note..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>