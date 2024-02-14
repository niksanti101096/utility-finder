
var userRecords;
var userTable;
var userUpdatedData;

$(document).ready(function() {

    loadUserRecords();

    $('#check-all-user').click(function(e){
        var table= $(e.target).closest('table');
        $('td input:checkbox',table).prop('checked',this.checked);
    });
    
    $('#setting-navigation ul.nav > li > a#nav-system-setting').click(function() {
        $('#add-user-btn').attr('hidden', 'hidden');
        $('#system-setting-list').removeAttr('hidden');
        $('#utility-supplier-list').attr('hidden', 'hidden');
        $('#energy-supplier-records-table tbody').children('tr').remove();
        $('#water-supplier-records-table tbody').children('tr').remove();
    });

    $('#setting-navigation ul.nav > li > a#nav-user-setting').click(function() {
        $('#add-user-btn').removeAttr('hidden');
    });

    $('#link-energy-supplier').click(function() {
        $('#system-setting-list').attr('hidden', 'hidden');
        $('#utility-supplier-list').removeAttr('hidden');
        $('#energy-supplier-list').removeAttr('hidden');
        $('#water-supplier-list').attr('hidden','hidden');
        loadEnergySupplierRecords();
    });

    $('#link-water-supplier').click(function() {
        $('#system-setting-list').attr('hidden', 'hidden');
        $('#utility-supplier-list').removeAttr('hidden');
        $('#water-supplier-list').removeAttr('hidden');
        $('#energy-supplier-list').attr('hidden','hidden');
        loadWaterSupplierRecords();
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
        $('#div-password').removeAttr('hidden');
        $('#div-repassword').removeAttr('hidden');
    });

    $('#user-btn-edit').click(function() {
        $('#user-btn-update').removeAttr('hidden');
        $('#user-btn-edit').attr('hidden', 'hidden');
        $('#user-modal input, #user-modal select').removeAttr('disabled');
    });

    $('#user-btn-update').click(function() {
        userUpdatedData = $("#user-form").serialize();
        updateUserRecord(userUpdatedData);
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
                        {
                            data: null,
                            render: function (data, type, row) {
                                return (
                                    '<div class="custom-control custom-checkbox">' +
                                        '<input class="custom-control-input" type="checkbox" value="" id="check-all-user-'+row.user_id+'">' +
                                        '<label for="check-all-user-'+row.user_id+'" class="custom-control-label"></label>' +
                                    '</div>'
                                )
                            }
                        },
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
    $('#user-btn-edit').removeAttr('hidden');
    $('#user-btn-add').attr('hidden', 'hidden');
    $('#user-btn-update').attr('hidden', 'hidden');
    $('#div-password').attr('hidden', 'hidden');
    $('#div-repassword').attr('hidden', 'hidden');
    $('#user-modal h4').html('User Record ID ' + data.user_id);
};

function updateUserRecord(data) {
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
    
    $.ajax({
        type: "POST",
        url: url + "authentication/update-user", 
        dataType: "JSON",
        data: data,
        success: function (response) {
            console.log(response);
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
};

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