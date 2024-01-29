$(document).ready(function () {
	load_data();
	$("#modal_form").submit(function (event) { //for saving from form id = modal_form
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: url + "masterfile/member-list", // call backend controller masterfile.php -> member_list_post function
			dataType: "JSON",
			data: $("#modal_form").serialize(), // serialize call all inputs of form modal_form
			success: function (data) {
				if (data.success) {
					toastr.success(data.message, "Success!", {
						closeButton: true,
						tapToDismiss: true,
					});
					$("#page_modal").modal("hide"); // hide the adding form modal
					load_data(); // call load data function after success saving
				} else {
					toastr.warning(data.message, "Warning!", {
						closeButton: true,
						tapToDismiss: true,
					});
				}
			},
			error: function () {},
		});
	});
});
function add_modal() {
	document.getElementById("modal_form").reset();
	$("#modal_label").text("Add Member");
	$("#page_modal").modal({backdrop: 'static', keyboard: false});
}
function load_data() {
	// this will display datatable
	$("#page_table").DataTable().destroy();
	$("#page_table").DataTable({
		dom: '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
		responsive: true,
		ordering: false,
		pageLength: 25,
		columnDefs: [
			{
				className: "text-center", 
				targets: [3]
			},
		],
		ajax: {
			url: url + "masterfile/member-list-all", // url to call controller backend
			type: "GET",
		},
		columns: [ // columns will call the names of the return data from backend
			{ data: "firstname" },
			{ data: "middlename" },
			{ data: "lastname" },
			{
				data: null,
				render: function (data, type, row) { // this render is for adding button to datatable
					return (
						'<a class="mr-50" href="'+url+'masterfile/member-profile/'+row.id+'"><span class="badge badge-pill badge-light-info">' +
						feather.icons["eye"].toSvg({ class: "font-small-4 mr-50" }) +
						"View Profile</span></a>" +
						'<a class="mr-50" onclick="delete_modal(\'' +
						row.id +
						'\')"><span class="badge badge-pill badge-light-danger">' +
						feather.icons["trash"].toSvg({ class: "font-small-4 mr-50" }) +
						"Delete Member</span></a>"
					);
				},
				orderable: false,
			},
		],
		buttons: [  // this button is the Add Member button
			{
				text:
					feather.icons["plus"].toSvg({ class: "mr-50 font-small-4" }) +
					"Add Member",
				className: "create-new btn btn-outline-info round",
				attr: {
					onclick: "add_modal()",
				},
				init: function (api, node, config) {
					$(node).removeClass("btn-secondary");
				},
			},
		],
	});
	$("div.head-label").html('<h6 class="mb-0">List of Members</h6>'); // title of datatable
}
function delete_modal(id) {
	Swal.fire({
		title: "Are you sure?",
		text: "You won't be able to revert this!",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Yes, delete it!",
	}).then((result) => {
		if (result.isConfirmed) {
			$.ajax({
				type: "DELETE",
				url: url + "masterfile/member-list",
				dataType: "JSON",
				data: { id: id },
				success: function (data) {
					if (data.success) {
						Swal.fire("Deleted!", data.message, "success").then(function () {
							load_data();
						});
					} else {
						Swal.fire("Error!", data.message, "warning");
					}
				},
				error: function () {},
			});
		}
	});
}
