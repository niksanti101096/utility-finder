
var userRecords1;
var userRecords2;
var userRecords3;

var energySupplierRecords1;
var energySupplierRecords2;
var energySupplierRecords3;

var waterSupplierRecords1;
var waterSupplierRecords2;
var waterSupplierRecords3;

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
    
});

function loadUserRecords() {
    tempUserRecords();
    $('#user-records-table tbody').append(userRecords3);
}

function tempUserRecords() {
    userRecords1 = '<tr>' +
        '<td>' +
            '<div class="custom-control custom-checkbox">' +
                '<input class="custom-control-input" type="checkbox" value="" id="check-user-1">' +
                '<label for="check-user-1" class="custom-control-label"></label>' +
            '</div>' +
        '</td>' + 
        '<td>ID1</td>' + 
        '<td>Username1</td>' + 
        '<td>User type1</td>' + 
        '<td>Status1</td>' + 
        '<td class="col-md-1">' +
            '<button type="button" class="btn btn-success btn-sm w-100">View</button>' +
            '<button type="button" class="btn btn-danger btn-sm w-100">Archive</button>' +
        '</td>' + 
    '</tr>';

    userRecords2 = '<tr>' +
        '<td>' +
            '<div class="custom-control custom-checkbox">' +
                '<input class="custom-control-input" type="checkbox" value="" id="check-user-2">' +
                '<label for="check-user-2" class="custom-control-label"></label>' +
            '</div>' +
        '</td>' + 
        '<td>ID2</td>' + 
        '<td>Username2</td>' + 
        '<td>User type2</td>' + 
        '<td>Status2</td>' + 
        '<td class="col-md-1">' +
            '<button type="button" class="btn btn-success btn-sm w-100">View</button>' +
            '<button type="button" class="btn btn-danger btn-sm w-100">Archive</button>' +
        '</td>' + 
    '</tr>';
    userRecords3 = userRecords1 + userRecords2;
}

function loadEnergySupplierRecords() {
    tempEnergySupplierRecords();
    $('#energy-supplier-records-table tbody').append(energySupplierRecords3);
}

function tempEnergySupplierRecords() {
    energySupplierRecords1 = '<tr>' +
        '<td>' +
            'Cepalco' +
        '</td>' + 
        '<td class="col-md-1">' +
            '<button type="button" class="btn btn-success btn-sm w-100">View</button>' +
            '<button type="button" class="btn btn-info btn-sm w-100">Edit</button>' +
            '<button type="button" class="btn btn-danger btn-sm w-100">Delete</button>' +
        '</td>' + 
    '</tr>';

    energySupplierRecords2 = '<tr>' +
        '<td>' +
            'Meralco' +
        '</td>' + 
        '<td class="col-md-1">' +
            '<button type="button" class="btn btn-success btn-sm w-100">View</button>' +
            '<button type="button" class="btn btn-info btn-sm w-100">Edit</button>' +
            '<button type="button" class="btn btn-danger btn-sm w-100">Delete</button>' +
        '</td>' + 
    '</tr>';

    energySupplierRecords3 = energySupplierRecords1 + energySupplierRecords2;
}

function loadWaterSupplierRecords() {
    tempWaterSupplierRecords();
    $('#water-supplier-records-table tbody').append(waterSupplierRecords3);
}

function tempWaterSupplierRecords() {
    waterSupplierRecords1 = '<tr>' +
        '<td>' +
            'Cepalco' +
        '</td>' + 
        '<td class="col-md-1">' +
            '<button type="button" class="btn btn-success btn-sm w-100">View</button>' +
            '<button type="button" class="btn btn-info btn-sm w-100">Edit</button>' +
            '<button type="button" class="btn btn-danger btn-sm w-100">Delete</button>' +
        '</td>' + 
    '</tr>';

    waterSupplierRecords2 = '<tr>' +
        '<td>' +
            'Meralco' +
        '</td>' + 
        '<td class="col-md-1">' +
            '<button type="button" class="btn btn-success btn-sm w-100">View</button>' +
            '<button type="button" class="btn btn-info btn-sm w-100">Edit</button>' +
            '<button type="button" class="btn btn-danger btn-sm w-100">Delete</button>' +
        '</td>' + 
    '</tr>';

    waterSupplierRecords3 = waterSupplierRecords1 + waterSupplierRecords2;
}