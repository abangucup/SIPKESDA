<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPKESDA</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/app_modif.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth_modif.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <style>
        @media only screen and (max-width: 768px) {

            /* Atur lebar maksimum yang diinginkan */
            .navbar {
                background-color: #007bff !important;
                /* Ganti dengan warna latar belakang yang diinginkan */
            }
        }
    </style>
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-4 pe-0 col-12 order-first shadow">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="https://siskama.labinformatikaung.id">
                            <img src="/assets/images/logo/mini-logo.png?id=47df8522c667a408697d7a903b543578" alt="Logo"
                                style="width: 50px;height:50px" class="d-lg-none">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-4 mb-lg-0">
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link btn bg-white text-primary fw-bold"
                                        href="{{ route('register') }}">Daftar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="auth-left" class="position-fixed" style="width:inherit">
                    <div class="text-center">
                        <h1 class="auth-title">SIPKESDA - MASUK</h1>
                        <p class="auth-subtitle mb-5">Sistem Informasi Pendukung Keputusan Penerima Beasiswa
                            Daerah
                        </p>
                    </div>
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username"
                                name="username" value="{{ old('username')}}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        @if($errors->has('username'))
                        <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                        @endif

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password" value="{{ old('password')}}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        @if($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                        @endif
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2" type="submit">Masuk</button>
                    </form>
                    <div class="auth-left">
                        <div class="text-center mt-5 text-lg fs-4">
                            <p class="text-gray-600">Belum Punya Akun? <a href="{{route('register')}}"
                                    class="font-bold">Daftar Sekarang</a>.</p>
                            <p><a class="font-bold" href="{{route('home')}}">Kembali Halaman Utama</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 ps-0 order-lg-last">
                <div id="auth-right">
                    <div class="col-12 p-5">
                        <h2 class="fs-4 mb-4 d-flex  align-items-center">
                            <div class="p-2 flex-shrink-1 bd-highlight">
                                <i class="bi bi-info-circle-fill me-1 fs-3"></i>
                            </div>
                            <div class="p-2 w-100 bd-highlight">
                                Informasi Waktu Penginputan Kegiatan Ormawa Dan Mahasiswa
                            </div>
                        </h2>
                        @forelse ($informasis as $informasi)
                        <div class="card my-4">
                            <div class="card-body px-4 py-4">
                                <div class="row">
                                    <div
                                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start w-100">
                                        <div class="stats-icon px-3 red me-4">
                                            <i
                                                class="bi bi-calendar-x-fill h-100 w-100 d-flex  align-items-center justify-content-center"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-extrabold">
                                                {{ $informasi->judul }}
                                            </h6>
                                            <p class="font-muted mb-0">
                                                {{ $informasi->deskripsi }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card my-4">
                            <div class="card-body px-4 py-4">
                                <div class="row">
                                    <div
                                        class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start w-100">
                                        <div class="stats-icon px-3 red me-4">
                                            <i
                                                class="bi bi-calendar-x-fill h-100 w-100 d-flex  align-items-center justify-content-center"></i>
                                        </div>
                                        <div>
                                            <h6 class="text-extrabold">
                                                Belum ada informasi
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script>
        console.log('%c Modify By Salman Mustapa ', 'color: #435ebe; font-size:34px');
    </script>

</body>

</html>
