<?php

namespace App\Http\Livewire\Admin;

use App\Models\Kelas;
use App\Models\Student;
use App\Models\SubKelas;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class AdminAddStudentComponent extends Component
{
    use WithFileUploads;

    public $name, $email, $password, $phone, $img, $confirm_password, $kelas_id = 1, $subkelas_id;

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
            'kelas_id.exists' => 'Data Kelas Harus Valid',
            'subkelas_id.exists' => 'Data Sub Kelas Harus Valid',
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
            'kelas_id.exists' => 'Data Kelas Harus Valid',
            'subkelas_id.exists' => 'Data Sub Kelas Harus Valid',
        ]);

        if ($this->password === $this->confirm_password)
        {
            $murid = new User();
            $murid->name = $this->name;
            $murid->email = $this->email;
            $murid->utype = 'STD';
            $murid->password = hash::make($this->password);
            $murid->save();
            
            $student = new Student();
            $student->user_id = $murid->id;
            $student->phone = $this->phone;
            $imgnm = Carbon::now()->timestamp.'.'.$this->img->extension();
            $this->img->storeAs('Student',$imgnm);
            $student->image = $imgnm;
            $student->subkelas_id = $this->subkelas_id;
            $student->save();
    
            return redirect()->route('admin.student')->with('message', 'Berhasil Menambah Murid');
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
        return view('livewire.admin.admin-add-student-component',['kelas'=>$kelas,'subkelas'=>$subkelas]);
    }
}
