$(document).ready(function() {

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
});

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

    $.ajax({
        type: "POST",
        url: url + "authentication/create-new-user", 
        dataType: "JSON",
        data: $("#user-form").serialize(),
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
        },
        error: function () {},
    });
}