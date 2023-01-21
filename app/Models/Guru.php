<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function image()
    {
        if ($this->foto && file_exists(public_path('img/guru/' . $this->foto))) {
            return asset('img/guru/' . $this->foto);
        } else {
            return asset('img/no_image.jpg');
        }
    }

    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('img/guru/' . $this->foto))) {
            return unlink(public_path('img/guru/' . $this->foto));
        }
    }
    protected $primaryKey = 'foto   ';
}
