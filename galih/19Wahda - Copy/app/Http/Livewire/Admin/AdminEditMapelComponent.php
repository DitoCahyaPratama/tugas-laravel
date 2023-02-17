<?php

namespace App\Http\Livewire\Admin;

use App\Models\mapel;
use Livewire\Component;

class AdminEditMapelComponent extends Component
{
    public $name, $mapel_id;

    public function mount($mapel_id)
    {
        $materi = mapel::findOrFail($mapel_id);
        $this->mapel_id = $materi->id;
        $this->name = $materi->name;
    }

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

        $materi = mapel::findOrFail($this->mapel_id);
        $materi->name = $this->name;
        $materi->save();
        return redirect()->route('admin.mapel')->with('message', 'Berhasil Mengubah Mapel');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-mapel-component');
    }
}
