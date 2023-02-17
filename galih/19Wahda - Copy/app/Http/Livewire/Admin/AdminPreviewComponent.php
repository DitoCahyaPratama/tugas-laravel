<?php

namespace App\Http\Livewire\Admin;

use App\Models\preview;
use Carbon\Carbon;
use Faker\Core\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AdminPreviewComponent extends Component
{
    public $name, $message, $path;

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
        return redirect()->route('admin.preview')->with('message', 'Berhasil Mengirim Reviuew');
    }

    public function render()
    {
        return view('livewire.admin.admin-preview-component');
    }
}
