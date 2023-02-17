<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class AdminResetPasswordTeacher extends Component
{
    public $password, $password_confirmation, $user_id;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ],[
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password Paling Sedikit 8 Karakter',
        ]);
    }


    public function reset1()
    {
        $this->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ],[
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password Paling Sedikit 8 Karakter',
        ]);

        if ($this->password === $this->password_confirmation)
        {
            $user = User::findOrFail($this->user_id);
            $user->password = hash::make($this->password);
            $user->save();
    
            return redirect()->route('admin.teacher')->with('message', 'Berhasil Ubah Data Password');
        }
        else
        {
            session()->flash('message', 'Konfirmasi Password Tidak Sama');
        }
    }

    public function render()
    {
        $user = User::findOrFail($this->user_id);
        return view('livewire.admin.admin-reset-password-teacher', ['user'=>$user]);
    }
}
