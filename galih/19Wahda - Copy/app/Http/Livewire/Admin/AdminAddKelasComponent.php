<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use Livewire\Component;

class AdminAddKelasComponent extends Component
{
    public $name;

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

        $materi = new Kelas();
        $materi->name = $this->name;
        $materi->save();
        return redirect()->route('admin.kelas')->with('message', 'Berhasil Menambah Kelas');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-kelas-component');
    }
}
