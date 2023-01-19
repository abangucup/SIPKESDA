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
                        <h1 class="auth-title">SIPKESDA - DAFTAR</h1>
                        <p class="auth-subtitle mb-4">Silahkan Daftarkan Diri Anda Sebagai Calon Penerima Beasiswa
                            Daerah</p>
                    </div>

                    <form action="{{route('register')}}" method="POST">
                        @csrf
                        {{-- nama --}}
                        <div class="row">

                            <div class="col-sm-6">

                                <h6>Nama Lengkap</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Nama Lengkap"
                                        name="nama" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>

                                <h6>Tempat Lahir</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Tempat Lahir"
                                        name="tempat_lahir" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                </div>

                                <h6>Tanggal Lahir</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="date" class="form-control form-control-lg" name="tanggal_lahir"
                                        required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar"></i>
                                    </div>
                                </div>

                                <h6>Jenis Kelamin</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <select name="jk" class="form-select form-control form-control-lg">
                                        <option value="pria">Pria</option>
                                        <option value="wanita">Wanita</option>
                                    </select>
                                    <div class="form-control-icon">
                                        <i class="bi bi-people"></i>
                                    </div>
                                </div>

                                <h6>Alamat</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Alamat"
                                        name="alamat">
                                    <div class="form-control-icon">
                                        <i class="bi bi-map"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <h6>Kampus</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="kampus"
                                        name="kampus" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-building"></i>
                                    </div>
                                </div>

                                <h6>Jurusan</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Jurusan"
                                        name="jurusan" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-building"></i>
                                    </div>
                                </div>

                                <h6>Program Studi</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Program Studi"
                                        name="prodi">
                                    <div class="form-control-icon">
                                        <i class="bi bi-building"></i>
                                    </div>
                                </div>

                                <h6>Nomor HP / WA</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="No. Hp / WA"
                                        name="no_hp" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                </div>

                                <h6>Username</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="text" class="form-control form-control-lg" placeholder="Username"
                                        name="username" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>

                                <h6>Password</h6>
                                <div class="form-group position-relative has-icon-left mb-3">
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-shield-lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2" type="submit">Daftar</button>
                    </form>

                    <div class="auth-left">
                        <div class="text-center mt-5 text-lg fs-4">
                            <p class="text-gray-600">Sudah Punya Akun? <a href="{{route('login')}}"
                                    class="font-bold">Login</a>.</p>
                            <p><a class="font-bold" href="{{route('home')}}">Kembali Halaman Utama</a>.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</body>

</html>