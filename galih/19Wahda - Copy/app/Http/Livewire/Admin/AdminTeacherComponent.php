<?php

namespace App\Http\Livewire\Admin;

use App\Models\teacher;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminTeacherComponent extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $materi = teacher::findOrFail($id);
        $materi->delete();
        $materis = User::findOrFail($materi->user->id);
        $materis->delete();
        session()->flash('message', 'Berhasil Menghapus Guru');
    }

    public function render()
    {
        $teacher = Teacher::whereHas('subkelas', function($query) {
            $query->whereHas('kelas', function($query) {
                $query->whereNull('deleted_at');
            });
        })->orderBy('user_id', 'ASC')->paginate(3);
        return view('livewire.admin.admin-teacher-component', ['teacher'=>$teacher]);
    }
}