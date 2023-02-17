<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tugas extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function jawabantugas()
    {
        return $this->hasOne(jawabantugas::class);
    }

    public function teacher()
    {
        return $this->belongsTo(teacher::class);
    }
}
