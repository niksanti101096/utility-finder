var userRecords;
var userTable;
var userUpdatedData;
var avatar;
var userId;
var supplierName;
var supplierType;
var supplierLogo;
var supplierId;
var supplierTdTable;
var supplierRecords;
var imgLoc = url + 'assets/images/logos/';
var oldSupplierName;
var oldSupplierLogo;
var oldAvatar;

$(document).ready(function() {

    loadUserRecords();

    $('#check-all-user').click(function(e){
        var table= $(e.target).closest('table');
        $('td input:checkbox',table).prop('checked',this.checked);
    });

    $('[data-dismiss=modal]').click(function() {
        validator.resetForm();
    });

    var validator = $("form[name='user_form']").validate({ 
        rules: {
            salutation: {
                required: true,
            },
            firstname: {
                required: true,
            },
            lastname: {
                required: true,
            },
            department: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },
            phone: {
                required: true,
            },
            user_type: {
                required: true,
            },
            username: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8
            },
            re_password: {
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "Please enter your new password!",
                minlength: "Your password must be at least 8 characters long"
            }
        },
        submitHandler: function(form) {
            createUser();
        }
    });
    
    $('#setting-navigation ul.nav > li > a#nav-system-setting').click(function() {
        $('#add-user-btn').attr('hidden', 'hidden');
        $('#system-setting-list').removeAttr('hidden');
        $('#utility-supplier-list').attr('hidden', 'hidden');
        $('#energy-supplier-records-table tbody').children('tr').remove();
        $('#water-supplier-records-table tbody').children('tr').remove();
        $('#add-energy-btn').attr('hidden', true);
        $('#add-water-btn').attr('hidden', true);
        $('#add-lead-source-btn').attr('hidden', true);

        $('#breadcrumb-dashboard').siblings().remove();
        $('.breadcrumb').append(
            '<li class="breadcrumb-item">'+
                'System Settings'+
            '</li>'
        );
    });

    $('#setting-navigation ul.nav > li > a#nav-user-setting').click(function() {
        $('#add-user-btn').removeAttr('hidden');
        $('#add-energy-btn').attr('hidden', true);
        $('#add-water-btn').attr('hidden', true);
        $('#add-lead-source-btn').attr('hidden', true);

        $('#breadcrumb-dashboard').siblings().remove();
        $('.breadcrumb').append(
            '<li class="breadcrumb-item">'+
                'User Settings'+
            '</li>'
        );
    });

    $('#link-energy-supplier').click(function() {
        $('#system-setting-list').attr('hidden', 'hidden');
        $('#utility-supplier-list').removeAttr('hidden');
        $('#energy-supplier-list').removeAttr('hidden');
        $('#water-supplier-list').attr('hidden',true);
        $('#lead-source-list').attr('hidden',true);
        $('#add-energy-btn').attr('hidden', false);
        $('#add-water-btn').attr('hidden', true);
        $('#add-lead-source-btn').attr('hidden', true);
        $('#supplier-type').val(1);
        $('.breadcrumb').append(
            '<li class="breadcrumb-item active">'+
                'Energy Supplier List'+
            '</li>'
        );
        loadEnergySupplierRecords();
    });

    $('#link-water-supplier').click(function() {
        $('#system-setting-list').attr('hidden', 'hidden');
        $('#utility-supplier-list').removeAttr('hidden');
        $('#water-supplier-list').removeAttr('hidden');
        $('#energy-supplier-list').attr('hidden',true);
        $('#lead-source-list').attr('hidden',true);
        $('#add-water-btn').attr('hidden', false);
        $('#add-energy-btn').attr('hidden', true);
        $('#add-lead-source-btn').attr('hidden', true);
        $('#supplier-type').val(2);
        $('.breadcrumb').append(
            '<li class="breadcrumb-item active">'+
                'Water Supplier List'+
            '</li>'
        );
        loadWaterSupplierRecords();
    });

    $('#link-lead-source').click(function() {
        $('#system-setting-list').attr('hidden', 'hidden');
        $('#utility-supplier-list').removeAttr('hidden');
        $('#lead-source-list').removeAttr('hidden');
        $('#energy-supplier-list').attr('hidden',true);
        $('#water-supplier-list').attr('hidden',true);
        $('#add-water-btn').attr('hidden', true);
        $('#add-energy-btn').attr('hidden', true);
        $('#add-lead-source-btn').attr('hidden', false);
        $('.breadcrumb').append(
            '<li class="breadcrumb-item active">'+
                'Lead Sources'+
            '</li>'
        );
    });
    
    $('#add-user-btn').click(function() {
        $('#user-modal').modal('show');
        document.getElementById('user-form').reset();
        $('img#profile-pic').attr('src', '');
        $(':input','#user-form')
            .not(':button, :submit, :reset, :hidden')
            .val('');
        $('#new-user-salutation').val(null).trigger('change');
        $("[name=salutation]").val("").change();
        $("[name=user_type]").val("").change();
        $("[name=department]").val("").change();
        $('#user-modal input, #user-modal select').removeAttr('disabled');
        $('[name=user_id]').removeAttr('value');
        $('#div-password, #div-repassword, .custom-file').attr('hidden', false);
        $('#change-avatar').attr('hidden', true);
        $('.custom-file-label').html("Upload avatar");
        $("#img-avatar").attr("src", false);
    });

    $('#avatar').change(function(e) {
        var imgURL = URL.createObjectURL(e.target.files[0]);
        $("#img-avatar").attr("src", imgURL);
    });

    $('#user-btn-edit').click(function() {
        $('#user-btn-update').attr('hidden', false);
        $('#user-btn-edit').attr('hidden', true);
        $('#user-modal input, #user-modal select, #btn-change-avatar').removeAttr('disabled');

    });

    $('#user-btn-update').click(function() {
        userUpdatedData = $("#user-form").serialize();
        updateUserAvatar(userUpdatedData);
    });

    $('#add-energy-btn').click(function() {
        $('#supplier-modal').modal('show');
        $('h4#supplier-title-modal').html('Add Energy Supplier');
        $('#supplier-name-label').html('Energy Supplier Name');
        $('#supplier-logo-label').html('Energy Supplier Logo');
        $('.custom-file-label').html('Choose logo');
        $('#supplier-name').val('');
        $('#supplier-logo').val('');
        $('#btn-edit-supplier').attr('hidden', true);
        $('#btn-update-supplier, #supplier-img, #btn-edit-logo').attr('hidden', true);
        $('#btn-add-supplier').attr('hidden', false);
        $('#supplier-modal input').attr('disabled', false);
    });

    $('#add-water-btn').click(function() {
        $('#supplier-modal').modal('show');
        $('h4#supplier-title-modal').html('Add Water Supplier');
        $('#supplier-name-label').html('Water Supplier Name');
        $('#supplier-logo-label').html('Water Supplier Logo');
        $('.custom-file-label').html('Choose logo');
        $('#supplier-name').val('');
        $('#supplier-logo').val('');
        $('#btn-edit-supplier').attr('hidden', true);
        $('#btn-update-supplier, #supplier-img, #btn-edit-logo').attr('hidden', true);
        $('#btn-add-supplier, .custom-file').attr('hidden', false);
        $('#supplier-modal input').attr('disabled', false);
    });

    $('#supplier-form').submit(function(e) {
        e.preventDefault();
        supplierName = $('#supplier-name').val();
        supplierLogo = $('#supplier-logo')[0].files[0];
        supplierType = $('#supplier-type').val();
        $("#supplier-img").attr("hidden", true);
        createSupplier();
    });

    $('#btn-edit-supplier').click(function() {
        $('#btn-edit-supplier').attr('hidden', true);
        $('#btn-update-supplier').attr('hidden', false);
        $('#supplier-modal input, #btn-edit-logo').attr('disabled', false);
        $('#supplier-logo').attr('required', false);
        oldSupplierName = $('#supplier-name').val();
        oldSupplierLogo = $('#supplier-img').attr('src').split('/')[6];
    });

    $('#btn-update-supplier').click(function() {
        supplierName = $('#supplier-name').val();
        supplierLogo = $('#supplier-logo')[0].files[0];
        supplierType = $('#supplier-type').val();
        updateSupplier();
    });

    $('#btn-edit-logo').click(function() {
        $('.custom-file').attr('hidden', false);
    });

    $('#supplier-logo').change(function(e) {
        var imgURL = URL.createObjectURL(e.target.files[0]);
        $("#supplier-img").attr("src", imgURL);
        $("#supplier-img").attr("hidden", false);
    });

    $('#btn-change-avatar').click(function () {
        $('.custom-file').attr('hidden', false);
        $('#change-avatar').attr('hidden', true);
    });

});

