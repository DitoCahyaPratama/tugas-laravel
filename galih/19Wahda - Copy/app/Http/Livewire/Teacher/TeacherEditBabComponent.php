<?php

namespace App\Http\Livewire\Teacher;

use App\Models\bab;
use App\Models\materi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherEditBabComponent extends Component
{
    use WithFileUploads;

    public $name, $desc, $file, $nwfile, $materi_id, $bab_id;

    public function mount($bab_id)
    {
        $materi = bab::findOrFail($bab_id);
        $this->bab_id = $materi->id;
        $this->materi_id = $materi->materi_id;
        $this->name = $materi->name;
        $this->desc = $materi->description;
        $this->file = $materi->file;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'desc' => 'required',
            'materi_id' => 'required',
        ],[
            'name.required' => 'Nama Bab Harus Diisi',
            'desc.required' => 'Description Harus Diisi',
            'materi_id.required' => 'Materi Id Harus Diisi',
        ]);
        if($this->nwfile)
        {
            $this->validateOnly($fields,[
                'nwfile' => 'required|mimes:pdf'
            ],[
                'nwfile.required' => 'File Harus Diisi',
                'nwfile.mimes' => 'File Harus Bertipe PDF',
            ]);
        }
    }

    public function addMateri()
    {
        $this->validate([
            'name' => 'required',
            'desc' => 'required',
            'materi_id' => 'required',
        ],[
            'name.required' => 'Nama Bab Harus Diisi',
            'desc.required' => 'Description Harus Diisi',
            'materi_id.required' => 'Materi Id Harus Diisi',
        ]);
        if($this->nwfile)
        {
            $this->validate([
                'nwfile' => 'required|mimes:pdf'
            ],[
                'nwfile.required' => 'File Harus Diisi',
                'nwfile.mimes' => 'File Harus Bertipe PDF',
            ]);
        }

        $materi = Bab::findOrFail($this->bab_id);
        $materi->name = $this->name;
        $materi->description = $this->desc;
        if($this->nwfile)
        {
            unlink('assets/bab/'.$this->file);
            $imgnm = Carbon::now()->timestamp.'.'.$this->nwfile->extension();
            $this->nwfile->storeAs('bab',$imgnm);
            $materi->file = $imgnm;
        }
        $materi->materi_id = $this->materi_id;
        $materi->save();
        return redirect()->route('teacher.bab')->with('message', 'Berhasil Mengubah Baba');
    }

    public function render()
    {
        $materi = materi::where('teacher_id', Auth::user()->teacher->id)->get();
        return view('livewire.teacher.teacher-edit-bab-component',['materi'=>$materi]);
    }
}
