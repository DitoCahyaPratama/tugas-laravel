<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function subkelas()
    {
        return $this->belongsTo(subkelas::class,'subkelas_id');
    }
    
    public function hari()
    {
        return $this->belongsTo(hari::class,'hari_id');
    }

    public function jam()
    {
        return $this->belongsTo(jam::class,'jam_id');
    }

    public function mapel()
    {
        return $this->belongsTo(mapel::class,'mapel_id');
    }

    public function teacher()
    {
        return $this->belongsTo(teacher::class,'teacher_id');
    }
}
