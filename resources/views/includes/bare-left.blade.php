@guest
    @if (Route::has('login'))
    @endif
@else
<aside class="sidebar-wrapper">
    <div class="sidebar collapsed" id="sidebar">
        <div class="sidebar__menu-group">
            <ul class="sidebar_nav">
                <li class="menu-title">
                    <span>Main menu</span>
                </li>
                <li class="has-child {{ Request::is('/')?'open':''}}">
                    <a href="{{url('/')}}" class="{{ Request::is('/')?'active':''}}">
                        <span data-feather="home" class="nav-icon"></span>
                        <span class="menu-text">Accueil</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 100px; left: 67px;">
                        <li>
                            <a class="{{ Request::is('/')?'active':''}}" href="{{url('/')}}">Accueil</a>
                        </li>

                    </ul>
                </li>
                <li class="has-child ">
                    <a href="{{url('mes-taches')}}" class="{{ Request::is('mes-taches')?'active':''}}">
                        <span data-feather="check-circle" class="nav-icon"></span>
                        <span class="menu-text">Mes tâches</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 180px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('mes-taches')?'active':''}}" href="{{url('mes-taches')}}">Mes tâches</a>
                        </li>

                    </ul>
                </li>
                <li class="has-child ">
                    <a href="{{url('profile')}}" class="{{ Request::is('profile')?'active':''}}">
                        <span data-feather="user" class="nav-icon"></span>
                        <span class="menu-text">Mon Profile</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 180px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('profile')?'active':''}}" href="{{url('profile')}}">Mon Profile</a>
                        </li>

                    </ul>
                </li>
                @if (Auth::user()->isAdmin === 1 || Auth::user()->isAdmin === 2)
                <li class="has-child ">
                    <a href="{{url('equipe')}}" class="{{ Request::is('equipe')?'active':''}}">
                        <span data-feather="users" class="nav-icon"></span>
                        <span class="menu-text">Equipe list</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 142px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('equipe')?'active':''}}" href="{{url('equipe')}}">Equipe Liste</a>
                        </li>

                    </ul>
                </li>
                <li class="has-child ">
                    <a href="{{url('client')}}" class="{{ Request::is('client')?'active':''}}">
                        <span data-feather="award" class="nav-icon"></span>
                        <span class="menu-text">Les Clients</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 180px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('client')?'active':''}}" href="{{url('client')}}">Les Clients</a>
                        </li>

                    </ul>
                </li>
                <li class="has-child ">
                    <a href="{{url('taches')}}" class="{{ Request::is('taches')?'active':''}}">
                        <span data-feather="target" class="nav-icon"></span>
                        <span class="menu-text">Les Tȃches</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 263px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('taches')?'active':''}}" href="{{url('taches')}}">Les Tȃches</a>
                        </li>

                    </ul>
                </li>
                <li class="has-child ">
                    <a href="{{url('projet')}}" class="{{ Request::is('projet')?'active':''}}">
                        <span data-feather="package" class="nav-icon"></span>
                        <span class="menu-text">Les Projets</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 220px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('projet')?'active':''}}" href="{{url('projet')}}">Les Projets</a>
                        </li>

                    </ul>
                </li>
                <li class="has-child ">
                    <a href="{{url('export')}}" class="{{ Request::is('export')?'active':''}}">
                        <span data-feather="download-cloud" class="nav-icon"></span>
                        <span class="menu-text">Exporter les Tȃches</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 220px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('export')?'active':''}}" href="{{url('export')}}">Exporter les Tȃches</a>
                        </li>

                    </ul>
                </li>
                @endif
                <li class="has-child ">
                    <a  class="{{ Request::is('chat')?'active':''}}" href="{{ url('chat') }}">
                        <span data-feather="message-circle" class="nav-icon"></span>
                        <span class="menu-text">Chat</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 263px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('chat')?'active':''}}" href="{{url('chat')}}">Chat</a>
                        </li>

                    </ul>
                </li>
                @if (Auth::user()->isAdmin === 2)
                <li class="has-child ">
                    <a  class="{{ Request::is('recycle')?'active':''}}" href="{{ url('recycle') }}">
                        <span data-feather="trash-2" class="nav-icon"></span>
                        <span class="menu-text">Corbeille</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 263px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('recycle')?'active':''}}" href="{{url('recycle')}}">Corbeille</a>
                        </li>

                    </ul>
                </li>
                @endif


            </ul>
        </div>
    </div>
</aside>
@endguest


