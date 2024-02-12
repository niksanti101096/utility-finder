var userRecord;

$(document).ready(function() {
    loadUserProfile();

    // User Profile
    $('#btn-edit-profile').click(function() {
        $('#btn-save-profile').add('#btn-cancel-profile').removeAttr('hidden');
        $('#btn-edit-profile').attr('hidden', true);
        $('.editable').removeAttr('disabled');
    });
    $('#btn-cancel-profile').click(function() {
        $('#btn-save-profile').add('#btn-cancel-profile').attr('hidden', true);
        $('#btn-edit-profile').removeAttr('hidden');
        $('.editable').attr('disabled', true);
        loadUserProfile();
    });

    $('#user-profile-form').submit(function(e) {
        e.preventDefault();
        updateProfileInfo();
    });

    // Change Password
    $("form[name='change_password_form']").validate({ 
        rules: {
            old_password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength: 8
            },
            re_password: {
                equalTo: "#new-password",
            },
        },
        messages: {
            old_password: "Please enter your current password!",
            new_password: {
                required: "Please enter your new password!",
                minlength: "Your password must be at least 8 characters long"
            }
        },
        submitHandler: function(form) {
            changePassword();
        }
    });
});

function loadUserProfile() {
    $.ajax({
        type: "GET",
        url: url + "profile/load-user", 
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response.data) {
                var form = "#user-profile-form";
                var data = response.data[0];
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
                        } else {
                            if (key == 'user_type') {
                                if (data[key] == 1) {
                                    $(form + " [name=" + key + "]").val("ADMIN");
                                } else {
                                    $(form + " [name=" + key + "]").val("STANDARD");
                                }
                            } else {
                                $(form + " [name=" + key + "]").val(data[key]);
                            }
                            
                        };
                    }
                }
            }
        },
        error: function () {},
    });
}

function updateProfileInfo() {
    $.blockUI({
        message:
            '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
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
        url: url + "profile/update-profile-info",
        dataType: "JSON",
        data: $("#user-profile-form").serialize(),
        success: function (response) {
            if (response.success) {
                Swal.fire(
                    'Success!',
                    response.message,
                    'success')
                    .then( function () {
                        $.unblockUI();
                        loadUserProfile();
                        $('#btn-save-profile').add('#btn-cancel-profile').attr('hidden', true);
                        $('#btn-edit-profile').removeAttr('hidden');
                        $('.editable').attr('disabled', true);
                        loadUserProfile();
                    }
                );
            } else {
                Swal.fire(
                    'Failed!',
                    response.message,
                    'error')
                    .then( function () {
                        $.unblockUI();
                    }
                );
            }
        }
    });

}

function changePassword() {
    $.blockUI({
        message:
            '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Please wait...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
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
        url: url + "profile/change-password",
        dataType: "JSON",
        data: $("#change-password-form").serialize(),
        success: function (response) {
            if (response.success) {
                Swal.fire(
                    'Success!',
                    response.message,
                    'success')
                    .then( function () {
                        $.unblockUI();
                        loadUserProfile();
                    }
                );
            } else {
                Swal.fire(
                    'Failed changing password!',
                    response.message,
                    'error')
                    .then( function () {
                        $.unblockUI();
                    }
                );
            }
        },
        error: function(ts) {console.log(ts.responseText)}
    });
}