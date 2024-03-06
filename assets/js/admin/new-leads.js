var leadTable;
var notAllocatedLeads;
var checkedLeadsSequence;
var checkedLeadsId;
var partnerNames;

$(document).ready(function () {
    defaultFieldsDisplay();
    loadAllPartners();

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
            if ($('#lead-bulk').val() == 1) {
                bulkAllocateLead(partnerVal, $('#allocate-lead option:selected').text());
            } else {
                allocateLead(partnerVal, $('#allocate-lead option:selected').text());
            }
        } else {
            Swal.fire(
                'Oppss..',
                'Please select a partner!',
                'warning'
            );
        }
        
    });

    $('#btn-bulk-cancel').click(function() {
        leadTable.column(0).visible(false);
        $('#btn-bulk-allo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', false);
        $('#btn-bulk-cancel, .addtional').attr('hidden', true);
    });

    $('#btn-bulk-allo').click(function() {
        leadTable.column(0).visible(true);
        $('#btn-bulk-allo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', true);
        $('#btn-bulk-cancel, .addtional').attr('hidden', false);
        $('.table-check').prop('checked', false);
        $('.addtional').attr('id', 'btn-proceed-allo');
        $('.addtional').addClass('btn-primary');
        $('.addtional').removeClass('btn-warning btn-danger');
    });

    $('#btn-bulk-import').click(function() {
        leadTable.column(0).visible(true);
        $('#btn-bulk-allo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', true);
        $('#btn-bulk-cancel, .addtional').attr('hidden', false);
        $('.table-check').prop('checked', false);
        $('.addtional').attr('id', 'btn-proceed-import');
        $('.addtional').addClass('btn-warning');
        $('.addtional').removeClass('btn-primary btn-danger');
    });

    $('#btn-bulk-arch').click(function() {
        leadTable.column(0).visible(true);
        $('#btn-bulk-allo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', true);
        $('#btn-bulk-cancel, .addtional').attr('hidden', false);
        $('.table-check').prop('checked', false);
        $('.addtional').attr('id', 'btn-proceed-arch');
        $('.addtional').addClass('btn-danger');
        $('.addtional').removeClass('btn-warning btn-primary');
    });

    $('#check-all-list').click(function() {
        if ($('#check-all-list').is(':checked')) {
            $('.table-check').not(this).prop('checked', true);
        } else {
            $('.table-check').not(this).prop('checked', false);
        }
    });

    $('#list-leads-table').change('.table-check', function() {
        if ($('.table-check:checked').length == $('.table-check').length) {
            $('#check-all-list').prop('checked', true)
        } else {
            $('#check-all-list').prop('checked', false)
        }
        getCheckRecords();
    });

    $('.addtional').click(function() {
        if ($(this).attr('id') == "btn-proceed-allo") {
            if ($('.table-check:checked').length == 0) {
                Swal.fire(
                    'Please select atleast 1 to allocate.',
                    '',
                    'warning'
                );
            } else {
                const tempHolder = [];
                checkedLeadsId.forEach(element => {
                    tempHolder.push('<li>'+element+'</li>')
                })
                $('#allocate-lead-modal').modal('show');
                $('.allocated-lead-label, #btn-allocate-disabled, #btn-reallocate, .unallocated-lead-label').attr('hidden', true);
                $('.unallocated-bulk-lead-label, .unallocated-bulk-lead-sublabel, #btn-allocate').attr('hidden', false);
                $('.allocate-title-modal').html('Allocate Bulk Leads');
                $('.bulk-lead-sublabel').html(tempHolder);
                $('#lead-bulk').val(1);
                loadAllPartners();
            }
        } else if ($(this).attr('id') == "btn-proceed-arch") {
            if ($('.table-check:checked').length == 0) {
                Swal.fire(
                    'Please select atleast 1 to archive.',
                    '',
                    'warning'
                );
            } else {
                bulkArchiveLeads();
            }
        } else {
            Swal.fire(
                'This function is to be follow.',
                '',
                'warning'
            );
        }
    });
});

