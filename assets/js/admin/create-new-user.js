$(document).ready(function() {

    $('#create-new-user-form').submit(function(e) {
        e.preventDefault();
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
        console.log($("#create-new-user-form").serialize());
        $.ajax({
			type: "POST",
			url: url + "authentication/create-new-user", 
			dataType: "JSON",
			data: $("#create-new-user-form").serialize(),
            success: function (response) {
                if(response.success){
                    setTimeout(() => {
                        Swal.fire('Success!', 'Successfully created new user.', 'success').then(function () {
                            location.href = url_extended + 'settings/';
                            $.unblockUI();
                            $("#create-new-user-modal").modal("hide");
                        });
                    }, 2000);
                }else{
                    Swal.fire('Oops!', 'Something went wrong.', 'warning');
                    $.unblockUI();
                }
            },
            error: function () {},
		});
    });
});