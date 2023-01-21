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
                    <a href="{{ route('dashboard_operator')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/operator/petugas') ? 'active' : ''}}">
                    <a href="{{ route('petugas.index')}}" class='sidebar-link'>
                        <i class="bi bi-person-badge"></i>
                        <span>Data Operator</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/operator/mahasiswa') ? 'active' : ''}}">
                    <a href="{{route('operator.mahasiswa')}}" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Data Mahasiswa</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/operator/kriteria') ? 'active' : ''}}">
                    <a href="{{ route('kriteria.index')}}" class='sidebar-link'>
                        <i class="bi bi-card-checklist"></i>
                        <span>Data Kriteria</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/operator/beasiswa') ? 'active' : ''}}">
                    <a href="{{route('operator.beasiswa')}}" class='sidebar-link'>
                        <i class="bi bi-info-circle"></i>
                        <span>Data Beasiswa</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/operator/hasil') ? 'active' : ''}}">
                    <a href="{{route('hasil.index')}}" class='sidebar-link'>
                        <i class="bi bi-info-circle"></i>
                        <span>Proses Hitung</span>
                    </a>
                </li>

                @elseif (auth()->user()->role == 'mahasiswa')
                <li class="sidebar-item {{Request::is('dashboard/mahasiswa') ? 'active' : ''}}">
                    <a href="{{ route('dashboard_mahasiswa')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/mahasiswa/beasiswa') ? 'active' : ''}}">
                    <a href="{{route('beasiswa')}}" class='sidebar-link'>
                        <i class="bi bi-person"></i>
                        <span>Data Beasiswa</span>
                    </a>
                </li>

                <li class="sidebar-item {{Request::is('dashboard/mahasiswa/hasil') ? 'active' : ''}}">
                    <a href="{{route('hasilMahasiswa')}}" class='sidebar-link'>
                        <i class="bi bi-arrow-clockwise"></i>
                        <span>Hasil</span>
                    </a>
                </li>

                @else

                <li class="sidebar-item {{Request::is('dashboard/kepala') ? 'active' : ''}}">
                    <a href="{{ route('dashboard_kepala')}}" class='sidebar-link'>
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