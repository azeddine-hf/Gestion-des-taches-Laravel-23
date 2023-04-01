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
                                                <span data-feather="activity" class="text-info" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-info"><span id="count_projects"></span></h4>
                                                <span class="badge-info pl-2 pr-2 rounded-pill" style="font-size: 15px;">Total Projets</span>
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
                                                <h4 class="mb-1 mt-1 text-success"><span id="project_done"></span></h4>
                                                <span class="badge-success pl-2 pr-2 rounded-pill" style="font-size: 15px;">Projet Terminé</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col-->
                                <div class="col-md-6 col-xl-3 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="alert-octagon" class="text-warning" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-warning"><span class="counter" id="waiting_project"></span></h4>
                                                <span class="badge-warning pl-2 pr-2 text-white rounded-pill" style="font-size: 15px;">Projet en cours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col--> 
                                <div class="col-md-6 col-xl-3 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="x-octagon" class="text-danger" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-danger"><span class="" id="faild_project"></span></h4>
                                                <span class="badge-danger text-white pl-2 pr-2 rounded-pill" style="font-size: 15px;">Projet annulé</span>
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
                                <a href="#" class="btn px-15 btn-success" data-toggle="modal" data-target="#new-projets">
                                    <i class="las la-plus fs-16"></i>Ajouter un Projet</a>
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
                                                    <option value="5000">Afficher TOUTES les lignes</option>
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
                                                    <span class="userDatatable-title">Projet</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">L'entreprise </span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Status</span>
                                                </th>
                                                <th>
                                                    <span class="userDatatable-title">Date de début</span>
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
        <div class="modal fade" id="edit-projet" role="dialog" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  radius-xl">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Modifier
                            Le Client</h6>
                        <button type="button" class="btn-danger rounded-circle" data-dismiss="modal"
                            aria-label="Close">
                            <span data-feather="x"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="new-member-modal">
                            <form method="POST" id="edit_projects"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <!--inputs-->
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="hidden" name="id_pr" id="id_proj2">
                                    </div>
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="text" id="nom_proj" name="nom_p" class="form-control"
                                            placeholder="Nom du projet">
                                    </div>
                                    {{--date range--}}
                                    <div class="form-group mb-20 col-md-12">
                                            <input type="text" class="form-control" id="date_proj"
                                                placeholder="Date de début" name="start_date"
                                                onfocus="(this.type='date')"
                                                onblur="(this.type='text')" >
                                    </div>
                                    {{--client select--}}
                                    <div class="form-group mb-20 col-md-12">
                                        <select name="clients" id="client_proj" class="form-control">
                                            <option selected disabled="disabled"  value="0">choisi un client</option>
                                            @foreach ($client as $data)
                                                <option value="{{$data->idcli}}">{{$data->entrep}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--status--}}
                                    <div class="form-group mb-20 col-md-12">
                                        <select name="project_status" id="status_proj" class="form-control">
                                            <option selected disabled="disabled"  value="">choisi status</option>
                                            <option value="terminé" >terminé</option>
                                            <option value="annulé" >annulé</option>
                                            <option value="en cours" >en cours</option>
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
        <!-- end Modal edit member -->
        {{--! <!-- Modal DELETE member--> --}}
        <div class="modal fade" id="delete-projet" role="dialog" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  radius-xl">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Supprimer le client</h6>
                        <button type="button" class="btn-danger rounded-circle" data-dismiss="modal" aria-label="Close">
                            <span data-feather="x"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="new-member-modal">
                            <form method="POST" id="delete_projects"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="d-flex align-items-center justify-content-center col-12 mb-3"><span class="text-danger" data-feather="x-circle" width="90" height="90"></span></div>
                                    <h1 class="text-danger col-12 text-center mb-4">vous êtes sûr</h1>
                                    <p class="text-light col-12 text-center" style="font-size: 19px;">Êtes-vous prêt à supprimer définitivement cette client ? </p>
                                    <!--inputs-->
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="hidden" class="form-control" id="id_projdel">
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
    <div class="modal fade new-project" id="new-projets" role="dialog" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true"
        style="backdrop-filter: blur(8px);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content  radius-xl">
                <div class="modal-header">
                    <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Ajouter Un
                        Projet</h6>
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
                        <form  id="ajout_projet">
                            @csrf
                            <div class="form-row">
                                <!--inputs-->
                                <div class="form-group mb-20 col-md-12">
                                    <input type="text" name="nom_p" class="form-control"
                                        placeholder="Nom du projet">
                                </div>
                                {{--date range--}}
                                <div class="form-group mb-20 col-md-12">
                                        <input type="text" class="form-control"
                                            placeholder="Date de début" name="start_date"
                                            onfocus="(this.type='date')"
                                            onblur="(this.type='text')" >
                                </div>
                                {{--client select--}}
                                <div class="form-group mb-20 col-md-12">
                                    <select name="clients" class="form-control">
                                        <option selected disabled="disabled"  value="0">choisi un client</option>
                                        @foreach ($client as $data)
                                            <option value="{{$data->idcli}}">{{$data->entrep}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{--status--}}
                                <div class="form-group mb-20 col-md-12">
                                    <select name="project_status" class="form-control">
                                        <option selected disabled="disabled"  value="">choisi status</option>
                                        <option value="terminé" >terminé</option>
                                        <option value="annulé" >annulé</option>
                                        <option value="en cours" >en cours</option>
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
<script>
    //!jquery crf
