<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKelas extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function student()
    {
        return $this->hasMany(student::class);
    }
}
