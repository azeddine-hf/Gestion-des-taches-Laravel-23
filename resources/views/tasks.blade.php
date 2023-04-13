@extends('master', ['body_class' => 'layout-light side-menu overlayScroll'])
@section('title', 'Tȃches')
@section('content')
<main class="main-content">
    <div class="contents expanded">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                                {{--!this is small cards--}}
                                <div class="col-md-6 col-xl-3 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="alert-triangle" class="text-danger" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-danger"><span id="count_tsksimport"></span></h4>
                                                <span class="badge-danger text-white pl-2 pr-2 rounded-pill" style="font-size: 15px;">Tȃches importantes</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-md-6 col-xl-3 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="check-square" class="text-success" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-success"><span id="task_done"></span></h4>
                                                <span class="badge-success pl-2 pr-2 rounded-pill" style="font-size: 15px;">Tȃches Terminé</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-md-6 col-xl-3 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="tool" class="text-warning" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-warning"><span class="counter" id="waiting_tsks"></span></h4>
                                                <span class="badge-warning pl-2 pr-2 text-white rounded-pill" style="font-size: 15px;">Tȃches en cours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-md-6 col-xl-3 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="clock" class="text-secondary" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-secondary"><span class="" id="notyet_tsks"></span></h4>
                                                <span class="badge-secondary text-white pl-2 pr-2 rounded-pill" style="font-size: 15px;">Tȃches pas commencé</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-->

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-30">
                        <div class="card-body">
                            {{--*BTN Add Client--}}
                            <div class="action-btn col-md-3 mb-3">
                                <a href="#" class="btn px-15 btn-success" data-toggle="modal" data-target="#new-tasks">
                                    <i class="las la-plus fs-16"></i>Ajouter une Tȃches</a>
                            </div>
                            <div class="userDatatable global-shadow border-0 bg-white w-100">
                                <div class="table-responsive">
                                    <div id="filter-form-container">
                                        <div class="row mb-2">
                                            <div class="col-8">
                                                <!-- selct for searching-->
                                                <select class="form-control" name="state" id="maxRows">
                                                    <option value="10">10</option>
                                                    <option value="15">15</option>
                                                    <option value="20">20</option>
                                                    <option value="50">50</option>
                                                    <option value="70">70</option>
                                                    <option value="100">100</option>
                                                    <option value="5000">Afficher toutes les lignes</option>
                                                </select>
                                            </div>
                                            <!-- search input-->
                                            <div class="tb_search col-md-4">
                                                <input type="text" id="search_input_all"  placeholder="Rechercher.." class="form-control w-100">
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-class" id="table-id">
                                        <thead>
                                            <tr class="userDatatable-header">
                                                <th>
                                                    <span class="userDatatable-title">Description</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Projet </span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Concerné par</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Date début</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Date fin</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Status</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Importance</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Action</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                                </div>
                                <!--Start Pagination -->

                                <div class="pagination-container justify-content-center row mt-2">
                                    <nav>
                                    <ul class="pagination pagination-sm">
                                    <!--	code pagination  -->
                                    </ul>
                                    </nav>
                                </div>
                                 {{-- <div class="rows_count">Showing 11 to 20 of 91 entries</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--TODO <!-- Modal edit member--> --}}
        <div class="modal fade" id="edit-tasks" role="dialog" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  radius-xl">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Modifier
                            La Tȃches</h6>
                        <button type="button" class="btn-danger rounded-circle" data-dismiss="modal"
                            aria-label="Close">
                            <span data-feather="x"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="new-member-modal">
                            <form method="POST" id="edit_tasks"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <!--inputs-->
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="hidden" name="task_id" class="form-control" id="id_tsk">
                                    </div>
                                    <div class="form-group mb-20 col-md-12">
                                        <label class="form-label text-light">Description</label>
                                        <textarea class="form-control" name="desc_tsk"
                                        placeholder="Description de la tâche" rows="1" id="desc_task"></textarea>
                                    </div>
                                    {{--users select--}}
                                    <div class="form-group mb-20 col-md-6">
                                        <label class="form-label text-light">l'utilisateur concerné</label>
                                         <select name="user_tsk" class="form-control" id="use_select">
                                            <option selected disabled="disabled"  value="0">Choisir l'utilisateur concerné</option>
                                            @foreach ($users as $data)
                                                <option value="{{$data->idcli}}">{{$data->nameuser.' '.$data->lnameusr}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--projects select--}}
                                    <div class="form-group mb-20 col-md-6">
                                        <label class="form-label text-light">projet concerné</label>
                                        <select name="project_tsk" class="form-control" id="project_select">
                                           <option selected disabled="disabled"  value="0">Choisi le projet concerné</option>
                                           @foreach ($project as $data)
                                               <option value="{{$data->idpro}}">{{$data->nompro}}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                    {{--date range--}}
                                    <div class="form-group mb-20 col-md-6">
                                        <label class="form-label text-light" >Date de Début</label>
                                            <input type="text" class="form-control"
                                                placeholder="Date de début" name="startdate_task"
                                                onfocus="(this.type='date')"
                                                onblur="(this.type='text')" id="date_start">
                                    </div>
                                    <div class="form-group mb-20 col-md-6">
                                        <label class="form-label text-light">Date de fin(optionnel)</label>
                                        <input type="text" class="form-control"
                                            placeholder="Date de fin" name="endate_tastk"
                                            onfocus="(this.type='date')"
                                            onblur="(this.type='text')" id="date_end">
                                     </div>
                                    {{--status--}}
                                    <div class="form-group mb-20 col-md-12">
                                        <label class="form-label text-light">status</label>
                                        <select name="task_status" class="form-control" id="status_select">
                                            <option selected disabled="disabled"  value="">Sélectionnez status</option>
                                            <option value="terminé" >terminé</option>
                                            <option value="annulé" >annulé</option>
                                            <option value="pas commencé" >pas commencé</option>
                                            <option value="en cours" >en cours</option>
                                        </select>
                                    </div>
                                    {{--importance--}}
                                    <div class="form-group mb-20 col-md-12">
                                        <label class="form-label text-light">l'importance</label>
                                        <select name="task_import" class="form-control" id="import_select">
                                            <option selected disabled="disabled"  value="">Sélectionnez l'importance</option>
                                            <option value="urgent" >urgent</option>
                                            <option value="normal" >normal</option>
                                            <option value="pas important" >pas important</option>
                                        </select>
                                    </div>
                                    <!--btns-->
                                    <div class="button-group d-flex pt-25 col-12">
                                        <button type="reset"
                                            class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light col-md-4">Annulé
                                        </button>
                                        <button type="submit"
                                            class="btn btn-warning btn-default btn-squared text-capitalize col-md-8">
                                            Modifier
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal edit member -->
        {{--! <!-- Modal DELETE member--> --}}
        <div class="modal fade" id="delete-tasks" role="dialog" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  radius-xl">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Supprimer la Tȃche</h6>
                        <button type="button" class="btn-danger rounded-circle" data-dismiss="modal" aria-label="Close">
                            <span data-feather="x"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="new-member-modal">
                            <form method="POST" id="delete_tsks"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="d-flex align-items-center justify-content-center col-12 mb-3"><span class="text-danger" data-feather="x-circle" width="90" height="90"></span></div>
                                    <h1 class="text-danger col-12 text-center mb-4">vous êtes sûr</h1>
                                    <p class="text-light col-12 text-center" style="font-size: 19px;">Êtes-vous prêt à supprimer définitivement cette Tȃches ? </p>
                                    <!--inputs-->
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="hidden" class="form-control" id="id_deltasks">
                                    </div>

                                    <!--btns-->
                                    <div class="button-group d-flex pt-25 col-12">
                                        <button type="button" aria-label="Close" data-dismiss="modal"
                                            class="btn btn-success btn-default btn-close btn-squared fw-400 text-capitalize b-light col-md-4">Annulé
                                        </button>
                                        <button type="submit"
                                            class="btn btn-danger btn-default btn-squared text-capitalize col-md-8">
                                            Supprimer
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end Modal DELETE member -->
        {{--* <!-- Modal ADD new member--> --}}
    <div class="modal fade new-tasks" id="new-tasks" role="dialog" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true"
        style="backdrop-filter: blur(8px);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content  radius-xl">
                <div class="modal-header">
                    <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Ajouter Une Tȃches</h6>
                    <button type="button" class="btn-danger rounded-circle"
                        data-dismiss="modal" aria-label="Close">
                        <span data-feather="x"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--notification error-->
                    <div id="errorlist_user d-none"></div>
                    <!--notification error end-->
                    <div class="new-member-modal">
                        <form  id="ajout_tache">
                            @csrf
                            <div class="form-row">
                                <!--inputs-->
                                <div class="form-group mb-20 col-md-12">
                                    <label class="form-label text-light">Description</label>
                                    <textarea class="form-control" name="desc_tsk"
                                    placeholder="Description de la tâche" rows="1"></textarea>
                                </div>
                                {{--users select--}}
                                <div class="form-group mb-20 col-md-6">
                                    <label class="form-label text-light">l'utilisateur concerné</label>
                                     <select name="user_tsk" class="form-control">
                                        <option selected disabled="disabled"  value="0">Choisir l'utilisateur concerné</option>
                                        @foreach ($users as $data)
                                            <option value="{{$data->idcli}}">{{$data->nameuser.' '.$data->lnameusr}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--projects select--}}
                                <div class="form-group mb-20 col-md-6">
                                    <label class="form-label text-light">projet concerné</label>
                                    <select name="project_tsk" class="form-control">
                                       <option selected disabled="disabled"  value="0">Choisi le projet concerné</option>
                                       @foreach ($project as $data)
                                           <option value="{{$data->idpro}}">{{$data->nompro}}</option>
                                       @endforeach
                                   </select>
                               </div>
                                {{--date range--}}
                                <div class="form-group mb-20 col-md-6">
                                    <label class="form-label text-light" >Date de Début</label>
                                        <input type="text" class="form-control"
                                            placeholder="Date de début" name="startdate_task"
                                            onfocus="(this.type='date')"
                                            onblur="(this.type='text')" >
                                </div>
                                <div class="form-group mb-20 col-md-6">
                                    <label class="form-label text-light">Date de fin(optionnel)</label>
                                    <input type="text" class="form-control"
                                        placeholder="Date de fin" name="endate_tastk"
                                        onfocus="(this.type='date')"
                                        onblur="(this.type='text')" >
                                 </div>
                                {{--status--}}
                                <div class="form-group mb-20 col-md-12">
                                    <label class="form-label text-light">status</label>
                                    <select name="task_status" class="form-control">
                                        <option selected disabled="disabled"  value="0">Sélectionnez status</option>
                                        <option value="terminé" >terminé</option>
                                        <option value="pas commencé" >pas commencé</option>
                                        <option value="annulé" >annulé</option>
                                        <option value="en cours" >en cours</option>
                                    </select>
                                </div>
                                {{--importance--}}
                                <div class="form-group mb-20 col-md-12">
                                    <label class="form-label text-light">l'importance</label>
                                    <select name="task_import" class="form-control">
                                        <option selected disabled="disabled"  value="0">Sélectionnez l'importance</option>
                                        <option value="urgent" >urgent</option>
                                        <option value="normal" >normal</option>
                                        <option value="pas important" >pas important</option>
                                    </select>
                                </div>
                                <!--btns-->
                                <div class="button-group d-flex pt-25 col-12">
                                    <button type="reset"
                                        class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light col-md-4">Annulé
                                    </button>
                                    <button type="submit"
                                        class="btn btn-success btn-default btn-squared text-capitalize col-md-8">
                                        Ajouter
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal new member -->
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
<script src="{{ asset('import/assets/vendor_assets/js/paginaseach.js')}}"></script>
<script>
    //!jquery crf
 $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        //*select users
        selecttasks();
        function selecttasks(){
            $.ajax({
                    type: "GET",
                    url: "/show_tasks",
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html("");
                         $('#count_tsksimport').html(response.counts_import);
                         $('#task_done').html(response.done_tsk);
                         $('#waiting_tsks').html(response.wait_tsk);
                         $('#notyet_tsks').html(response.notyet_tsk);
                        $.each(response.all_tasks, function(key, items) {
                            //code for break line
                            var items = items;
                            var description = items.desctsk;
                            var words = description.split(' ');
                            var newDescription = '';
                            for (var i = 0; i < words.length; i++) {
                                newDescription += words[i] + ' ';
                                if (i > 0 && i % 7 === 0) {
                                    newDescription += '<br>';
                                }
                            }
                            //code for badges status
                            if (items.etatsk === 'en cours') {
                                badgeClass = 'badge-warning pl-2 pr-1 text-white rounded-pill';
                            } else if (items.etatsk === 'terminé') {
                                badgeClass = 'badge-success pl-2 pr-1 text-white rounded-pill';
                            }else if (items.etatsk === 'annulé') {
                                badgeClass = 'badge-primary pl-2 pr-1 text-white rounded-pill';
                            }else if (items.etatsk === 'pas commencé') {
                                badgeClass = 'badge-secondary pl-2 pr-1 text-white rounded-pill';
                            }
                            //code for badges importance
                            if (items.importsk === 'urgent') {
                                badgeClass2 = 'badge-danger pl-2 pr-1 text-white rounded-pill';
                            }else if (items.importsk === 'normal') {
                                badgeClass2 = 'badge-success pl-2 pr-1 text-white rounded-pill';
                            }else if (items.importsk === 'pas important') {
                                badgeClass2 = 'badge-info pl-2 pr-2 text-white rounded-pill';
                            }
                            $('tbody').append(`
                            <tr>

                                                        <td>
                                                            <div class="userDatatable-content">`+newDescription+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">`+items.projname+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content ">`+items.nomuser+` `+items.prenuser+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content ">`+items.tskstart+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content text-center">`+(jQuery.trim(items.tsksend) ? items.tsksend : '-')+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content `+badgeClass+`">`+items.etatsk+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <div class="userDatatable-content `+badgeClass2+`">
                                                                    `+items.importsk+` `+(items.importsk=='urgent' ? '<i class="las la-exclamation-circle"></i>' : '')+`</div>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ul class="list-group list-group-horizontal-sm">
                                                                <li>
                                                                    <button type="button" value="`+items.idtsk+`"
                                                                        class="btn editbtn21 edit">
                                                                        <i class="fa fa-pen text-warning circle-icon-warning"></i>
                                                                        </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" value="`+items.idtsk+`"
                                                                        class="btn deletebtn21 remove">
                                                                        <i class="fa fa-trash text-danger circle-icon-danger"></i>
                                                                        </button>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                            `);
                        });

                    }

            });
        }
        //to add data
        $(document).on('submit', '#ajout_tache', function(e) {
                e.preventDefault();
                let formData = new FormData($('#ajout_tache')[0]);
                $.ajax({
                    type: "POST",
                    url: "/addtasks",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status == 400) {
                            $.each(response.errors, function(key, err_value) {
                                $.Toast("Message Error!", err_value, "warning", {
                                        has_icon:true,
                                        has_close_btn:true,
                                        stack: true,
                                        fullscreen:false,
                                        halfscreen:true,
                                        timeout:6000,
                                        sticky:false,
                                        has_progress:true,
                                        rtl:false,
                                    });
                            });
                        }
                        else if(response.status == 200){
                            $('#ajout_tache').find('input').val('');
                            $('#ajout_tache').find('select').val('0');
                            $('#ajout_tache').find('textarea').val('');
                            selecttasks();
                            setTimeout( function(){ dataTableonload(); }, 1500);
                            $('#new-tasks').modal('hide');
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
                    }
                });
        });

         //! to edit data and affected data to input
        $(document).on('click', '.editbtn21', function() {
                var task_id = $(this).val();
                $('#edit-tasks').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-tasks/"+task_id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404){
                            alert(response.message);
                            $('#edit-tasks').modal('hide');
                        }else{
                            $('#id_tsk').val(task_id);
                        $('#desc_task').val(response.tasks.desc_t);
                        $('#use_select').val(response.tasks.who_is);
                        $('#project_select').val(response.tasks.who_proj);
                        $('#date_start').val(response.tasks.date_one);
                        $('#date_end').val(response.tasks.date_fin);
                        $('#status_select').val(response.tasks.etat_tsk);
                        $('#import_select').val(response.tasks.import_ts);
                        }
                    }
                });
        });
       // this for update form
    $(document).on('submit', '#edit_tasks', function (e) {
         e.preventDefault();
         var id2 = $('#id_tsk').val();
         let EditformData = new FormData($('#edit_tasks')[0]);
         $.ajax({
         type: "POST",
         url: "/edit-task/"+id2,
         data: EditformData,
         contentType: false,
         processData: false,
         success: function (response){
             if (response.status == 400) {
                $.each(response.errors, function(key, err_value) {
                                $.Toast("Message Error!", err_value, "warning", {
                                        has_icon:true,
                                        has_close_btn:true,
                                        stack: true,
                                        fullscreen:false,
                                        halfscreen:true,
                                        timeout:6000,
                                        sticky:false,
                                        has_progress:true,
                                        rtl:false,
                                    });
                            });
             }else if(response.status == 404){
                $.Toast("Message Error!", response.message, "warning", {
                                        has_icon:true,
                                        has_close_btn:true,
                                        stack: true,
                                        fullscreen:false,
                                        halfscreen:true,
                                        timeout:6000,
                                        sticky:false,
                                        has_progress:true,
                                        rtl:false,
                                    });
            }else if(response.status == 200){
                //hide modal
                $('#edit-tasks').modal('hide');
                selecttasks();
                setTimeout( function(){ dataTableonload(); }, 1500);
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
        }
            });
    });

    //to delete data and affected data to input id
 $(document).on('click', '.deletebtn21', function() {
                var tsk_id = $(this).val();
                $('#delete-tasks').modal('show');
                $('#id_deltasks').val(tsk_id);
    });
 $(document).on('submit', '#delete_tsks', function (e) {
     e.preventDefault();
     let delformData = new FormData($('#delete_tsks')[0]);
     var id = $('#id_deltasks').val();
     $.ajax({
         type: "POST",
         url: "/deleting-task/"+id,
         data: delformData,
         contentType: false,
         processData: false,
         success: function (response){
            if (response.status == 200) {
                $('#delete-tasks').modal('hide');
                selecttasks();
                setTimeout( function(){ dataTableonload(); }, 1500);
                    $.Toast("Message succés!", response.message, "error", {
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
             }else if (response.status == 404){
                    $.Toast("Message Error!", response.message, "warning", {
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
         }
     });
  });


 });



</script>
@endsection
