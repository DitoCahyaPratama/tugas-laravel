<?php

namespace App\Http\Livewire\Teacher;

use App\Models\tugas;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherEditTugasComponent extends Component
{
    use WithFileUploads;

    public $name, $soal, $description, $file, $nwfile, $status, $kelas_id, $subkelas_id, $deadline, $tugas_id;

    public function mount($tugas_id)
    {
        $materi = Tugas::findOrFail($tugas_id);
        $this->tugas_id = $tugas_id;
        $this->name = $materi->name;
        $this->soal = $materi->soal;
        $this->description = $materi->description;
        $this->file = $materi->file;
        $this->status = $materi->status;
        $this->deadline = $materi->deadline;
    }

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

        if($this->nwfile)
        {
            $this->validateOnly($fields,[
                'nwfile' => 'mimes:pdf',
            ],[
                'nwfile.mimes' => 'File Harus Diisi Dengan PDF'
            ]);
        }
    }

    public function editTugas()
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

        if($this->nwfile)
        {
            $this->validate([
                'nwfile' => 'mimes:pdf',
            ],[
                'nwfile.mimes' => 'File Harus Diisi Dengan PDF'
            ]);
        }

        $materi = tugas::findOrFail($this->tugas_id);
        $materi->name = $this->name;
        $materi->soal = $this->soal;
        $materi->description = $this->description;

        if($this->nwfile)
        {
            if($this->file)
            {
                unlink('assets/tugas/'.$this->file);
            }
            $imgnm = Carbon::now()->timestamp.'.'.$this->nwfile->extension();
            $this->nwfile->storeAs('tugas',$imgnm);
            $materi->file = $imgnm;
        }

        $materi->status = $this->status;
        $materi->deadline = $this->deadline;
        $materi->save();
        return redirect()->route('teacher.tugas')->with('message', 'Berhasil Mengubah Tugas');
    }

    public function render()
    {
        return view('livewire.teacher.teacher-edit-tugas-component');
    }
}
