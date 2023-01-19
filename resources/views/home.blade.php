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
                        <h1 class="auth-title">SIPKESDA</h1>
                        <p class="auth-subtitle mb-5">Sistem Informasi Pendukung Keputusan Penerima Beasiswa Daerah</p>
                        <img class="img-fluid" src="{{ asset('assets/images/banner/login.png')}}" alt="Logo">
                    </div>

                    <div class="d-grid gap-2">

                        <a href="{{route('login')}}" class="btn btn-primary btn-block btn-lg mt-5">Masuk</a>
                        <a href="{{route('register')}}" class="btn btn-outline-secondary btn-block btn-lg mt-2">Daftar</a>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>