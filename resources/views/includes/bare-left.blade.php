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
                        <span class="menu-text">Dashboard</span>
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
                        <span class="menu-text">Equipe</span>
                        <span class="toggle-icon"></span>
                    </a>
                    <ul style="display: none; top: 142px; left: 67px;   ">
                        <li>
                            <a class="{{ Request::is('equipe')?'active':''}}" href="{{url('equipe')}}">Equipe Liste</a>
                        </li>

                    </ul>
                </li>

                @endif

            </ul>
        </div>
    </div>
</aside>
@endguest


