<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    public function materi() {
        return $this->belongsTo(Materi::class, 'id_materi');
    }

    public function detail_tugas() {
        return $this->hasMany(DetailTugas::class, 'id_tugas');
    }

    // public function nilai() {
    //     return $this->hasOne(Nilai::class);
    // }
}
