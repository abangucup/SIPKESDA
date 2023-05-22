<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasPribadi extends Model
{
    use HasFactory;

    protected $fillable = [
        'mahasiswa_id',
        'surat_permohonan',
        'surat_keterangan_selesai_proposal',
        'rekening_aktif',
        'ktp',
        'kk',
        'ktm',
        'transkip_nilai',
        'pernyataan_asn',
        'surat_aktif_kuliah',
        'surat_keterangan_bebas_beasiswa',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
