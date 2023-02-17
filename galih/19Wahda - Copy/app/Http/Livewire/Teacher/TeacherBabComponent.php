<?php

namespace App\Http\Livewire\Teacher;

use App\Models\bab;
use App\Models\materi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherBabComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $materi = bab::findOrFail($id);
        $materi->delete();
        session()->flash('message', 'Berhasil Menghapus Bab');
    }
    
    public function render()
    {
        $materi = materi::where('teacher_id', Auth::user()->teacher->id)->get();
        $sentence = [];
        foreach ($materi as $index => $item) {
            if($item->count() === 1)
            {
                $sentence[] .= (int)$item['id'];
            }
            elseif($index == $item->count()-1)
            {
                $sentence[] .= (int)$item['id'];
            }
            else 
            {
                $sentence[] .= (int)$item['id']. ', ';
            }
        }
        $bab = bab::whereIn('materi_id', $sentence)->orderBy('name', 'ASC')->paginate(3);
        return view('livewire.teacher.teacher-bab-component',['bab'=>$bab]);
    }
}
