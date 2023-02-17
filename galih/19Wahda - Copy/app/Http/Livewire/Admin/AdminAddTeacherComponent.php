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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class AdminAddTeacherComponent extends Component
{
    use WithFileUploads;

    public $name, $email, $password, $phone, $img, $confirm_password, $kelas_id = 1, $subkelas_id, $mapel_id = 1;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required|numeric',
            'img' => 'required|mimes:png,jpg,jpeg',
            'confirm_password' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'subkelas_id' => 'required|exists:sub_kelas,id',
            'mapel_id' => 'required|exists:mapels,id',
        ],[
            'name.required' => 'Kelas Harus Diisi',
            'email.required' => 'Kelas Harus Diisi',
            'email.unique' => 'Email Sudah Pernah Dipakai',
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password Paling Sedikit 8 Karakter',
            'phone.required' => 'Nomer Telfon Harus Diisi',
            'phone.numeric' => 'Nomer Telfon Harus Berupa Angka',
            'img.required' => 'Image Harus Diisi',
            'img.mimes' => 'Image Harus Berupa PNG, JPG, JPEG',
            'confirm_password.required' => 'Konfirmasi Password Harus Diisi',
            'confirm_password.min' => 'Konfirmasi Password Paling Sedikit 8 Karakter',
            'kelas_id.required' => 'Kelas Harus Diisi',
            'subkelas_id.required' => 'Sub Kelas Harus Diisi',
            'mapel_id.required' => 'Mapel Harus Diisi',
            'kelas_id.exists' => 'Data Kelas Harus Valid',
            'subkelas_id.exists' => 'Data Sub Kelas Harus Valid',
            'mapel_id.exists' => 'Data Mapel Harus Valid',
        ]);
    }


    public function addStudent()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required|numeric',
            'img' => 'required|mimes:png,jpg,jpeg',
            'confirm_password' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'subkelas_id' => 'required|exists:sub_kelas,id',
            'mapel_id' => 'required|exists:mapels,id',
        ],[
            'name.required' => 'Kelas Harus Diisi',
            'email.required' => 'Kelas Harus Diisi',
            'email.unique' => 'Email Sudah Pernah Dipakai',
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password Paling Sedikit 8 Karakter',
            'phone.required' => 'Nomer Telfon Harus Diisi',
            'phone.numeric' => 'Nomer Telfon Harus Berupa Angka',
            'img.required' => 'Image Harus Diisi',
            'img.mimes' => 'Image Harus Berupa PNG, JPG, JPEG',
            'confirm_password.required' => 'Konfirmasi Password Harus Diisi',
            'confirm_password.min' => 'Konfirmasi Password Paling Sedikit 8 Karakter',
            'kelas_id.required' => 'Kelas Harus Diisi',
            'subkelas_id.required' => 'Sub Kelas Harus Diisi',
            'mapel_id.required' => 'Mapel Harus Diisi',
            'kelas_id.exists' => 'Data Kelas Harus Valid',
            'subkelas_id.exists' => 'Data Sub Kelas Harus Valid',
            'mapel_id.exists' => 'Data Mapel Harus Valid',
        ]);

        if ($this->password === $this->confirm_password)
        {
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->utype = 'TEA';
            $user->password = hash::make($this->password);
            $user->save();
            
            $teacher = new teacher();
            $teacher->user_id = $user->id;
            $teacher->phone = $this->phone;
            $imgnm = Carbon::now()->timestamp.'.'.$this->img->extension();
            $this->img->storeAs('teacher',$imgnm);
            $teacher->image = $imgnm;
            $teacher->subkelas_id = $this->subkelas_id;
            $teacher->mapel_id = $this->mapel_id;
            $teacher->save();
    
            return redirect()->route('admin.teacher')->with('message', 'Berhasil Menambah Guru');
        }
        else
        {
            session()->flash('message', 'Confirm Password Doesnt Match');
        }

    }

    public function render()
    {
        $kelas = Kelas::all();
        $subkelas = SubKelas::where('kelas_id', $this->kelas_id)->get();
        $teacher = teacher::where('subkelas_id', $this->subkelas_id)->get();
        $sentence = [];
        foreach ($teacher as $index => $item) {
            if($item->count() === 1)
            {
                $sentence[] .= (int)$item['mapel_id'];
            }
            elseif($index == $item->count()-1)
            {
                $sentence[] .= (int)$item['mapel_id'];
            }
            else 
            {
                $sentence[] .= (int)$item['mapel_id'].', ';
            }
        }
 
        $mapel = mapel::whereNotIn('id', $sentence)->get();
    
        return view('livewire.admin.admin-add-teacher-component',['kelas'=>$kelas,'subkelas'=>$subkelas, 'mapel'=>$mapel]);
    }
}
