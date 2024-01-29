
var leadTable;

$(document).ready(function () {

    loadLeads();
    
    $("#hits-allocation-today").click(function() {
        $("#hits-allocation-from").attr("disabled", "disabled");
        $("#hits-allocation-to").attr("disabled", "disabled");
        $("#hits-allocation-from").val("");
        $("#hits-allocation-to").val("");
        $("#hits-allocation-btn-submit").css("display","none");
    });

    $("#hits-allocation-range-date").click(function() {
        $("#hits-allocation-from").removeAttr("disabled");
        $("#hits-allocation-to").removeAttr("disabled");
    });

    $("#hits-allocation-to").change(function() {
        if ($("#hits-allocation-from").val()) {
            $("#hits-allocation-btn-submit").css("display","block");
        }
    });

    $("#leads-lead-source-today").click(function() {
        $("#leads-lead-source-from").attr("disabled", "disabled");
        $("#leads-lead-source-to").attr("disabled", "disabled");
        $("#leads-lead-source-from").val("");
        $("#leads-lead-source-to").val("");
        $("#leads-lead-source-btn-submit").css("display","none");
    });

    $("#leads-lead-source-range-date").click(function() {
        $("#leads-lead-source-from").removeAttr("disabled");
        $("#leads-lead-source-to").removeAttr("disabled");
    });

    $("#leads-lead-source-to").change(function() {
        if ($("#leads-lead-source-from").val()) {
            $("#leads-lead-source-btn-submit").css("display","block");
        }
    });

    // Bar Graph
    const ctx = document.getElementById('bar-chart-leads-lead-source');
    const xValues = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
    const yValues = [12, 59, 3, 5, 2, 3];

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: xValues,
            datasets: [{
                // label: '# of Leads',
                data: yValues,
                // borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            maintainAspectRatio: false,
        }
    });

});

function loadLeads() {
    const sampleData = [
        {
            "id" : 123,
            "business_name" : "test business name",
            "phone" : "012487",
            "email" : "test@email.com",
            "date" : "2024/01/23",
            "source" : "test source",
            "status" : "unallocated",
        },
        {
            "id" : 456,
            "business_name" : "test2 business name",
            "phone" : "0945678",
            "email" : "test2@email.com",
            "date" : "2024/01/24",
            "source" : "test2 source",
            "status" : "unallocated",
        },
    ];

    $("#list-leads-table").DataTable().destroy();
    leadTable = $("#list-leads-table").DataTable({
        dom: '<"card-header border-bottom p-1"<"head-label"<"datatable-leads-title">>B><"card-body"<"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>>',
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
                        `<button type="button" class="btn btn-danger btn-sm w-100">Archive</button>`
                    )
                }
            },
        ],
        select: true,
        buttons: [
            {
                extend: "csv",
                text: "Export to CSV",
                filename: "Lead Record List"
            }
        ],
        displayLength: 50,
        lengthMenu: [50, 75, 100],
        order: [[4, 'desc']],
    });
}