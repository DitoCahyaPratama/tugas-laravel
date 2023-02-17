<?php

namespace App\Http\Livewire;

use App\Models\bab;
use Livewire\Component;

class BabByMateriComponent extends Component
{
    public $materi_id;

    public function mount($materi_id)
    {
        $this->materi_id = $materi_id;
    }

    public function render()
    {
        $bab = bab::where('materi_id', $this->materi_id)->get();
        return view('livewire.bab-by-materi-component',['bab'=>$bab]);
    }
}
