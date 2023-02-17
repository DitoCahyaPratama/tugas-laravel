<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\SubKelas;
use Livewire\Component;

class AdminEditSubKelasComponent extends Component
{
    public $name, $kelas_id, $subkelas_id;

    public function mount($subkelas_id)
    {
        $materi = SubKelas::findOrFail($subkelas_id);
        $this->kelas_id = $materi->id;
        $this->subkelas_id = $subkelas_id;
        $this->name = $materi->name;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
        ],[
            'name.required' => 'Sub Kelas Harus Diisi',
            'kelas_id.required' => 'Kelas Harus Diisi',
            'kelas_id.exists' => 'Pilih Data Kelas Yang Valid',
        ]);
    }

    public function addMateri()
    {
        $this->validate([
            'name' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
        ],[
            'name.required' => 'Sub Kelas Harus Diisi',
            'kelas_id.required' => 'Kelas Harus Diisi',
            'kelas_id.exists' => 'Pilih Data Kelas Yang Valid',
        ]);

        $materi = SubKelas::findOrFail($this->subkelas_id);
        $materi->name = $this->name;
        $materi->kelas_id = $this->kelas_id;
        $materi->save();
        return redirect()->route('admin.subkelas')->with('message', 'Berhasil Mengedit Sub Kelas');
    }
    
    public function render()
    {
        $kelas = Kelas::all();
        return view('livewire.admin.admin-edit-sub-kelas-component', ['kelas'=>$kelas]);
    }
}
