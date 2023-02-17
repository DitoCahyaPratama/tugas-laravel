<?php

namespace App\Http\Livewire\Teacher;

use App\Models\materi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherAddMateriComponent extends Component
{
    use WithFileUploads;

    public $name, $desc, $img;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'desc' => 'required',
            'img' => 'required|mimes:png,jpg,jpeg',
        ],[
            'name.required' => 'Nama Materi Harus Diisi',
            'desc' => 'Description Harus Diisi',
            'img.required'=> 'Image Harus Diisi',
            'img.mimes' => 'Image Harus Bertipe PNG, JPG, dan JPEG',
        ]);
    }

    public function addMateri()
    {
        $this->validate([
            'name' => 'required',
            'desc' => 'required',
            'img' => 'required|mimes:png,jpg,jpeg',
        ],[
            'name.required' => 'Nama Materi Harus Diisi',
            'desc' => 'Description Harus Diisi',
            'img.required'=> 'Image Harus Diisi',
            'img.mimes' => 'Image Harus Bertipe PNG, JPG, dan JPEG',
        ]);

        $materi = new materi();
        $materi->name = $this->name;
        $materi->description = $this->desc;
        $imgnm = Carbon::now()->timestamp.'.'.$this->img->extension();
        $this->img->storeAs('materi',$imgnm);
        $materi->image = $imgnm;
        $materi->teacher_id = Auth::user()->teacher->id;
        $materi->save();
        return redirect()->route('teacher.materi')->with('message', 'Berhasil Menambah Materi');
    }

    public function render()
    {
        return view('livewire.teacher.teacher-add-materi-component');
    }
}
