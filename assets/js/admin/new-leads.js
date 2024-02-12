var leadTable;
var notAllocatedLeads;

$(document).ready(function () {
    defaultFieldsDisplay();

    $("#new-leads-all").click(function() {
        $("#new-leads-from").attr("disabled", "disabled");
        $("#new-leads-to").attr("disabled", "disabled");
        $("#new-leads-from").val("");
        $("#new-leads-to").val("");
        $("#new-leads-btn-submit").css("display","none");
    });

    $("#new-leads-today").click(function() {
        $("#new-leads-from").attr("disabled", "disabled");
        $("#new-leads-to").attr("disabled", "disabled");
        $("#new-leads-from").val("");
        $("#new-leads-to").val("");
        $("#new-leads-btn-submit").css("display","none");
    });

    $("#new-leads-range-date").click(function() {
        $("#new-leads-from").removeAttr("disabled");
        $("#new-leads-to").removeAttr("disabled");
    });

    $("#new-leads-to").change(function() {
        if ($("#new-leads-from").val()) {
            $("#new-leads-btn-submit").css("display","block");
        }
    });

    

});

function defaultFieldsDisplay() {
    $("#new-leads-filter-display").val([1,2,3,4,5,6,7,8]).change();
}

function loadNotLeads() {

    notAllocatedLeads = [];
    
    $.ajax({
        type: "GET",
        url: url + "admin/load-not-lead-record", 
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                response.data.forEach(function (data) {
                    notAllocatedLeads.push(data);
                });

                $("#list-leads-table").DataTable().destroy();
                leadTable = $("#list-leads-table").DataTable({
                    responsive: true,
                    initComplete : function( settings, json ) {
                        $('.datatable-leads-title').html('Leads');
                        $('.datatable-leads-title').addClass('h1');
                        $('.datatable-leads-title').css('color','inherit');
                },
                    data: notAllocatedLeads,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `${row.lead_id}`;
                            }
                        },
                        {data: "business_name"},
                        {data: "phone_number"},
                        {data: "email_address"},
                        {data: "date_created"},
                        {data: "lead_source"},
                        {
                            data: null,
                            render: function(data, type, row) {
                                if(row.status == 1) return "Unallocated";
                                else return "Allocated";
                            }
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return (
                                    '<button type="button" class="btn btn-success btn-sm w-100" onclick="viewLeadRecord('+row.sequence+')">View</button>' +
                                    '<button type="button" class="btn btn-secondary btn-sm w-100">Allocate</button>' +
                                    '<button type="button" class="btn btn-danger btn-sm w-100">Archive</button>'
                                )
                            }
                        },
                    ],
                    select: true,
                    displayLength: 50,
                    lengthMenu: [50, 75, 100],
                    order: [[4, 'desc']],
                    "paging": false,
                    "info": false,
                    "filter": false,
                });

                for (let index = 0; index < 8; index++) {
                    leadTable.column(index).visible(false);
                }

                var columns = $('#new-leads-filter-display').val();

                columns.forEach(element => {
                    leadTable.column(parseInt(element) - 1).visible(true);
                });
            };
        },
        error : function() {},
    });
}
function viewLeadRecord(id) {
	location.href = url_extended + "lead-record/" + id;
}