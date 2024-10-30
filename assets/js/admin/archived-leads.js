var leadTable;
var archivedLeads;

$(document).ready(function () {
    defaultFieldsDisplay();

});

function defaultFieldsDisplay() {
    $("#archived-leads-filter-display").val([1,2,3,4,5,6,7,8]).change();
}

function loadArchivedLeads() {

    archivedLeads = [];
    
    $.ajax({
        type: "GET",
        url: url + "admin/load-archived-lead-records", 
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response.data.length > 0) {
                response.data.forEach(function (data) {
                    archivedLeads.push(data);
                });
                

                $("#list-leads-table").DataTable().destroy();
                leadTable = $("#list-leads-table").DataTable({
                    responsive: true,
                    initComplete : function( settings, json ) {
                        $('.datatable-leads-title').html('Leads');
                        $('.datatable-leads-title').addClass('h1');
                        $('.datatable-leads-title').css('color','inherit');
                },
                    data: archivedLeads,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row) {
                                return `${row.lead_id}`;
                            }
                        },
						{ 
							data: null,
							render: function (data, type, row) {
								const d = new Date(row.date_created);
								return `${d.getDay().toString().padStart(2, "0")}-${(d.getMonth() + 1).toString().padStart(2, "0")}-${d.getFullYear()} ${d.getHours().toString().padStart(2, "0")}:${d.getMinutes().toString().padStart(2, "0")}`;
							}
						},
                        {data: "business_name"},
						{
						    data: null,
						    render: function(data, type, row) {
						        return row.phone_number + " / <br>" + row.email_address
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
                                if(row.status == 0) return "Archived";
                                else return "Error";
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

                for (let index = 0; index < 7; index++) {
                    leadTable.column(index).visible(false);
                }

                var columns = $('#archived-leads-filter-display').val();

                columns.forEach(element => {
                    leadTable.column(element).visible(true);
                });
            };
        },
        error : function() {},
    });
}