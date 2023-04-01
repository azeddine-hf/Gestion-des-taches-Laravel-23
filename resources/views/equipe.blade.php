@extends('master', ['body_class' => 'layout-light side-menu overlayScroll'])
@section('title', 'Equipe')
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
                                            <span data-feather="users" class="text-secondary" width="40" height="40"></span>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1 text-secondary"><span id="count_users"></span></h4>
                                            <span class="badge-secondary text-white pl-2 pr-2 rounded-pill" style="font-size: 15px;">Nombre D'équipe</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col--> 
                            <div class="col-md-6 col-xl-4 mt-3">
                                <div class="card" style="border-radius: 20px;">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <span data-feather="user-check" class="text-success" width="40" height="40"></span>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1 text-success"><span class="counter" id="admins9"></span></h4>
                                            <span class="badge-success pl-2 pr-2 rounded-pill" style="font-size: 15px;">Admin</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col--> 
                            <div class="col-md-6 col-xl-4 mt-3">
                                <div class="card" style="border-radius: 20px;">
                                    <div class="card-body">
                                        <div class="float-right mt-2">
                                            <span data-feather="user" class="text-primary" width="40" height="40"></span>
                                        </div>
                                        <div>
                                            <h4 class="mb-1 mt-1 text-primary"><span class="" id="users9"></span></h4>
                                            <span class="badge-primary text-white pl-2 pr-2 rounded-pill" style="font-size: 15px;">Utilisateur</span>
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
                                {{--? button add member to show modal--}}
                                <div class="action-btn col-md-3 mb-4">
                                    <a href="#" class="btn px-15 btn-success" data-toggle="modal" data-target="#new-member">
                                        <i class="las la-plus fs-16"></i>Ajouter un member</a>
                                </div>
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
                                            <tbody>

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
            {{--TODO <!-- Modal edit member--> --}}
            <div class="modal fade" id="edit-member" role="dialog" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true" style="backdrop-filter: blur(8px);">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content  radius-xl">
                        <div class="modal-header">
                            <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Modifier
                                l'utilisateur</h6>
                            <button type="button" class="btn-danger rounded-circle" data-dismiss="modal"
                                aria-label="Close">
                                <span data-feather="x"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="new-member-modal">
                                <form method="POST" id="edit_users"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <!--inputs-->
                                        <div class="form-group mb-20 col-md-12">
                                            <input type="hidden" name="user_id" class="form-control" id="id1">
                                        </div>
                                        <div class="form-group mb-20 col-md-6">
                                            <input type="text" name="nom" class="form-control" id="nom1"
                                                placeholder="Nom" value="">
                                        </div>
                                        <div class="form-group mb-20 col-md-6">
                                            <input type="text" name="prenom" class="form-control" id="prenom1"
                                                placeholder="Prénom">
                                        </div>
                                        <div class="form-group mb-20 col-md-6">
                                            <input type="text" name="tel" class="form-control" id="tel1"
                                                placeholder="Téléphone" title="telephone">
                                            <div class="invalid-feedback">
                                                <small>Exemple : +212600000000 or 0600000000</small>
                                            </div>
                                        </div>
                                        <div class="form-group mb-20 col-md-6">
                                            <input type="text" name="post" class="form-control" id="post1"
                                                placeholder="Post">
                                        </div>
                                        <div class="form-group mb-20 col-md-6">
                                            <input type="email" name="email" class="form-control" id="email1"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group mb-20 col-md-6">
                                            <input type="password" name="pass" class="form-control" id="pass2"
                                                placeholder="Mot de pass">
                                        </div>
                                        <!-- date picker-->
                                        <div class="col-md-12 mb-20">
                                            <input class="form-control" type="text" name="dateness" id="date1"
                                                placeholder="Date de naissance" onfocus="(this.type='date')"
                                                onblur="(this.type='text')">
                                        </div>
                                        <!-- ends  date picker-->
                                        <!--profile upload-->
                                        <div class="file-upload w-100">
                                            <div class="file-select">
                                              <div class="file-select-button" id="fileName">Choisir le fichier</div>
                                              <div class="file-select-name" id="noFile">Aucun fichier choisi...</div>
                                              <input type="file" name="profile2" id="chooseFile" >
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
            <div class="modal fade" id="delete-member" role="dialog" tabindex="-1"
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
                                <form method="POST" id="delete_user"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="d-flex align-items-center justify-content-center col-12 mb-3"><span class="text-danger" data-feather="x-circle" width="90" height="90"></span></div>
                                        <h1 class="text-danger col-12 text-center mb-4">vous êtes sûr</h1>
                                        <p class="text-light col-12 text-center" style="font-size: 19px;">Êtes-vous prêt à supprimer définitivement le compte de cet utilisateur ? </p>
                                        <!--inputs-->
                                        <div class="form-group mb-20 col-md-12">
                                            <input type="hidden" class="form-control" id="id_del">
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
        <div class="modal fade new-member" id="new-member" role="dialog" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true"
            style="backdrop-filter: blur(8px);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  radius-xl">
                    <div class="modal-header">
                        <h6 class="modal-title fw-bolder" id="staticBackdropLabel">Ajouter Un
                            Utilisateur</h6>
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
                            <form  id="ajout_user"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <!--inputs-->
                                    <div class="form-group mb-20 col-md-6">
                                        <input type="text" name="nom" class="form-control"
                                            placeholder="Nom">
                                    </div>
                                    <div class="form-group mb-20 col-md-6">
                                        <input type="text" name="prenom" class="form-control"
                                            placeholder="Prénom">
                                    </div>
                                    <div class="form-group mb-20 col-md-6">
                                        <input type="number" name="tel" class="form-control"
                                            placeholder="Téléphone" title="telephone">
                                    </div>
                                    <div class="form-group mb-20 col-md-6">
                                        <input type="text" name="post" class="form-control"
                                            placeholder="Post">
                                    </div>
                                    <div class="form-group mb-20 col-md-6">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group mb-20 col-md-6">
                                        <input type="password" name="pass" class="form-control"
                                            placeholder="Mot de pass">
                                    </div>
                                    <!-- date picker-->
                                    <div class="col-md-12 mb-20">
                                        <input class="form-control" type="text" name="dateness"
                                            placeholder="Date de naissance"
                                            onfocus="(this.type='date')"
                                            onblur="(this.type='text')">
                                    </div>
                                    <!-- ends  date picker-->
                                    <!--profile upload-->
                                    <div class="atbd-upload col-md-12">
                                        <div class="atbd-upload__button ">
                                            <a href="javascript:void(0)"
                                                class="btn btn-lg btn-outline-lighten btn-upload w-100"
                                                onclick="$('#upload-1').click()"> <span
                                                    data-feather="upload"></span> Télécharger
                                                Profile Photo</a>
                                            <input type="file" class="upload-one" id="upload-1"
                                                name="profile">
                                            <div class="invalid-feedback text-center fw-bolder">
                                                Choisi Une Photo
                                            </div>
                                        </div>
                                        <div class="atbd-upload__file">
                                            <ul>

                                            </ul>
                                        </div>
                                    </div>
                                    <!--ends profile upload-->
                                    <!--btns-->
                                    <div class="button-group d-flex pt-25 col-12">
                                        <button type="reset"
                                            class="btn btn-light btn-default btn-squared fw-400 text-capitalize b-light color-light col-md-4">cancel
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
        selectUsers();
        function selectUsers(){
            $.ajax({
                    type: "GET",
                    url: "/show_members",
                    dataType: "json",
                    success: function(response) {
                        $('tbody').html("");
                        $('#count_users').html(response.counts);
                        $('#admins9').html(response.admins);
                        $('#users9').html(response.userss);
                        $.each(response.all_members, function(key, items) {
                            $('tbody').append(`
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
                                                                        <i class="fa fa-pen text-warning circle-icon-warning"></i>
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
        //to add data
            $(document).on('submit', '#ajout_user', function(e) {
                e.preventDefault();
                let formData = new FormData($('#ajout_user')[0]);
                $.ajax({
                    type: "POST",
                    url: "/member",
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
                            $('#ajout_user').find('input').val('');
                            document.getElementById('this_li').remove();
                            selectUsers();
                            setTimeout( function(){ dataTableonload(); }, 1500);
                            $('#new-member').modal('hide');
                            $.Toast("Message!", response.message, "success", {
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

            //to edit data and affected data to input
            $(document).on('click', '.editbtn21', function() {
                var user_id = $(this).val();
                $('#edit-member').modal('show');
                $.ajax({
                    type: "GET",
                    url: "/edit-user/"+user_id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404){
                            alert(response.message);
                            $('#edit-member').modal('hide');
                        }else{
                            $('#id1').val(user_id);
                        $('#nom1').val(response.user.nom);
                        $('#prenom1').val(response.user.prenom);
                        $('#email1').val(response.user.email);
                        $('#pass2').val(response.password);
                        $('#date1').val(response.user.dateNaissance);
                        $('#post1').val(response.user.jobTitle);
                        $('#tel1').val(response.user.telephone);
                        $("#showimg").html(`<img src="import/profileImg/${response.user.profile}" alt="" class="avatar avatar-light avatar-lg avatar-circle mt-2">`);
                        }

                    }
                });
            });

        // this for update form
        $(document).on('submit', '#edit_users', function (e) {
         e.preventDefault();
         var id2 = $('#id1').val();
         let EditformData = new FormData($('#edit_users')[0]);
         $.ajax({
         type: "POST",
         url: "/edit-users/"+id2,
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
                $('#edit-member').modal('hide');
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
            }
         }
     });
 });
//to delete data and affected data to input id
$(document).on('click', '.deletebtn21', function() {
                var user_id = $(this).val();
                $('#delete-member').modal('show');
                $('#id_del').val(user_id);
            });

$(document).on('submit', '#delete_user', function (e) {
     e.preventDefault();
     let delformData = new FormData($('#delete_user')[0]);
     var id = $('#id_del').val();
     $.ajax({
         type: "POST",
         url: "/delete-user/"+id,
         data: delformData,
         contentType: false,
         processData: false,
         success: function (response){
            if (response.status == 200) {
                $('#delete-member').modal('hide');
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
var form = document.getElementById("edit_users");
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

});//ennd function ready

    </script>
@endsection
