<div class="modal fade text-left" id="search-lead-records-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="search-title-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="search-title-modal">Search Lead</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="search-lead-records-form">
                <div class="modal-body">
                    <div class="form form-horizontal">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row d-flex align-items-center">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="lead-id">Lead ID</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="lead-id" class="form-control" name="lead_id" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row d-flex align-items-center">
                                    <div class="col-sm-3 col-form-label">
                                        <label class="col-form-label" for="business-name">Business Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="business-name" class="form-control" name="business_name" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row d-flex align-items-center">
                                    <div class="col-sm-3 col-form-label">
                                        <label class="col-form-label" for="post-code">Post Code</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="post-code" class="form-control" name="post_code" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row d-flex align-items-center">
                                    <div class="col-sm-3 col-form-label">
                                        <label class="col-form-label" for="contact-name">Contact Name</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="contact-name" class="form-control" name="contact_name" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row d-flex align-items-center">
                                    <div class="col-sm-3 col-form-label">
                                        <label class="col-form-label" for="phone-number">Phone Number</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="number" id="phone-number" class="form-control" name="phone_number" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row d-flex align-items-center">
                                    <div class="col-sm-3 col-form-label">
                                        <label class="col-form-label" for="email-address">Email</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" id="email-address" class="form-control" name="email_address" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-search">Search</button>
                    <button class="btn btn-primary" type="button" id="btn-search-disabled" disabled hidden>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="ml-25 align-middle">Loading...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>