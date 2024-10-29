var leadTable;
var allocatedLeads;
var checkedLeadsSequence;
var checkedLeadsId;

$(document).ready(function () {
    defaultFieldsDisplay();

    $("#allocated-leads-all").click(function() {
        $("#allocated-leads-from").attr("disabled", "disabled");
        $("#allocated-leads-to").attr("disabled", "disabled");
        $("#allocated-leads-from").val("");
        $("#allocated-leads-to").val("");
        $("#allocated-leads-btn-submit").css("display","none");
        loadAlloLeads("all");
    });

    $("#allocated-leads-today").click(function() {
        $("#allocated-leads-from").attr("disabled", "disabled");
        $("#allocated-leads-to").attr("disabled", "disabled");
        $("#allocated-leads-from").val("");
        $("#allocated-leads-to").val("");
        $("#allocated-leads-btn-submit").css("display","none");
        loadAlloLeads("today");
    });

    $("#allocated-leads-range-date").click(function() {
        $("#allocated-leads-from").removeAttr("disabled");
        $("#allocated-leads-to").removeAttr("disabled");
    });

    $("#allocated-leads-to").change(function() {
        if ($("#allocated-leads-from").val()) {
            $("#allocated-leads-btn-submit").css("display","block");
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
        $('#btn-bulk-reallo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', false);
        $('#btn-bulk-cancel, .addtional').attr('hidden', true);
    });

    $('#btn-bulk-reallo').click(function() {
        leadTable.column(0).visible(true);
        $('#btn-bulk-reallo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', true);
        $('#btn-bulk-cancel, .addtional').attr('hidden', false);
        $('.table-check').prop('checked', false);
        $('.addtional').attr('id', 'btn-proceed-allo');
        $('.addtional').addClass('btn-primary');
        $('.addtional').removeClass('btn-warning btn-danger');
    });

    $('#btn-bulk-import').click(function() {
        leadTable.column(0).visible(true);
        $('#btn-bulk-reallo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', true);
        $('#btn-bulk-cancel, .addtional').attr('hidden', false);
        $('.table-check').prop('checked', false);
        $('.addtional').attr('id', 'btn-proceed-import');
        $('.addtional').addClass('btn-warning');
        $('.addtional').removeClass('btn-primary btn-danger');
    });

    $('#btn-bulk-arch').click(function() {
        leadTable.column(0).visible(true);
        $('#btn-bulk-reallo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', true);
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
                    'Please select atleast 1 to reallocate.',
                    '',
                    'warning'
                );
            } else {
                const tempHolder = [];
                checkedLeadsId.forEach(element => {
                    tempHolder.push('<li>'+element+'</li>')
                })
                $('#allocate-lead-modal').modal('show');
                $('#btn-allocate, .unallocated-lead-label, .unallocated-bulk-lead-label, .allocated-lead-label, .allocated-lead-label').attr('hidden', true);
                $('#btn-reallocate, .allocated-bulk-lead-label, .bulk-lead-sublabel').attr('hidden', false);
                $('.allocate-title-modal').html('Reallocate Bulk Leads');
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
    $("#allocated-leads-filter-display").val([1,2,3,4,5,6,7,8]).change();
};

function loadLeadsRecords() {
    allocatedLeads = [];

    $.ajax({
        type: "GET",
        url: url + "admin/load-allocated-lead-record", 
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response.data) {
                allocatedLeads = [];
                response.data.forEach(function (data) {
                    allocatedLeads.push(data);
                });

                $("#list-leads-table").DataTable().destroy();
                leadTable = $("#list-leads-table").DataTable({
                    responsive: true,
                    initComplete : function( settings, json ) {
                        $('.datatable-leads-title').html('Leads');
                        $('.datatable-leads-title').addClass('h1');
                        $('.datatable-leads-title').css('color','inherit');
                },
                    data: allocatedLeads,
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
						{
						    data: null,
						    render: function(data, type, row) {
						        return row.phone_number + "<br>" + row.email_address
						    }
						},
						{
						    data: null,
						    render: function(data, type, row) {
						        if(row.lead_type == 2) return "Electricity & Gas";
						        if(row.lead_type == 3) return "Gas";
						        if(row.lead_type == 4) return "Electricity";
						        if(row.lead_type == 5) return "Water";
						    }
						},
                        {data: "current_contract_ends"},
                        {data: "lead_source"},
                        {
                            data: null,
                            render: function(data, type, row) {
                                if(row.status == 1) return "Unallocated";
                                else return "Allocated";
                            }
                        },
                        {data: "partner_name"},
                        {
                            data: null,
                            render: function (data, type, row) {
                                return (
                                    '<button type="button" class="btn btn-success btn-sm w-100" onclick="viewLeadRecord('+row.sequence+')">View</button>' +
                                    '<button type="button" class="btn btn-secondary btn-sm w-100" onclick="loadReallocateModal(\''+encodeURIComponent(JSON.stringify(data))+'\')">Reallocate</button>' +
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

                var columns = $('#allocated-leads-filter-display').val();

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

function loadReallocateModal(encryptedData) {
    const data = JSON.parse(decodeURIComponent(encryptedData));
    $('#allocate-lead-modal').modal('show');
    $('.allocated-lead-label span').html(data.partner_name);
    $('.allocated-lead-label').attr('hidden', false);
    $('.unallocated-lead-label').attr('hidden', true);
    $('.allocate-title-modal').html('Reallocate Lead ' + data.lead_id);
    $('#btn-allocate').attr('hidden', true);
    $('#btn-reallocate').attr('hidden', false);
    $('#btn-allocate-disabled, .allocated-bulk-lead-label, .bulk-lead-sublabel').attr('hidden', true);
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

function bulkAllocateLead(partnerVal, partnerName) {
    $.ajax({
        type: "POST",
        url: url + "admin/assign-partner-bulk",
        dataType: "JSON",
        data: {
            lead_sequence : checkedLeadsSequence,
            partner_id : partnerVal,
            lead_status: 2,
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
                    loadLeadsRecords();
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
                    loadLeadsRecords();
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
                                loadLeadsRecords();
                                $('#btn-bulk-reallo, #btn-bulk-import, #btn-bulk-arch').attr('hidden', false);
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
                                loadLeadsRecords();
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

function loadAlloLeads(type = "dateRange") {
    $.ajax({
        type: "GET",
        url: url + "count/load-allo-leads-filter", 
        dataType: "JSON",
        data: {
            type: type,
            date_from: $('#allocated-leads-from').val(),
            date_to: $('#allocated-leads-to').val(),
        },
        success: function (response) {
            if (response.data) {
                allocatedLeads = [];
                response.data.forEach(function (data) {
                    allocatedLeads.push(data);
                });

                $("#list-leads-table").DataTable().destroy();
                leadTable = $("#list-leads-table").DataTable({
                    responsive: true,
                    initComplete : function( settings, json ) {
                        $('.datatable-leads-title').html('Leads');
                        $('.datatable-leads-title').addClass('h1');
                        $('.datatable-leads-title').css('color','inherit');
                    },
                    language: {
                        infoEmpty: "No records available - Got it?",
                    },
                    data: allocatedLeads,
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
						{
						    data: null,
						    render: function(data, type, row) {
						        return row.phone_number + "<br>" + row.email_address
						    }
						},
						{
						    data: null,
						    render: function(data, type, row) {
						        if(row.lead_type == 2) return "Electricity & Gas";
						        if(row.lead_type == 3) return "Gas";
						        if(row.lead_type == 4) return "Electricity";
						        if(row.lead_type == 5) return "Water";
						    }
						},
                        {data: "current_contract_ends"},
                        {data: "lead_source"},
                        {
                            data: null,
                            render: function(data, type, row) {
                                if(row.status == 1) return "Unallocated";
                                else return "Allocated";
                            }
                        },
                        {data: "partner_name"},
                        {
                            data: null,
                            render: function (data, type, row) {
                                return (
                                    '<button type="button" class="btn btn-success btn-sm w-100" onclick="viewLeadRecord('+row.sequence+')">View</button>' +
                                    '<button type="button" class="btn btn-secondary btn-sm w-100" onclick="loadReallocateModal(\''+encodeURIComponent(JSON.stringify(data))+'\')">Reallocate</button>' +
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

                var columns = $('#allocated-leads-filter-display').val();

                columns.forEach(element => {
                    leadTable.column(parseInt(element) - 1).visible(true);
                });

                leadTable.column(0).visible(false);
            }
        }
    });
}