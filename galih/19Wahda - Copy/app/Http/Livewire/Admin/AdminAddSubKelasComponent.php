<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Jam;
use App\Models\Kelas;
use App\Models\SubKelas;
use Livewire\Component;

class AdminAddSubKelasComponent extends Component
{
    public $name, $kelas_id;

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

        $materi = new SubKelas();
        $materi->name = $this->name;
        $materi->kelas_id = $this->kelas_id;
        $materi->save();

        $hari = Hari::all();
        $jam = Jam::all();
        foreach($jam as $key => $s)
        {
            foreach($hari as $key1 => $h)
            {
                $jadwal = new Jadwal();
                $jadwal->kelas = $materi->kelas->name;
                $jadwal->subkelas = $materi->name;
                $jadwal->hari = $h->name;
                $jadwal->jam = $s->name;
                $jadwal->mapel = "";
                $jadwal->teacher = "";
                $jadwal->kelas_id = $materi->kelas->id;
                $jadwal->subkelas_id = $materi->id;
                $jadwal->hari_id = $h->id;
                $jadwal->jam_id = $s->id;
                $jadwal->save();
            }
        }
        return redirect()->route('admin.subkelas')->with('message', 'Berhasil Menambah Sub Kelas');
    }

    public function render()
    {
        $kelas = Kelas::all();
        return view('livewire.admin.admin-add-sub-kelas-component',['kelas'=>$kelas]);
    }
}
