$(document).ready(function () {
	load_data();
	$("#member_profile_form").submit(function (event) {
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: url + "masterfile/member-profile",
			dataType: "JSON",
			data: $("#member_profile_form").serialize(),
			success: function (data) {
				if (data.success) {
					toastr.success(data.message, "Success!", {
						closeButton: true,
						tapToDismiss: true,
					});
					load_data();
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
function load_data(){
    $.ajax({
        type: "GET",
        url: url + "masterfile/member-profile-id",
        dataType: "JSON",
		data: {id : $('#user_id_passed').val()}, // get segmet for id
        success: function (data) {
            if(data.data.user_id){
				var data = data.data;
                $('input[name=user_id]').val(data.user_id);
                $('input[name=firstname]').val(data.firstname);
                $('input[name=middlename]').val(data.middlename);
                $('input[name=lastname]').val(data.lastname);
            }else{
				window.location.href = url + "masterfile/member-list";
			}
        },
        error: function () {},
    });
}
function delete_member() {
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
				data: { id: $('#user_id_passed').val() },
				success: function (data) {
					if (data.success) {
						Swal.fire("Deleted!", data.message, "success").then(function () {
							window.location.href = url + "masterfile/member-list";
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