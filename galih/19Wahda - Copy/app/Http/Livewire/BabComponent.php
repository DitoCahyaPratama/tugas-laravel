<?php

namespace App\Http\Livewire;

use App\Models\bab;
use Livewire\Component;

class BabComponent extends Component
{
    public function render()
    {
        $bab = bab::all();
        return view('livewire.bab-component',['bab'=>$bab]);
    }
}