function getCheckRecords() {
    checkedLeadsSequence = [];
    checkedLeadsId = [];
    $('.table-check:checked').each(function() {
        if ($(this).prop('checked')) {
            checkedLeadsSequence.push($(this).val());
            checkedLeadsId.push($(this).attr('name'))
        }
    });
}

function defaultFieldsDisplay() {
    $("#new-leads-filter-display").val([1,2,3,4,5,6,7,8]).change();
}

function loadNotLeads() {
    
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
                                return (
                                    '<div class="custom-control custom-checkbox">'+
                                        '<input class="custom-control-input table-check" type="checkbox" value="'+row.sequence+'" name="'+row.lead_id+'" id="check-'+row.sequence+'">'+
                                        '<label for="check-'+row.sequence+'" class="custom-control-label"></label>'+
                                    '</div>'
                                )
                            }
                        },
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
                                    '<button type="button" class="btn btn-secondary btn-sm w-100" onclick="loadAllocateModal(\''+encodeURIComponent(JSON.stringify(data))+'\')">Allocate</button>' +
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

                leadTable.column(0).visible(false);
            };
        },
        error : function() {},
    });
}
function viewLeadRecord(id) {
	location.href = url_extended + "lead-record/" + id;
}

function loadAllocateModal(encryptedData) {
    const data = JSON.parse(decodeURIComponent(encryptedData));
    $('#allocate-lead-modal').modal('show');
    $('.unallocated-lead-label, #btn-allocate').attr('hidden', false);
    $('.allocate-title-modal').html('Allocate Lead ' + data.lead_id);
    $('#btn-allocate-disabled, .unallocated-bulk-lead-sublabel, .allocated-lead-label, #btn-reallocate, .unallocated-bulk-lead-label').attr('hidden', true);
    $('#lead-sequence').val(data.sequence);
    $('#lead-status').val(data.status);
    loadAllPartners();
}

function loadAllPartners() {
    var allocateOptions;
    $.ajax({
        type: "GET",
        url: url + "admin/load-all-partners",
        dataType: "JSON",
        data: {},
        success: function (response) {
            allocateOptions = '<option value=""></option>';
            partnerNames = [];
            for (const key in response.data) {
                partnerNames.push(response.data[key]['partner_name']);
                allocateOptions += '<option value="'+response.data[key]['partner_id']+'">'+response.data[key]['partner_name']+'</option>';
            }
            $('#allocate-lead').html(allocateOptions);
        }
    });
}

function bulkAllocateLead(partnerVal, partnerName) {
    $.ajax({
        type: "POST",
        url: url + "admin/assign-partner-bulk",
        dataType: "JSON",
        data: {
            lead_sequence : checkedLeadsSequence,
            partner_id : partnerVal,
            lead_status: 1,
            partner_name: partnerName
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

function allocateLead(partnerVal, partnerName) {
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
            partner_name: partnerName
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

function bulkArchiveLeads() {
    let tempHolder = "";
    checkedLeadsId.forEach(element => {
        tempHolder += ('<li>'+element+'</li>');
    })
    Swal.fire({
        title: "Are you sure to delete the following leads?",
        html: tempHolder,
        icon: "warning",
        showDenyButton: true,
        confirmButtonText: "Yes",
        denyButtonText: `Cancel`
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: url + "admin/archive-bulk-lead",
                dataType: "JSON",
                data: {
                    lead_sequence: checkedLeadsSequence,
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
                                $('#btn-bulk-allo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', false);
                                $('.addtional, #btn-bulk-cancel').attr('hidden', true);
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
                                return (
                                    '<div class="custom-control custom-checkbox">'+
                                        '<input class="custom-control-input table-check" type="checkbox" value="'+row.sequence+'" name="'+row.lead_id+'" id="check-'+row.sequence+'">'+
                                        '<label for="check-'+row.sequence+'" class="custom-control-label"></label>'+
                                    '</div>'
                                )
                            }
                        },
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
                                    '<button type="button" class="btn btn-secondary btn-sm w-100" onclick="loadAllocateModal(\''+encodeURIComponent(JSON.stringify(data))+'\')">Allocate</button>' +
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

                leadTable.column(0).visible(false);
            };
        },
        error: function () {},
    });
}