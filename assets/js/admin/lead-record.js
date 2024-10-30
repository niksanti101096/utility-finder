var segment = $(location).attr("href").split("/");
if (typeof segment[5] !== "undefined") {
	sequence = segment[5];
}
var supplierElect = '<option value=""></option>';
    supplierElect += '<option value="British Gas">British Gas</option>';
    supplierElect += '<option value="EDF">EDF</option>';
    supplierElect += '<option value="Scottish Power">Scottish Power</option>';
    supplierElect += '<option value="Opus Energy">Opus Energy</option>';
    supplierElect += '<option value="Eon">Eon</option>';
    supplierElect += '<option value="Smartest Energy">Smartest Energy</option>';
    supplierElect += '<option value="SSE">SSE</option>';
    supplierElect += '<option value="CNG">CNG</option>';
    supplierElect += '<option value="Crown Gas and Power">Crown Gas and Power</option>';
    supplierElect += '<option value="Total">Total</option>';
    supplierElect += '<option value="Gazprom">Gazprom</option>';
    supplierElect += '<option value="BG Lite">BG Lite</option>';
    supplierElect += '<option value="Bulb">Bulb</option>';
    supplierElect += '<option value="Other Company">Other Company</option>';

var supplierWater = '<option value=""></option>';
    supplierWater += '<option value="Castle Water">Castle Water</option>';
    supplierWater += '<option value="Clear Business">Clear Business</option>';
    supplierWater += '<option value="Everflow Water">Everflow Water</option>';
    supplierWater += '<option value="Smarta Water">Smarta Water</option>';
    supplierWater += '<option value="Olympus Water">Olympus Water</option>';
    supplierWater += '<option value="Source 4 Business">Source 4 Business</option>';
    supplierWater += '<option value="Veolia">Veolia</option>';
    supplierWater += '<option value="Water2Business">Water2Business</option>';
    supplierWater += '<option value="WaterPlus">WaterPlus</option>';
    supplierWater += '<option value="Waterscan">Waterscan</option>';
    supplierWater += '<option value="Wave">Wave</option>';
    supplierWater += '<option value="Yu Water">Yu Water</option>';
    supplierWater += '<option value="Other">Other</option>';

var partnerName;
var leadID;
var partnerID;
var lead_status;
var tdTable;
var note;
var oldSource;

