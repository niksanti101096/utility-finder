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
        loadNewLeads("all");
    });

    $("#new-leads-today").click(function() {
        $("#new-leads-from").attr("disabled", "disabled");
        $("#new-leads-to").attr("disabled", "disabled");
        $("#new-leads-from").val("");
        $("#new-leads-to").val("");
        $("#new-leads-btn-submit").css("display","none");
        loadNewLeads("today");
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

    $('#btn-allocate , #btn-reallocate').click(function() {
        const partnerVal = $('#allocate-lead').val();
        if (partnerVal != "") {
            $('#btn-allocate-disabled').attr('hidden', false);
            $('#btn-allocate').attr('hidden', true);
            $('#btn-reallocate').attr('hidden', true);
            allocateLead(partnerVal);
        } else {
            Swal.fire(
                'Oppss..',
                'Please select a partner!',
                'warning'
            );
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
        url: url + "admin/load-not-lead-records", 
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                notAllocatedLeads = [];
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
                        {data: "current_contract_ends"},
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
                                leadId = row.lead_id;
                                partnerId = row.partner_id;
                                leadStatus= row.status;
                                return (
                                    '<button type="button" class="btn btn-success btn-sm w-100" onclick="viewLeadRecord('+row.sequence+')">View</button>' +
                                    '<button type="button" class="btn btn-secondary btn-sm w-100" onclick="loadReallocateModal(\''+encodeURIComponent(JSON.stringify(data))+'\')">Allocate</button>' +
                                    '<button type="button" class="btn btn-danger btn-sm w-100" onclick="archiveLead('+row.sequence+')">Archive</button>'
                                )
                            }
                        },
                    ],
                    select: true,
                    displayLength: 50,
                    lengthMenu: [50, 75, 100],
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

function loadReallocateModal(encryptedData) {
    const data = JSON.parse(decodeURIComponent(encryptedData));

    $('#allocate-lead-modal').modal('show');
    $('.allocated-lead-label').attr('hidden', true);
    $('.unallocated-lead-label').attr('hidden', false);
    $('.allocate-title-modal').html('Allocate Lead ' + data.lead_id);
    $('#btn-allocate').attr('hidden', false);
    $('#btn-reallocate').attr('hidden', true);
    $('#btn-allocate-disabled').attr('hidden', true);
    $('#lead-sequence').val(data.sequence);
    $('#lead-status').val(data.status);
    loadAllPartners(data.partner_id);
}

function loadAllPartners(partnerId) {
    var allocateOptions;
    $.ajax({
        type: "GET",
        url: url + "admin/load-all-partners",
        dataType: "JSON",
        data: {},
        success: function (response) {
            allocateOptions = '<option value=""></option>';
            for (const key in response.data) {
                if (response.data[key]['partner_id'] != partnerId) {
                    allocateOptions += '<option value="'+response.data[key]['partner_id']+'">'+response.data[key]['partner_name']+'</option>';
                }
            }
            $('#allocate-lead').html(allocateOptions);
        }
    });
}

function allocateLead(partnerVal) {
    const sequence = $('#lead-sequence').val();
    const lead_status = $('#lead-status').val();
    $.ajax({
        type: "POST",
        url: url + "admin/assign-partner",
        dataType: "JSON",
        data: {
            partner_id : partnerVal,
            lead_sequence : sequence,
            lead_status: lead_status,
        },
        success: function (response) {
            if (response.success) {
                Swal.fire(
                    response.message,
                    '',
                    'success',
                ).then(() => {
                    $('#btn-allocate-disabled').attr('hidden', true);
                    $('#allocate-lead-modal').modal('hide');
                    loadNotLeads();
                });
            } else {
                Swal.fire(
                    response.message,
                    '',
                    'error',
                );
            }
        }
    });
}

function archiveLead(id) {
    Swal.fire({
        title: "Are you sure to delete this lead?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showDenyButton: true,
        confirmButtonText: "Yes",
        denyButtonText: `Cancel`
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: url + "admin/archive-lead",
                dataType: "JSON",
                data: {
                    lead_sequence: id,
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            title: response.message,
                            confirmButtonText: "Proceed",
                            icon: "success",
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                loadNotLeads();
                            }
                        });
                    } else {
                        Swal.fire(
                            response.message,
                            '',
                            'error'
                        );
                    }
                }
            });
        } else if (result.isDenied) {
            Swal.fire(
                'The lead is safe!',
                '',
                'info',
            );
        }
    });
}

function loadNewLeads(type = "dateRange") {
    $.ajax({
        type: "GET",
        url: url + "count/load-leads-filter", 
        dataType: "JSON",
        data: {
            type: type,
            date_from: $('#new-leads-from').val(),
            date_to: $('#new-leads-to').val(),
        },
        success: function (response) {
            if (response.data) {
                notAllocatedLeads = [];
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
                        {data: "current_contract_ends"},
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
                                leadId = row.lead_id;
                                partnerId = row.partner_id;
                                leadStatus= row.status;
                                return (
                                    '<button type="button" class="btn btn-success btn-sm w-100" onclick="viewLeadRecord('+row.sequence+')">View</button>' +
                                    '<button type="button" class="btn btn-secondary btn-sm w-100" onclick="loadReallocateModal(\''+encodeURIComponent(JSON.stringify(data))+'\')">Allocate</button>' +
                                    '<button type="button" class="btn btn-danger btn-sm w-100" onclick="archiveLead('+row.sequence+')">Archive</button>'
                                )
                            }
                        },
                    ],
                    select: true,
                    displayLength: 50,
                    lengthMenu: [50, 75, 100],
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
        error: function () {},
    });
}