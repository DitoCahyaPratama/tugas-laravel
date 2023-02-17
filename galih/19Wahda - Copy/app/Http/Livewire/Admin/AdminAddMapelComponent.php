<?php

namespace App\Http\Livewire\Admin;

use App\Models\mapel;
use Livewire\Component;

class AdminAddMapelComponent extends Component
{
    public $name;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:mapels',
        ],[
            'name.required' => 'Mapel Harus Diisi',
            'name.unique' => 'Mapel Sudah Pernah Dipakai'
        ]);
    }

    public function addMateri()
    {
        $this->validate([
            'name' => 'required|unique:mapels',
        ],[
            'name.required' => 'Mapel Harus Diisi',
            'name.unique' => 'Mapel Sudah Pernah Dipakai'
        ]);

        $materi = new mapel();
        $materi->name = $this->name;
        $materi->save();
        return redirect()->route('admin.mapel')->with('message', 'Berhasil Menambah Mata Pelajaran');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-mapel-component');
    }
}
