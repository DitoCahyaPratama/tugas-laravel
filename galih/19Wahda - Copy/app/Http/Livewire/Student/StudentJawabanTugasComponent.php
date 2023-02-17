<?php

namespace App\Http\Livewire\Student;

use App\Models\JawabanTugas;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentJawabanTugasComponent extends Component
{
    use WithFileUploads;

    public $jawaban, $file, $description, $status, $tugas_id;

    public function mount($tugas_id)
    {
        $this->tugas_id = $tugas_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'jawaban' => 'required',
        ],[
            'jawaban.required' => 'Jawaban Harus Diisi'
        ]);

        if($this->file)
        {
            $this->validateOnly($fields,[
                'file' => 'mimes:pdf',
            ],[
                'file.mimes' => 'File Harus Bertipe PDF'
            ]);
        }
    }

    public function addJawaban()
    {
        $this->validate([
            'jawaban' => 'required',
        ],[
            'jawaban.required' => 'Jawaban Harus Diisi'
        ]);

        if($this->file)
        {
            $this->validate([
                'file' => 'mimes:pdf',
            ],[
                'file.mimes' => 'File Harus Bertipe PDF'
            ]);
        }

        $materi = new JawabanTugas();
        $materi->jawaban = $this->jawaban;
        $materi->student_id = Auth::user()->student->id;
        $materi->status = 'selesai';
        if($this->description)
        {
            $materi->description = $this->description;
        }
        if($this->file)
        {
            $imgnm = Carbon::now()->timestamp.'.'.$this->file->extension();
            $this->file->storeAs('jawaban',$imgnm);
            $materi->file = $imgnm;
        }
        $materi->tugas_id = $this->tugas_id;
        $materi->save();
        return redirect()->route('student.tugas')->with('message', 'Berhasil Menambah Tugas');
    }

    public function render()
    {
        $tugas = Tugas::findOrFail($this->tugas_id);
        return view('livewire.student.student-jawaban-tugas-component',['tugas'=>$tugas]);
    }
}
