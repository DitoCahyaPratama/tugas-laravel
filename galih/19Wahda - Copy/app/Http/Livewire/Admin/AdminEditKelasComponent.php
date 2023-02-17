<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use Livewire\Component;

class AdminEditKelasComponent extends Component
{
    public $name, $kelas_id;

    public function mount($kelas_id)
    {
        $materi = Kelas::findOrFail($kelas_id);
        $this->kelas_id = $materi->id;
        $this->name = $materi->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:kelas',
        ],[
            'name.required' => 'Kelas Harus Diisi',
            'name.unique' => 'Kelas Sudah Pernah Dipakai'
        ]);
    }

    public function addMateri()
    {
        $this->validate([
            'name' => 'required|unique:kelas',
        ],[
            'name.required' => 'Kelas Harus Diisi',
            'name.unique' => 'Kelas Sudah Pernah Dipakai'
        ]);


        $materi = Kelas::findOrFail($this->kelas_id);
        $materi->name = $this->name;
        $materi->save();
        return redirect()->route('admin.kelas')->with('message', 'Berhasil Mengubah Kelas');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-kelas-component');
    }
}
