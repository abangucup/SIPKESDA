<div class="modal fade text-left" id="updateBiodataMhs-{{ $mahasiswa->id  ?? auth()->user()->mahasiswa_id }}" tabindex="-1" role="dialog" aria-labelledby="modalUpdateBiodataMhs"
    aria-hidden="true">
    <div class="modal-dialog  modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalUpdateBiodataMhs">Update Biodata</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="{{route('update.biodata', $mahasiswa->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-6">

                            <h6>Nama Lengkap</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Nama Lengkap"
                                    name="nama" value="{{ $mahasiswa->nama }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>NIK</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Nomor Induk Kependudukan"
                                    name="nik" value="{{ $mahasiswa->nik }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>Tempat Lahir</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Tempat Lahir"
                                    name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                            </div>

                            <h6>Tanggal Lahir</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="date" class="form-control form-control-lg" name="tanggal_lahir"
                                value="{{ $mahasiswa->tanggal_lahir }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-calendar"></i>
                                </div>
                            </div>

                            <h6>Jenis Kelamin</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <select name="jk" class="form-control form-control form-control-lg">
                                    <option selected value="{{ $mahasiswa->jk }}">{{ $mahasiswa->jk }}</option>
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
                                    name="alamat" value="{{ $mahasiswa->alamat }}" >
                                <div class="form-control-icon">
                                    <i class="bi bi-map"></i>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <h6>Kampus</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="kampus"
                                    name="kampus" value="{{ $mahasiswa->kampus }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>

                            <h6>Jurusan</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Jurusan"
                                    name="jurusan" value="{{ $mahasiswa->jurusan }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>

                            <h6>Program Studi</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Program Studi"
                                    name="prodi" value="{{ $mahasiswa->prodi }}" >
                                <div class="form-control-icon">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>

                            <h6>Nomor HP / WA</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="No. Hp / WA"
                                    name="no_hp" value="{{ $mahasiswa->no_hp }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-phone"></i>
                                </div>
                            </div>

                            <h6>Email</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="email" class="form-control form-control-lg" placeholder="Email"
                                    name="email" value="{{ $mahasiswa->email }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>Username</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="text" class="form-control form-control-lg" placeholder="Username"
                                    name="username" value="{{ $mahasiswa->username }}" required>
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                            <h6>Password</h6>
                            <div class="form-group position-relative has-icon-left mb-3">
                                <input type="password" class="form-control form-control-lg" placeholder="Password"
                                    name="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
