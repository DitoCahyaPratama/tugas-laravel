<?php

namespace App\Http\Livewire\Student;

use App\Models\JawabanTugas;
use App\Models\Student;
use App\Models\teacher;
use App\Models\Tugas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class StudentTugasComponent extends Component
{
    use WithPagination;

    public $user_id, $student_id;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
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
        
        $siswa = Student::findOrFail(Auth::user()->student->id);
        if($siswa)
        {
            $jawaban = JawabanTugas::where('student_id', $siswa->id)->get();
            $sentence = [];
            foreach ($jawaban as $index => $item) {
                if($item->count() === 1)
                {
                    $sentence[] .= (int)$item['tugas_id'];
                }
                elseif($index == $item->count()-1)
                {
                    $sentence[] .= (int)$item['tugas_id'];
                }
                else 
                {
                    $sentence[] .= (int)$item['tugas_id'].',';
                }
            }
            $currentTime = Carbon::now()->format('Y-m-d H:i:s');
            $tugas = Tugas::where('subkelas_id', $siswa->subkelas_id)->whereNotIn('id', $sentence)->where('deadline', '>', $currentTime)->where('status', 'aktif')->orderBy('name', 'ASC')->paginate(3);
        }
        else
        {
            $tugas = [''];
        }

        return view('livewire.student.student-tugas-component',['tugas'=>$tugas]);
    }
}
