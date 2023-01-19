<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPKESDA</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/auth.css')}}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-12 col-12 d-flex justify-content-center">
                <div class="container pt-4">
                    <div class="text-center">
                        <h1 class="auth-title">SIPKESDA - MASUK</h1>
                        <p class="auth-subtitle mb-5">Sistem Informasi Pendukung Keputusan Penerima Beasiswa Daerah</p>
                        <img class="img-fluid" src="{{ asset('assets/images/banner/login.png')}}" alt="Logo">
                    </div>

                    <form action="index.html">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Masuk</button>
                    </form>

                    <div class="auth-left">

                        <div class="text-center mt-5 text-lg fs-4">
                            <p class="text-gray-600">Belum Punya Akun? <a href="{{route('register')}}"
                                    class="font-bold">Daftar Sekarang</a>.</p>
                            <p><a class="font-bold" href="{{route('home')}}">Kembali Halaman Utama</a>.</p>
                        </div>

                    </div>
                    {{-- <a href="{{route('login')}}" class="btn btn-outline-secondary btn-block btn-lg mt-2">Login</a>
                    --}}

                </div>
            </div>
        </div>

    </div>

</body>

</html>