<?php

namespace App\Http\Livewire\Admin;

use App\Models\Student;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminStudentComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $materi = Student::findOrFail($id);
        $materi->delete();
        $materis = User::findOrFail($materi->user->id);
        $materis->delete();
        session()->flash('message', 'Berhasil Menghapus Murid');
    }

    public function render()
    {
        $student = Student::whereHas('subkelas', function ($query){
            $query->whereHas('kelas', function($query) {
                $query->whereNull('deleted_at');
            });
        })->orderBy('user_id', 'ASC')->paginate(3);
        return view('livewire.admin.admin-student-component',['student'=>$student]);
    }
}
