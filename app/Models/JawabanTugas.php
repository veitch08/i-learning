<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JawabanTugas extends Model
{
    use HasFactory;

    public function detail_tugas() {
        return $this->belongsTo(DetailTugas::class);
    }

    public function siswa() {
        return $this->belongsTo(Siswa::class);
    }
}
