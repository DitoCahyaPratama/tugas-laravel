<?php

namespace App\Http\Livewire\Teacher;

use App\Models\materi;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class TeacherEditMateriComponent extends Component
{
    use WithFileUploads;

    public $name, $desc, $img, $nwimg, $materi_id;

    public function mount($materi_id)
    {
        $materi = Materi::findOrFail($materi_id);
        $this->materi_id = $materi_id;
        $this->name = $materi->name;
        $this->desc = $materi->description;
        $this->img = $materi->image;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'desc' => 'required',
        ],[
            'name.required' => 'Nama Materi Harus Diisi',
            'desc' => 'Description Harus Diisi',
        ]);
        if($this->nwimg)
        {
            $this->validateOnly($fields,[
                'nwimg' => 'required|mimes:png,jpg,jpeg',
            ],[
                'nwimg.required'=> 'Image Harus Diisi',
                'nwimg.mimes' => 'Image Harus Bertipe PNG, JPG, dan JPEG',
            ]);
        }
    }

    public function editMateri()
    {
        $this->validate([
            'name' => 'required',
            'desc' => 'required',
        ],[
            'name.required' => 'Nama Materi Harus Diisi',
            'desc' => 'Description Harus Diisi',
        ]);
        if($this->nwimg)
        {
            $this->validate([
                'nwimg' => 'required|mimes:png,jpg,jpeg',
            ],[
                'nwimg.required'=> 'Image Harus Diisi',
                'nwimg.mimes' => 'Image Harus Bertipe PNG, JPG, dan JPEG',
            ]);
        }

        $materi = materi::findOrFail($this->materi_id);
        $materi->name = $this->name;
        $materi->description = $this->desc;
        if($this->nwimg)
        {
            unlink('assets/materi/'.$this->img);
            $imgnm = Carbon::now()->timestamp.'.'.$this->nwimg->extension();
            $this->nwimg->storeAs('materi',$imgnm);
            $materi->image = $imgnm;
        }
        $materi->save();
        return redirect()->route('teacher.materi')->with('message', 'Berhasil Menambah Materi');
    }

    public function render()
    {
        return view('livewire.teacher.teacher-edit-materi-component');
    }
}
