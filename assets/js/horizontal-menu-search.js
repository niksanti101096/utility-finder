$(document).ready(function () {
    var lead_records = [];

    $("#search-lead-btn").click(function(e) {
        e.preventDefault();
        $("#search-lead-records-form")[0].reset();
    }); 

	$("#search-lead-records-form").submit(function (event) { //for saving from form id = modal_form
        event.preventDefault();
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
        lead_records = [];
		$.ajax({
			type: "GET",
			url: url + "admin/search-lead", 
			dataType: "JSON",
			data: $("#search-lead-records-form").serialize(), // serialize call all inputs of form modal_form
            success: function (response) {
                if (response.data.length > 0) {
                    response.data.forEach(function (data) {
                        lead_records.push(data);
                    });
                    $("#search-lead-records").modal("hide");
                    searchLeadRecordsTable();
                }
                $.unblockUI();
            },
            error: function () {},
		});
	});

    // clears the form inputs when modal is closed
    $('[data-dismiss=modal]').on('click', function (e) {
        var $t = $(this),
            target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];
    
      $(target)
        .find("input,textarea,select")
           .val('')
           .end()
        .find("input[type=checkbox], input[type=radio]")
           .prop("checked", "")
           .end();
    })

    function searchLeadRecordsTable(){
        console.log(lead_records);
    }
});