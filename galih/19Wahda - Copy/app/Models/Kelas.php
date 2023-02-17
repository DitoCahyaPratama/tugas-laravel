<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function subkelas()
    {
        return $this->hasMany(subkelas::class);
    }

    public function jadwal()
    {
        return $this->hasMany(jadwal::class);
    }

    public function student()
    {
        return $this->hasMany(student::class);
    }
}
