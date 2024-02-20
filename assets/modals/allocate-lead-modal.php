<div class="modal fade text-left" id="allocate-lead-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title allocate-title-modal" id="myModalLabel1"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="lead_sequence" id="lead-sequence">
                    <input type="hidden" name="lead_status" id="lead-status">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-7">
                                <label class="col-form-label allocated-lead-label" for="allocate-lead" hidden>Currently Allocated to: <span class="font-weight-bolder"></span> </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-7">
                                <label class="col-form-label allocated-lead-label" for="allocate-lead" hidden>Select New Partner to Allocate to:</label>
                                <label class="col-form-label unallocated-lead-label" for="allocate-lead" hidden>Select Partner to Allocate lead to:</label>
                            </div>
                            <div class="col-sm-5">
                                <select class="select2 form-control" name="allocate_lead" id="allocate-lead">
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success" id="btn-allocate" hidden>Allocate</button>
                <button type="button" class="btn btn-success" id="btn-reallocate" hidden>Reallocate</button>
                <button class="btn btn-success" type="button" id="btn-allocate-disabled" disabled hidden>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="ml-25 align-middle">Loading...</span>
                </button>
            </div>
        </div>
    </div>
</div>