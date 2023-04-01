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
                    <a href="#" class="{{ Request::is('/')?'active':''}}">
                        <span data-feather="home" class="nav-icon"></span>
                        <span class="menu-text">Accueil</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 100px; left: 67px;">
                        <li>
                            <a class="{{ Request::is('/')?'active':''}}" href="{{url('/')}}">Social Media</a>
                        </li>

                    </ul>
                </li>
                @if (Auth::user()->isAdmin ===1)
                <li class="has-child ">
                    <a href="#" class="{{ Request::is('equipe')?'active':''}}">
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
                @endif
                <li class="has-child ">
                    <a href="#" class="{{ Request::is('client')?'active':''}}">
                        <span data-feather="award" class="nav-icon"></span>
                        <span class="menu-text">Les Clients</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 189px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('client')?'active':''}}" href="{{url('client')}}">Les Clients</a>
                        </li>

                    </ul>
                </li>
                <li class="has-child ">
                    <a href="#" class="{{ Request::is('projet')?'active':''}}">
                        <span data-feather="package" class="nav-icon"></span>
                        <span class="menu-text">Les Projets</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 173px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('projet')?'active':''}}" href="{{url('projet')}}">Les Projets</a>
                        </li>

                    </ul>
                </li>
                <li class="has-child ">
                    <a href="#" class="{{ Request::is('taches')?'active':''}}">
                        <span data-feather="target" class="nav-icon"></span>
                        <span class="menu-text">Les Tȃches</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 173px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('taches')?'active':''}}" href="{{url('taches')}}">Les Tȃches</a>
                        </li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</aside>
@endguest


