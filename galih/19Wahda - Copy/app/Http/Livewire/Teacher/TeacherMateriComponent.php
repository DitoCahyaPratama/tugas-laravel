<?php

namespace App\Http\Livewire\Teacher;

use App\Models\materi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherMateriComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $materi = materi::findOrFail($id);
        $materi->delete();
        session()->flash('message', 'Berhasil Menghapus Materi');
    }

    public function render()
    {
        $materi = materi::where('teacher_id', Auth::user()->teacher->id)->orderBy('name', 'ASC')->paginate(3);
        return view('livewire.teacher.teacher-materi-component', ['materi'=>$materi]);
    }
}
