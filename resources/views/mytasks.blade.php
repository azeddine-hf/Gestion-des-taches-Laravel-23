@extends('master', ['body_class' => 'layout-light side-menu overlayScroll'])
@section('title', 'Mes tâches')
@section('content')
<main class="main-content">
    <div class="contents expanded">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="todo-breadcrumb">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Mes Tȃches </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card mb-25">
                        <div class="card-header">
                            <span class="atbd-tag tag-warning tag-transparented" style="font-size:19px;">Mes tâches en cours..</span>
                        </div>
                        <div class="card-body px-0 pt-15 pb-25">
                            <div class="todo-task table-responsive todo-task1">
                                <table class="table table-borderless">
                                    <tbody id="wait_tasks">

                                    </tbody>
                                </table>
                                <button class="btn w-100 btn-success update_waiting" disabled>J'ai terminé ces tâches</button>

                            </div>
                        </div>
                    </div>
                    <div class="card mb-25">
                        <div class="card-header">
                            <span class="atbd-tag tag-success tag-transparented" style="font-size:19px;">Mes tâches teminé</span>
                        </div>
                        <div class="card-body px-0 pt-15 pb-25">
                            <div class="todo-task table-responsive todo-task1">
                                <table class="table table-borderless">
                                    <tbody id="done_tasks">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ends: col-xl-6 -->
            </div>
        </div>
        <button type="reset" class="d-none"></button>
    </div>



</main>
<div id="overlayer">
    <span class="loader-overlay">
        <div class="atbd-spin-dots spin-lg">
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
            <span class="spin-dot badge-dot dot-primary"></span>
        </div>
    </span>
</div>
<div class="overlay-dark-sidebar show"></div>

@endsection
@section('script')
<script>
     //!jquery crf
$(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
//*show done tasks
showTasksDone();
        function showTasksDone(){
            $.ajax({
                    type: "GET",
                    url: "/show_done_tasks",
                    dataType: "json",
                    success: function(response) {
                        $('#done_tasks').html("");
                        $.each(response.done_tasks, function(key, items) {
                            $('#done_tasks').append(`
                            <tr class="todo-list ptl--hover draggable" draggable="true">
                                            <td>
                                                <div class="checkbox-group d-flex">
                                                    <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                        <input class="checkbox" type="checkbox" id="check-grp-td`+items.idtsk+`" checked disabled>
                                                        <label for="check-grp-td`+items.idtsk+`" class="fs-14 color-primary strikethrough">
                                                            `+items.desctsk+`
                                                        </label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="todo-list__right">
                                                    <ul class="d-flex align-content-center justify-content-end">
                                                        <li>
                                                            <a href="#" class="plus">
                                                                <span data-feather="move"></span>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                            `);
                        });

                    }

            });
        }
    //*show waiting tasks
    showTasksWaiting();
    function mayFuncToDate(dateString) {
    var now = moment();
    var date = moment(dateString);
    var diff = now.diff(date, 'seconds');
    var minutes = Math.floor(diff / 60);
    var hours = Math.floor(minutes / 60);
    var days = Math.floor(hours / 24);
    var weeks = Math.floor(days / 7);

    if (diff < 60) {
        return "juste maintenant";
    } else if (minutes < 60) {
        return "il y a " + minutes + "m";
    } else if (hours < 24) {
        return "il y a " + hours + "h";
    } else if (days < 7) {
        return "il y a " + days + "jr";
    } else {
        return "il y a " + weeks + "sm";
    }
}

function showTasksWaiting() {
    $.ajax({
        type: "GET",
        url: "/show_wait_tasks",
        dataType: "json",
        success: function(response) {
            $('#wait_tasks').html("");
            $.each(response.tasks_waiting, function(key, task) {
                // Code for badges importance
                var badgeClass2;
                if (task.importsk === 'urgent') {
                    badgeClass2 = 'atbd-tag tag-danger tag-transparented';
                } else if (task.importsk === 'normal') {
                    badgeClass2 = 'atbd-tag tag-success tag-transparented';
                } else if (task.importsk === 'pas important') {
                    badgeClass2 = 'atbd-tag tag-info tag-transparented';
                }

                var daterang = mayFuncToDate(task.data_now);

                $('#wait_tasks').append(`
                    <tr class="todo-list ptl--hover draggable" draggable="true">
                        <td>
                            <div class="checkbox-group d-flex">
                                <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                    <input class="checkbox check-waiting" type="checkbox" value="${task.idtsk}" id="check-grp-td${task.idtsk}">
                                    <label for="check-grp-td${task.idtsk}" class="fs-14 color-primary strikethrough">
                                        ${task.desctsk}
                                    </label>&nbsp;
                                </div>
                                <span class="text-danger fw-700">${task.tsksend ? ' Date limite !'+'&nbsp;<span class="badge badge-round badge-light text-white">'+task.tsksend+'</span>' : '<span class="badge badge-round badge-light text-white">N\'a pas de date limite</span>'}</span>

                            </div>
                        </td>
                        <td>
                            <div class="todo-list__right">
                                <ul class="d-flex align-content-center justify-content-end">
                                    <li class="${badgeClass2}">${task.importsk}</li>
                                    <li><span class="atbd-tag tag-primary tag-transparented">${daterang}</span></li>
                                    <li>
                                        <a href="#" class="plus">
                                            <span data-feather="move"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                `);

            });
        }
    });
}




        $(document).on('click', '.check-waiting', function() {
        if($('.check-waiting:checked').length > 0){
            $('.update_waiting').removeAttr('disabled');

        }else{
            $('.update_waiting').attr('disabled',true);
        }
        var checkedTasks = [];

        $('.check-waiting:checked').each(function() {
            checkedTasks.push($(this).val());
        });

});
$(document).on('click', '.update_waiting', function() {
    var checkedTasks = [];

    $('.check-waiting:checked').each(function() {
        checkedTasks.push($(this).val());
    });

    // Show a confirmation dialog
    if(confirm("Ces tâches sélectionnées seront remplacées par des tâches terminées?","Confirmation")) {
        $.ajax({
            type: 'POST',
            url: '/update_tasks',
            data: {
                'task_ids': checkedTasks
            },
            success: function(response) {
                showTasksWaiting();
                showTasksDone();
                $('.update_waiting').attr('disabled',true);
                $.Toast("Message succés!", response.message, "success", {
                                        has_icon:true,
                                        has_close_btn:true,
                                        stack: true,
                                        fullscreen:true,
                                        halfscreen:false,
                                        timeout:10000,
                                        sticky:false,
                                        has_progress:true,
                                        rtl:false,
                                    });
            }
        });
    }
});

    });


</script>
@endsection
