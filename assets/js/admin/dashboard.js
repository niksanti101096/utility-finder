
var leadTable;
var leadViewRecord;
var leadRecords;
var dashboardChart;

$(document).ready(function () {

    loadLeads();
    dashboardGraph();
    metricHits('today');
    leadsByLeadSource('today');
    
    $("#hits-allocation-today").click(function() {
        $("#hits-allocation-from").attr("disabled", "disabled");
        $("#hits-allocation-to").attr("disabled", "disabled");
        $("#hits-allocation-from").val("");
        $("#hits-allocation-to").val("");
        $("#hits-allocation-btn-submit").css("display","none");
        metricHits('today');
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
        leadsByLeadSource('today');
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

});

function loadLeads() {

    leadRecords = [];
    $.ajax({
        type: "GET",
        url: url + "admin/load-lead-records", 
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                response.data.forEach(function (data) {
                    leadRecords.push(data);
                });

                $("#list-leads-table").DataTable().destroy();
                leadTable = $("#list-leads-table").DataTable({
                    dom: '<"card-header border-bottom p-1"<"head-label"<"datatable-leads-title">>B><"card-body"<"d-flex justify-content-between align-items-center mx-0 row">t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>>', // <"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f> - show entries and search
                    responsive: true,
                    initComplete : function( settings, json ) {
                        $('.datatable-leads-title').html('Leads');
                        $('.datatable-leads-title').addClass('h1');
                        $('.datatable-leads-title').css('color','inherit');
                    },
                    data: leadRecords,
                    columns: [
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
                        // {
                        //     data: null,
                        //     render: function(data, type, row) {
                        //         if(row.lead_type == 2) return "Electricity & Gas";
                        //         if(row.lead_type == 3) return "Gas";
                        //         if(row.lead_type == 4) return "Electricity";
                        //         if(row.lead_type == 5) return "Water";
                        //     }
                        // },
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
                                    '<button type="button" class="btn btn-danger btn-sm w-100" onclick="archiveLead('+row.sequence+')">Archive</button>'
                                )
                            }
                        },
                        {
                            data: "date_created",
                            visible: false,
                        }, // this column is for sorting only
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
                    order: [[9, 'desc']],
                });
            }
        },
        error: function () {},
    });
}

function dashboardGraph(source = [0,0,0,0]) {
    const ctx = document.getElementById('bar-chart-leads-lead-source');
    const xValues = ['Manual Entry', 'Webform', 'PPC', 'Email Campaign'];
    const yValues = [source[0], source[1], source[2], source[3]];

    const configuration = {
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
    }
    if (dashboardChart) {
        dashboardChart.destroy();
        dashboardChart = new Chart(ctx, configuration);
    } else {
        dashboardChart = new Chart(ctx, configuration);
    }
}

function metricHits(type = "date range") {
    $.ajax({
        type: "GET",
        url: url + "count/count-hits", 
        dataType: "JSON",
        data: {
            type: type,
            date_from: $('#hits-allocation-from').val(),
            date_to: $('#hits-allocation-to').val(),
        },
        success: function (response) {
            if (response) {
                $("td#metrics-hits").html(response.hits);
                $("td#metrics-not-allocated").html(response.not_allocated);
                $("td#metrics-allocated").html(response.allocated);
            }
        },
        error: function () {},
    });
}

function leadsByLeadSource(type = "date range") {
    $.ajax({
        type: "GET",
        url: url + "count/count-leads", 
        dataType: "JSON",
        data: {
            type: type,
            date_from: $('#leads-lead-source-from').val(),
            date_to: $('#leads-lead-source-to').val(),
        },
        success: function (response) {
            if (response) {
                dashboardGraph([response.manual_entry, response.webform, response.ppc, response.email_campaign]);
            }
        },
        error: function () {},
    });
}

function viewLeadRecord(id) {
	location.href = url_extended + "lead-record/" + id;
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
        } else if (result.isDenied) {
            Swal.fire(
                'The lead is safe!',
                '',
                'info',
            );
        }
    });
}