<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawabanTugas extends Model
{
    use HasFactory;

    public function tugas()
    {
        return $this->belongsTo(tugas::class,'tugas_id');
    }
}
