<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'tempat_lahir', 'tanggal_lahir', 'jk', 'alamat', 
        'kampus', 'jurusan', 'prodi', 'no_hp', 'username', 'password',
        'berkas', 'hasil',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function subkriteria()
    {
        return $this->belongsToMany(Subkriteria::class, 'mahasiswa_subkriteria');
    }

    public function kriteria()
    {
        return $this->belongsToMany(Kriteria::class, 'kriteria_mahasiswa')->withPivot('normalisasi', 'tertimbang', 'jarak');
    }
    

}
