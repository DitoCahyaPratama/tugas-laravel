<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Jam;
use App\Models\Kelas;
use App\Models\mapel;
use App\Models\SubKelas;
use App\Models\teacher;
use Livewire\Component;
use Livewire\WithPagination;

class AdminEditJadwalComponent extends Component
{

    public $jadwal_id;

    public $kelas, $subkelas, $hari, $jam, $mapel, $teacher;

    public $kelas_id, $subkelas_id, $hari_id, $jam_id, $mapel_id, $teacher_id;

    public function mount($kelas_id, $subkelas_id)
    {
        $this->kelas_id = $kelas_id;
        $this->subkelas_id = $subkelas_id;
    }

    public function tampiljadwal($jadwal_id)
    {
        $this->jadwal_id = $jadwal_id;
        $jadwal = Jadwal::findOrFail($jadwal_id);

        $this->kelas = $jadwal->kelas;
        $this->subkelas = $jadwal->subkelas;
        $this->hari = $jadwal->hari;
        $this->jam = $jadwal->jam;
        $this->mapel = $jadwal->mapel;
        $this->teacher = $jadwal->teacher;

        $this->kelas_id = $jadwal->kelas_id;
        $this->subkelas_id = $jadwal->subkelas_id;
        $this->hari_id = $jadwal->hari_id;
        $this->jam_id = $jadwal->jam_id;
        $this->mapel_id = $jadwal->mapel_id;
        $this->teacher_id = $jadwal->teacher_id;
    }

    public function editJadwall()
    {
        $jadwal = Jadwal::FindOrFail($this->jadwal_id);

        $jadwal->mapel_id = $this->mapel_id;
        $mapel2 = mapel::findOrFail($this->mapel_id);
        $jadwal->mapel = $mapel2->name;

        $jadwal->teacher_id = $this->teacher_id;
        $teacher2 = teacher::findOrFail($this->teacher_id);
        $jadwal->teacher = $teacher2->user->name;

        $jadwal->save();


        return redirect()->route('admin.jadwal.edit', ['kelas_id' => $this->kelas_id, 'subkelas_id' => $this->subkelas_id])->with('message', 'Berhasil Merubah Jadwal');
    }

    public function render()
    {
        $jadwal = Jadwal::where('kelas_id', $this->kelas_id)->where('subkelas_id', $this->subkelas_id)->get();

        $kelas1 = Kelas::all();
        $subkelas1 = SubKelas::where('kelas_id', $this->kelas_id)->get();
        $mapel1 = mapel::all();
        $teacher1 = teacher::where('subkelas_id', $this->subkelas_id)->where('mapel_id', $this->mapel_id)->get();
        $hari1 = Hari::all();

        return view('livewire.admin.admin-edit-jadwal-component', ['jadwal'=> $jadwal, 'mapel1'=>$mapel1, 'teacher1'=>$teacher1]);
    }
}
