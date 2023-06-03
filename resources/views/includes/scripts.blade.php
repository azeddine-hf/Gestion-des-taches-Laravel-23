{{-- <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDduF2tLXicDEPDMAtC6-NLOekX0A5vlnY"></script> --}}
<script src="{{ asset('import/assets/vendor_assets/js/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/jquery/jquery-ui.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/bootstrap/popper.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/moment/moment.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/accordion.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/autoComplete.js')}}"></script>
    {{-- <script src="{{ asset('import/assets/vendor_assets/js/Chart.min.js')}}"></script> --}}
    {{-- <script src="{{ asset('import/assets/vendor_assets/js/charts.js')}}"></script> --}}
    <script src="{{ asset('import/assets/vendor_assets/js/daterangepicker.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/drawer.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/dynamicBadge.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/dynamicCheckbox.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/feather.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/footable.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/fullcalendar@5.2.0.js')}}"></script>
    {{-- <script src="{{ asset('import/assets/vendor_assets/js/google-chart.js')}}"></script> --}}
    <script src="{{ asset('import/assets/vendor_assets/js/jquery-jvectormap-2.0.5.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/jquery.filterizr.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/jquery.mCustomScrollbar.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/jquery.peity.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/jquery.star-rating-svg.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/leaflet.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/leaflet.markercluster.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/loader.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/message.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/moment.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/muuri.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/notification.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/popover.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/select2.full.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/slick.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/trumbowyg.min.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/wickedpicker.min.js')}}"></script>
    <script src="{{ asset('import/assets/theme_assets/js/drag-drop.js')}}"></script>
    <script src="{{ asset('import/assets/theme_assets/js/footable.js')}}"></script>
    {{-- <script src="{{ asset('import/assets/theme_assets/js/full-calendar.js')}}"></script> --}}
    {{-- <script src="{{ asset('import/assets/theme_assets/js/googlemap-init.js')}}"></script> --}}
    {{-- <script src="{{ asset('import/assets/theme_assets/js/icon-loader.js')}}"></script> --}}
    <script src="{{ asset('import/assets/theme_assets/js/leaflet-init.js')}}"></script>
    <script src="{{ asset('import/assets/theme_assets/js/main.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/form-validation.init.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/fontawesome.init.js')}}"></script>
    <script src="{{ asset('import/assets/vendor_assets/js/toast.script.js')}}"></script>
    <script>

$(document).ready(function() {
    $.ajaxSetup({
          headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
    });
            loadUnseenMessages();
            function mayFuncToDate(dateString) {
                const now = moment();
                const date = moment(dateString);
                const diff = now.diff(date, 'seconds');
                const minutes = Math.floor(diff / 60);
                const hours = Math.floor(minutes / 60);
                const days = Math.floor(hours / 24);
                const weeks = Math.floor(days / 7);

                if (diff < 60) {
                    return "juste maintenant";
                } else if (minutes < 60) {
                    return `il y a ${minutes}m`;
                } else if (hours < 24) {
                    return `il y a ${hours} h`;
                } else if (days < 7) {
                    return `il y a ${days} jr`;
                } else {
                    return `il y a ${weeks} sm`;
                }
}
// for useen message notif
function loadUnseenMessages() {
    $.get('/notifications/unseen-messages', function (data) {
        // Update the total unseen messages count
        var totalUnseenMessagesCount = data.totalUnseenMessageCount;

        // Update the unseen messages count in the HTML
        $('.unseen-messages-count').text(totalUnseenMessagesCount);

        // Update the notifications list
        var notifications = '';
        if (data.totalUnseenMessageCount == 0) {
            notifications += '<li class="badge badge-light text-white rounded-pill ">Vous ñ\'avez pas de nouveau message</li>';
        }
        else{
            $.each(data.contacts, function (index, contact) {
                notifications += '<li class="author-online has-new-message">';
                notifications += `<div class="user-avater"><a href="#" class="profile-image rounded-circle d-block m-0 wh-38" style="background-image:url('/import/profileImg/` + contact.profile + `'); background-size: cover;"></a></div>`;
                notifications += '<div class="user-message"><p>';
                notifications += '<a href="/chat/' + contact.id + '" class="subject stretched-link text-truncate" style="max-width: 180px;">' + contact.name + ' ' + contact.lname + '</a>';
                notifications += '<span class="time-posted">' + mayFuncToDate(contact.datenow) + '</span></p>';
                notifications += '<p><span class="desc text-truncate fw-600" style="max-width: 215px;">' + contact.msg + '</span>';
                notifications += '<span class="msg-count badge-circle badge-success badge-sm">' + contact.unseenMessageCount + '</span></p></div>';
                notifications += '</li>';
            });            
        }
        $('.notifications-list').html(notifications);
        
    });
}
// this shows bell in icon message
function loadBellMsg() {
    $.get('/notifications/bell-messages', function (data) {
        var messageCount = data.messageCount;

        // Update the total unseen messages count

        // Add or remove the "nav-item-toggle" class based on the message count
        if (messageCount > 0) {
            $('#message_bell').addClass('nav-item-toggle');
        } else {
            $('#message_bell').removeClass('nav-item-toggle');
        }
    });
}
loadBellMsg();
//new added tasks today notif
function loadTodayTasks() {
    $.get('/notifications/today-tasks', function (data) {
        var tasksList = $('#notificationList');
        var notificationCount = $('#notificationCount');
        $("#count-notif").text(data.length);
        tasksList.empty(); // Clear the list before adding new tasks

        if (data.length == 0) {
            tasksList.append('<div class="col-12"><li class="text-center badge-light text-white pl-2 pr-2 rounded-pill mt-2 mb-2">Aucune tâche ajoutée aujourd\'hui.</li></div>');
        } else {
            var notifications = '';
            $.each(data, function(index, task) {
                var createdDate = mayFuncToDate(task.created_at);
                var badgeClass = (task.property === 'urgent') ? 'tag-danger' : 'tag-success';
                notifications += '<li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">';
                notifications += `<div class="nav-notification__type nav-notification__type--success">
                    <i class="fa fa-share"></i></div>`;
                notifications += '<div class="nav-notification__details">Vous avez une nouvelle tâche <p>';
                notifications += '<a href="{{url("mes-taches")}}" class="subject atbd-tag tag-transparented '+badgeClass+'" style="max-width: 180px;">'+task.property+'</a>';
                notifications += '<span></span></p>';
                notifications += '<p><span class="time-posted">'+createdDate+'</span></p>';
                notifications += '</div></li>';
            });
        $('#notificationList').html(notifications);
        }
        notificationCount.text(data.length);
    });
}
loadTodayTasks();
function loadBellnotif() {
    $.get('/notifications/bell-notification', function (data) {
        var tasksCount = data;

        // Update the total unseen messages count
        $('#notificationCount').text(tasksCount);

        // Add or remove the "nav-item-toggle" class based on the message count
        if (tasksCount > 0) {
            $('#notif_bell').addClass('nav-item-toggle');
        } else {
            $('#notif_bell').removeClass('nav-item-toggle');
        }
    });
}

loadBellnotif();
        });
</script>

