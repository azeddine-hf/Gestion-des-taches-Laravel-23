@extends('master', ['body_class' => 'layout-light side-menu overlayScroll'])
@section('title', 'Mon Profile')
@section('content')
<main class="main-content">
    <div class="contents expanded">

        <div class="container-fluid">
            <div class="profile-content mb-50">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-main">
                            <h4 class="text-capitalize breadcrumb-title">Mon Profile</h4>
                        </div>
                    </div>
                    <div class="cos-lg-3 col-md-4  ">
                        <aside class="profile-sider">
                            <!-- Profile Acoount -->
                            <div class="card mb-25">
                                <div class="card-body text-center pt-sm-30 pb-sm-0  px-25 pb-0 mb-4">

                                    <div class="account-profile">
                                        <div class="ap-img w-100 d-flex justify-content-center">
                                            <!-- Profile picture image-->
                                            <a href="#"
                                                class="profile-image rounded-circle d-block m-0 wh-100"
                                                style="background-image:url('{{ asset('/import/profileImg/'.Auth::user()->profile) }}'); background-size: cover;"></a>
                                        </div>
                                        <div class="ap-nameAddress pb-3 pt-1">
                                            <h5 class="ap-nameAddress__title text-capitalize">{{ Auth::user()->nom .' '. Auth::user()->prenom }}</h5>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0 text-capitalize">{{ Auth::user()->jobTitle }}</p>
                                        </div>
                                        <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                                            <a href="{{url('chat')}}" class="btn border px-25 color-gray transparent shadow2 radius-md">
                                                <span data-feather="mail"></span>Chat en ligne</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Profile Acoount End -->

                            <!-- Profile User Bio -->
                            <div class="card mb-25">
                                <div class="user-info border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title ">
                                            Contact info
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <div class="user-content-info">
                                            <div class="text-white badge badge-round badge-info" style="font-size: 18px;">
                                                <i class="las la-envelope p-right-10" style="font-size: 18px;"></i>
                                                {{ Auth::user()->email }}
                                            </div><br>
                                                @if (Auth::user()->telephone!=Null)
                                            <div class="text-white badge badge-round badge-info " style="font-size: 18px;">
                                                <i class="las la-phone p-right-10" style="font-size: 18px;"></i>
                                                <span class="p-right-10">{{ Auth::user()->telephone }}</span>
                                            </div>
                                                @endif
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="user-skils border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Skills
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="user-skils-parent">
                                            <li class="user-skils-parent__item">
                                                <a href="#">UI/UX</a>
                                            </li>
                                            <li class="user-skils-parent__item">
                                                <a href="#">Branding</a>
                                            </li>
                                            <li class="user-skils-parent__item">
                                                <a href="#">product design</a>
                                            </li>
                                            <li class="user-skils-parent__item">
                                                <a href="#">Application</a>
                                            </li>
                                            <li class="user-skils-parent__item mb-0">
                                                <a href="#">web design</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- Profile User Bio End -->
                        </aside>
                    </div>

                    <div class="col">
                        <!-- Tab Menu -->
                        <div class="ap-tab ap-tab-header">
                            <div class="ap-tab-wrapper">
                                <ul class="nav px-25 ap-tab-main" id="ap-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="mes-taches-tab" data-toggle="pill" href="#mes-taches" role="tab" aria-controls="mes-taches" aria-selected="true">
                                        <span class="badge badge-round badge-primary badge-lg">Toutes les tâches</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="projects-tab" data-toggle="pill" href="#projects" role="tab" aria-controls="projects" aria-selected="false">
                                            <span class="badge badge-round badge-secondary text-white badge-lg">Tous les projets</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Tab Menu End -->
                        <div class="tab-content mt-10" id="ap-tabContent">
                            <div class="tab-pane fade show active" id="mes-taches" role="tabpanel" aria-labelledby="mes-taches-tab">
                                <div class="ap-content-wrapper">
                                    <div class="d-none"><button type="reset"></button></div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Product Table -->
                                            <div class="card mt-25 mb-40">
                                                <div class="card-body p-0">
                                                    <div class="w-100 p-2">
                                                    <a href="{{url('mes-taches')}}" class="btn btn-success w-100">Géré mes Taches</a>
                                                    </div>
                                                    <div class="userDatatable global-shadow border-0 bg-white w-100 p-3">
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
                                                                        <th style="width: 350px;">Description</th>
                                                                        <th>Status</th>
                                                                        <th>l'importance</th>
                                                                        <th>Deadline</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($mes_taches as $data)
                                                                        @php
                                                                            $badge = "";
                                                                            $badge2 = "";
                                                                            $iconip = "";
                                                                            if ($data->etatsk == 'en cours') {
                                                                                $badge = "badge badge-round text-white badge-warning badge-lg";
                                                                            } else if ($data->etatsk == 'terminé') {
                                                                                $badge = "badge badge-round badge-success badge-lg";
                                                                            } else if ($data->etatsk == 'pas commencé') {
                                                                                $badge = "badge badge-round badge-primary badge-lg";
                                                                            }else if ($data->etatsk == 'annulé') {
                                                                                $badge = "badge badge-round badge-secondary text-white badge-lg";
                                                                            }
                                                                            if($data->importsk =='urgent'){
                                                                                $badge2 = "badge badge-round badge-danger text-white badge-lg";
                                                                                $iconip = "las la-exclamation-triangle";
                                                                            }else if($data->importsk =='normal'){
                                                                                $badge2 = "badge badge-red badge-round badge-light badge-lg badge-outlined";
                                                                            }
                                                                        @endphp
                                                                        <tr>
                                                                            <td><span class="dessc">{{ $data->desctsk }}</span></td>
                                                                            <td><span class="{{ $badge }}">{{ $data->etatsk }}</span></td>
                                                                            <td><span class="{{$badge2 }}">{{ $data->importsk.' ' }}
                                                                                    <i class="{{$iconip}}"></i>
                                                                                    <div class="badge-dot-wrap">
                                                                                        <span class="badge-dot dot-success"></span>
                                                                                    </div>
                                                                                </span>
                                                                            </td>
                                                                            <td class="text-center">@if ($data->tsksend)
                                                                                <span>{{ $data->tsksend }}</span>
                                                                                @else
                                                                                    <span> - </span>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

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
                                            <!-- Product Table End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="projects" role="tabpanel" aria-labelledby="projects-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-xxl-8">

                                        </div>
                                        <div class="col-xxl-4">
                                            <!-- Friend Widgets -->
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h6>Projets</h6>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        {{--* projects td--}}
                                                        @foreach ($All_projects as $projet)
                                                            @php
                                                            $status = "";
                                                            if ($projet->statut == 'en cours') {
                                                                $status = "badge badge-round text-white badge-warning badge-lg";
                                                            } else if ($projet->statut == 'terminé') {
                                                                $status = "badge badge-round badge-success badge-lg";
                                                            }else if ($projet->statut == 'annulé') {
                                                                $status = "badge badge-round badge-secondary text-white badge-lg";
                                                            }
                                                            @endphp
                                                            <div class="ffw d-flex justify-content-between">
                                                                <div class="d-flex flex-wrap">
                                                                    <div class="ffw__title">
                                                                        <a href="#" class="text-dark fw-500">
                                                                            <h6>{{$projet->nomproj}}</h6>
                                                                        </a>
                                                                        <span class="d-block">
                                                                            {{$projet->firstdate}}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <span class="{{ $status }}">{{ $projet->statut }}</span>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Friend Widgets End -->


                                        </div>
                                    </div>
                                </div>
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
<script src="{{ asset('import/assets/vendor_assets/js/paginaseach.js')}}"></script>
<script>
    var descriptions = document.getElementsByClassName("dessc");
for (var i = 0; i < descriptions.length; i++) {
    var description = descriptions[i].innerHTML;
    var words = description.split(' ');
    var newDescription = "";
    for (var j = 0; j < words.length; j++) {
        newDescription += words[j] + ' ';
        if (j > 0 && j % 6 === 0) {
            newDescription += '<br>';
        }
    }
    descriptions[i].innerHTML = newDescription;
}

</script>
@endsection
