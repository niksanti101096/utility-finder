var leadRecords;
var tdTable;

$(document).ready(function () {

    $("#search-lead-btn").click(function(e) {
        e.preventDefault();
        $("#search-lead-records-form")[0].reset();
    }); 

	$("#search-lead-records-form").submit(function (e) {
        e.preventDefault();
        $('#btn-search').attr('hidden', true);
        $('#btn-search-disabled').removeAttr('hidden');
        $('#search-lead-records-modal').modal({backdrop:'static', keyboard:false});

        setTimeout(() => {
            loadLeadRecords();
            $('#btn-search-disabled').attr('hidden', true);
            $('#btn-search').attr('hidden', false);
            $('#search-lead-records-modal').data('bs.modal',null);
        }, 1000);

	});
});

function loadLeadRecords() {
    leadRecords = [];
    $.ajax({
        type: "GET",
        url: url + "admin/search-lead", 
        dataType: "JSON",
        data: $("#search-lead-records-form").serialize(), // serialize call all inputs of form modal_form
        success: function (response) {
            if (response.data.length > 0) {
                response.data.forEach(function (data) {
                    leadRecords.push(data);
                });
                searchLeadRecordsTable();
            } else {
                noRecordFound();
            }
            
            
        },
        error: function (ts) {console.log(ts.responseText)},
    });
}

function searchLeadRecordsTable(){
    $('#search-lead-result-modal').modal('show');
    $('#lead-search-result-table tbody').empty();
    $('#search-result-modal').removeClass('modal-dialog-centered');
    $('#search-result-modal').addClass('modal-dialog-scrollable');
    leadRecords.forEach(element => {
        var btn = '<button type="button" class="btn btn-success btn-sm" onclick="viewLeadRecord('+element.sequence+')">Go to Lead</button>';
        var status;
        if (element.status == 1) {
            status = "Unallocated";
        } else if (element.status == 2) {
            status = "Allocated";
        } else {
            status = "Archived";
            btn = '';
        }

        var dateNow = new Date(element.date_created),
            month = '' + ("0" + (dateNow.getMonth() + 1)).slice(-2),
            day = '' + ("0" + dateNow.getDate()).slice(-2),
            year = dateNow.getFullYear();

        tdTable = 
            '<tr>'+
                '<td>'+element.lead_id+'</td>'+
                '<td>'+element.business_name+'</td>'+
                '<td>'+[year,month,day].join('-')+'</td>'+
                '<td>'+status+'</td>'+
                '<td>'+
                    btn +
                '</td>'+
            '</tr>';
        $('#lead-search-result-table tbody').append(tdTable);
    });
}

function noRecordFound() {
    $('#search-lead-result-modal').modal('show');
    $('#lead-search-result-table tbody').empty();
    $('#search-result-modal').addClass('modal-dialog-centered');
    $('#search-result-modal').removeClass('modal-dialog-scrollable');
    tdTable =
        '<tr>'+
            '<td colspan=5 class="text-center"> No records found! </td>'+
        '</tr>';
    $('#lead-search-result-table tbody').append(tdTable);
}

function viewLeadRecord(id) {
	location.href = url_extended + "lead-record/" + id;
}

