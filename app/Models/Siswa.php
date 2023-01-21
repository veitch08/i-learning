<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    // public function jawaban_tugas() {
    //     return $this->hasMany(JawabanTugas::class);
    // }

    // public function nilai() {
    //     return $this->hasOne(Nilai::class);
    // }

    public function image()
    {
        if ($this->foto && file_exists(public_path('img/siswa/' . $this->foto))) {
            return asset('img/siswa/' . $this->foto);
        } else {
            return asset('img/no_image.jpg');
        }
    }

    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('img/siswa/' . $this->foto))) {
            return unlink(public_path('img/siswa/' . $this->foto));
        }
    }
}
