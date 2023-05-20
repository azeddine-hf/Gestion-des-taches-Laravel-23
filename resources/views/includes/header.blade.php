@guest
    @if (Route::has('login'))
    @endif
@else
<div class="mobile-search">
    <form class="search-form">
        <span data-feather="search"></span>
        <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
    </form>
</div>
<div class="mobile-author-actions"></div>
<header class="header-top">
    <nav class="navbar navbar-light">
        <div class="navbar-left">
            <a href="" class="sidebar-toggle">
                <img class="svg" src="{{asset('import/img/svg/bars.svg')}}" alt="img"></a>
            <a class="navbar-brand" href="#"><img src="{{asset('import/img/logotech.png')}}" alt="img"></a>

        </div>
        <!-- ends: navbar-left -->

        <div class="navbar-right">
            <ul class="navbar-right__menu">
                <li class="nav-search d-none">
                    <a href="#" class="search-toggle">
                        <i class="la la-search"></i>
                        <i class="la la-times"></i>
                    </a>
                    <form action="/" class="search-form-topMenu">
                        <span class="search-icon" data-feather="search"></span>
                        <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
                    </form>
                </li>
                <li class="nav-message">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="text-light" id="message_bell">
                            <span data-feather="mail"></span></a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Messages <span class="badge-circle badge-success ml-1 unseen-messages-count">0</span></h2>
                            {{--unseen messages--}}
                            <ul class="notifications-list">

                            </ul>
                            <a href="{{url('chat')}}" class="dropdown-wrapper__more">Voir tous les messages</a>
                        </div>
                    </div>
                </li>
                <!-- ends: nav-message -->
                <li class="">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="bell"></span>
                            <span class="badge badge-danger badge-sm "></span>
                        </a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Notifications</h2>
                            <ul class="tasks-list">
                                <!-- AJAX data will be inserted here -->
                            </ul>
                            <a href="" class="dropdown-wrapper__more">See all incoming activity</a>
                        </div>
                    </div>
                </li>
                <!-- ends: .nav-notification -->
                &nbsp;&nbsp;
                <h6>{{Auth::user()->nom .' '. Auth::user()->prenom }} </h6>
                <li class="nav-author">
                    <div class="dropdown-custom">
                        <a href="#"
                            class="profile-image rounded-circle d-block m-0 wh-38"
                            style="background-image:url('{{ asset('/import/profileImg/'.Auth::user()->profile) }}'); background-size: cover;"></a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <a href="#"
                                        class="profile-image rounded-circle d-block m-0 wh-38"
                                        style="background-image:url('{{ asset('/import/profileImg/'.Auth::user()->profile) }}'); background-size: cover;"></a>
                                </div>
                                <div>
                                    <h6>{{ Auth::user()->nom .' '. Auth::user()->prenom }} </h6>
                                    <span>{{ Auth::user()->jobTitle }} </span>
                                </div>
                            </div>
                            <div class="nav-author__options">
                                <ul>
                                    <li>
                                        <a class="{{ Request::is('profile')?'active':''}}" href="{{url('profile')}}">
                                            <span data-feather="user"></span> Profile</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="settings"></span> Settings</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="key"></span> Billing</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="users"></span> Activity</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span data-feather="bell"></span> Help</a>
                                    </li>
                                </ul>
                                <a href="javascript:void" class="nav-author__signout"
                                onclick="$('#logout-form').submit();">
                                    <span data-feather="log-out"></span> Sign Out</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                        <!-- ends: .dropdown-wrapper -->
                    </div>
                </li>
                <!-- ends: .nav-author -->
            </ul>
            <!-- ends: .navbar-right__menu -->
            <div class="navbar-right__mobileAction d-md-none">
                <a href="#" class="btn-search">
                    <span data-feather="search"></span>
                    <span data-feather="x"></span></a>
                <a href="#" class="btn-author-action">
                    <span data-feather="more-vertical"></span></a>
            </div>
        </div>
        <!-- ends: .navbar-right -->
    </nav>
</header>
@endguest

