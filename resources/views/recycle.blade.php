@extends('master', ['body_class' => 'layout-light side-menu overlayScroll'])
@section('title', 'Corbeille')
@section('content')
    <main class="main-content">
        <div class="contents expanded">
            {{--*HTML USER--}}
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center d-block">
                            <h1 class="badge-danger pl-2 pr-1 text-white rounded-pill mt-3">L'utilisateur supprimé</h1>
                        </div>
                        <div class="card mt-30">
                            <div class="card-body">
                                <div class="userDatatable global-shadow border-0 bg-white w-100">
                                    <div class="table-responsive">
                                        <div id="filter-form-container">
                                            <div class="row mb-2">
                                                <div class="col-8">
                                                    <!-- selct for searching-->
                                                    <select class  ="form-control" name="state" id="maxRows">
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
                                                    <th></th>
                                                    <th class="d-none"></th>
                                                    <th>
                                                        <span class="userDatatable-title">Nom</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Prénom</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Email</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Position</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Date de naissance</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Téléphone</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="user_tbody">

                                            </tbody>
                                        </table>

                                    </div>
                                    <!--		Start Pagination -->

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
            {{--! <!-- Modal DELETE member--> --}}
            <div class="modal fade" id="delete-member-ever" role="dialog" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content  radius-xl">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Supprimer l'utilisateur</h6>
                            <button type="button" class="btn-danger rounded-circle" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="new-member-modal">
                                    <div class="form-row">
                                        <div class="d-flex align-items-center justify-content-center col-12 mb-3"><span class="text-danger" data-feather="x-circle" width="90" height="90"></span></div>
                                        <h1 class="text-danger col-12 text-center mb-4">vous êtes sûr</h1>
                                        <p class="text-light col-12 text-center" style="font-size: 19px;">Êtes-vous prêt à supprimer définitivement le compte de cet utilisateur ? </p>
                                        <!--inputs-->
                                        <div class="form-group mb-20 col-md-12">
                                            <input type="hidden" class="form-control" id="id_del_ever">
                                        </div>

                                        <!--btns-->
                                        <div class="button-group d-flex pt-25 col-12">
                                            <button type="button" aria-label="Close" data-dismiss="modal"
                                                class="btn btn-success btn-default btn-close btn-squared fw-400 text-capitalize b-light col-md-4">Annulé
                                            </button>
                                            <button type="button"
                                                class="btn btn-danger btn-default btn-squared delete_evevr text-capitalize col-md-8">
                                                Supprimer
                                            </button>
                                            <button type="reset" class="d-none"></button>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modal DELETE member -->
            {{--todo Modal restor member--> --}}
            <div class="modal fade" id="restor-member" role="dialog" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content  radius-xl">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Restaurer l'utilisateur</h6>
                            <button type="button" class="btn-danger rounded-circle" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="new-member-modal">
                                <form method="POST" id="restor_user"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="d-flex align-items-center justify-content-center col-12 mb-3"><span class="text-warning" data-feather="refresh-ccw" width="90" height="90"></span></div>
                                        <h1 class="text-warning col-12 text-center mb-4">vous êtes sûr</h1>
                                        <p class="text-light col-12 text-center" style="font-size: 19px;">Êtes-vous prêt à restaurer cet utilisateur ? </p>
                                        <!--inputs-->
                                        <div class="form-group mb-20 col-md-12">
                                            <input type="hidden" class="form-control" id="id_recycle">
                                        </div>

                                        <!--btns-->
                                        <div class="button-group d-flex pt-25 col-12">
                                            <button type="button" aria-label="Close" data-dismiss="modal"
                                                class="btn btn-success btn-default btn-close btn-squared fw-400 text-capitalize b-light col-md-4">Annulé
                                            </button>
                                            <button type="submit"
                                                class="btn btn-warning btn-default btn-squared text-capitalize col-md-8">
                                                restaurer
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modal restor member -->

            {{--*HTML CLIENTS--}}
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center d-block">
                            <h1 class="badge-danger pl-2 pr-1 text-white rounded-pill mt-3">Client supprimé</h1>
                        </div>
                        <div class="card mt-30">
                            <div class="card-body">
                                <div class="userDatatable global-shadow border-0 bg-white w-100">
                                    <div class="table-responsive">
                                        <div id="filter-form-container">
                                            <div class="row mb-2">
                                                <div class="col-8">
                                                    <!-- selct for searching-->
                                                    <select class  ="form-control" name="state" id="maxRows">
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
                                                    <th></th>
                                                    <th class="d-none"></th>
                                                    <th>
                                                        <span class="userDatatable-title">Nom du client</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Nom de l'entreprise</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Email</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Téléphone</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Etat</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="client_tbody">

                                            </tbody>
                                        </table>

                                    </div>
                                    <!--		Start Pagination -->

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
            {{--! <!-- Modal DELETE CLIENT--> --}}
            <div class="modal fade" id="delete-client-ever" role="dialog" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content  radius-xl">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Supprimer l'utilisateur</h6>
                            <button type="button" class="btn-danger rounded-circle" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="new-member-modal">
                                    <div class="form-row">
                                        <div class="d-flex align-items-center justify-content-center col-12 mb-3"><span class="text-danger" data-feather="x-circle" width="90" height="90"></span></div>
                                        <h1 class="text-danger col-12 text-center mb-4">vous êtes sûr</h1>
                                        <p class="text-light col-12 text-center" style="font-size: 19px;">Êtes-vous prêt à supprimer définitivement le compte de cet utilisateur ? </p>
                                        <!--inputs-->
                                        <div class="form-group mb-20 col-md-12">
                                            <input type="hidden" class="form-control" id="delclient_ever">
                                        </div>

                                        <!--btns-->
                                        <div class="button-group d-flex pt-25 col-12">
                                            <button type="button" aria-label="Close" data-dismiss="modal"
                                                class="btn btn-success btn-default btn-close btn-squared fw-400 text-capitalize b-light col-md-4">Annulé
                                            </button>
                                            <button type="button"
                                                class="btn btn-danger btn-default btn-squared delclient_evevr text-capitalize col-md-8">
                                                Supprimer
                                            </button>
                                            <button type="reset" class="d-none"></button>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modal DELETE CLIENT -->
            {{--todo Modal restor CLIENT--> --}}
            <div class="modal fade" id="restor-client" role="dialog" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content  radius-xl">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Restaurer l'utilisateur</h6>
                            <button type="button" class="btn-danger rounded-circle" data-dismiss="modal" aria-label="Close">
                                <span data-feather="x"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="new-member-modal">
                                <form method="POST" id="restor_client"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="d-flex align-items-center justify-content-center col-12 mb-3"><span class="text-warning" data-feather="refresh-ccw" width="90" height="90"></span></div>
                                        <h1 class="text-warning col-12 text-center mb-4">vous êtes sûr</h1>
                                        <p class="text-light col-12 text-center" style="font-size: 19px;">Êtes-vous prêt à restaurer cet utilisateur ? </p>
                                        <!--inputs-->
                                        <div class="form-group mb-20 col-md-12">
                                            <input type="hidden" class="form-control" id="id_recycle_client">
                                        </div>

                                        <!--btns-->
                                        <div class="button-group d-flex pt-25 col-12">
                                            <button type="button" aria-label="Close" data-dismiss="modal"
                                                class="btn btn-success btn-default btn-close btn-squared fw-400 text-capitalize b-light col-md-4">Annulé
                                            </button>
                                            <button type="submit"
                                                class="btn btn-warning btn-default btn-squared text-capitalize col-md-8">
                                                restaurer
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modal restor CLIENT -->
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
<script src="{{ asset('import/assets/vendor_assets/js/paginaseach.js')}}"></script>
@section('script')
    <script>
        //!jquery crf
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
//code for users
        //*select users
        selectUsers();
        function selectUsers(){
            $.ajax({
                    type: "GET",
                    url: "/show_members_deleted",
                    dataType: "json",
                    success: function(response) {
                        $('#user_tbody').html("");
                        $.each(response.all_members, function(key, items) {
                            $('#user_tbody').append(`
                            <tr>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <a href="#"
                                                                    class="profile-image rounded-circle d-block m-0 wh-38"
                                                                    style="background-image:url('/import/profileImg/`+items.imgu+`'); background-size: cover;"></a>
                                                            </div>
                                                        </td>
                                                        <td class="d-none">
                                                            <p></p>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">`+items.nameu+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">`+items.lastnam+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">`+items.mail+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <div class="userDatatable-content">
                                                                    `+items.poost+`</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <div class="userDatatable-content">
                                                                    `+items.daten+`</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                `+(jQuery.trim(items.teel) ? items.teel : 'Aucun Numéro')+`
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ul class="list-group list-group-horizontal-sm">
                                                                <li>
                                                                    <button type="button" value="`+items.idu+`"
                                                                        class="btn editbtn21 edit">
                                                                        <i class="las la-sync text-warning circle-icon-warning"></i>
                                                                        </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" value="`+items.idu+`"
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
    //to recycle data and affected data to input id
    $(document).on('click', '.editbtn21', function() {
                    var user_id = $(this).val();
                    $('#restor-member').modal('show');
                    $('#id_recycle').val(user_id);
                });
    $(document).on('submit', '#restor_user', function (e) {
        e.preventDefault();
        let delformData = new FormData($('#restor_user')[0]);
        var id = $('#id_recycle').val();
        $.ajax({
            type: "POST",
            url: "/restor-user/"+id,
            data: delformData,
            contentType: false,
            processData: false,
            success: function (response){
                if (response.status == 200) {
                    $('#restor-member').modal('hide');
                    selectUsers();
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
    //to delete data and affected data to input id
    $(document).on('click', '.deletebtn21', function() {
                var user_id = $(this).val();
                $('#delete-member-ever').modal('show');
                $('#id_del_ever').val(user_id);
            });
    $(document).on('click', '.delete_evevr', function (e) {
                e.preventDefault();
                var id = $("#id_del_ever").val();
                $.ajax({
                    type: "DELETE",
                    url: "/delete-user-ever/"+id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404){
                           alert(response.message);
                           $('#delete-member-ever').modal('hide');
                        }else if(response.status == 200){
                            $('#delete-member-ever').modal('hide');
                            selectUsers();
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
                        }
                    }

                });
    });

//code for clients
selectClient();
        function selectClient(){
            $.ajax({
                    type: "GET",
                    url: "/show_clients_deleted",
                    dataType: "json",
                    success: function(response) {
                        $('#client_tbody').html("");
                        $.each(response.all_clients, function(key, items) {
                            $('#client_tbody').append(`
                            <tr>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <a href="#"
                                                                    class="profile-image rounded-circle d-block m-0 wh-38"
                                                                    style="background-image:url('/import/logoClient/`+items.img+`'); background-size: cover;"></a>
                                                            </div>
                                                        </td>
                                                        <td class="d-none">
                                                            <p></p>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">`+items.namec+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">`+items.entrep+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">`+items.mail+`</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <div class="userDatatable-content">
                                                                    `+items.tel+`</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <div class="userDatatable-content">
                                                                    `+(items.etat==1 ? 'Actife' : 'inactif')+`</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ul class="list-group list-group-horizontal-sm">
                                                                <li>
                                                                    <button type="button" value="`+items.id_client+`"
                                                                        class="btn editbtn22 edit">
                                                                        <i class="las la-sync text-warning circle-icon-warning"></i>
                                                                        </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" value="`+items.id_client+`"
                                                                        class="btn deletebtn22 remove">
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
//to recycle data and affected data to input id
$(document).on('click', '.editbtn22', function() {
                var user_id = $(this).val();
                $('#restor-client').modal('show');
                $('#id_recycle_client').val(user_id);
            });
$(document).on('submit', '#restor_client', function (e) {
     e.preventDefault();
     let delformData = new FormData($('#restor_client')[0]);
     var id = $('#id_recycle_client').val();
     $.ajax({
         type: "POST",
         url: "/restor-client/"+id,
         data: delformData,
         contentType: false,
         processData: false,
         success: function (response){
            if (response.status == 200) {
                $('#restor-client').modal('hide');
                selectClient();
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

//to delete data and affected data to input id
$(document).on('click', '.deletebtn22', function() {
                var user_id = $(this).val();
                $('#delete-client-ever').modal('show');
                $('#delclient_ever').val(user_id);
            });
    $(document).on('click', '.delclient_evevr', function (e) {
                e.preventDefault();
                var id = $("#delclient_ever").val();
                $.ajax({
                    type: "DELETE",
                    url: "/delete-client-ever/"+id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404){
                           alert(response.message);
                           $('#delete-client-ever').modal('hide');
                        }else if(response.status == 200){
                            $('#delete-client-ever').modal('hide');
                            selectClient();
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
                        }
                    }

                });
    });
});

</script>
@endsection
