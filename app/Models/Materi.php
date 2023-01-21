<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    public function tugas() {
        return $this->hasMany(Tugas::class, 'id_materi');
    }

    public function image()
    {
        if ($this->cover && file_exists(public_path('img/cover/' . $this->cover))) {
            return asset('img/cover/' . $this->cover);
        } else {
            return asset('img/no_image.jpg');
        }
    }

    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('img/cover/' . $this->cover))) {
            return unlink(public_path('img/cover/' . $this->cover));
        }
    }
}
