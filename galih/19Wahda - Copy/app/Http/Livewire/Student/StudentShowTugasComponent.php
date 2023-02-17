<?php

namespace App\Http\Livewire\Student;

use App\Models\Tugas;
use Livewire\Component;

class StudentShowTugasComponent extends Component
{
    public $tugas_id;

    public function mount($tugas_id)
    {
        $this->tugas_id = $tugas_id;
    }

    public function render()
    {
        $tugas = Tugas::findOrFail($this->tugas_id);
        return view('livewire.student.student-show-tugas-component',['tugas'=>$tugas]);
    }
}
