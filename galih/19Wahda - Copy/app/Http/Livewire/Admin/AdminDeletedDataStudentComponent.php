<?php

namespace App\Http\Livewire\Admin;

use App\Models\student;
use App\Models\User;
use Livewire\Component;

class AdminDeletedDataStudentComponent extends Component
{
    public function restore($id, $user_id)
    {
        $student = student::withTrashed()->where('id', $id)->restore();
        $user = User::withTrashed()->where('id', $user_id)->restore();
        return redirect()->route('admin.student')->with('message', 'Berhasil Pulihkan Murid');
    }

    public function forceDelete($id, $user_id)
    {
        $student = student::onlyTrashed()->findOrFail($id)->forceDelete();
        $user = User::onlyTrashed()->findOrFail($user_id)->forceDelete();
        return redirect()->route('admin.deleted.student')->with('message', 'Berhasil Hapus Permanen Murid');
    }

    public function render()
    {
        $student = student::onlyTrashed()->get();
        return view('livewire.admin.admin-deleted-data-student-component',['student'=>$student]);
    }
}
