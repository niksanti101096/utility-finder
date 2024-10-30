<div class="modal fade text-left" id="third-party-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="third-party-title-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="third-party-title-modal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Add Third Party Form -->
            <form id="third-party-form" hidden>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row d-flex align-items-center">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="third-party-name" id="third-party-name-label">Partner Name</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="third-party-name" class="form-control" name="partner_name" placeholder="Name..." required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row d-flex align-items-center">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="third-party-email" id="third-party-email-label">Partner Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email" id="third-party-email" class="form-control" name="email" placeholder="Email..." required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-third-party">Add</button>
                    <!-- <button type="button" class="btn btn-info" id="btn-edit-third-party" hidden>Edit</button>
                    <button type="button" class="btn btn-info" id="btn-update-third-party" hidden>Update</button> -->
                    <button class="btn " type="button" id="btn-disabled-tp" disabled hidden>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="ml-25 align-middle">Loading...</span>
                    </button>
                </div>
            </form>
            <!-- Add Third Party Email Form -->
            <form id="third-party-email-form" hidden>
                <input type="hidden" name="partner_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row d-flex align-items-center">
                                <div class="col-sm-4">
                                    <label class="col-form-label" for="third-party-add-email" id="third-party-add-email-label">Email Address</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" id="third-party-add-email" class="form-control" name="email" placeholder="Email..." required/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-third-party-email">Add</button>
                    <button class="btn btn-primary" type="button" id="btn-disabled-tp-email" disabled hidden>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="ml-25 align-middle">Loading...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>