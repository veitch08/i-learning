<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    public function tugas() {
        return $this->hasOne(Tugas::class);
    }

    public function siswa() {
        return $this->hasOne(Siswa::class);
    }
}
