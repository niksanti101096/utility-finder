$(document).ready(function () {

    $("#create-lead-btn").click(function(e) {
        e.preventDefault();
        $("#create-new-lead-form")[0].reset();
    });

    function makeid(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
          counter += 1;
        }
        return result;
    }

    $("#create-lead-btn").click(function() {
        $('#create-new-lead-modal').modal('show');
        // random generated Lead ID
        $("#new-lead-id").attr("value", makeid(7));
        
        // default date for created date
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day);
        $('#new-lead-date-created').attr("value", today);
    })

    $("#create-new-lead-form").submit(function (e) {
        e.preventDefault();
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
            url: url + "admin/create-new-lead",
            dataType: "JSON",
            data: $("#create-new-lead-form").serialize(),
            success: function (response) {
                if(response.success){
                    setTimeout(() => {
                        Swal.fire('Success!', 'Successfully created new lead!', 'success').then(function () {
                            // load_monetary_debt();
                            $.unblockUI();
                            $('#create-new-lead-modal').modal('hide');
                        });
                    }, 2000);
                }else{
                    Swal.fire('Oops!', 'Something went wrong.', 'warning');
                    $.unblockUI();
                }
            },
            error: function () {},
        });

    })

});