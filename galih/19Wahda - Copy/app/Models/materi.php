<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class materi extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function bab()
    {
        return $this->hasMany(bab::class);
    }
}
