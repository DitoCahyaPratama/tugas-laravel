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

class AdminJadwalComponent extends Component
{
    use WithPagination;

    public $kelas_id = 1, $subkelas_id, $jam_id = 1, $mapel_id = 1, $hari_id = 1, $guru_id;

    public $search_kelas = 1, $search_sub_kelas = 1;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'kelas_id' => 'required',
            'subkelas_id' => 'required',
            'jam_id' => 'required',
            'mapel_id' => 'required',
            'hari_id' => 'required',
            'guru_id' => 'required'
        ],[
            'kelas_id.required' => 'Kelas Harus Diisi',
            'subkelas_id.required' => 'Sub Kelas Harus Diisi',
            'jam_id.required' => 'Jam Harus Diisi',
            'mapel_id.required' => 'Mapel Harus Diisi',
            'hari_id.required' => 'Hari Harus Diisi',
            'guru_id.required' => 'Hari Harus Diisi',
        ]);
    }

    public function addJadwal()
    {
        $this->validate([
            'kelas_id' => 'required',
            'subkelas_id' => 'required',
            'jam_id' => 'required',
            'mapel_id' => 'required',
            'hari_id' => 'required',
            'guru_id' => 'required'
        ],[
            'kelas_id.required' => 'Kelas Harus Diisi',
            'subkelas_id.required' => 'Sub Kelas Harus Diisi',
            'jam_id.required' => 'Jam Harus Diisi',
            'mapel_id.required' => 'Mapel Harus Diisi',
            'hari_id.required' => 'Hari Harus Diisi',
            'guru_id.required' => 'Guru Harus Diisi',
        ]);
        $jadwal = Jadwal::where('subkelas_id', $this->subkelas_id)->where('hari_id', $this->hari_id)->where('jam_id', $this->jam_id)->first();

        $mapel = mapel::find($this->mapel_id);
        $jadwal->mapel = $mapel->name;

        $hari = Hari::find($this->hari_id);
        $jadwal->hari = $hari->name;

        $teacher = teacher::find($this->guru_id);
        $jadwal->teacher = $teacher->user->name;

        $jadwal->mapel_id = $this->mapel_id;
        $jadwal->teacher_id = $this->guru_id;
        $jadwal->save();
        return redirect()->route('admin.jadwal')->with('message', 'Data Berhasil Ditambah');
    }

    public function render()
    {
        $kelas = Kelas::all();
        $subkelas = SubKelas::where('kelas_id', $this->kelas_id)->get();
        $mapel = mapel::all();
        $teacher = teacher::where('subkelas_id', $this->subkelas_id)->where('mapel_id', $this->mapel_id)->get();
        $hari = Hari::all();
        
        $jdwl = jadwal::where('mapel_id', '!=', null)->get();
        if($jdwl)
        {
            $sentence = [];
            foreach ($jdwl as $index => $item) {
                if($item->count() === 1)
                {
                    $sentence[] .= (int)$item['jam_id'];
                }
                elseif($index == $item->count()-1)
                {
                    $sentence[] .= (int)$item['jam_id'];
                }
                else 
                {
                    $sentence[] .= (int)$item['jam_id'].',';
                }
            }
            $jam = Jam::whereNotIn('id', $sentence)->get();
        }
        else 
        {
            $jam = Jam::all();
        }


        $jam1 = Jam::all();
        
        $sk = Kelas::all();
        $ssk = SubKelas::where('kelas_id', $this->search_kelas)->get();

        $jadwal = Jadwal::where('kelas_id', $this->search_kelas)->where('subkelas_id', $this->search_sub_kelas)->get();
        $data = [];
        foreach ($jadwal as $row) {
            $data[$row->hari_id][] = array(
                'hari_id' => $row->hari_id,
                'jam_id' => $row->jam_id,
                'mapel_id' => $row->mapel_id,
                'teacher_id' => $row->teacher_id,
                'hari' => $row->hari,
                'jam' => $row->jam,
                'mapel' => $row->mapel,
                'teacher' => $row->teacher,
            );
        }

        //Ngurutin Jam_id
        $data = collect($data);
        foreach($data as $hari_id => $jadwal_hari){
            $data[$hari_id] = collect($jadwal_hari)->sortBy('jam_id')->toArray();
        }
        $data = $data->toArray();

        return view('livewire.admin.admin-jadwal-component', ['jadwal'=>$jadwal, 'kelas'=>$kelas, 'subkelas'=>$subkelas, 'hari'=>$hari, 'jam'=>$jam, 'mapel'=>$mapel, 'teacher'=>$teacher, 'hari1'=>$jam1, 'data'=>$data, 'sk'=>$sk, 'ssk'=>$ssk]);
    }
}
