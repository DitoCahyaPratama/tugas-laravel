<?php

namespace App\Http\Livewire\Admin;

use App\Models\teacher;
use App\Models\User;
use Livewire\Component;

class AdminDeletedDataTeacherComponent extends Component
{
    public function restore($id, $user_id)
    {
        $teacher = teacher::withTrashed()->where('id', $id)->restore();
        $user = User::withTrashed()->where('id', $user_id)->restore();
        return redirect()->route('admin.teacher')->with('message', 'Berhasil Pulihkan Guru');
    }

    public function forceDelete($id, $user_id)
    {
        $teachers = teacher::onlyTrashed()->findOrFail($id)->forceDelete();
        $user = User::onlyTrashed()->findOrFail($user_id)->forceDelete();
        return redirect()->route('admin.deleted.teacher')->with('message', 'Berhasil Hapus Permanen Guru');
    }

    public function render()
    {
        $teacher = teacher::onlyTrashed()->get();
        return view('livewire.admin.admin-deleted-data-teacher-component', ['teacher'=>$teacher]);
    }
}
