<?php

namespace App\Http\Livewire\Teacher;

use App\Models\student;
use Livewire\Component;

class TeacherTugasDoneComponent extends Component
{
    public function render()
    {
        
        $data = student::all();

        return response()->json(
            [
                'data' => $data,
            ],
            200
        );
    }
}
