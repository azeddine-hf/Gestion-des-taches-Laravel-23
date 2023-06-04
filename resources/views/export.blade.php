@extends('master', ['body_class' => 'layout-light side-menu overlayScroll'])
@section('title', 'Exporter Les Tâches')
@section('content')
<main class="main-content">
    <div class="contents expanded">

        <div class="container-fluid">
            <div class="social-dash-wrap mt-4">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="exportDatatable userDatatable orderDatatable global-shadow border py-30 bg-white radius-xl w-100 mb-30">
                            <div class="project-top-wrapper mb-25 mt-n10 px-sm-30 px-20 ">
                                <div class="mt-10">
                                    <form action="{{ route('export.tskuser') }}" method="GET">
                                        <div class="form-row d-flex align-items-end">
                                            <div class="form-group mb-20 col-md-6">
                                                <label for="select-search">Choisi Un Member :</label>
                                                <div class="atbd-select-list">
                                                    <div class="atbd-select ">
                                                       <select name="user_id" id="select-search" class="form-control text-capitalize">
                                                            <option selected disabled>Choisi Un Member</option>
                                                            @foreach ($users as $user)
                                                                <option value="{{ $user->id }}" class="text-capitalize">
                                                                    {{ $user->nom.' '.$user->prenom }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-20 col-md-6">
                                                <label for="filter">Filtrer Par Semaine :</label>
                                                <select class="form-control" name="filter" id="filter">
                                                    <option value="">Toutes Les Semaines</option>
                                                    <option value="current_week">Cette Semaine</option>
                                                    <option value="last_week">La Semaine Dernière</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-20 col-md-12">
                                                <table id="info_user" class="table mb-0 table-hover w-100">
                                                    <tbody></tbody>
                                                </table>
                                            </div>
                                            
                                            <div class="form-group mb-20 col-md-12">
                                                <button type="submit" class="btn btn-primary btn-default btn-rounded btn-transparent-success  w-100">
                                                    <span data-feather="download"></span>Exporter Les Tȃches</button>
                                                <button type="reset" class="d-none"></button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive">
                                        <table id="task_table" class="table mb-0 table-hover table-borderless border-0 px-30 pb-30">
                                            <thead>
                                                <tr class="userDatatable-header">
                                                    <th>
                                                        <span class="userDatatable-title">Description</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Status</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Importance</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" class="text-center text-light">Choisi un member!</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    $(document).ready(function() {
    $('#select-search, #filter').change(function() {
        var userId = $('#select-search').val();
        var filter = $('#filter').val();
        $.ajax({
            type: "GET",
            url: "/tasks/user/" + userId,
            data: { filter: filter },
            dataType: "json",
            success: function(response) {
                var tasks = response.tasks;
                var tableBody = $('#task_table tbody');
                tableBody.empty();
                var div1 = $('#info_user');
                div1.empty(); // Clear the div content before appending new data
                var div = $('<tr>');
                var hasTasks = tasks.length > 0;
                if (hasTasks) {
                        $.each(tasks, function(index, task) {
                            if (index === 0) {
                                div.append($('<td>').html(`<a href="#" class="profile-image rounded-circle d-inline-block m-0 wh-38" style="background-image:url('/import/profileImg/${task.profile}'); background-size: cover;"></a>`));
                                div.append($('<td class="text-capitalize">').text(task.nom + ' ' + task.prenom));
                                div.append($('<td>').text(task.email));
                                div.append($('<td>').text(task.jobTitle));
                                }
                                var row = $('<tr>');
                                row.append($('<td>').text(task.desc_task));
                                
                                // Add class to task.status based on its value
                                var statusClass = task.status === 'en cours' ? 'badge-warning' : 'badge-success';
                                row.append($('<td>').html(`<span class="badge rounded-pill ${statusClass}">${task.status}</span>`));
                                
                                // Add class to task.property based on its value
                                var propertyClass = task.property === 'urgent' ? 'badge-danger' : 'badge-primary';
                                row.append($('<td>').html(`<span class="badge rounded-pill ${propertyClass}">${task.property}</span>`));
                                
                                tableBody.append(row);
                            });
                }else {
                    tableBody.append($('<tr>').append($('<td colspan="3" class="text-center text-light">').text('Aucune tâche')));
                }
                div1.append(div);
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});



</script>

@endsection