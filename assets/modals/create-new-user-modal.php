<style>
    .avatar-wrapper{
        position: relative;
        height: 10rem;
        width: 10rem;
        margin: 2rem auto;
        border-radius: 50%;
        overflow: hidden;
        box-shadow: 1px 1px 15px -5px black;
        transition: all .3s ease;
        &:hover{
            transform: scale(1.05);
            cursor: pointer;
        }
        &:hover .profile-pic{
            opacity: .5;
        }
        .profile-pic {
            height: 100%;
            width: 100%;
            transition: all .3s ease;
            &:after{
                font-family: FontAwesome;
                content: "\f007";
                top: 0; left: 0;
                width: 100%;
                height: 100%;
                position: absolute;
                font-size: 8rem;
                background: #ecf0f1;
                color: #34495e;
                text-align: center;
            }
        }
        .upload-button {
            position: absolute;
            top: 0; left: 0;
            height: 100%;
            width: 100%;
            .fa-arrow-circle-up{
                position: absolute;
                font-size: 12rem;
                top: -14px;
                left: -2px;
                text-align: center;
                opacity: 0;
                transition: all .3s ease;
                color: #34495e;
            }
            &:hover .fa-arrow-circle-up{
                opacity: .9;
            }
        }
    }
</style>

<div class="modal fade text-left" id="create-new-user-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Create New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create-new-user-form">
                <div class="modal-body">
                    <div class="form form-horizontal">
                        <div class="row pt-0">
                            <div class="col-12">
                                <div class="form-group avatar-wrapper">
                                    <img class="profile-pic" id="profile-pic" src="" />
                                    <div class="upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    <input class="file-upload" type="file" accept="image/*" name="new_user_pic" id="new-user-pic"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-salutation">Salutation</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <div class="col-12 p-0">
                                            <select class="select2 form-control form-control-lg col-12" id="new-user-salutation" name="new_user_salutation">
                                                <option value=""></option>
                                                <option value="Mr">Mr</option>
                                                <option value="Ms">Ms</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Doctor">Doctor</option>
                                                <option value="Prof">Prof</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-firstname">Firstname</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <input type="text" id="new-user-firstname" class="form-control" name="new_user_firstname" placeholder="John"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-lastname">Lastname</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <input type="text" id="new-user-lastname" class="form-control" name="new_user_lastname" placeholder="Doe"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-department">Department</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <div class="col-12 p-0">
                                            <select class="select2 form-control form-control-lg col-12" id="new-user-department" name="new_user_department">
                                                <option value=""></option>
                                                <option value="Management">Management</option>
                                                <option value="Staff">Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-email">Email</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <input type="email" id="new-user-email" class="form-control" name="new_user_email" placeholder="email@mail.com"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-phone">Phone</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <input type="number" id="new-user-phone" class="form-control" name="new_user_phone" placeholder="..."/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-extention">Extention</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <input type="text" id="new-user-extention" class="form-control" name="new_user_extention" placeholder="Jr"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-type">User Type</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <div class="col-12 p-0">
                                            <select class="select2 form-control form-control-lg col-12" id="new-user-type" name="new_user_type">
                                                <option value=""></option>
                                                <option value="1">Admin</option>
                                                <option value="2">Standard</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-username">Username</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <input type="text" id="new-user-username" class="form-control" name="new_user_username" placeholder="..."/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-password">Password</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control" id="new-user-password" placeholder="..." name="new_user_password" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <label class="col-form-label" for="new-user-repassword">Confirm Password</label>
                                    </div>
                                    <div class="col-sm-9 d-flex align-items-center">
                                        <div class="input-group input-group-merge form-password-toggle">
                                            <input type="password" class="form-control" id="new-user-repassword" placeholder="..." name="new_user_repassword" />
                                            <div class="input-group-append">
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END: Content-->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/admin/create-new-user.js"></script>