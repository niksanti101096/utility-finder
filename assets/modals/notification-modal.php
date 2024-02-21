<div class="modal fade text-left" id="notifcation-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Notification</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="notifications-row">
                    <div class="col-sm-8">
                        <label class="col-form-label">Still work in progress</label>
                    </div>
                    <div class="col-sm-4">
                        <button class="btn btn-secondary btn-sm">Clear</button>
                        <button class="btn btn-success btn-sm">View</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="btn-clear-all">Clear All</button>
                <button class="btn btn-primary" type="button" id="btn-clear-all-disabled" disabled hidden>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="ml-25 align-middle">Loading...</span>
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>