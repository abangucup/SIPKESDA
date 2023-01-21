<script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js')}}"></script>

<script src="{{ asset('assets/js/main.js')}}"></script>

<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
<script>
    // Simple Datatable
    let tabel_mahasiswa = document.querySelector('#tabel_mahasiswa');
    let keputusan_awal = document.querySelector('#keputusan_awal');
    let normalisasi_awal = document.querySelector('#normalisasi_awal');
    let elemen_tertimbang = document.querySelector('#elemen_tertimbang');
    let perkiraan_batas = document.querySelector('#perkiraan_batas');
    let jarak_alternatif = document.querySelector('#jarak_alternatif');
    let ranking_alternatif = document.querySelector('#ranking_alternatif');
    let dataTable = new simpleDatatables.DataTable(tabel_mahasiswa);
    let dataTable1 = new simpleDatatables.DataTable(keputusan_awal);
    let dataTable2 = new simpleDatatables.DataTable(normalisasi_awal);
    let dataTable3 = new simpleDatatables.DataTable(elemen_tertimbang);
    let dataTable4 = new simpleDatatables.DataTable(perkiraan_batas);
    let dataTable5 = new simpleDatatables.DataTable(jarak_alternatif);
    let dataTabel6 = new simpleDatatables.DataTable(ranking_alternatif);
</script>