function loadUserRecords() {
    userRecords = [];
                
    $.ajax({
        type: "GET",
        url: url + "admin/load-users-record",
        dataType: "JSON",
        data: {},
        success: function(response){
            if (response.data.length > 0) {
                response.data.forEach(data => {
                    userRecords.push(data);
                });

                $("#user-records-table").DataTable().destroy();
                userTable = $("#user-records-table").DataTable({
                    dom: '<"card-header border-bottom p-1"<"head-label"<"datatable-user-title">>><"card-body"<"d-flex justify-content-between align-items-center mx-0 row">t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>>',
                    responsive: true,
                    initComplete : function( settings, json ) {
                        $('.datatable-user-title').html('User Records');
                        $('.datatable-user-title').addClass('h4');
                        $('.datatable-user-title').css('color','inherit');
                    },
                    data: userRecords,
                    columns: [
                        // {
                        //     data: null,
                        //     render: function (data, type, row) {
                        //         return (
                        //             '<div class="custom-control custom-checkbox">' +
                        //                 '<input class="custom-control-input" type="checkbox" value="" id="check-all-user-'+row.user_id+'">' +
                        //                 '<label for="check-all-user-'+row.user_id+'" class="custom-control-label"></label>' +
                        //             '</div>'
                        //         )
                        //     }
                        // },
                        {data: "user_id"},
                        {data: "username"},
                        {
                            data: null,
                            render: function(data, type, row) {
                                if(row.user_type == 1) return "ADMIN";
                                else return "STANDARD";
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                if(row.status == 1) return "Active";
                                else return "Disabled";
                            }
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return (
                                    '<button type="button" class="btn btn-success btn-sm mr-1" onclick="openUserProfileModal(\''+encodeURIComponent(JSON.stringify(data))+'\')">View</button>' +
                                    '<button type="button" class="btn btn-danger btn-sm" onclick="deleteUser('+row.user_id+')">Archive</button>'
                                )
                            }
                        },
                    ],
                    select: true,
                    displayLength: 50,
                    lengthMenu: [50, 75, 100],
                });
            } else {
                
            }
        }
    });
};

