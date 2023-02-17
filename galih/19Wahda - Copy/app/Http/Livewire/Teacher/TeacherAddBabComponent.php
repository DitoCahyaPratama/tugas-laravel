<?php

namespace App\Http\Livewire\Teacher;

use App\Models\bab;
use App\Models\materi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherAddBabComponent extends Component
{
    use WithFileUploads;

    public $name, $desc, $file, $materi_id;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'desc' => 'required',
            'materi_id' => 'required|exists:materis,id',
            'file' => 'required|mimes:pdf'
        ],[
            'name.required' => 'Nama Bab Harus Diisi',
            'desc.required' => 'Description Harus Diisi',
            'materi_id.required' => 'Materi Id Harus Diisi',
            'file.required' => 'File Harus Diisi',
            'file.mimes' => 'File Harus Bertipe PDF',
            'materi_id.exists' => 'Data Materi Harus Valid',
        ]);
    }

    public function addMateri()
    {
        $this->validate([
            'name' => 'required',
            'desc' => 'required',
            'materi_id' => 'required|exists:materis,id',
            'file' => 'required|mimes:pdf'
        ],[
            'name.required' => 'Nama Bab Harus Diisi',
            'desc.required' => 'Description Harus Diisi',
            'materi_id.required' => 'Materi Id Harus Diisi',
            'file.required' => 'File Harus Diisi',
            'file.mimes' => 'File Harus Bertipe PDF',
            'materi_id.exists' => 'Data Materi Harus Valid',
        ]);

        $materi = new bab();
        $materi->name = $this->name;
        $materi->description = $this->desc;
        $imgnm = Carbon::now()->timestamp.'.'.$this->file->extension();
        $this->file->storeAs('bab',$imgnm);
        $materi->file = $imgnm;
        $materi->materi_id = $this->materi_id;
        $materi->save();
        return redirect()->route('teacher.bab')->with('message', 'Berhasil Menambah Bab');
    }

    public function render()
    {
        $materi = materi::where('teacher_id', Auth::user()->teacher->id)->get();
        return view('livewire.teacher.teacher-add-bab-component',['materi'=>$materi]);
    }
}