$(document).ready(function () {
    loadLeadRecord(sequence);

    $('.btn-allocate-lead').click(function(e) {
        $('#allocate-lead-modal').modal('show');
        $('.allocated-lead-label').attr('hidden', true);
        $('.unallocated-lead-label').attr('hidden', false);
        $('.allocate-title-modal').html('Allocate Lead ' + leadID);
        $('#btn-allocate').attr('hidden', false);
        $('#btn-reallocate').attr('hidden', true);
        $('#btn-allocate-disabled').attr('hidden', true);
        loadAllPartners();
    });

    $('.btn-reallocate-lead').click(function(e) {
        $('#allocate-lead-modal').modal('show');
        $('.allocated-lead-label span').html(partnerName);
        $('.allocated-lead-label').attr('hidden', false);
        $('.unallocated-lead-label').attr('hidden', true);
        $('.allocate-title-modal').html('Reallocate Lead ' + leadID);
        $('#btn-allocate').attr('hidden', true);
        $('#btn-reallocate').attr('hidden', false);
        $('#btn-allocate-disabled').attr('hidden', true);
        loadAllPartners();
    });

    $('#btn-allocate , #btn-reallocate').click(function() {
        const partnerVal = $('#allocate-lead').val();
        const partnerName = $('#allocate-lead option:selected').text();
        if (partnerVal != "") {
            $('#btn-allocate-disabled').attr('hidden', false);
            $('#btn-allocate').attr('hidden', true);
            $('#btn-reallocate').attr('hidden', true);
            const data = [partnerVal,partnerName];
            allocateLead(data);
        } else {
            Swal.fire(
                'Oppss..',
                'Please select a partner!',
                'warning'
            );
        }
        
    });

    $('#btn-save-note').click(function() {
        $('#btn-save-note').attr('hidden', true);
        $('#btn-save-disabled').attr('hidden', false);

        if ($('#lead-note-form #lead-notes').val() == "") {
            Swal.fire(
                'You should add some notes!',
                "",
                'info'
            );
            $('#btn-save-note').attr('hidden', false);
            $('#btn-save-disabled').attr('hidden', true);
        } else {
            Swal.fire({
                title: "Do you want to add the note?",
                showDenyButton: true,
                confirmButtonText: "Add",
                denyButtonText: `Don't add`
            }).then((result) => {
                if (result.isConfirmed) {
                    setTimeout(() => {
                        saveNote();
                    }, 1000);
                } else if (result.isDenied) {
                    $('#btn-save-note').attr('hidden', false);
                    $('#btn-save-disabled').attr('hidden', true);
                }
            });
        }
    });

    $('#btn-edit-lead').click(function() {
        $('.btn-update-cancel-lead').attr('hidden',false);
        $('#btn-edit-lead').attr('hidden',true);
        $('#lead-record-form input, #lead-record-form select').attr('disabled', false);
        $('#lead-id, #date-created').attr('disabled', true);
        $('.btn-allocate-lead, .re-allocate-label').attr('disabled', true);
    });

    $('.btn-cancel-edit, #nav-lead-details').click(function() {
        $('.btn-update-cancel-lead').attr('hidden',true);
        $('#btn-edit-lead').attr('hidden',false);
        $('#lead-record-form input, #lead-record-form select').attr('disabled', true);
        $('.btn-allocate-lead, .re-allocate-label').attr('disabled', false);
        loadLeadRecord(sequence);
    });

    $('#btn-update-lead').click(function() {
        $.blockUI({
            message:
                '<div class="d-flex justify-content-center align-items-center"><p class="mr-50 mb-0">Updating lead record...</p> <div class="spinner-grow spinner-grow-sm text-white" role="status"></div> </div>',
            css: {
                backgroundColor: 'transparent',
                color: '#fff',
                border: '0'
            },
            overlayCSS: {
                opacity: 0.8
            }
        });
        setTimeout(() => {
            saveUpdatedLead();
        }, 1500);
    });

    $('#btn-archive-lead').click(function() {
        Swal.fire({
            title: "Are you sure to delete this lead?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showDenyButton: true,
            confirmButtonText: "Yes",
            denyButtonText: `Cancel`
        }).then((result) => {
            if (result.isConfirmed) {
                archiveLead();
            } else if (result.isDenied) {
                Swal.fire(
                    'The lead is safe!',
                    '',
                    'info',
                );
            }
        });
    });
});


// functions


