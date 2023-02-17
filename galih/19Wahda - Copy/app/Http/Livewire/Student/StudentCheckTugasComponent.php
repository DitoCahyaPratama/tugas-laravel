<?php

namespace App\Http\Livewire\Student;

use App\Models\jawabanTugas;
use App\Models\student;
use App\Models\tugas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StudentCheckTugasComponent extends Component
{
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
        
        $siswa = student::findOrFail(Auth::user()->student->id);
        if($siswa)
        {
            $jawaban = jawabanTugas::where('student_id', $siswa->id)->get();
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
            $terlambat = tugas::where('deadline', '<', $currentTime)->whereNotIn('id', $sentence)->get();
            $berlangsung = tugas::where('subkelas_id', $siswa->subkelas_id)->whereNotIn('id', $sentence)->where('deadline', '>', $currentTime)->where('status', 'aktif')->get();
        }
        else
        {
            $jawaban = [''];
            $terlambat = [''];
            $berlangsung = [''];
        }
        return view('livewire.student.student-check-tugas-component',['berlangsung'=>$berlangsung, 'jawaban'=>$jawaban, 'terlambat'=>$terlambat]);
    }
}
