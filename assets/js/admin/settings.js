
var userRecords;
var userTable;

$(document).ready(function() {

    loadUserRecords();

    $('#check-all-user').click(function(e){
        var table= $(e.target).closest('table');
        $('td input:checkbox',table).prop('checked',this.checked);
    });
    
    $('#setting-navigation ul.nav > li > a#nav-system-setting').click(function() {
        $('#add-user-btn').attr('hidden', 'hidden');
        $('#system-setting-list').removeAttr('hidden');
        $('#utility-supplier-list').attr('hidden', 'hidden');
        $('#energy-supplier-records-table tbody').children('tr').remove();
        $('#water-supplier-records-table tbody').children('tr').remove();
    });

    $('#setting-navigation ul.nav > li > a#nav-user-setting').click(function() {
        $('#add-user-btn').removeAttr('hidden');
    });

    $('#link-energy-supplier').click(function() {
        $('#system-setting-list').attr('hidden', 'hidden');
        $('#utility-supplier-list').removeAttr('hidden');
        $('#energy-supplier-list').removeAttr('hidden');
        $('#water-supplier-list').attr('hidden','hidden');
        loadEnergySupplierRecords();
    });

    $('#link-water-supplier').click(function() {
        $('#system-setting-list').attr('hidden', 'hidden');
        $('#utility-supplier-list').removeAttr('hidden');
        $('#water-supplier-list').removeAttr('hidden');
        $('#energy-supplier-list').attr('hidden','hidden');
        loadWaterSupplierRecords();
    });
    
    $('#add-user-btn').click(function() {
        $('#create-new-user-modal').modal('show');
        $('img#profile-pic').attr('src', '');
        $(':input','#create-new-user-form')
            .not(':button, :submit, :reset, :hidden')
            .val('');
        $('#new-user-salutation').val(null).trigger('change');
    });

});

function loadUserRecords() {
    userRecords = [];
                
    $.ajax({
        type: "GET",
        url: url + "admin/load-user-record",
        dataType: "JSON",
        data: {},
        success: function(response){
            if (response.data.length > 0) {
                response.data.forEach(data => {
                    userRecords.push(data);
                });

                $("#user-records-table").DataTable().destroy();
                userTable = $("#user-records-table").DataTable({
                    dom: '<"card-header border-bottom p-1"<"head-label"<"datatable-user-title">>><"card-body"<"d-flex justify-content-between align-items-center mx-0 row">t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>>',
                    responsive: true,
                    initComplete : function( settings, json ) {
                        $('.datatable-user-title').html('User Records');
                        $('.datatable-user-title').addClass('h4');
                        $('.datatable-user-title').css('color','inherit');
                    },
                    data: userRecords,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row) {
                                return (
                                    '<div class="custom-control custom-checkbox">' +
                                        '<input class="custom-control-input" type="checkbox" value="" id="check-all-user-'+row.user_id+'">' +
                                        '<label for="check-all-user-'+row.user_id+'" class="custom-control-label"></label>' +
                                    '</div>'
                                )
                            }
                        },
                        {data: "user_id"},
                        {data: "username"},
                        {
                            data: null,
                            render: function(data, type, row) {
                                if(row.user_type == 1) return "ADMIN";
                                else return "STANDARD";
                            }
                        },
                        {
                            data: null,
                            render: function(data, type, row) {
                                if(row.status == 1) return "Active";
                                else return "Disabled";
                            }
                        },
                        {
                            data: null,
                            render: function (data, type, row) {
                                return (
                                    '<button type="button" class="btn btn-success btn-sm mr-1" onclick="">View</button>' +
                                    `<button type="button" class="btn btn-danger btn-sm">Archive</button>`
                                )
                            }
                        },
                    ],
                    select: true,
                    displayLength: 50,
                    lengthMenu: [50, 75, 100],
                });
            } else {
                
            }
        }
    });
};