function openUserProfileModal(encryptedData) {
    $('#user-modal').modal('show');
    $('#user-modal input, #user-modal select').attr('disabled', true);
    document.getElementById('user-form').reset();
    var data = JSON.parse(decodeURIComponent(encryptedData));
    var form = "#user-form";
    for (var key in data) {
        
        if (key == "avatar") {
            if (data[key] != null) {
                $('#img-avatar').attr('src', url + "assets/images/avatars/" + data[key]);
                oldAvatar = data[key];
            } else {
                $('#img-avatar').attr('src', false);
                oldAvatar = ""; 
            }
        } else {
            var type = $(form + " [name=" + key + "]").attr("type");

            if (type === "radio") {
                $(form + " [name=" + key + "][value='" + data[key]).prop("checked", true);
            } else if (type === "checkbox") {
                var checked = data[key] === "Y" ? true : false;
                $(form + " [name=" + key + "]").attr("checked", checked);
            } else {
                if($(form + " [name="+key+"]").hasClass('select2')){
                    $(form + " [name="+key+"]").val(data[key]).change();
                } else $(form + " [name=" + key + "]").val(data[key]);
            }
        }
	}
    $('#user-btn-edit, #change-avatar').attr('hidden', false);
    $('#user-btn-add, #user-btn-update, #div-password, #div-repassword, .custom-file').attr('hidden', true);
    $('#btn-change-avatar').attr('disabled', true);
    $('#user-modal h4').html('User Record ID ' + data.user_id);
    userId = data['user_id'];
};

