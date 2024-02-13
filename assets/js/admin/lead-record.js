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

$(document).ready(function () {
    loadLeadRecord(sequence);

    $('.btn-allocate-lead').click(function(e) {
        $('#allocate-lead-modal').modal('show');
        $('.allocated-lead-label').attr('hidden', true);
        $('.unallocated-lead-label').attr('hidden', false);
        $('.modal-title').html('Allocate Lead ' + leadID);
    });

    $('.btn-reallocate-lead').click(function(e) {
        $('#allocate-lead-modal').modal('show');
        $('.allocated-lead-label span').html(partnerName);
        $('.allocated-lead-label').attr('hidden', false);
        $('.unallocated-lead-label').attr('hidden', true);
        $('.modal-title').html('Reallocate Lead ' + leadID);
        loadAllPartners();
    });
});

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

                const status = response.data[0]['status'];
                
                $('.btn-edit-lead').attr('hidden', false);
                $('.btn-archive-lead').attr('hidden', false);
                if (status == 1) {
                    $('#status').html('Unallocated');
                    $('.btn-allocate-lead').attr('hidden', false);
                    $('.btn-reallocate-lead').attr('hidden', true);
                    $('.re-allocate-label').attr('hidden', true);
                } else if (status == 2) {
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
                        if($(div + " [name="+key+"]").hasClass('select2')){
                            $(div + " [name="+key+"]").val(data[key]).change();
                        } else {
                            $(div + " [name=" + key + "]").val(data[key]);
                        }
                    }
                }
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