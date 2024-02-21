var notif_ids = [];

$(document).ready(function () {
    loadNotif();

    $('#btn-clear-all').click(function() {
        $('#btn-clear-all').attr('hidden', true);
        $('#btn-clear-all-disabled').attr('hidden', false);
        $('#notification-head').empty();
        $('#notification-head').html('Notification');
        var toAppend = 
            '<div class="col-sm-12 text-center">'+
                '<label class="col-form-label">Your are all notified!</label>'+
            '</div>';
        $('#notifications-row').append(toAppend);
        notif_ids.forEach(element => {
            setNotifViewed(element);
        });
        $('#btn-clear-all').attr('hidden', false);
        $('#btn-clear-all-disabled').attr('hidden', true);
    });
});

function loadNotif() {
    var data;
    var count = 0;
    $.ajax({
        type: "GET",
        url: url + "admin/load-notif", 
        dataType: "JSON",
        data: {},
        success: function (response) {
            if (response) {
                $('#notifications-row').empty();
                response.data.forEach(element => {
                    notif_ids.push(element.n_notif_id);
                    data = 
                        '<div class="col-sm-8">'+
                            '<label class="col-form-label">'+element.notif_details+'</label>'+
                        '</div>'+
                        '<div class="col-sm-4 mb-1">'+
                            '<button class="btn btn-secondary btn-sm" onclick="setNotifViewed('+element.n_notif_id+')">Clear</button>'+
                            '<button class="btn btn-success btn-sm" ml-1 onclick="viewLeadRecord('+element.lead_sequence+','+element.n_notif_id+')">View</button>'+
                        '</div>';
                    $('#notifications-row').append(data);
                    count = count + 1;
                });
                if (count > 0) {
                    $('#notification-head').append(
                        '<span class="badge badge-pill badge-danger badge-up">'+count+'</span>'
                    );    
                } else {
                    $('#notification-head').empty();
                    $('#notification-head').html('Notification');
                    data = 
                        '<div class="col-sm-12 text-center">'+
                            '<label class="col-form-label">Your are all notified!</label>'+
                        '</div>';
                    $('#notifications-row').append(data);
                }
                
            }
        }
    });
}

function viewLeadRecord(id, notif_id) {
    setNotifViewed(notif_id);
    location.href = url_extended + "lead-record/" + id;
    
}

function setNotifViewed(notif_id) {
    $.ajax({
        type: "POST",
        url: url + "admin/set-notif",
        dataType: "JSON",
        data: {
            notif_id : notif_id
        },
        success: function(response) {
            if (response) {
                loadNotif();
            }
        }
        
    });
}