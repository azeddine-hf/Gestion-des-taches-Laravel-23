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
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="mail"></span></a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Messages <span class="badge-circle badge-success ml-1">2</span></h2>
                            <ul>
                                <li class="author-online has-new-message">
                                    <div class="user-avater">
                                        <img src="{{asset('import/img/team-1.png')}}" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                dolor amet cosec Lorem ipsum</span>
                                            <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="author-offline has-new-message">
                                    <div class="user-avater">
                                        <img src="{{asset('import/img/team-1.png')}}" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                dolor amet cosec Lorem ipsum</span>
                                            <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="author-online has-new-message">
                                    <div class="user-avater">
                                        <img src="{{asset('import/img/team-1.png')}}" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                dolor amet cosec Lorem ipsum</span>
                                            <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="author-offline">
                                    <div class="user-avater">
                                        <img src="{{asset('import/img/team-1.png')}}" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                dolor amet cosec Lorem ipsum</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="author-offline">
                                    <div class="user-avater">
                                        <img src="{{asset('import/img/team-1.png')}}" alt="">
                                    </div>
                                    <div class="user-message">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                            <span class="time-posted">3 hrs ago</span>
                                        </p>
                                        <p>
                                            <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                dolor amet cosec Lorem ipsum</span>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <a href="" class="dropdown-wrapper__more">See All Message</a>
                        </div>
                    </div>
                </li>
                <!-- ends: nav-message -->
                <li class="nav-notification">
                    <div class="dropdown-custom">
                        <a href="javascript:;" class="nav-item-toggle">
                            <span data-feather="bell"></span></a>
                        <div class="dropdown-wrapper">
                            <h2 class="dropdown-wrapper__title">Notifications <span class="badge-circle badge-warning ml-1">4</span></h2>
                            <ul>
                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--primary">
                                        <span data-feather="inbox"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--secondary">
                                        <span data-feather="upload"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--success">
                                        <span data-feather="log-in"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--info">
                                        <span data-feather="at-sign"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
                                <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                    <div class="nav-notification__type nav-notification__type--danger">
                                        <span data-feather="heart"></span>
                                    </div>
                                    <div class="nav-notification__details">
                                        <p>
                                            <a href="" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                            <span>sent you a message</span>
                                        </p>
                                        <p>
                                            <span class="time-posted">5 hours ago</span>
                                        </p>
                                    </div>
                                </li>
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
                        <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('/import/profileImg/'.Auth::user()->profile) }}" alt="" class="rounded-circle"></a>
                        <div class="dropdown-wrapper">
                            <div class="nav-author__info">
                                <div class="author-img">
                                    <img src="/import/profileImg/{{ Auth::user()->profile }}" alt="" class="rounded-circle">
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