function createUser() {
    $.blockUI({
        message:
            '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Creating new user...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
        css: {
            backgroundColor: 'transparent',
            color: '#fff',
            border: '0'
        },
        overlayCSS: {
            opacity: 0.8
        }
    });

    avatar = $('#avatar')[0].files[0];
    var fd = new FormData();
    fd.append('avatar', avatar);

    $.ajax({
        type: "POST",
        url: url + "admin/store-avatar",
        processData: false,
        contentType: false,
        cache: false,
        enctype: 'multipart/form-data',
        data: fd,
        success: function (response) {
            if (response.success) {
                avatar = response.data;
                $.ajax({
                    type: "POST",
                    url: url + "authentication/create-new-user", 
                    dataType: "JSON",
                    data: $("#user-form").serialize() + "&avatar=" + avatar,
                    success: function (response) {
                        if(response.success){
                            setTimeout(() => {
                                Swal.fire('Success!', 'Successfully created new user.', 'success').then(function () {
                                    location.href = url_extended + 'settings';
                                    $.unblockUI();
                                    $("#user-modal").modal("hide");
                                });
                            }, 2000);
                        }else{
                            Swal.fire('Oops!', 'Something went wrong.', 'warning');
                            $.unblockUI();
                        }
                    }
                });
            }
        }
    });


}

function updateUserAvatar(data) {
    $.blockUI({
        message:
            '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Updating user...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
        css: {
            backgroundColor: 'transparent',
            color: '#fff',
            border: '0'
        },
        overlayCSS: {
            opacity: 0.8
        }
    });

    avatar = $('#avatar')[0].files[0];

    if (avatar != undefined) { // To check if there is a avatar selected
        if (avatar['name'] != oldAvatar) { // To check if the avatar is the same as the current avatar
            var fd = new FormData();
            fd.append('avatar', avatar);
            fd.append('user_id', userId);
            fd.append('imgLocation', "assets/images/avatars/" + oldAvatar);

            $.ajax({
                type: "POST",
                url: url + "admin/update-user-avatar",
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                data: fd,
                success: function (response) {
                    if (response.success) {
                        data = data + "&avatar=" + response.data;
                        updateUserInfo(data);
                    }
                }
            })
        }
    }
};

function updateUserInfo(data) {
    $.ajax({
        type: "POST",
        url: url + "authentication/update-user", 
        dataType: "JSON",
        data: data,
        success: function (response) {
            if(response.success){
                setTimeout(() => {
                    Swal.fire('Success!', 'Successfully updated user '+ response.data['email'] +'.', 'success').then(function () {
                        location.href = url_extended + 'settings';
                        $.unblockUI();
                        $("#user-modal").modal("hide");
                    });
                }, 2000);
            }else{
                Swal.fire('Oops!', 'Something went wrong.', 'warning');
                $.unblockUI();
            }
        },
        error: function () {},
    });
}

function deleteUser(id) {
    Swal.fire({
		title: "Are you sure?",
		text: "You want to archive this user?",
		icon: "warning",
		showCancelButton: true,
		confirmButtonText: "Yes, Proceed",
		customClass: {
			confirmButton: "btn btn-primary",
			cancelButton: "btn btn-outline-danger ml-1",
		},
		buttonsStyling: false,
	}).then(function (result) {
		if (result.value) {
            $.ajax({
                type: "DELETE",
                url: url + "authentication/user-archive",
                dataType: "JSON",
                data: { id: id },
                success: function (data) {
                    if(data.success){
                        Swal.fire(
                            'Success!',
                            data.message,
                            'success'
                        ).then(function(){
                            loadUserRecords();
                        });
                    }
                },
                error: function () {}
            });
        }
    })
}

