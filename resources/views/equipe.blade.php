@extends('master', ['body_class' => 'layout-light side-menu overlayScroll'])
@section('title', 'Equipe')
@section('content')
    <main class="main-content">
        <div class="contents expanded">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="breadcrumb-main user-member justify-content-sm-between ">
                            <div class="action-btn col-md-3">
                                <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#new-member">
                                    <i class="las la-plus fs-16"></i>Ajouter un member</a>

                                <!-- Modal new member-->
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
                            <div class="col-md-9">
                                <h1 class="text-capitalize fw-700 d-inline">
                                    <span class="d-inline">Liste d'équipe</span>
                                </h1> <small
                                    class="badge-success rounded-pill ml-2 pl-4 pr-4">{{ Auth::user()->count() . ' member' }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mt-30">
                            <div class="card-body">
                                <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                                    <div class="table-responsive">
                                        @if (session('msg'))
                                            <div class="adv-table-table__header">
                                                <!--Showing message added data-->
                                                <div class="alert alert-success text-center">
                                                    <strong>{{ session('msg') }}</strong>
                                                </div>
                                            </div>
                                        @endif
                                        <div id="filter-form-container"></div>
                                        <table class="table mb-0 table-borderless adv-table" data-sorting="true"
                                            data-filter-container="#filter-form-container" data-paging-current="1"
                                            data-paging-position="right" data-paging-size="5">
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
                                                        <span class="userDatatable-title">email</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">position</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">date de naissance</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title">Téléphone</span>
                                                    </th>
                                                    <th>
                                                        <span class="userDatatable-title float-right">action</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user as $item)
                                                    <tr>

                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <a href="#"
                                                                    class="profile-image rounded-circle d-block m-0 wh-38"
                                                                    style="background-image:url({{ asset('/import/profileImg/' . $item->profile) }}); background-size: cover;"></a>
                                                            </div>
                                                        </td>
                                                        <td class="d-none">
                                                            <p>{{ $item->id }}</p>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">{{ $item->nom }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">{{ $item->prenom }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">{{ $item->email }}</div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <div class="userDatatable-content">
                                                                    {{ __($item->jobTitle) }}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">
                                                                <div class="userDatatable-content">
                                                                    {{ $item->dateNaissance }}</div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="userDatatable-content">{{ $item->telephone }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                                <li>
                                                                    <button type="button" value="{{ $item->id }}"
                                                                        class="btn editbtn21 edit"><span
                                                                            data-feather="edit"
                                                                            class="text-warning"></span></button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" value="{{ $item->id }}"
                                                                        class="btn deletebtn remove"><span
                                                                            data-feather="trash-2"
                                                                            class="text-danger"></span></button>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal edit member-->
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
                                <form method="POST" action="{{ url('edit-user') }}" class="needs-validation"
                                    enctype="multipart/form-data" novalidate>
                                    @csrf
                                    @method('PUT')
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
                                                placeholder="Téléphone" title="telephone"
                                                pattern="(\+212|0)[5-6]{1}([ \-_/]*)(\d[ \-_/]*){8}">
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
                                            <input type="password" name="pass" class="form-control" id="pass1"
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
                                        <div class="atbd-upload col-md-12">
                                            <div class="atbd-upload__button ">
                                                <a href="javascript:void(0)"
                                                    class="btn btn-lg btn-outline-lighten btn-upload w-100"
                                                    onclick="$('#upload-1').click()"> <span data-feather="upload"></span>
                                                    Télécharger Profile Photo</a>
                                                <input type="file" class="upload-one" id="upload-1" name="profile1">
                                                <div class="invalid-feedback text-center fw-bolder">
                                                    Choisi Une Photo
                                                </div>
                                            </div>
                                            <div id="showimg"></div>
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
        // function selectUsers(){
        //     $.ajax({
        //             type: "GET",
        //             url: "/show_members",
        //             dataType: "json",
        //             success: function(response) {
        //                 $.each(response.all_members, function(key, items) {

        //                 }
        //             }
        //     });
        // }
        //*to add data
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


                        //--
                    }
                });
            });
        });

        //to edit data
        // $(document).ready(function() {

        //     $(document).on('click', '.editbtn21', function() {
        //         var user_id = $(this).val();
        //         $('#edit-member').modal('show');

        //         $.ajax({
        //             type: "GET",
        //             url: "/edit-user/"+user_id,
        //             success: function (response) {
        //                 if(response.status == 404){
        //                     alert(response.message);
        //                     $('#edit-member').modal('hide');
        //                 }else{
        //                     $('#id1').val(user_id);
        //                 $('#nom1').val(response.user.nom);
        //                 $('#prenom1').val(response.user.prenom);
        //                 $('#email1').val(response.user.email);
        //                 $('#pass1').val(response.user.password);
        //                 $('#date1').val(response.user.dateNaissance);
        //                 $('#post1').val(response.user.jobTitle);
        //                 $('#tel1').val(response.user.telephone);
        //                 $("#showimg").html(`<img src="import/profileImg/${response.user.profile}" alt="" class="avatar avatar-light avatar-lg avatar-circle mt-2">`);
        //                 }

        //             }
        //         });
        //     });
        // });
    </script>
@endsection
