<?php

namespace App\Http\Livewire;

use App\Models\materi;
use Livewire\Component;

class MateriComponent extends Component
{
    public function render()
    {
        $materi = materi::all();
        return view('livewire.materi-component',['materi'=>$materi]);
    }
}
