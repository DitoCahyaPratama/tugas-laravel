<?php

namespace App\Http\Livewire\Teacher;

use App\Models\preview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TeacherPreviewComponent extends Component
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
        // dd($files);
        $contact->image = 'assets/teacher/'.Auth::user()->teacher->image;
        
        $contact->save();
        return redirect()->route('student.preview')->with('message', 'Berhasil Mengirim Review');
    }

    public function render()
    {
        return view('livewire.teacher.teacher-preview-component');
    }
}
