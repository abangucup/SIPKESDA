<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPKESDA</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    {{--
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/app_modif.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth_modif.css')}}">
</head>

<body>
    <div id="auth">
        {{--
        <div class="row h-100">
            <div class="col-lg-6 col-6 d-flex justify-content-center">
                <div class="card">
                    <div class="container pt-4">
                        <div class="text-center">
                            <h1 class="auth-title">SIPKESDA</h1>
                            <p class="auth-subtitle mb-5">Sistem Informasi Pendukung Keputusan Penerima Beasiswa Daerah
                            </p>
                            <img class="img-fluid" src="{{ asset('assets/images/banner/login.png')}}" alt="Logo">
                        </div>

                        <div class="d-grid gap-2">
                            @auth
                            @if (auth()->user()->role == 'operator')
                            <a href="{{route('dashboard_operator')}}"
                                class="btn btn-outline-secondary btn-block btn-lg mt-2">Dashboard</a>
                            @elseif (auth()->user()->role == 'mahasiswa')
                            <a href="{{route('dashboard_mahasiswa')}}"
                                class="btn btn-outline-secondary btn-block btn-lg mt-2">Dashboard</a>
                            @else
                            <a href="{{route('dashboard_kepala')}}"
                                class="btn btn-outline-secondary btn-block btn-lg mt-2">Dashboard</a>
                            @endif
                            @else
                            <a href="{{route('login')}}" class="btn btn-primary btn-block btn-lg mt-5">Masuk</a>
                            <a href="{{route('register')}}"
                                class="btn btn-outline-secondary btn-block btn-lg mt-2">Daftar</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-info col-lg-6 col-6 p-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Judul</h4>
                    </div>
                    <div class="card-body">
                        <p>Deskripsi</p>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row h-100">
            <div class="col-lg-4 pe-0 col-12 shadow">
                <div id="auth-left" class="position-fixed" style="width:inherit">
                    <div>
                        <div class="auth-logo text-center">
                            <a href="https://siskama.labinformatikaung.id">
                                <img src="/assets/images/logo/logo.png?id=505e41eb36eea51d4713ff5bc66b26f7" alt="Logo">
                            </a>
                        </div>
                        <h1 class="auth-title">Masuk</h1>


                        <form method="POST" action="https://siskama.labinformatikaung.id/login" accept-charset="UTF-8">
                            <input name="_token" type="hidden" value="wB6OVFEZRKwBwa5QF3aXZh765O1GOHYgVUqT3MEg">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <select class="form-control form-control" name="type">
                                    <option selected="selected" value="">Jenis Pengguna</option>
                                    <option value="01gr6r34kfhy7xsb40gw5s9yhz">Ormawa</option>
                                    <option value="01gr6r34kkhn9pk76bmfd1ksyr">Mahasiswa</option>
                                    <option value="01gr6r34kncadstab8wwepz41x">Alumni</option>
                                    <option value="01gr6r34kq4dmd860aege3e5n4">PK-O</option>
                                    <option value="01gr6r34ksjmbcmjk2032ytm8m">PK-MA</option>
                                    <option value="01gr6r34kvnt9bpztgbtr7ga2n">Pimpinan</option>
                                    <option value="01gr6r34kxq177h5hmqrs9ahew">Kajur</option>
                                    <option value="01gr6r34m0gyrssfk6kzx84k1z">Admin</option>
                                </select>
                                <div class="form-control-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input class="form-control form-control" placeholder="Username" name="username"
                                    type="text">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input class="form-control form-control" placeholder="Password" name="password"
                                    type="password" value="">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <div class="form-check form-check d-flex align-items-end">
                                <input name="remember_me" class="form-check-input me-2" type="checkbox" value=""
                                    id="flexCheckDefault">
                                <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                    Ingat saya
                                </label>
                            </div>
                            <button class="btn btn-primary btn-block btn-md shadow-md mt-3">
                                Masuk
                            </button>
                        </form>
                        <div class="text-center mt-3 text-md fs-6">
                            <p class="text-gray-600">
                                Belum punya akun?
                                <a href="https://siskama.labinformatikaung.id/register" class="font-bold">Daftar</a>.
                            </p>
                            <p class="text-gray-600">
                                Lihat Panduan &amp; Aset
                                <a href="https://www.dropbox.com/scl/fo/i9gulc0fztwpuyi7qe202/h?dl=0&amp;rlkey=me9p8oa35usz2djy2k3bamah8"
                                    target="_blank" class="font-bold">Disini</a>.
                            </p>
                            <div class="socials text-center fs-6">
                                <a href="https://ft.ung.ac.id" target="_blank">
                                    <ion-icon name="home" role="img" class="md hydrated" aria-label="home"></ion-icon>
                                </a>
                                <a href="https://www.facebook.com/PKMA.FTung.5" target="_blank">
                                    <ion-icon name="logo-facebook" role="img" class="md hydrated"
                                        aria-label="logo facebook"> </ion-icon>
                                </a>
                                <a href="">
                                    <ion-icon name="logo-youtube" role="img" class="md hydrated"
                                        aria-label="logo youtube"> </ion-icon>
                                </a>
                                <script type="module"
                                    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
                                <script nomodule="" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 ps-0 order-first order-lg-last">
                <div id="auth-right">
                    <div class="row">
                        <div class="col-12">
                            <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="https://siskama.labinformatikaung.id">
                                        <img src="/assets/images/logo/mini-logo.png?id=47df8522c667a408697d7a903b543578"
                                            alt="Logo" style="width: 50px;height:50px" class="d-lg-none">
                                    </a>
                                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                            <li class="nav-item ">
                                                <a class="nav-link  active " aria-current="page"
                                                    href="https://siskama.labinformatikaung.id">Beranda</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                    href="https://siskama.labinformatikaung.id/board/pre-organization-program">Program
                                                    Kerja Ormawa</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                    href="https://siskama.labinformatikaung.id/board/organization-program">Kegiatan
                                                    Ormawa</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                    href="https://siskama.labinformatikaung.id/board/student-activity">Kegiatan
                                                    Mahasiswa</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link "
                                                    href="https://siskama.labinformatikaung.id/board/news-alumni-activity">Kegiatan
                                                    Alumni</a>
                                            </li>
                                            <li class="nav-item d-lg-none">
                                                <a class="nav-link btn bg-white text-primary fw-bold"
                                                    href="#auth-left">Masuk</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="col-12 p-5">
                            <h2 class="fs-4 mb-4 d-flex  align-items-center">
                                <div class="p-2 flex-shrink-1 bd-highlight">
                                    <i class="bi bi-info-circle-fill me-1 fs-3"></i>
                                </div>
                                <div class="p-2 w-100 bd-highlight">
                                    Informasi Waktu Penginputan Kegiatan Ormawa Dan Mahasiswa
                                </div>
                            </h2>
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
                                                    Program Kerja Ormawa
                                                </h6>
                                                <p class="font-muted mb-0">
                                                    Waktu penginputan Program Kerja Ormawa <b>belum dibuka</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
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
                                                    Proposal Ormawa
                                                </h6>
                                                <p class="font-muted mb-0">
                                                    Waktu penginputan Upload Proposal Ormawa <b>belum dibuka</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                    Kegiatan Mahasiswa
                                                </h6>
                                                <p class="font-muted mb-0">
                                                    Waktu penginputan Kegiatan Mahasiswa <b>belum dibuka</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                    Proposal Kegiatan Mahasiswa
                                                </h6>
                                                <p class="font-muted mb-0">
                                                    Waktu penginputan Upload Proposal Kegiatan Mahasiswa <b>belum
                                                        dibuka</b>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script>
        console.log('%c Crafting by Hidayat Chandra ', 'color: #435ebe; font-size:34px');
    </script>

</body>

</html>
