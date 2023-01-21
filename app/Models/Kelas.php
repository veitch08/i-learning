<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function jurusan() {
        return $this->belongsTo(Jurusan::class, 'id_jurusan');
    }

    public function guru() {
        return $this->hasOne(Guru::class, 'id_kelas');
    }

    public function siswa() {
        return $this->hasMany(Siswa::class, 'id_siswa');
    }
}
