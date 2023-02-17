<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\mapel;
use App\Models\SubKelas;
use App\Models\teacher;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditTeacherComponent extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $img, $nwimg, $kelas_id, $subkelas_id, $user_id, $teacher_id, $mapel_id;

    public function mount($teacher_id)
    {
        $materi = teacher::findOrFail($teacher_id);
        $this->teacher_id = $materi->id;
        $this->phone = $materi->phone;
        $this->img = $materi->image;
        $this->kelas_id = $materi->subkelas->kelas->id;
        $this->subkelas_id = $materi->subkelas_id;
        $this->mapel_id = $materi->mapel_id;
        $this->user_id = $materi->user_id;

        $user = User::findOrFail($this->user_id);
        $this->name = $user->name;

    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'phone' => 'required|numeric',
            'kelas_id' => 'required|exists:kelas,id',
            'subkelas_id' => 'required|exists:sub_kelas,id',
            'mapel_id' => 'required|exists:mapels,id',
        ],[
            'name.required' => 'Kelas Harus Diisi',
            'phone.required' => 'Nomer Telfon Harus Diisi',
            'phone.numeric' => 'Nomer Telfon Harus Berupa Angka',
            'kelas_id.required' => 'Kelas Harus Diisi',
            'subkelas_id.required' => 'Sub Kelas Harus Diisi',
            'mapel_id.required' => 'Mapel Harus Diisi',
            'kelas_id.exists' => 'Data Kelas Harus Valid',
            'subkelas_id.exists' => 'Data Sub Kelas Harus Valid',
            'mapel_id.exists' => 'Data Mapel Harus Valid',
        ]);

        if($this->nwimg)
        {
            $this->validateOnly($fields,[
                'nwimg' => 'required|mimes:png,jpg,jpeg',
            ],[
                'nwimg.required' => 'Image Harus Diisi',
                'nwimg.mimes' => 'Image Harus Berupa PNG, JPG, JPEG'
            ]);
        }
    }


    public function addStudent()
    {
        $this->validate([
            'name' => 'required',
            'phone' => 'required|numeric',
            'kelas_id' => 'required|exists:kelas,id',
            'subkelas_id' => 'required|exists:sub_kelas,id',
            'mapel_id' => 'required|exists:mapels,id',
        ],[
            'name.required' => 'Kelas Harus Diisi',
            'phone.required' => 'Nomer Telfon Harus Diisi',
            'phone.numeric' => 'Nomer Telfon Harus Berupa Angka',
            'kelas_id.required' => 'Kelas Harus Diisi',
            'subkelas_id.required' => 'Sub Kelas Harus Diisi',
            'mapel_id.required' => 'Mapel Harus Diisi',
            'kelas_id.exists' => 'Data Kelas Harus Valid',
            'subkelas_id.exists' => 'Data Sub Kelas Harus Valid',
            'mapel_id.exists' => 'Data Mapel Harus Valid',
        ]);

        if($this->nwimg)
        {
            $this->validate([
                'nwimg' => 'required|mimes:png,jpg,jpeg',
            ],[
                'nwimg.required' => 'Image Harus Diisi',
                'nwimg.mimes' => 'Image Harus Berupa PNG, JPG, JPEG'
            ]);
        }

        $murid = User::findOrFail($this->user_id);
        $murid->name = $this->name;
        $murid->email = $this->email;
        $murid->utype = 'TEA';
        $murid->save();
        
        $student = teacher::findOrFail($this->teacher_id);
        $student->user_id = $murid->id;
        $student->phone = $this->phone;
        if($this->nwimg)
        {
            unlink('assets/teacher/'.$this->img);
            $imgnm = Carbon::now()->timestamp.'.'.$this->nwimg->extension();
            $this->nwimg->storeAs('teacher',$imgnm);
            $student->image = $imgnm;
        }
        $student->subkelas_id = $this->subkelas_id;
        $student->mapel_id = $this->mapel_id;
        $student->save();

        return redirect()->route('admin.teacher')->with('message', 'Berhasil Mengubah Guru');
    }

    public function render()
    {
        $kelas = Kelas::all();
        $subkelas = SubKelas::where('kelas_id', $this->kelas_id)->get();
        $teacher = teacher::whereNotIn('mapel_id', [$this->mapel_id])->get();
        $sentence = '';
        foreach ($teacher as $item) {
            if($item->count() > 1)
            {
                $sentence .= $item['mapel_id'] . ', ';
            }
            else 
            {
                $sentence .= $item['mapel_id'];
            }
        }
        $mapel = mapel::whereNotIn('id', [$sentence])->get();
        return view('livewire.admin.admin-edit-teacher-component',['kelas'=>$kelas, 'subkelas'=>$subkelas, 'mapel'=>$mapel]);
    }
}
