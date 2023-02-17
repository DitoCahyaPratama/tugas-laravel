<?php

namespace App\Http\Livewire;

use App\Models\contact;
use App\Models\preview;
use Carbon\Carbon;
use Livewire\Component;

class ContactComponent extends Component
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
        return redirect()->route('contact')->with('message', 'Berhasil Mengirim Review');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
