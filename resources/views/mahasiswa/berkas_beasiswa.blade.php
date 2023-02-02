@if ($mahasiswa->berkas_beasiswa == null)
<!-- Button Upload Berkas Beasiswa-->
<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#berkasBeasiswa">
    <i class="bi bi-upload pe-2"></i>
    UPLOAD BERKAS PENDUKUNG
</button>

<!-- Modal Upload Berkas Beasiswa-->
<div class="modal fade" id="berkasBeasiswa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('berkas.beasiswa')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Upload Berkas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Berkas Beasiswa</label>
                        <input class="form-control" type="file" id="formFile" name="berkas_beasiswa" required>
                        <span class="text-secondary"><sub>*.zip/rar
                                (@foreach ($kriterias as $kriteria)
                                {{$kriteria->kriteria}},
                                @endforeach)
                            </sub>
                        </span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</div>
@endif