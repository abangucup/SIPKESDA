<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                @if (auth()->user()->role == 'operator')


                <li class="sidebar-item {{Request::is('dashboard/operator') ? 'active' : ''}}">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="sidebar-title">Pages</li>

                <li class="sidebar-item  ">
                    <a href="application-email.html" class='sidebar-link'>
                        <i class="bi bi-envelope-fill"></i>
                        <span>Email Application</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="auth-login.html">Login</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="auth-register.html">Register</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="auth-forgot-password.html">Forgot Password</a>
                        </li>
                    </ul>
                </li>

                @elseif (auth()->user()->role == 'mahasiswa')
                <li class="sidebar-item {{Request::is('dashboard/mahasiswa') ? 'active' : ''}}">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/beasiswa') ? 'active' : ''}}">
                    <a href="beasiswa" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Data Beasiswa</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/hasil') ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-arrow-clockwise"></i>
                        <span>Hasil</span>
                    </a>
                </li>

                @else

                <li class="sidebar-item {{Request::is('dashboard/kepala') ? 'active' : ''}}">
                    <a href="index.html" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @endif

                @auth
                <li class="sidebar-item">
                    <a href="{{ route('logout')}}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>
                @endauth

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>