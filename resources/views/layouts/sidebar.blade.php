<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/dashboard" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Chicken</span>
                    <span class="logo-subtitle">Monitoring</span>
                </div>
            </a>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <ul>
                    <li style="padding-bottom: 10px">
                        <a href="/dashboard" class="{{ $title === 'Dashboard' ? 'active' : '' }}"><span
                                class="icon home" style="margin-top: -4px" aria-hidden="true"></span>Dashboard</a>
                    </li>
                </ul>
                <li
                    style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding: 8px 0 12px; color: white; font-weight: 500; font-size: 16px">
                    Konfigurasi
                </li>
                <ul>
                    <li>
                        <a href="/lampu"
                            class="{{ $title === 'Lampu' || $title === 'LampuManual' ? 'active' : '' }}"><span
                                class="lamp"></span>Lampu</a>
                    </li>
                    <li>
                        <a href="/heater"
                            class="{{ $title === 'Heater' || $title === 'HeaterManual' ? 'active' : '' }}"><span
                                class="heater"></span>Heater</a>
                    </li>
                </ul>
                @can('acces_admin')
                    <li
                        style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding: 8px 0 12px; color: white; font-weight: 500; font-size: 16px">
                        Kelola
                    </li>
                    <ul>
                        <li>
                            <a href="/user" class="{{ $title === 'User' ? 'active' : '' }}"><span
                                    class="user"></span>User</a>
                        </li>
                        <li>
                            <a href="/device" class="{{ $title === 'Device' ? 'active' : '' }}"><span
                                    class="device"></span>Device</a>
                        </li>
                    </ul>
                @endcan
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture>
                    <source srcset="./img/avatar/avatar-illustrated-02.webp" type="image/webp" />
                    <img src="./img/avatar/avatar-illustrated-02.png" alt="User name" />
                </picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Novata Yudi</span>
                <span class="sidebar-user__subtitle">Support manager</span>
            </div>
        </a>
    </div>
</aside>