$(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
        //*select users
        selectProjects();
        function selectProjects(){
            $.ajax({
                    type: "GET",
                    url: "/show_projects",
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html("");
                         $('#count_projects').html(response.counts);
                         $('#project_done').html(response.done_pro);
                         $('#waiting_project').html(response.wait_pro);
                         $('#faild_project').html(response.faild_proj);
                        $.each(response.all_projets, function(key, items) {
                            if (items.petat === 'en cours') {
                                badgeClass = 'badge-warning pl-2 pr-1 text-white rounded-pill';
                            } else if (items.petat === 'terminé') {
                                badgeClass = 'badge-success pl-2 pr-1 text-white rounded-pill';
                            }else if (items.petat === 'annulé') {
                                badgeClass = 'badge-danger pl-2 pr-1 text-white rounded-pill';
                            }
                            $('tbody').append(`
                            <tr>
                                                     
                                                        <td>
                                                            <div class="userDatatable-content">`+items.pname+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">`+items.entrep+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content `+badgeClass+`">`+items.petat+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <div class="userDatatable-content">
                                                                    `+items.date_start+`</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ul class="list-group list-group-horizontal-sm">
                                                                <li>
                                                                    <button type="button" value="`+items.idp+`"
                                                                        class="btn editbtn21 edit">
                                                                        <i class="fa fa-pen text-warning circle-icon-warning"></i>
                                                                        </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" value="`+items.idp+`"
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
        $(document).on('submit', '#ajout_projet', function(e) {
                e.preventDefault();
                let formData = new FormData($('#ajout_projet')[0]);
                $.ajax({
                    type: "POST",
                    url: "/addprojects",
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
                            $('#ajout_projet').find('input').val('');
                            selectProjects();
                            setTimeout( function(){ dataTableonload(); }, 1500);
                            $('#new-projets').modal('hide');
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
                var projet_id = $(this).val();
                $('#edit-projet').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-projets/"+projet_id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404){
                            alert(response.message);
                            $('#edit-projet').modal('hide');
                        }else{
                            $('#id_proj2').val(projet_id);
                        $('#nom_proj').val(response.projets.nom_pro);
                        $('#date_proj').val(response.projets.date_p);
                        $('#status_proj').val(response.projets.etat_p);
                        $('#client_proj').val(response.projets.id_cli);
                        }

                    }
                });
            
            });

       // this for update form 
        $(document).on('submit', '#edit_projects', function (e) {
         e.preventDefault();
         var id2 = $('#id_proj2').val();
         let EditformData = new FormData($('#edit_projects')[0]);
         $.ajax({
         type: "POST",
         url: "/edit-projects/"+id2,
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
                $('#edit-projet').modal('hide');
                selectProjects();
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
                var projet_id = $(this).val();
                $('#delete-projet').modal('show');
                $('#id_projdel').val(projet_id);
    });
$(document).on('submit', '#delete_projects', function (e) {
     e.preventDefault();
     let delformData = new FormData($('#delete_projects')[0]);
     var id = $('#id_projdel').val();
     $.ajax({
         type: "POST",
         url: "/deleting-projects/"+id,
         data: delformData,
         contentType: false,
         processData: false,
         success: function (response){
            if (response.status == 200) {
                $('#delete-projet').modal('hide');
                selectProjects();
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
