<?php

namespace App\Http\Livewire\Teacher;

use App\Models\tugas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherAddTugasComponent extends Component
{
    use WithFileUploads;

    public $name, $soal, $description, $file, $status, $teacher_id, $deadline;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'soal' => 'required',
            'status' => 'required',
            'deadline' => 'required|date|after:now',
        ],[
            'name.required' => 'Judul Soal Harus Diisi',
            'soal.required' => 'Soal Harus Diisi',
            'status.required' => 'Status Harus Diisi',
            'deadline.required' => 'Deadline Harus Diisi',
            'deadline.date' => 'Deadline Harus Berupa Tanggal',
            'deadline.after' => 'Deadline Tidak Boleh Diisi Dengan Nilai Sebelumnya',
        ]);

        if($this->file)
        {
            $this->validateOnly($fields,[
                'file' => 'mimes:pdf',
            ],[
                'file.mimes' => 'File Harus Diisi Dengan PDF'
            ]);
        }
    }

    public function addTugas()
    {
        $this->validate([
            'name' => 'required',
            'soal' => 'required',
            'status' => 'required',
            'deadline' => 'required|date|after:now',
        ],[
            'name.required' => 'Judul Soal Harus Diisi',
            'soal.required' => 'Soal Harus Diisi',
            'status.required' => 'Status Harus Diisi',
            'deadline.required' => 'Deadline Harus Diisi',
            'deadline.date' => 'Deadline Harus Berupa Tanggal',
            'deadline.after' => 'Deadline Tidak Boleh Diisi Dengan Nilai Sebelumnya',
        ]);

        if($this->file)
        {
            $this->validate([
                'file' => 'mimes:pdf',
            ],[
                'file.mimes' => 'File Harus Diisi Dengan PDF'
            ]);
        }

        $materi = new tugas();
        $materi->name = $this->name;
        $materi->soal = $this->soal;
        $materi->description = $this->description;
        if($this->file)
        {
            $imgnm = Carbon::now()->timestamp.'.'.$this->file->extension();
            $this->file->storeAs('tugas',$imgnm);
            $materi->file = $imgnm;
        }
        $materi->status = $this->status;
        $materi->teacher_id = Auth::user()->teacher->id;
        $materi->subkelas_id = Auth::user()->teacher->subkelas->id;
        $materi->mapel_id =  Auth::user()->teacher->mapel->id;
        $materi->deadline = $this->deadline;
        $materi->save();
        return redirect()->route('teacher.tugas')->with('message', 'Berhasil Menambah Tugas');
    }

    public function render()
    {
        // $kelas = Kelas::all();
        // $subkelas = SubKelas::where('kelas_id', $this->kelas_id)->get();
        return view('livewire.teacher.teacher-add-tugas-component');
    }
}
