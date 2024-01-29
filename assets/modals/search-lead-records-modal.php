<div class="modal fade text-left" id="search-lead-records-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Search</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="search-lead-records-form">
                <div class="modal-body">
                    <div class="form form-horizontal">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="search-lead-id-number">Lead ID Number</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="search-lead-id-number" class="form-control" name="search_lead_id_number" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="search-business-name">Business Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="search-business-name" class="form-control" name="search_business_name" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="search-post-code">Post Code</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="search-post-code" class="form-control" name="search_post_code" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="search-contact-name">Contact Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="search-contact-name" class="form-control" name="search_contact_name" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="search-phone-number">Phone Number</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="search-phone-number" class="form-control" name="search_phone_number" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 col-form-label">
                                        <label for="search-email">Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" id="search-email" class="form-control" name="search_email" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>