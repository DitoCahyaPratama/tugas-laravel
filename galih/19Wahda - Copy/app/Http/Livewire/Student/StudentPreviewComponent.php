<?php

namespace App\Http\Livewire\Student;

use App\Models\preview;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class StudentPreviewComponent extends Component
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
        $contact->image = 'assets/Student/'.Auth::user()->student->image;
        
        $contact->save();
        return redirect()->route('student.preview')->with('message', 'Berhasil Mengirim Review');
    }

    public function render()
    {
        return view('livewire.student.student-preview-component');
    }
}
