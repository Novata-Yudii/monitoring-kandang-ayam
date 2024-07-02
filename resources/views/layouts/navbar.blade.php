<nav class="main-nav--bg">
    <div class="container main-nav">
        <div class="main-nav-start"
            style="display: flex; width: 1000px; justify-content: space-between; align-items: center">
            @if ($title === 'Dashboard')
                <div class="dropdown-baru">
                    <input type="text" class="text02" readonly placeholder="Device Menu">
                    <div class="option">
                        <div onmouseover="show('HTML')"><a href="/lampu"
                                style="width: 100%; display: inline-block;height: 100%;">HTML</a></div>
                        <div onmouseover="show('CSS')">CSS</div>
                        <div onmouseover="show('JavaScript')">JavaScript</div>
                        <div onmouseover="show('ReactJS')">ReactJS</div>
                        <div onmouseover="show('Figma')">Figma</div>
                    </div>
                </div>
                <div class="say-name-user">
                    <h3 style="color: #d6d6d6">Welcome back, {{ Auth::user()->name }} !</h3>
                </div>
            @endif
        </div>
        <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                <span class="sr-only">Switch theme</span>
                <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
            </button>
            <div class="nav-user-wrapper">
                <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                    <span class="sr-only">My profile</span>
                    <span class="nav-user-img">
                        <picture>
                            <source srcset="{{ asset('img/avatar/avatar-illustrated-02.webp') }}" type="image/webp" />
                            <img src="{{ asset('img/avatar/avatar-illustrated-02.png') }}" alt="User name" />
                        </picture>
                    </span>
                </button>
                <ul class="users-item-dropdown nav-user-dropdown dropdown">
                    <li>
                        <a href="##">
                            <i data-feather="user" aria-hidden="true"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="##">
                            <i data-feather="settings" aria-hidden="true"></i>
                            <span>Account settings</span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ url('/logout') }}" method="post">
                            @csrf
                            <a class="danger" href="/logout">
                                <i data-feather="log-out" aria-hidden="true"></i>
                                <span>Log out</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