function createSupplier() {
    if ($('#btn-disabled').hasClass('btn-info')) {
        $('#btn-disabled').removeClass('btn-info');
    }
    $('#btn-disabled').addClass('hidden', false);
    $('#btn-add-supplier').attr('hidden', true);
    $('#btn-disabled').attr('hidden', false);

    var fd = new FormData();

    fd.append("name", supplierName);
    fd.append("logo", supplierLogo);
    fd.append("type", supplierType);

    $.ajax({
        type: "POST",
        url: url + "admin/store-supplier",
        processData: false,
        contentType: false,
        cache: false,
        enctype: 'multipart/form-data',
        data: fd,
        success: function (response) {
            if(response.success){
                Swal.fire(
                    response.message,
                    '',
                    'success'
                ).then(function(){
                    $('#supplier-modal').modal('hide');
                    if (supplierType == 1) {
                        loadEnergySupplierRecords();
                    } else {
                        loadWaterSupplierRecords();
                    }
                    $('#btn-add-supplier').attr('hidden', false);
                    $('#btn-disabled').attr('hidden', true);
                });
            }
            if (response.error) {
                Swal.fire(
                    response.error,
                    '',
                    'error'
                );
            }
        },
        error: function () {}
    });
}

function loadEnergySupplierRecords() {
    var imgLoc = url + 'assets/images/logos/';
    $.ajax({
        type: "GET",
        url: url + "admin/load-energy-supp",
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                $('#energy-supplier-records-table tbody').empty()
                response.data.forEach(element => {
                    supplierTdTable = 
                        '<tr>' +
                            '<td width="30%">'+element.supplier_name+'</td>' +
                            '<td width="50"><img src="'+ imgLoc + element.supplier_logo+'" alt="'+element.supplier_name+'" width="150px"></td>' +
                            '<td width="20%">' +
                                '<button type="button" class="btn btn-success btn-sm" onclick="viewSupplierRecord(\''+encodeURIComponent(JSON.stringify(element))+'\')">View</button>' +
                                '<button type="button" class="btn btn-danger btn-sm ml-1" onclick="archiveSupplierRecord(\''+encodeURIComponent(JSON.stringify(element))+'\')">Delete</button>' +
                            '</td>' +
                        '</tr>';
                    $('#energy-supplier-records-table tbody').append(supplierTdTable);
                });
            }
        }
    })
}

function loadWaterSupplierRecords() {
    $.ajax({
        type: "GET",
        url: url + "admin/load-water-supp",
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                $('#water-supplier-records-table tbody').empty()
                response.data.forEach(element => {
                    supplierTdTable = 
                        '<tr>' +
                            '<td width="30%">'+element.supplier_name+'</td>' +
                            '<td width="50"><img src="'+ imgLoc + element.supplier_logo+'" alt="'+element.supplier_name+'" width="150px"></td>' +
                            '<td width="20%">' +
                                '<button type="button" class="btn btn-success btn-sm" onclick="viewSupplierRecord(\''+encodeURIComponent(JSON.stringify(element))+'\')">View</button>' +
                                '<button type="button" class="btn btn-danger btn-sm ml-1" onclick="archiveSupplierRecord(\''+encodeURIComponent(JSON.stringify(element))+'\')">Delete</button>' +
                            '</td>' +
                        '</tr>';
                    $('#water-supplier-records-table tbody').append(supplierTdTable);
                });
            }
        }
    })
}

function viewSupplierRecord(encryptedData) {
    const data = JSON.parse(decodeURIComponent(encryptedData));
    if (data.supplier_type == 1) {
        var tempSuppName = "Energy";
    } else {
        var tempSuppName = "Water";
    }
    supplierId = data.supplier_id;
    $('#supplier-modal').modal('show');
    $('h4#supplier-title-modal').html('Add '+tempSuppName+' Supplier');
    $('#supplier-name-label').html(''+tempSuppName+' Supplier Name');
    $('#supplier-logo-label').html(''+tempSuppName+' Supplier Logo');
    $('.custom-file').attr('hidden', true);
    $('#supplier-img, #btn-edit-logo').attr('hidden', false);
    $('#supplier-img').attr('src', imgLoc + data.supplier_logo);
    $('#supplier-name').val(data.supplier_name);
    $('#btn-add-supplier, #btn-disabled').attr('hidden', true);
    $('#btn-edit-supplier').attr('hidden', false);
    $('#supplier-modal input, #btn-edit-logo').attr('disabled', true);
    $('#btn-update-supplier').attr('hidden', true);

}

