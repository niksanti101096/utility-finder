<div class="modal fade text-left" id="supplier-modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="supplier-title-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="supplier-title-modal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="supplier-form">
                <input type="hidden" name="supplier_type" id="supplier-type">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row d-flex align-items-center">
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="supplier-name" id="supplier-name-label"></label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="supplier-name" class="form-control" name="supplier_name" placeholder="..." required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row d-flex" >
                                <div class="col-sm-3">
                                    <label class="col-form-label" for="supplier-logo" id="supplier-logo-label"></label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file mb-1">
                                        <input type="file" id="supplier-logo" class="custom-file-input" name="supplier_name" accept="image/*" required/>
                                        <label class="custom-file-label" for="supplier-logo">Choose logo</label>
                                    </div>
                                    <img src="" alt="" id="supplier-img" width="250px" hidden>
                                    <button type="button" class="btn btn-outline-info btn-sm" id="btn-edit-logo" hidden disabled>Change logo</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-add-supplier">Add</button>
                    <button type="button" class="btn btn-info" id="btn-edit-supplier" hidden>Edit</button>
                    <button type="button" class="btn btn-info" id="btn-update-supplier" hidden>Update</button>
                    <button class="btn btn-primary" type="button" id="btn-disabled" disabled hidden>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        <span class="ml-25 align-middle">Loading...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>