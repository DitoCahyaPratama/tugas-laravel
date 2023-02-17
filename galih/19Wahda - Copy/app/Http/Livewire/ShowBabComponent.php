<?php

namespace App\Http\Livewire;

use App\Models\bab;
use Livewire\Component;

class ShowBabComponent extends Component
{
    public $bab_id;

    public function mount($bab_id)
    {
        $this->bab_id = $bab_id;
    }

    public function render()
    {
        $bab = bab::findOrFail($this->bab_id);
        return view('livewire.show-bab-component',['bab'=>$bab]);
    }
}