function updateSupplier() {
    if ($('#btn-disabled').hasClass('btn-primary')) {
        $('#btn-disabled').removeClass('btn-primary');
    }
    $('#btn-disabled').addClass('btn-info');
    $('#btn-disabled').attr('hidden', false);
    $('#btn-update-supplier').attr('hidden', true);

    if (supplierName == oldSupplierName && supplierLogo == undefined) {
        Swal.fire({
            title : "Nothing to be updated!",
            icon : "info",
            confirmButtonText : "Ok",
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                $('#supplier-name, #btn-edit-logo').attr('disabled', true);
                $('#btn-update-supplier').attr('hidden', true);
                $('#btn-edit-supplier').attr('hidden', false);
                $('.custom-file').attr('hidden', true);
            }
        });
    }
    // If only Supplier Name
    if (supplierName != oldSupplierName) {
        
        $.ajax({
            type: "POST",
            url: url + "admin/update-supplier-name",
            dataType: "JSON",
            data: {
                supplier_id : supplierId,
                supplier_name : supplierName
            },
            success: function (response) {
                if (response) {
                    Swal.fire({
                        title : "Successfully updated Supplier Name!",
                        icon : "success",
                        confirmButtonText : "Ok",
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (supplierType == 1) {
                                loadEnergySupplierRecords();
                            } else {
                                loadWaterSupplierRecords();
                            }
                            $('#supplier-modal').modal('hide');
                        }
                    });

                }
            }
        })
    }
    // // If only Supplier Logo
    if (supplierLogo != undefined) {
        if (supplierLogo["name"] != oldSupplierLogo) {
            const fd = new FormData();

            fd.append("id", supplierId);
            fd.append("logo", supplierLogo);
            fd.append("imgLocation", "assets/images/logos/" + oldSupplierLogo);
            $.ajax({
                type: "POST",
                url: url + "admin/update-supplier-logo",
                processData: false,
                contentType: false,
                cache: false,
                enctype: 'multipart/form-data',
                data: fd,
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            title : response.message,
                            icon : "success",
                            confirmButtonText : "Ok",
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (supplierType == 1) {
                                    loadEnergySupplierRecords();
                                } else {
                                    loadWaterSupplierRecords();
                                }
                                $('#supplier-modal').modal('hide');
                            }
                        });
                    } else {
                        Swal.fire(
                            response.message,
                            "",
                            "info"
                        );
                    }
                }
            })
        } else {
            Swal.fire(
                "This is the same Logo",
                "",
                "info"
            );
        }
        
    }
    $('#btn-disabled').attr('hidden', true);
    $('#btn-update-supplier').attr('hidden', false);
}

function archiveSupplierRecord(encryptedData) {
    const data = JSON.parse(decodeURIComponent(encryptedData));

    Swal.fire({
        title : 'Are you sure you want to delete "'+data.supplier_name+'"?',
        text : "You won't be able to revert this action.",
        icon : "warning",
        confirmButtonText : "Yes",
        showDenyButton: true,
        denyButtonText: "No",
        allowOutsideClick: false,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: url + "admin/archive-supplier",
                dataType: "JSON",
                data: {
                    supplier_id : data.supplier_id,
                },
                success: function (response) {
                    if (response) {
                        Swal.fire({
                            title : "Supplier records has ben deleted!",
                            icon : "success",
                            confirmButtonText : "Ok",
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                if (data.supplier_type == 1) {
                                    loadEnergySupplierRecords();
                                } else {
                                    loadWaterSupplierRecords();
                                }
                                $('#supplier-modal').modal('hide');
                            }
                        });
                    }
                }
            });
        } else if (result.isDenied) {
            Swal.fire("Cancelled", data.supplier_name+"'s records are safe!", "info");
        }
    });
}