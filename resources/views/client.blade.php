@extends('master', ['body_class' => 'layout-light side-menu overlayScroll'])
@section('title', 'Client')
@section('content')
<main class="main-content">
    <div class="contents expanded">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                                {{--!this is small cards--}}
                                <div class="col-md-6 col-xl-4 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="users" class="text-info" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-info"><span id="count_client"></span></h4>
                                                <span class="badge-info pl-2 pr-2 rounded-pill" style="font-size: 15px;">Total Clients</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col--> 
                                <div class="col-md-6 col-xl-4 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="check-circle" class="text-success" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-success"><span class="counter" id="id_actif"></span></h4>
                                                <span class="badge-success pl-2 pr-2 rounded-pill" style="font-size: 15px;">Clien Actif</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col--> 
                                <div class="col-md-6 col-xl-4 mt-3">
                                    <div class="card" style="border-radius: 20px;">
                                        <div class="card-body">
                                            <div class="float-right mt-2">
                                                <span data-feather="alert-triangle" class="text-warning" width="40" height="40"></span>
                                            </div>
                                            <div>
                                                <h4 class="mb-1 mt-1 text-warning"><span class="" id="id_inactif"></span></h4>
                                                <span class="badge-warning text-white pl-2 pr-2 rounded-pill" style="font-size: 15px;">Client inActif</span>
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
                                <a href="#" class="btn px-15 btn-success" data-toggle="modal" data-target="#new-client">
                                    <i class="las la-plus fs-16"></i>Ajouter un Client</a>
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
        <div class="modal fade" id="edit-client" role="dialog" tabindex="-1"
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
                            <form method="POST" id="edit_clients"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <!--inputs-->
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="hidden" id="id_2" name="id_c" class="form-control"
                                            placeholder="Nom Client">
                                    </div>
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="text" id="name_c" name="nom_c" class="form-control"
                                            placeholder="Nom Client">
                                    </div>
                                    <div class="form-group mb-20 col-md-6">
                                        <input type="text" id="company_c" name="company" class="form-control"
                                            placeholder="Nom de l'entreprise" title="telephone">
                                    </div>
                                    <div class="form-group mb-20 col-md-6">
                                        <input type="text" id="tele_c" name="tel_c" class="form-control"
                                            placeholder="Téléphone">
                                    </div>
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="email" id="email_c" name="email_c" class="form-control"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group mb-20 col-md-12">
                                        <select class="form-control" name="etat" id="select_status">
                                            <option selected disabled="disabled"  value="">choisi status</option>
                                            <option value="0" >inactif</option>
                                            <option value="1" >actif</option>
                                        </select>
                                    </div>
                                    <!--profile upload-->
                                    <div class="file-upload w-100">
                                        <div class="file-select">
                                          <div class="file-select-button" id="fileName">Choisir le fichier</div>
                                          <div class="file-select-name" id="noFile">Aucun fichier choisi...</div>
                                          <input type="file" name="logo" id="chooseFile" >
                                        </div>
                                    </div>
                                      <div id="showimg"></div>

                                    <!--ends profile upload-->
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
        <div class="modal fade" id="delete-client" role="dialog" tabindex="-1"
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
                            <form method="POST" id="delete_clients"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="d-flex align-items-center justify-content-center col-12 mb-3"><span class="text-danger" data-feather="x-circle" width="90" height="90"></span></div>
                                    <h1 class="text-danger col-12 text-center mb-4">vous êtes sûr</h1>
                                    <p class="text-light col-12 text-center" style="font-size: 19px;">Êtes-vous prêt à supprimer définitivement cette client ? </p>
                                    <!--inputs-->
                                    <div class="form-group mb-20 col-md-12">
                                        <input type="hidden" class="form-control" id="id_delete">
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
    <div class="modal fade new-member" id="new-client" role="dialog" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true"
        style="backdrop-filter: blur(8px);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content  radius-xl">
                <div class="modal-header">
                    <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Ajouter Un
                        Client</h6>
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
                        <form  id="ajout_client">
                            @csrf
                            <div class="form-row">
                                <!--inputs-->
                                <div class="form-group mb-20 col-md-12">
                                    <input type="text" name="nom_c" class="form-control"
                                        placeholder="Nom Client">
                                </div>
                                <div class="form-group mb-20 col-md-6">
                                    <input type="text" name="company" class="form-control"
                                        placeholder="Nom de l'entreprise" title="telephone">
                                </div>
                                <div class="form-group mb-20 col-md-6">
                                    <input type="text" name="tel_c" class="form-control"
                                        placeholder="Téléphone">
                                </div>
                                <div class="form-group mb-20 col-md-12">
                                    <input type="email" name="email_c" class="form-control"
                                        placeholder="Email">
                                </div>
                                {{-- <div class="form-group mb-20 col-md-12">
                                    <select class="form-control">
                                        <option selected disabled="disabled"  value="">choisi status</option>
                                        <option value="inactif" >inactif</option>
                                    </select>
                                </div> --}}
                                <!--logo upload-->
                                <div class="atbd-upload col-md-12">
                                    <div class="atbd-upload__button ">
                                        <a href="javascript:void(0)"
                                            class="btn btn-lg btn-outline-lighten btn-upload w-100"
                                            onclick="$('#upload-1').click()"> <span
                                                data-feather="upload"></span> Télécharger
                                            Logo</a>
                                        <input type="file" class="upload-one" id="upload-1"
                                            name="logo">
                                        <div class="invalid-feedback text-center fw-bolder">
                                            Choisi Un Logo
                                        </div>
                                    </div>
                                    <div class="atbd-upload__file">
                                        <ul>

                                        </ul>
                                    </div>
                                </div>
                                <!--ends logo upload-->
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
        selectClient();
        function selectClient(){
            $.ajax({
                    type: "GET",
                    url: "/show_clients",
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html("");
                         $('#count_client').html(response.counts);
                         $('#id_actif').html(response.actif);
                         $('#id_inactif').html(response.inactif);
                        $.each(response.all_clients, function(key, items) {
                            $('tbody').append(`
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
                                                                        class="btn editbtn21 edit">
                                                                        <i class="fa fa-pen text-warning circle-icon-warning"></i>
                                                                        </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" value="`+items.id_client+`"
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
        $(document).on('submit', '#ajout_client', function(e) {
                e.preventDefault();
                let formData = new FormData($('#ajout_client')[0]);
                $.ajax({
                    type: "POST",
                    url: "/addclients",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status2 == 400) {
                            $.each(response.errors2, function(key, err_value) {
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
                        else if(response.status2 == 200){
                            $('#ajout_client').find('input').val('');
                            document.getElementById('this_li').remove();
                            selectClient();
                            setTimeout( function(){ dataTableonload(); }, 1500);
                            $('#new-client').modal('hide');
                            $.Toast("Message succés!", response.message2, "success", {
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
                var user_id = $(this).val();
                $('#edit-client').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-client/"+user_id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404){
                            alert(response.message);
                            $('#edit-client').modal('hide');
                        }else{
                            $('#id_2').val(user_id);
                        $('#name_c').val(response.client.nom_client);
                        $('#company_c').val(response.client.company);
                        $('#email_c').val(response.client.email);
                        $('#tele_c').val(response.client.telephone);
                        $('#post1').val(response.client.jobTitle);
                        $('#tel1').val(response.client.telephone);
                        $('#select_status').val(response.client.status);
                        $("#showimg").html(`<img src="import/logoClient/${response.client.logo}" alt="" class="avatar avatar-light avatar-lg avatar-circle mt-2">`);
                        }

                    }
                });
            });

            // this for update form
        $(document).on('submit', '#edit_clients', function (e) {
         e.preventDefault();
         var id2 = $('#id_2').val();
         let EditformData = new FormData($('#edit_clients')[0]);
         $.ajax({
         type: "POST",
         url: "/edit-clients/"+id2,
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
                //for remove input value
                var fileInput = document.getElementById("chooseFile");
                fileInput.value = "";
                $(".file-upload").removeClass('active');
                $("#noFile").text("Aucun fichier choisi...");
                //hide modal
                $('#edit-client').modal('hide');
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
            }
         }
            });
        });
    
 //to delete data and affected data to input id
    $(document).on('click', '.deletebtn21', function() {
                var user_id = $(this).val();
                $('#delete-client').modal('show');
                $('#id_delete').val(user_id);
            });

    $(document).on('submit', '#delete_clients', function (e) {
     e.preventDefault();
     let delformData = new FormData($('#delete_clients')[0]);
     var id = $('#id_delete').val();
     $.ajax({
         type: "POST",
         url: "/deleting-clients/"+id,
         data: delformData,
         contentType: false,
         processData: false,
         success: function (response){
            if (response.status == 200) {
                $('#delete-client').modal('hide');
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

//* file upload in popup update
var form = document.getElementById("edit_clients");
  var fileInput = document.getElementById("chooseFile");

  form.addEventListener("reset", function() {
    fileInput.value = "";
    $(".file-upload").removeClass('active');
      $("#noFile").text("Aucun fichier choisi...");
  });
$('#chooseFile').bind('change', function () {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
      $(".file-upload").removeClass('active');
      $("#noFile").text("Aucun fichier choisi...");
    }
    else {
      $(".file-upload").addClass('active');
      $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
  });

    });//end function ready
</script>
@endsection