function loadLeadRecord(sequence) {
    $.ajax({
        type: "GET",
        url: url + "admin/load-lead-record", 
        dataType: "JSON",
        data: {sequence: sequence},
        success: function (response) {
            if (response) {
                var div = "#lead-details";
                var data = response.data[0];
                leadID = response.data[0]['lead_id'];
                partnerID = response.data[0]['partner_id'];
                var selectedSupplier = "";

                $('#content-header-title').html('Lead ID: '+leadID+' / '+response.data[0]['business_name']);

                lead_status = response.data[0]['status'];
                
                $('.btn-edit-lead').attr('hidden', false);
                $('.btn-archive-lead').attr('hidden', false);
                if (lead_status == 1) {
                    $('#status').html('Unallocated');
                    $('.btn-allocate-lead').attr('hidden', false);
                    $('.btn-reallocate-lead').attr('hidden', true);
                    $('.re-allocate-label').attr('hidden', true);
                } else if (lead_status == 2) {
                    loadPartnerDetails();
                    $('#status').html("Allocated");
                    $('.btn-allocate-lead').attr('hidden', true);
                    $('.btn-reallocate-lead').attr('hidden', false);
                    $('.re-allocate-label').attr('hidden', false);
                } else {
                    $('#status').html("Deleted");
                    $('.btn-allocate-lead').attr('hidden', true);
                    $('.btn-reallocate-lead').attr('hidden', true);
                    $('.re-allocate-label').attr('hidden', true);
                    $('.btn-edit-lead').attr('hidden', true);
                    $('.btn-archive-lead').attr('hidden', true);
                }

                $('#current-supplier').append(supplierWater + supplierElect);

                for (var key in data) {
                    var type = $(div + " [name=" + key + "]").attr("type");
                    if (type === "radio") {
                        $(div + " [name=" + key + "][value='" + data[key]).prop("checked", true);
                    } else if (type === "checkbox") {
                        var checked = data[key] === "Y" ? true : false;
                        $(div + " [name=" + key + "]").attr("checked", checked);
                    } else if (type === "date") {
                        var dateNow = new Date(data[key]),
                            month = '' + ("0" + (dateNow.getMonth() + 1)).slice(-2),
                            day = '' + ("0" + dateNow.getDate()).slice(-2),
                            year = dateNow.getFullYear();
                        $(div + " [name=" + key + "]").val([year, month, day].join('-'))
                        
                    } else {
                        if (key == 'current_supplier') {
                            selectedSupplier = data[key];
                        }
                        if (key == 'lead_source') {
                            oldSource = data[key];
                            $(div + " [name=" + key + "]").val(data[key]);
                            if ($('#lead-source').val() == "Email Campaign") {
                                $("#lead-email-campaign").prop('checked', true);
                            } else if ($('#lead-source').val() == "PPC") {
                                $("#lead-source-ppc").prop('checked', true);
                            } else if ($('#lead-source').val() == "Webform") {
                                $("#lead-source-webform").prop('checked', true);
                            } else {
                                $("#lead-source-manual").prop('checked', true);
                            }
                        }
                        if($(div + " [name="+key+"]").hasClass('select2')){
                            $(div + " [name="+key+"]").val(data[key]).change();
                        } else {
                            $(div + " [name=" + key + "]").val(data[key]);
                        }
                    }
                }

                loadNotes();
                leadSourceClick();
                loadAuditLog();

                setTimeout(() => {
                    newLeadTypeValues();
                    $(div + " [name=current_supplier]").val(selectedSupplier).change();
                }, 1000);
            }
        }
    });
}

function loadPartnerDetails() {
    $.ajax({
        type: "GET",
        url: url + "admin/load-partner-details", 
        dataType: "JSON",
        data: {partner_id: partnerID},
        success: function (response) {
            if (response.success) {
                partnerName = response.data[0]['partner_name'];
                $('#allocated-to').html(response.data[0]['partner_name']);
            }
        }
    });
}

function newLeadTypeValues() {
    $('#current-supplier').empty();                                
    if ($("#lead-details [name=lead_type][value=5]").is(':checked')) $('#current-supplier').append(supplierWater);
    else $('#current-supplier').append(supplierElect);
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
            for (const key in response.data) {
                if (response.data[key]['partner_id'] != partnerID) {
                    allocateOptions += '<option value="'+response.data[key]['partner_id']+'">'+response.data[key]['partner_name']+'</option>';
                }
            }
            $('#allocate-lead').html(allocateOptions);
        }
    });
}

