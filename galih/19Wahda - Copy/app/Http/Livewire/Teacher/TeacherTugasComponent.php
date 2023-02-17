<?php

namespace App\Http\Livewire\Teacher;

use App\Models\jawabanTugas;
use App\Models\tugas;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherTugasComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $materi = tugas::findOrFail($id);
        $materi->delete();
        session()->flash('message', 'Berhasil Menghapus Tugas');
    }

    public function updateStatus($tugas_id, $status)
    {
        $order = tugas::findOrFail($tugas_id);
        $order->status = $status;
        $order->save();
        session()->flash('message', 'Berhasil Mengubah Tugas');
    }

    public function render()
    {
        $exp = Tugas::all();
        foreach($exp as $index => $key)
        {
            if($exp[$index]->deadline < now())
            {
                $exp[$index]->status = 'kadeluarsa';
                $exp[$index]->save();
            }
        }

        
        $tugas = tugas::where('teacher_id', Auth::user()->teacher->id)->orderBy('name', 'ASC')->paginate(3);
        return view('livewire.teacher.teacher-tugas-component',['tugas'=>$tugas]);
    }
}
