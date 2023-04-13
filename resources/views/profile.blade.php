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
                                            <img class="ap-img__main rounded-circle mb-3  wh-120 d-flex bg-opacity-primary" src="/import/profileImg/{{ Auth::user()->profile }}" alt="{{ Auth::user()->nom .' '. Auth::user()->prenom }}">
                                        </div>
                                        <div class="ap-nameAddress pb-3 pt-1">
                                            <h5 class="ap-nameAddress__title text-capitalize">{{ Auth::user()->nom .' '. Auth::user()->prenom }}</h5>
                                            <p class="ap-nameAddress__subTitle fs-14 m-0 text-capitalize">{{ Auth::user()->jobTitle }}</p>
                                        </div>
                                        <div class="ap-button button-group d-flex justify-content-center flex-wrap">
                                            <button type="button" class="border text-capitalize px-25 color-gray transparent shadow2 radius-md">
                                                <span data-feather="mail"></span>message</button>
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
                                            <div class="text-white badge badge-round badge-info " style="font-size: 18px;">
                                                <i class="las la-phone p-right-10" style="font-size: 18px;"></i>
                                                <span class="p-right-10">{{ Auth::user()->telephone }}</span>
                                            </div>
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
                                <div class="db-social border-bottom">
                                    <div class="card-header border-bottom-0 pt-sm-25 pb-sm-0  px-md-25 px-3">
                                        <div class="profile-header-title">
                                            Social Profiles
                                        </div>
                                    </div>
                                    <div class="card-body pt-md-1 pt-0">
                                        <ul class="db-social-parent mb-0">
                                            <li class="db-social-parent__item">
                                                <a class="color-facebook hover-facebook wh-44 fs-22" href="#">
                                                    <i class="lab la-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li class="db-social-parent__item">
                                                <a class="color-twitter hover-twitter wh-44 fs-22" href="#">
                                                    <i class="lab la-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="db-social-parent__item">
                                                <a class="color-ruby hover-ruby  wh-44 fs-22" href="#">
                                                    <i class="las la-basketball-ball"></i>
                                                </a>
                                            </li>
                                            <li class="db-social-parent__item">
                                                <a class="color-instagram hover-instagram wh-44 fs-22" href="#">
                                                    <i class="lab la-instagram"></i>
                                                </a>
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
                                        <a class="nav-link active" id="ap-overview-tab" data-toggle="pill" href="#ap-overview" role="tab" aria-controls="ap-overview" aria-selected="true">
                                        <span class="badge badge-round badge-primary badge-lg">Toutes les tâches</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="timeline-tab" data-toggle="pill" href="#timeline" role="tab" aria-controls="timeline" aria-selected="false">Timeline</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="activity-tab" data-toggle="pill" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Activity</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Tab Menu End -->
                        <div class="tab-content mt-10" id="ap-tabContent">
                            <div class="tab-pane fade show active" id="ap-overview" role="tabpanel" aria-labelledby="ap-overview-tab">
                                <div class="ap-content-wrapper">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- Product Table -->
                                            <div class="card mt-25 mb-40">
                                                <div class="card-body p-0">
                                                    <div class="userDatatable global-shadow border-0 bg-white w-100 mt-20 mb-20">
                                                        <div class="table-responsive">
                                                            <table class="table table-class" >
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
                                                                                <td><span>{{ $data->desctsk }}</span></td>
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
                                                            <div class="d-none"><button type="reset"></button></div>
                                                        </div>
                                                    </div>
                                                    <div class="d-inline">
                                                        <button class="btn btn-primary btn-default btn-rounded mb-50 w-40">Primary</button>
                                                        <button class="btn btn-primary btn-default btn-rounded mb-50 w-40">Primary</button>
    
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Product Table End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-xxl-8">

                                        </div>
                                        <div class="col-xxl-4">
                                            <!-- Friend Widgets -->
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h6>Friends</h6>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Meyri Carles</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        UI Designer
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div>




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow">follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Shreyu Neu</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        Product Designer
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="ffw__button">




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                    follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Domnic Harris</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        Executive Assistant
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="ffw__button">




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                    follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/2.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Khalid Hasan</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        UI director
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="ffw__button">




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                    follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/3.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Tuhin Molla</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        System Administrator
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="ffw__button">




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                    follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <a class="view-more-comment color-primary fs-13 fw-500 px-25 pb-20" href="#">Load more friends</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Friend Widgets End -->

                                            <!-- Gallery Image -->
                                            <div class="card global-shadow mb-25">
                                                <div class="photo-gallery-widget">
                                                    <div class="card-header justify-content-between d-flex flex-wrap px-md-25 px-3">
                                                        <h6>photos</h6>
                                                        <a class="color-primary fs-13 fw-500 mt-lg-0 mt-1" href="#">see all</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="wig">
                                                            <div class="wig__item">
                                                                <img src="img/315.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/325.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/design.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/99.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/166.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/287.png" alt="gallery">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Gallery Image End -->

                                            <!-- Gallery Video Popup -->
                                            <div class="card global-shadow mb-25">
                                                <div class="video-gallery-widget">
                                                    <div class="card-header justify-content-between d-flex flex-wrap px-md-25 px-3">
                                                        <h6>videos</h6>
                                                        <a class="color-primary fs-13 fw-500 mt-lg-0 mt-1" href="#">see all</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="wig">
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/juice-2.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/cup-card.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/round-box.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/glass.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/bottles.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/325.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper" href="#">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Gallery Video Popup End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
                                <div class="ap-post-content">
                                    <div class="row">
                                        <div class="col-xxl-8">
                                            <!-- Friend post -->
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h6>Friends</h6>
                                                    </div>
                                                    <div class="card-body p-0 py-10">
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-primary bg-opacity-primary">
                                                                        <span data-feather="inbox"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">James</span> sent you a
                                                                            message
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-secondary bg-opacity-secondary">
                                                                        <span data-feather="upload"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">Adam </span>upload
                                                                            website template for sale
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-success bg-opacity-success">
                                                                        <span data-feather="log-in"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">Mumtahin </span>has
                                                                            registered
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-info bg-opacity-info">
                                                                        <span data-feather="at-sign"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/2.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">James </span>Send you a
                                                                            message
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex align">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-danger bg-opacity-danger">
                                                                        <span data-feather="heart"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/3.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">Adam </span>upload
                                                                            website template for sale
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-warning bg-opacity-warning">
                                                                        <span data-feather="message-square"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">James</span> sent you a
                                                                            message
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-secondary bg-opacity-secondary">
                                                                        <span data-feather="upload"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0" style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">Shreyu Neu</span> sent
                                                                            you a
                                                                            message
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-success bg-opacity-success">
                                                                        <span data-feather="log-in"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">Mumtahin </span>has
                                                                            registered
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-info bg-opacity-info">
                                                                        <span data-feather="at-sign"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/2.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">James </span>Send you a
                                                                            message
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex align">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-danger bg-opacity-danger">
                                                                        <span data-feather="heart"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/3.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">Adam </span>upload
                                                                            website template for sale
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-warning bg-opacity-warning">
                                                                        <span data-feather="message-square"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0 " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">James</span> sent you a
                                                                            message
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="ffp d-flex ffp--hover justify-content-between  align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div class="mr-3 ffp__imgWrapper d-flex align-items-center">
                                                                    <span class="ffp__icon color-secondary bg-opacity-secondary">
                                                                        <span data-feather="upload"></span></span>
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block avatar avatar-md m-0" style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffp__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>
                                                                            <span class="color-primary">Shreyu Neu</span> sent
                                                                            you a
                                                                            message
                                                                        </h6>
                                                                    </a>
                                                                    <p class="d-block">
                                                                        5 hours ago
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="ffp__button">


                                                                <div class="dropdown  dropdown-click ">

                                                                    <button class="btn-link border-0 bg-transparent p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <span data-feather=more-horizontal></span>
                                                                    </button>


                                                                    <div class="dropdown-default dropdown-bottomRight dropdown-menu">
                                                                        <a class="dropdown-item" href="#">Item One</a>
                                                                        <a class="dropdown-item" href="#">Item Two</a>
                                                                        <a class="dropdown-item" href="#">Item Three</a>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Friend Post End -->
                                        </div>
                                        <div class="col-xxl-4">
                                            <!-- Friend Widgets -->
                                            <div class="card global-shadow mb-25">
                                                <div class="friends-widget">
                                                    <div class="card-header px-md-25 px-3">
                                                        <h6>Friends</h6>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Meyri Carles</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        UI Designer
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div>




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow">follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/1.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Shreyu Neu</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        Product Designer
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="ffw__button">




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                    follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/4.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Domnic Harris</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        Executive Assistant
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="ffw__button">




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                    follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/2.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Khalid Hasan</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        UI director
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="ffw__button">




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                    follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <div class="ffw d-flex justify-content-between">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="mr-3 ffw__imgWrapper">
                                                                    <span class=" profile-image bg-opacity-secondary rounded-circle d-block ap-profile-image " style="background-image:url('img/author/3.jpg'); background-size: cover;"></span>
                                                                </div>
                                                                <div class="ffw__title">
                                                                    <a href="#" class="text-dark fw-500">
                                                                        <h6>Tuhin Molla</h6>
                                                                    </a>
                                                                    <span class="d-block">
                                                                        System Administrator
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="ffw__button">




                                                                <button class="btn btn-default btn-squared btn-outline-light friends-follow"><span data-feather="check"></span>
                                                                    follow
                                                                </button>




                                                            </div>
                                                        </div>
                                                        <a class="view-more-comment color-primary fs-13 fw-500 px-25 pb-20" href="#">Load more friends</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Friend Widgets End -->

                                            <!-- Gallery Image -->
                                            <div class="card global-shadow mb-25">
                                                <div class="photo-gallery-widget">
                                                    <div class="card-header justify-content-between d-flex flex-wrap px-md-25 px-3">
                                                        <h6>photos</h6>
                                                        <a class="color-primary fs-13 fw-500 mt-lg-0 mt-1" href="#">see all</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="wig">
                                                            <div class="wig__item">
                                                                <img src="img/315.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/325.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/design.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/99.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/166.png" alt="gallery">
                                                            </div>
                                                            <div class="wig__item">
                                                                <img src="img/287.png" alt="gallery">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Gallery Image End -->

                                            <!-- Gallery Video Popup -->
                                            <div class="card global-shadow mb-25">
                                                <div class="video-gallery-widget">
                                                    <div class="card-header justify-content-between d-flex flex-wrap px-md-25 px-3">
                                                        <h6>videos</h6>
                                                        <a class="color-primary fs-13 fw-500 mt-lg-0 mt-1" href="#">see all</a>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="wig">
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/juice-2.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/cup-card.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/round-box.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/glass.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/bottles.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper popup-youtube" href="https://www.youtube.com/watch?v=i9E_Blai8vk">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="wig__item wig-overlay">
                                                                <img src="img/325.png" alt="gallery">
                                                                <div class="wig-overlay__content">
                                                                    <a class="wig-overlay__iconWrapper" href="#">
                                                                        <img class="svg" src="img/svg/play.svg" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Gallery Video Popup End -->
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
@endsection
