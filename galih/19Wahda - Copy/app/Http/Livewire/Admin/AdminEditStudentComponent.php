<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\Student;
use App\Models\SubKelas;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminEditStudentComponent extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $img, $nwimg, $kelas_id, $subkelas_id, $user_id, $student_id;

    public function mount($student_id)
    {
        $materi = Student::findOrFail($student_id);
        $this->student_id = $materi->id;
        $this->phone = $materi->phone;
        $this->img = $materi->image;
        $this->kelas_id = $materi->subkelas->kelas_id;
        $this->subkelas_id = $materi->subkelas_id;
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
        ],[
            'name.required' => 'Kelas Harus Diisi',
            'phone.required' => 'Nomer Telfon Harus Diisi',
            'phone.numeric' => 'Nomer Telfon Harus Berupa Angka',
            'kelas_id.required' => 'Kelas Harus Diisi',
            'subkelas_id.required' => 'Sub Kelas Harus Diisi',
            'kelas_id.exists' => 'Data Kelas Harus Valid',
            'subkelas_id.exists' => 'Data Sub Kelas Harus Valid',
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
        ],[
            'name.required' => 'Kelas Harus Diisi',
            'phone.required' => 'Nomer Telfon Harus Diisi',
            'phone.numeric' => 'Nomer Telfon Harus Berupa Angka',
            'kelas_id.required' => 'Kelas Harus Diisi',
            'subkelas_id.required' => 'Sub Kelas Harus Diisi',
            'kelas_id.exists' => 'Data Kelas Harus Valid',
            'subkelas_id.exists' => 'Data Sub Kelas Harus Valid',
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
        $murid->utype = 'STD';
        $murid->save();
        
        $student = Student::findOrFail($this->student_id);
        $student->user_id = $murid->id;
        $student->phone = $this->phone;
        if($this->nwimg)
        {
            unlink('assets/Student/'.$this->img);
            $imgnm = Carbon::now()->timestamp.'.'.$this->nwimg->extension();
            $this->nwimg->storeAs('Student',$imgnm);
            $student->image = $imgnm;
        }
        $student->subkelas_id = $this->subkelas_id;
        $student->save();

        return redirect()->route('admin.student')->with('message', 'Berhasil Mengubah Murid');
    }

    public function render()
    {
        $kelas = Kelas::all();
        $subkelas = SubKelas::where('kelas_id', $this->kelas_id)->get();
        return view('livewire.admin.admin-edit-student-component',['kelas'=>$kelas, 'subkelas'=>$subkelas]);
    }
}
