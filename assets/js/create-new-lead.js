$(document).ready(function () {

    // $("#create-lead-btn").click(function(e) {
    //     e.preventDefault();
    //     $("#create-new-lead-form")[0].reset();
    // });

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
    };

    $("#create-lead-btn").click(function() {
        $("#create-new-lead-form")[0].reset();
        $('#create-new-lead-modal').modal('show');
        
        // random generated Lead ID
        $("#new-lead-id").attr("value", makeid(7));
        
        // default date for created date
        var now = new Date();
        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);
        var today = now.getFullYear()+"-"+(month)+"-"+(day);
        $('#new-lead-date-created').attr("value", today);
    });

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

        var disabled = $("#create-new-lead-form").find(':input:disabled').removeAttr('disabled');
        var source = $("input[name='new_lead_source_radio']:checked").next('label').text();
        if (source == "Manual Entry") {
            var moreData = "New Lead Received by Manual Entry";
        } else if (source == "Webform") {
            var moreData = "New Lead Received by Webform";
        } else if (source == "PPC") {
            var moreData = "New PPC Lead Received";
        } else if (source == "Email Campaign") {
            var moreData = "New Lead Received by Email Campaign";
        } else {
            var moreData = "New Lead Received";
        }

        $.ajax({
            type: "POST",
            url: url + "admin/create-new-lead",
            dataType: "JSON",
            data: $("#create-new-lead-form").serialize() + "&notif_details=" + moreData,
            success: function (response) {
                if(response.success){
                    setTimeout(() => {
                        Swal.fire('Success!', response.message, 'success').then(function () {
                            $.unblockUI();
                            $('#create-new-lead-modal').modal('hide');
                            location.href = url_extended;
                        });
                    }, 2000);
                }else{
                    Swal.fire('Oops!', 'Something went wrong.', 'warning');
                    $.unblockUI();
                }
            },
            error: function () {},
        });

        disabled.attr('disabled','disabled');

    });

});

function newLeadTypeClick() {
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

    $('#new-lead-supplier').empty();
    if ($("#create-new-lead-form [name=new_lead_type][value=5]").is(':checked')) $('#new-lead-supplier').append(supplierWater);
    else $('#new-lead-supplier').append(supplierElect);
}

function newLeadSourceClick() {
    const leadSourceValue = $("#create-new-lead-form [name=new_lead_source_radio]:checked").val();
    $('#new-lead-source').attr('hidden', false);
    $('#new-lead-source').attr('disabled', false);
    $('#new-lead-source').val('');
    if ($('#create-new-lead-form [name=new_lead_source_radio][value=1]').is(':checked')) {
        $('#new-lead-source').attr('placeholder','Enter Lead Source or Enter Incoming Lead!');
    } else {
        $('#new-lead-source').val(leadSourceValue);
        $('#new-lead-source').attr('disabled', true);
    }
}