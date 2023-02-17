<?php

namespace App\Http\Livewire\Admin;

use App\Models\preview;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminComponent extends Component
{
    public $name, $message, $img;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'Nama Harus Diisi',
            'message' => 'Message Harus Diisi',
        ]);
    }


    public function review()
    {
        $this->validate([
            'name' => 'required',
            'message' => 'required',
        ],[
            'name.required' => 'Nama Harus Diisi',
            'message' => 'Message Harus Diisi',
        ]);
        $contact = new preview();
        $contact->name = $this->name;
        $contact->message = $this->message;
        $contact->save();
        return redirect()->route('home')->with('message', 'Berhasil Mengirim Review');
    }

    public function render()
    {
        return view('livewire.admin.admin-component');
    }
}
