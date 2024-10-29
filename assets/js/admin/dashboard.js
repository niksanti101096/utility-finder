var leadTable;
var leadViewRecord;
var leadRecords;
var dashboardChart;

$(document).ready(function () {
	loadLeads();
	dashboardGraph();
	metricHits("today");
	leadsByLeadSource("today");

	$("#hits-allocation-today").click(function () {
		$("#hits-allocation-from").attr("disabled", "disabled");
		$("#hits-allocation-to").attr("disabled", "disabled");
		$("#hits-allocation-from").val("");
		$("#hits-allocation-to").val("");
		$("#hits-allocation-btn-submit").css("display", "none");
		metricHits("today");
	});

	$("#hits-allocation-range-date").click(function () {
		$("#hits-allocation-from").removeAttr("disabled");
		$("#hits-allocation-to").removeAttr("disabled");
	});

	$("#hits-allocation-to").change(function () {
		if ($("#hits-allocation-from").val()) {
			$("#hits-allocation-btn-submit").css("display", "block");
		}
	});

	$("#leads-lead-source-today").click(function () {
		$("#leads-lead-source-from").attr("disabled", "disabled");
		$("#leads-lead-source-to").attr("disabled", "disabled");
		$("#leads-lead-source-from").val("");
		$("#leads-lead-source-to").val("");
		$("#leads-lead-source-btn-submit").css("display", "none");
		leadsByLeadSource("today");
	});

	$("#leads-lead-source-range-date").click(function () {
		$("#leads-lead-source-from").removeAttr("disabled");
		$("#leads-lead-source-to").removeAttr("disabled");
	});

	$("#leads-lead-source-to").change(function () {
		if ($("#leads-lead-source-from").val()) {
			$("#leads-lead-source-btn-submit").css("display", "block");
		}
	});

	$("#btn-allocate , #btn-reallocate").click(function () {
		const partnerVal = $("#allocate-lead").val();
		if (partnerVal != "") {
			$("#btn-allocate-disabled").attr("hidden", false);
			$("#btn-allocate").attr("hidden", true);
			$("#btn-reallocate").attr("hidden", true);
			allocateLead(partnerVal, $("#allocate-lead option:selected").text());
		} else {
			Swal.fire("Oppss..", "Please select a partner!", "warning");
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
					initComplete: function (settings, json) {
						$(".datatable-leads-title").html("Leads");
						$(".datatable-leads-title").addClass("h1");
						$(".datatable-leads-title").css("color", "inherit");
					},
					data: leadRecords,
					columns: [
						{
							data: null,
							render: function (data, type, row) {
								return `${row.lead_id}`;
							},
						},
						{ data: "business_name" },
						{
						    data: null,
						    render: function(data, type, row) {
						        return row.phone_number + "<br>" + row.email_address
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
						{ data: "current_contract_ends" },
						{ data: "lead_source" },
						{
							data: null,
							render: function (data, type, row) {
								if (row.status == 1) return "Unallocated";
								else return "Allocated";
							},
						},
						{ data: "partner_name" },
						{
							data: null,
							render: function (data, type, row) {
								if (row.status == 1) {
									var alloBtn =
										'<button type="button" class="btn btn-secondary btn-sm w-100 " onclick="loadAllocateModal(\'' +
										encodeURIComponent(JSON.stringify(data)) +
										"')\">Allocate</button>";
								} else {
									var alloBtn =
										'<button type="button" class="btn btn-secondary btn-sm w-100 " onclick="loadReallocateModal(\'' +
										encodeURIComponent(JSON.stringify(data)) +
										"')\">Reallocate</button>";
								}
								return (
									'<button type="button" class="btn btn-success btn-sm w-100 " onclick="viewLeadRecord(' +
									row.sequence +
									')">View</button>' +
									alloBtn +
									'<button type="button" class="btn btn-danger btn-sm w-100 " onclick="archiveLead(' +
									row.sequence +
									')">Archive</button>'
								);
							},
						},
					],
					select: true,
					buttons: [
						{
							extend: "csv",
							text: "Export to CSV",
							filename: "Lead Record List",
						},
					],
					displayLength: 50,
					lengthMenu: [50, 75, 100],
					order: [],
				});
			}
		},
		error: function () {},
	});
}

