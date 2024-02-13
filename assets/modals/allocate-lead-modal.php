<div class="modal fade text-left" id="allocate-lead-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form form-horizontal">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <label class="col-form-label allocated-lead-label" for="allocate-lead" hidden>Currently Allocated to: <span class="font-weight-bolder"></span> </label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-7">
                                    <label class="col-form-label allocated-lead-label" for="allocate-lead" hidden>Select New Partner to Allocate to:</label>
                                    <label class="col-form-label unallocated-lead-label" for="allocate-lead" hidden>Select Partner to Allocate lead to:</label>
                                </div>
                                <div class="col-sm-5">
                                    <select class="select2 form-control" name="allocate_lead" id="allocate-lead">
                                        <!-- <option value=""></option>
                                        <option value="1">Partner 1</option>
                                        <option value="2">Partner 2</option>
                                        <option value="3">Partner 3</option>
                                        <option value="4">Partner 4</option> -->
                                        <!-- e dynamic ni -->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-success">Allocate</button>
            </div>
        </div>
    </div>
</div>