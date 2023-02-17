<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(user::class,'user_id');
    }

    public function users()
    {
        return $this->belongsTo(user::class,'user_id')->onlyTrashed();
    }

    public function kelas()
    {
        return $this->belongsTo(kelas::class,'kelas_id');
    }

    public function subkelas()
    {
        return $this->belongsTo(subkelas::class,'subkelas_id');
    }

    public function kelass()
    {
        return $this->belongsTo(kelas::class,'kelas_id')->onlyTrashed();
    }

    public function subkelass()
    {
        return $this->belongsTo(subkelas::class,'subkelas_id')->onlyTrashed();
    }

    public function teacher()
    {
        return $this->belongsTo(teacher::class,'teacher_id');
    }
}
