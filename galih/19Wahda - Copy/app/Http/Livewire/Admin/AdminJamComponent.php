<?php

namespace App\Http\Livewire\Admin;

use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Jam;
use App\Models\SubKelas;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

class AdminJamComponent extends Component
{
    public $name, $mulai, $selesai, $jam_id;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required|unique:jams,name,'.$this->jam_id.'',
            'mulai' => 'required|date_format:H:i|after:07:00|before:selesai',
            'selesai' => 'required|date_format:H:i|after:mulai',
        ],[
            'name.required' => 'Keterangan Harus Diisi',
            'name.unique' => 'Keterangan Sudah Pernah Dipakai',
            'mulai.required' => 'Jam Mulai Harus Diisi',
            'mulai.date_format' => 'Format Jam Mulai Salah',
            'mulai.min' => 'Minimal Jam Mulai 07.00',
            'mulai.before' => 'Jam Mulai Harus Lebih Cepat Dari Pada Jam Selesai',
            'selesai.required' => 'Jam Selesai Harus Diisi',
            'selesai.date_format' => 'Format Jam Selesai Salah',
            'selesai.after' => 'Jam Selesai Harus Lebih Lambat Dari Pada Jam Selesai',
        ]);
    }

    public function addJam()
    {
        $this->validate([
            'name' => 'required|unique:jams',
            'mulai' => 'required|date_format:H:i|after:07:00|before:selesai',
            'selesai' => 'required|date_format:H:i|after:mulai',
        ],[
            'name.required' => 'Keterangan Harus Diisi',
            'name.unique' => 'Keterangan Sudah Pernah Dipakai',
            'mulai.required' => 'Jam Mulai Harus Diisi',
            'mulai.date_format' => 'Format Jam Mulai Salah',
            'mulai.min' => 'Minimal Jam Mulai 07.00',
            'mulai.before' => 'Jam Mulai Harus Lebih Cepat Dari Pada Jam Selesai',
            'selesai.required' => 'Jam Selesai Harus Diisi',
            'selesai.date_format' => 'Format Jam Selesai Salah',
            'selesai.after' => 'Jam Selesai Harus Lebih Lambat Dari Pada Jam Selesai',
        ]);

        $jam = new Jam();
        $jam->name = $this->name;
        $jam->jam_mulai = $this->mulai;
        $jam->jam_selesai = $this->selesai;
        $jam->save();

        $hari = Hari::all();
        $subkelas = SubKelas::all();
        foreach($subkelas as $key => $s)
        {
            foreach($hari as $key1 => $h)
            {
                $jadwal = new Jadwal();
                $jadwal->kelas = $s->kelas->name;
                $jadwal->subkelas = $s->name;
                $jadwal->hari = $h->name;
                $jadwal->jam = $jam->name;
                $jadwal->mapel = "";
                $jadwal->teacher = "";
                $jadwal->kelas_id = $s->kelas->id;
                $jadwal->subkelas_id = $s->id;
                $jadwal->hari_id = $h->id;
                $jadwal->jam_id = $jam->id;
                $jadwal->save();
            }
        }
        return redirect()->route('admin.jam')->with('message', 'Data Berhasil Ditambahkan');

    }

    public function editJam($id)
    {
        $jam = Jam::findOrFail($id);

        $this->jam_id =  $jam->id;
        $this->name = $jam->name;
        $this->mulai = date("H:i", strtotime($jam->jam_mulai));
        $this->selesai = date("H:i", strtotime($jam->jam_selesai));
    }

    public function detailJam($id)
    {
        $jam = Jam::findOrFail($id);

        $this->jam_id =  $jam->id;
        $this->name = $jam->name;
        $this->mulai = date("H:i", strtotime($jam->jam_mulai));
        $this->selesai = date("H:i", strtotime($jam->jam_selesai));
    }

    public function editJamm()
    {
        $this->validate([
            'name' => 'required|unique:jams,name,'.$this->jam_id.'',
            'mulai' => 'required|date_format:H:i|after:07:00|before:selesai',
            'selesai' => 'required|date_format:H:i|after:mulai',
        ],[
            'name.required' => 'Keterangan Harus Diisi',
            'name.unique' => 'Keterangan Sudah Pernah Dipakai',
            'mulai.required' => 'Jam Mulai Harus Diisi',
            'mulai.date_format' => 'Format Jam Mulai Salah',
            'mulai.min' => 'Minimal Jam Mulai 07.00',
            'mulai.before' => 'Jam Mulai Harus Lebih Cepat Dari Pada Jam Selesai',
            'selesai.required' => 'Jam Selesai Harus Diisi',
            'selesai.date_format' => 'Format Jam Selesai Salah',
            'selesai.after' => 'Jam Selesai Harus Lebih Lambat Dari Pada Jam Selesai',
        ]);

        $jam = Jam::findOrFail($this->jam_id);
        $jam->name = $this->name;
        $jam->jam_mulai = $this->mulai;
        $jam->jam_selesai = $this->selesai;
        $jam->save();
        return redirect()->route('admin.jam')->with('message', 'Data Berhasil Dirubah');
    }

    public function deleteJam($id)
    {
        $this->jam_id = $id;
    }

    public function deleteJamm()
    {
        $jam = Jam::findOrFail($this->jam_id);
        $jam->delete();
        return redirect()->route('admin.jam')->with('message', 'Data Berhasil Dihapus');
    }

    public function render()
    {
        $jam = Jam::orderBy('name', 'ASC')->paginate(3);
        return view('livewire.admin.admin-jam-component',['jam'=>$jam]);
    }
}