function dashboardGraph(source = [0, 0, 0, 0]) {
	const ctx = document.getElementById("bar-chart-leads-lead-source");
	const xValues = ["Manual Entry", "Webform", "PPC", "Email Campaign"];
	const yValues = [source[0], source[1], source[2], source[3]];

	const configuration = {
		type: "bar",
		data: {
			labels: xValues,
			datasets: [
				{
					// label: '# of Leads',
					data: yValues,
					// borderWidth: 1
				},
			],
		},
		options: {
			plugins: {
				legend: {
					display: false,
				},
			},
			scales: {
				y: {
					beginAtZero: true,
				},
			},
			maintainAspectRatio: false,
		},
	};
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
			date_from: $("#hits-allocation-from").val(),
			date_to: $("#hits-allocation-to").val(),
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
			date_from: $("#leads-lead-source-from").val(),
			date_to: $("#leads-lead-source-to").val(),
		},
		success: function (response) {
			if (response) {
				dashboardGraph([
					response.manual_entry,
					response.webform,
					response.ppc,
					response.email_campaign,
				]);
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
		denyButtonText: `Cancel`,
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				type: "POST",
				url: url + "admin/archive-lead",
				dataType: "JSON",
				data: {
					lead_sequence: id,
				},
				success: function (response) {
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
						Swal.fire(response.message, "", "error");
					}
				},
			});
		} else if (result.isDenied) {
			Swal.fire("The lead is safe!", "", "info");
		}
	});
}

function loadAllocateModal(encryptedData) {
	const data = JSON.parse(decodeURIComponent(encryptedData));
	$("#allocate-lead-modal").modal("show");
	$(".unallocated-lead-label, #btn-allocate").attr("hidden", false);
	$(".allocate-title-modal").html("Allocate Lead " + data.lead_id);
	$(
		"#btn-allocate-disabled, .unallocated-bulk-lead-sublabel, .allocated-lead-label, #btn-reallocate, .unallocated-bulk-lead-label"
	).attr("hidden", true);
	$("#lead-sequence").val(data.sequence);
	$("#lead-status").val(data.status);
	loadAllPartners();
}

function loadReallocateModal(encryptedData) {
	const data = JSON.parse(decodeURIComponent(encryptedData));
	$("#allocate-lead-modal").modal("show");
	$(".allocated-lead-label span").html(data.partner_name);
	$(".allocated-lead-label").attr("hidden", false);
	$(".unallocated-lead-label").attr("hidden", true);
	$(".allocate-title-modal").html("Reallocate Lead " + data.lead_id);
	$("#btn-allocate").attr("hidden", true);
	$("#btn-reallocate").attr("hidden", false);
	$(
		"#btn-allocate-disabled, .allocated-bulk-lead-label, .bulk-lead-sublabel"
	).attr("hidden", true);
	$("#lead-sequence").val(data.sequence);
	$("#lead-status").val(data.status);
	loadAllPartners(data.partner_id);
}

function loadAllPartners(partnerId = 0) {
	var allocateOptions;
	$.ajax({
		type: "GET",
		url: url + "admin/load-all-partners",
		dataType: "JSON",
		data: {},
		success: function (response) {
			allocateOptions = '<option value=""></option>';
			for (const key in response.data) {
				if (partnerId != 0) {
					if (response.data[key]["partner_id"] != partnerId) {
						allocateOptions +=
							'<option value="' +
							response.data[key]["partner_id"] +
							'">' +
							response.data[key]["partner_name"] +
							"</option>";
					}
				} else {
					allocateOptions +=
						'<option value="' +
						response.data[key]["partner_id"] +
						'">' +
						response.data[key]["partner_name"] +
						"</option>";
				}
			}
			$("#allocate-lead").html(allocateOptions);
		},
	});
}

function allocateLead(partnerVal, partnerName) {
	const sequence = $("#lead-sequence").val();
	const lead_status = $("#lead-status").val();
	$.ajax({
		type: "POST",
		url: url + "admin/assign-partner",
		dataType: "JSON",
		data: {
			partner_id: partnerVal,
			lead_sequence: sequence,
			lead_status: lead_status,
			partner_name: partnerName,
		},
		success: function (response) {
			if (response.success) {
				Swal.fire(response.message, "", "success").then(() => {
					$("#btn-allocate-disabled").attr("hidden", true);
					$("#allocate-lead-modal").modal("hide");
					loadLeads();
				});
			} else {
				Swal.fire(response.message, "", "error");
			}
		},
	});
}
