<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\mapel;
use App\Models\student;
use App\Models\SubKelas;
use App\Models\teacher;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $kelas = Kelas::all();
        $subkelas = SubKelas::all();
        $mapel = mapel::all();
        $teacher = teacher::all();
        $student = student::all();
        return view('livewire.admin.admin-dashboard-component',['kelas'=>$kelas, 'subkelas'=>$subkelas, 'mapel'=>$mapel, 'teacher'=>$teacher, 'student'=>$student]);
    }
}
