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

$(document).ready(function () {
    loadLeadRecord(sequence);

    $('.btn-allocate-lead').click(function() {
        $('#allocate-lead-modal').modal('show');
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

                var selectedSupplier = "";

                $('#content-header-title').html('Lead ID: '+response.data[0]['lead_id']+' / '+response.data[0]['business_name']);

                const status = response.data[0]['status'];
                if (status == 1) {
                    $('#status').html('Unallocated');
                    $('.btn-allocate-lead').removeAttr('hidden');
                    $('.btn-reallocate-lead').attr('hidden', true);
                } else if (status == 2) {
                    $('#status').html("Allocated");
                    $('.btn-reallocate-lead').removeAttr('hidden');
                    $('.btn-allocate-lead').attr('hidden', true);
                } else {
                    $('#status').html("Deleted");
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

function newLeadTypeValues() {
    $('#current-supplier').empty();                                
    if ($("#lead-details [name=lead_type][value=5]").is(':checked')) $('#current-supplier').append(supplierWater);
    else $('#current-supplier').append(supplierElect);
}