function allocateLead(data) {
    $.ajax({
        type: "POST",
        url: url + "admin/assign-partner",
        dataType: "JSON",
        data: {
            partner_id : data[0],
            lead_sequence : sequence,
            lead_status: lead_status,
            partner_name: data[1],
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
                    loadLeadRecord(sequence);
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

function loadNotes() {
    $.ajax({
        type: "GET",
        url: url + "admin/load-notes",
        dataType: "JSON",
        data: {
            lead_sequence : sequence,
        },
        success: function (response) {
            $('#notes-table tbody').empty();
            if (response.data.length > 0) {
                response.data.forEach(element => {

                    const dateNow = new Date(element.notes_date_created),
                        month = '' + ("0" + (dateNow.getMonth() + 1)).slice(-2),
                        day = '' + ("0" + dateNow.getDate()).slice(-2),
                        year = dateNow.getFullYear();
                    tdTable = 
                        '<tr>'+
                            '<td>'+[year,month,day].join('-')+'</td>'+
                            '<td>'+element.notes+'</td>'+
                            '<td>'+element.user+'</td>'+
                    '</tr>';
                    $('#notes-table tbody').append(tdTable);
                });
            } else {
                tdTable = 
                    '<tr>'+
                        '<td colspan=3 class="text-center">No notes found!</td>'+
                '</tr>';
                $('#notes-table tbody').append(tdTable);
            }
        }
    });
}

function saveNote() {
    $.ajax({
        type: "POST",
        url: url + "admin/save-note",
        dataType: "JSON",
        data: $('#lead-note-form').serialize() + "&lead_sequence=" + sequence,
        success: function (response) {
            if (response.success) {
                Swal.fire(
                    response.message,
                    "",
                    'success'
                );
                loadLeadRecord(sequence);
                $('textarea#lead-notes').val("");
                $('#btn-save-note').attr('hidden', false);
                $('#btn-save-disabled').attr('hidden', true);
            } else {
                Swal.fire(
                    response.message,
                    "",
                    'error'
                );
            }
        }
    });
}

function saveUpdatedLead() {
    $.ajax({
        type: "POST",
        url: url + "admin/update-lead-record",
        dataType: "JSON",
        data: $('#lead-record-form').serialize() + "&lead_sequence=" + sequence,
        success: function (response) {
            if (response.success) {
                Swal.fire(
                    response.message,
                    '',
                    'success'
                );
                $('.btn-update-cancel-lead').attr('hidden',true);
                $('#btn-edit-lead').attr('hidden',false);
                $('#lead-record-form input, #lead-record-form select').attr('disabled', true);
                $('.btn-allocate-lead, .re-allocate-label').attr('disabled', false);
                loadLeadRecord(sequence);
                $.unblockUI();
            } else {
                Swal.fire(
                    response.message,
                    '',
                    'error'
                );
                $.unblockUI();
            }
        }
    });
}

function archiveLead() {
    $.ajax({
        type: "POST",
        url: url + "admin/archive-lead",
        dataType: "JSON",
        data: {
            lead_sequence: sequence,
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
                        location.href = url_extended;
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

function leadSourceClick() {
    const leadSourceValue = $("#lead-record-form [name=lead_source_radio]:checked").val();
    if ($('#lead-record-form [name=lead_source_radio][value=1]').is(':checked')) {
        $('#lead-source').val(oldSource);
    } else {
        $('#lead-source').val(leadSourceValue);
    }
}

function loadAuditLog() {
    $.ajax({
        type: "GET",
        url: url + "audit-log/load-audit-logs",
        dataType: "JSON",
        data: {
            lead_sequence : sequence,
        },
        success: function (response) {
            $('#audit-log-table tbody').empty();
            if (response.data.length > 0) {
                response.data.forEach(element => {
                    tdTable = 
                        '<tr>'+
                            '<td>'+element.date+'</td>'+
                            '<td>'+element.action+'</td>'+
                            '<td>'+element.user+'</td>'+
                    '</tr>';
                    $('#audit-log-table tbody').append(tdTable);
                });
            } else {
                tdTable = 
                    '<tr>'+
                        '<td colspan=3 class="text-center">No audit logs so far!</td>'+
                '</tr>';
                $('#audit-log-table tbody').append(tdTable);
            }
        }
    });
}