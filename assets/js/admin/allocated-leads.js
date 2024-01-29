
var leadTable;

$(document).ready(function () {
    loadLeads();
    defaultFieldsDisplay();

    $("#allocated-leads-all").click(function() {
        $("#allocated-leads-from").attr("disabled", "disabled");
        $("#allocated-leads-to").attr("disabled", "disabled");
        $("#allocated-leads-from").val("");
        $("#allocated-leads-to").val("");
        $("#allocated-leads-btn-submit").css("display","none");
    });

    $("#allocated-leads-today").click(function() {
        $("#allocated-leads-from").attr("disabled", "disabled");
        $("#allocated-leads-to").attr("disabled", "disabled");
        $("#allocated-leads-from").val("");
        $("#allocated-leads-to").val("");
        $("#allocated-leads-btn-submit").css("display","none");
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

});

function defaultFieldsDisplay() {
    $("#allocated-leads-filter-display").val([1,2,3,4,5,6,7,8]).change();
};

function loadLeads() {
    const sampleData = [
        {
            "id" : 789,
            "business_name" : "test business name",
            "phone" : "012487",
            "email" : "test@email.com",
            "date" : "2024/01/23",
            "source" : "test source",
            "status" : "allocated",
        },
        {
            "id" : 12,
            "business_name" : "test2 business name",
            "phone" : "0945678",
            "email" : "test2@email.com",
            "date" : "2024/01/24",
            "source" : "test2 source",
            "status" : "allocated",
        },
    ];

    $("#list-leads-table").DataTable().destroy();
    leadTable = $("#list-leads-table").DataTable({
        responsive: true,
        initComplete : function( settings, json ) {
            $('.datatable-leads-title').html('Leads');
            $('.datatable-leads-title').addClass('h1');
            $('.datatable-leads-title').css('color','inherit');
       },
        data: sampleData,
        columns: [
            {
                data: null,
                // visible: function() {
                //     return false;
                // },
                // visible: false,
                render: function (data, type, row) {
                    return `${row.id}`;
                }
            },
            {data: "business_name"},
            {data: "phone"},
            {data: "email"},
            {data: "date"},
            {data: "source"},
            {data: "status"},
            {
                data: null,
                render: function (data, type, row) {
                    return (
                        `<button type="button" class="btn btn-success btn-sm w-100">View</button>` +
                        `<button type="button" class="btn btn-secondary btn-sm w-100">Allocate</button>` +
                        `<button type="button" class="btn btn-danger btn-sm w-100">Archive</button>`
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

    var columns = $('#allocated-leads-filter-display').val();

    columns.forEach(element => {
        leadTable.column(parseInt(element) - 1).visible(true);
    });
};